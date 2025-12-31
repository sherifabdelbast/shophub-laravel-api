<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Resources\CartItemResource;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cartService) {}

    /**
     * Get user's cart.
     *
     * @group Cart
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $cart = $this->cartService->getCart($request->user());

            return response()->json([
                'success' => true,
                'data' => [
                    'items' => CartItemResource::collection($cart['items']),
                    'subtotal' => $cart['subtotal'],
                    'item_count' => $cart['item_count'],
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve cart',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Add item to cart.
     *
     * @group Cart
     */
    public function store(StoreCartRequest $request): JsonResponse
    {
        try {
            $cartItem = $this->cartService->addItem(
                $request->user(),
                $request->product_id,
                $request->quantity
            );

            return response()->json([
                'success' => true,
                'message' => 'Item added to cart successfully',
                'data' => new CartItemResource($cartItem),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Update cart item quantity.
     *
     * @group Cart
     */
    public function update(UpdateCartRequest $request, int $cartItem): JsonResponse
    {
        try {
            $cartItem = $this->cartService->updateQuantity(
                $request->user(),
                $cartItem,
                $request->quantity
            );

            return response()->json([
                'success' => true,
                'message' => 'Cart item updated successfully',
                'data' => new CartItemResource($cartItem),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove item from cart.
     *
     * @group Cart
     */
    public function destroy(Request $request, int $cartItem): JsonResponse
    {
        try {
            $this->cartService->removeItem($request->user(), $cartItem);

            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove item from cart',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Clear entire cart.
     *
     * @group Cart
     */
    public function clear(Request $request): JsonResponse
    {
        try {
            $this->cartService->clearCart($request->user());

            return response()->json([
                'success' => true,
                'message' => 'Cart cleared successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to clear cart',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
