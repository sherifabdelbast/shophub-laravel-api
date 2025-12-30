<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;

class CartService
{
    /**
     * Add item to cart or update quantity if exists.
     */
    public function addItem(User $user, int $productId, int $quantity = 1): CartItem
    {
        $product = Product::findOrFail($productId);

        // Check stock availability
        if (! $product->isInStock()) {
            throw new \Exception('Product is out of stock');
        }

        if ($product->stock < $quantity) {
            throw new \Exception('Insufficient stock available');
        }

        // Get current price (use discount price if available)
        $price = $product->finalPrice();

        // Check if item already exists in cart
        $cartItem = CartItem::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // Update quantity
            $newQuantity = $cartItem->quantity + $quantity;

            if ($product->stock < $newQuantity) {
                throw new \Exception('Insufficient stock available');
            }

            $cartItem->update([
                'quantity' => $newQuantity,
                'price' => $price, // Update price in case it changed
            ]);

            return $cartItem->fresh(['product']);
        }

        // Create new cart item
        $cartItem = CartItem::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $price,
        ]);

        return $cartItem->load(['product']);
    }

    /**
     * Update cart item quantity.
     */
    public function updateQuantity(User $user, int $cartItemId, int $quantity): CartItem
    {
        $cartItem = CartItem::where('user_id', $user->id)
            ->findOrFail($cartItemId);

        if ($quantity <= 0) {
            throw new \Exception('Quantity must be greater than 0');
        }

        $product = $cartItem->product;

        if (! $product->isInStock()) {
            throw new \Exception('Product is out of stock');
        }

        if ($product->stock < $quantity) {
            throw new \Exception('Insufficient stock available');
        }

        $cartItem->update([
            'quantity' => $quantity,
            'price' => $product->finalPrice(), // Update price
        ]);

        return $cartItem->fresh(['product']);
    }

    /**
     * Remove item from cart.
     */
    public function removeItem(User $user, int $cartItemId): bool
    {
        $cartItem = CartItem::where('user_id', $user->id)
            ->findOrFail($cartItemId);

        return $cartItem->delete();
    }

    /**
     * Clear user's cart.
     */
    public function clearCart(User $user): int
    {
        return CartItem::where('user_id', $user->id)->delete();
    }

    /**
     * Get user's cart with totals.
     */
    public function getCart(User $user): array
    {
        $items = CartItem::where('user_id', $user->id)
            ->with(['product.category', 'product.brand'])
            ->get();

        $subtotal = $items->sum(fn ($item) => $item->subtotal());
        $itemCount = $items->sum('quantity');

        return [
            'items' => $items,
            'subtotal' => $subtotal,
            'item_count' => $itemCount,
        ];
    }
}
