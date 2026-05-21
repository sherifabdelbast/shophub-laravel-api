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
    }

    /**
     * Add product to wishlist.
     *
     * @group Wishlist
     */
    public function store(StoreWishlistRequest $request): JsonResponse
    {
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
    }

    /**
     * Remove product from wishlist.
     *
     * @group Wishlist
     */
    public function destroy(Request $request, \App\Models\Wishlist $wishlist): JsonResponse
    {
        $this->authorize('delete', $wishlist);

        $wishlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from wishlist successfully',
        ]);
    }

    /**
     * Check if product is in wishlist.
     *
     * @group Wishlist
     */
    public function check(Request $request, int $product): JsonResponse
    {
        $exists = Wishlist::where('user_id', $request->user()->id)
            ->where('product_id', $product)
            ->exists();

        return response()->json([
            'success' => true,
            'data' => [
                'is_in_wishlist' => $exists,
            ],
        ]);
    }
}
