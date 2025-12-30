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
            // Get cart items
            $cartItems = CartItem::where('user_id', $user->id)
                ->with('product')
                ->get();

            if ($cartItems->isEmpty()) {
                throw new \Exception('Cart is empty');
            }

            // Validate stock and calculate subtotal
            $subtotal = 0;
            $orderItems = [];

            foreach ($cartItems as $cartItem) {
                $product = $cartItem->product;

                // Check stock
                if (! $product->isInStock()) {
                    throw new \Exception("Product {$product->name} is out of stock");
                }

                if ($product->stock < $cartItem->quantity) {
                    throw new \Exception("Insufficient stock for {$product->name}");
                }

                $itemPrice = $product->finalPrice();
                $itemSubtotal = $itemPrice * $cartItem->quantity;
                $subtotal += $itemSubtotal;

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

            // Calculate shipping cost
            $shippingCost = 0;
            if ($shippingMethodId) {
                $shippingMethod = \App\Models\ShippingMethod::find($shippingMethodId);
                if ($shippingMethod && $shippingMethod->is_active) {
                    $shippingCost = $shippingMethod->cost;
                }
            }

            // Apply coupon if provided
            $discount = 0;
            $couponId = null;
            if ($couponCode) {
                $coupon = Coupon::where('code', $couponCode)->first();
                if ($coupon && $this->couponService->isValidForUser($coupon, $user->id, $subtotal)) {
                    $discount = $coupon->calculateDiscount($subtotal);
                    $couponId = $coupon->id;
                } else {
                    throw new \Exception('Invalid or expired coupon code');
                }
            }

            // Calculate tax (10% for example - you can make this configurable)
            $taxRate = 0.10;
            $tax = ($subtotal - $discount + $shippingCost) * $taxRate;

            // Calculate total
            $total = $subtotal - $discount + $shippingCost + $tax;

            // Generate order number
            $orderNumber = 'ORD-'.strtoupper(uniqid());

            // Create order
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

            // Create order items
            foreach ($orderItems as $item) {
                $item['order_id'] = $order->id;
                OrderItem::create($item);

                // Update product stock
                $product = Product::find($item['product_id']);
                $product->decrement('stock', $item['quantity']);

                // Update stock status
                if ($product->stock <= 0) {
                    $product->update(['stock_status' => 'out_of_stock']);
                } elseif ($product->stock <= $product->low_stock_threshold) {
                    $product->update(['stock_status' => 'low_stock']);
                }
            }

            // Update coupon usage if used
            if ($couponId) {
                $coupon = Coupon::find($couponId);
                $coupon->increment('used_count');

                \App\Models\CouponUsage::create([
                    'coupon_id' => $couponId,
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'discount_amount' => $discount,
                ]);
            }

            // Clear cart
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
            throw new \Exception('Unauthorized');
        }

        if (! $order->canCancel()) {
            throw new \Exception('This order cannot be cancelled');
        }

        return DB::transaction(function () use ($order, $reason) {
            // Restore product stock
            foreach ($order->items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->increment('stock', $item->quantity);

                    // Update stock status
                    if ($product->stock > 0) {
                        $product->update(['stock_status' => 'in_stock']);
                    }
                }
            }

            // Update order
            $order->update([
                'status' => 'cancelled',
                'cancelled_at' => now(),
                'cancellation_reason' => $reason,
            ]);

            return $order->fresh();
        });
    }
}
