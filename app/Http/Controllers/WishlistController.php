<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wishlist\StoreWishlistRequest;
use App\Http\Resources\ProductResource;
use App\Models\Wishlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Get user's wishlist.
     *
     * @group Wishlist
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $wishlist = Wishlist::where('user_id', $request->user()->id)
                ->with(['product.category', 'product.brand', 'product.images'])
                ->latest()
                ->get();

            return response()->json([
                'success' => true,
                'data' => $wishlist->map(fn ($item) => [
                    'id' => $item->id,
                    'product' => new ProductResource($item->product),
                    'added_at' => $item->created_at,
                ]),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve wishlist',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Add product to wishlist.
     *
     * @group Wishlist
     */
    public function store(StoreWishlistRequest $request): JsonResponse
    {
        try {
            $userId = $request->user()->id;
            $productId = $request->product_id;

            // Check if already in wishlist
            $existing = Wishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existing) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product is already in your wishlist',
                ], 422);
            }

            $wishlist = Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);

            $wishlist->load(['product.category', 'product.brand']);

            return response()->json([
                'success' => true,
                'message' => 'Product added to wishlist successfully',
                'data' => [
                    'id' => $wishlist->id,
                    'product' => new ProductResource($wishlist->product),
                    'added_at' => $wishlist->created_at,
                ],
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add to wishlist',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove product from wishlist.
     *
     * @group Wishlist
     */
    public function destroy(Request $request, int $wishlist): JsonResponse
    {
        try {
            $wishlistItem = Wishlist::where('user_id', $request->user()->id)
                ->findOrFail($wishlist);

            $wishlistItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product removed from wishlist successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove from wishlist',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Check if product is in wishlist.
     *
     * @group Wishlist
     */
    public function check(Request $request, int $product): JsonResponse
    {
        try {
            $exists = Wishlist::where('user_id', $request->user()->id)
                ->where('product_id', $product)
                ->exists();

            return response()->json([
                'success' => true,
                'data' => [
                    'is_in_wishlist' => $exists,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to check wishlist',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
