<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderService
{
    private const SCALE = 2;

    private const TAX_RATE = '0.10';

    public function __construct(
        private CouponService $couponService
    ) {}

    /**
     * Create order from cart items.
     */
    public function createOrderFromCart(
        User $user,
        array $addressData,
        ?int $shippingMethodId = null,
        ?string $couponCode = null,
        ?string $customerNotes = null
    ): Order {
        return DB::transaction(function () use ($user, $addressData, $shippingMethodId, $couponCode, $customerNotes) {
            $cartItems = CartItem::where('user_id', $user->id)
                ->with('product')
                ->get();

            if ($cartItems->isEmpty()) {
                throw new \DomainException('Cart is empty');
            }

            $productIds = $cartItems->pluck('product_id')->unique()->all();

            /**
             * Lock product rows for the duration of the transaction to prevent
             * oversell under concurrent checkout.
             */
            $lockedProducts = Product::whereIn('id', $productIds)
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            $subtotal = '0';
            $orderItems = [];

            foreach ($cartItems as $cartItem) {
                $product = $lockedProducts->get($cartItem->product_id);

                if (! $product) {
                    throw new \DomainException("Product {$cartItem->product_id} not found");
                }

                if (! $product->isInStock()) {
                    throw new \DomainException("Product {$product->name} is out of stock");
                }

                if ($product->stock < $cartItem->quantity) {
                    throw new \DomainException("Insufficient stock for {$product->name}");
                }

                $itemPrice = (string) $product->finalPrice();
                $itemSubtotal = bcmul($itemPrice, (string) $cartItem->quantity, self::SCALE);
                $subtotal = bcadd($subtotal, $itemSubtotal, self::SCALE);

                $orderItems[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_sku' => $product->sku,
                    'quantity' => $cartItem->quantity,
                    'price' => $itemPrice,
                    'discount' => 0,
                    'subtotal' => $itemSubtotal,
                ];
            }

            $shippingCost = '0';
            if ($shippingMethodId) {
                $shippingMethod = \App\Models\ShippingMethod::find($shippingMethodId);
                if ($shippingMethod && $shippingMethod->is_active) {
                    $shippingCost = (string) $shippingMethod->cost;
                }
            }

            $discount = '0';
            $couponId = null;
            if ($couponCode) {
                /**
                 * Lock the coupon row so usage limit checks and the used_count
                 * increment below are serialized.
                 */
                $coupon = Coupon::where('code', $couponCode)
                    ->lockForUpdate()
                    ->first();

                if ($coupon && $this->couponService->isValidForUser($coupon, $user->id, $subtotal)) {
                    $discount = $coupon->calculateDiscount($subtotal);
                    $couponId = $coupon->id;
                } else {
                    throw new \DomainException('Invalid or expired coupon code');
                }
            }

            $taxBase = bcadd(bcsub($subtotal, $discount, self::SCALE), $shippingCost, self::SCALE);
            $tax = bcmul($taxBase, self::TAX_RATE, self::SCALE);

            $total = bcadd($taxBase, $tax, self::SCALE);

            $orderNumber = 'ORD-'.strtoupper(uniqid());

            $order = Order::create([
                'order_number' => $orderNumber,
                'user_id' => $user->id,
                'status' => 'pending',
                'payment_status' => 'unpaid',
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping_cost' => $shippingCost,
                'discount' => $discount,
                'total' => $total,
                'coupon_id' => $couponId,
                'shipping_method_id' => $shippingMethodId,
                'shipping_address' => $addressData['shipping_address'] ?? $addressData,
                'billing_address' => $addressData['billing_address'] ?? $addressData,
                'customer_notes' => $customerNotes,
            ]);

            foreach ($orderItems as $item) {
                $item['order_id'] = $order->id;
                OrderItem::create($item);

                $product = $lockedProducts->get($item['product_id']);
                $product->decrement('stock', $item['quantity']);
                $product->refresh();

                if ($product->stock <= 0) {
                    $product->update(['stock_status' => 'out_of_stock']);
                } elseif ($product->stock <= $product->low_stock_threshold) {
                    $product->update(['stock_status' => 'low_stock']);
                }
            }

            if ($couponId) {
                Coupon::whereKey($couponId)->increment('used_count');

                \App\Models\CouponUsage::create([
                    'coupon_id' => $couponId,
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'discount_amount' => $discount,
                ]);
            }

            CartItem::where('user_id', $user->id)->delete();

            return $order->load(['items', 'shippingMethod', 'coupon']);
        });
    }

    /**
     * Cancel an order.
     */
    public function cancelOrder(Order $order, User $user, ?string $reason = null): Order
    {
        if ($order->user_id !== $user->id) {
            throw new \DomainException('Unauthorized');
        }

        if (! $order->canCancel()) {
            throw new \DomainException('This order cannot be cancelled');
        }

        return DB::transaction(function () use ($order, $reason) {
            $order->load('items');

            $productIds = $order->items->pluck('product_id')->unique()->all();

            $lockedProducts = Product::whereIn('id', $productIds)
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            foreach ($order->items as $item) {
                $product = $lockedProducts->get($item->product_id);
                if (! $product) {
                    continue;
                }

                $product->increment('stock', $item->quantity);
                $product->refresh();

                if ($product->stock > 0 && $product->stock_status === 'out_of_stock') {
                    $product->update(['stock_status' => 'in_stock']);
                }
            }

            $order->update([
                'status' => 'cancelled',
                'cancelled_at' => now(),
                'cancellation_reason' => $reason,
            ]);

            return $order->fresh();
        });
    }
}
