<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\StoreReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Get product reviews.
     */
    public function index(Request $request, Product $product): JsonResponse
    {
        try {
            $reviews = Review::where('product_id', $product->id)
                ->where('status', 'approved')
                ->with(['user' => function ($query) {
                    $query->select('id', 'first_name', 'last_name');
                }])
                ->latest()
                ->paginate($request->get('per_page', 10));

            return response()->json([
                'success' => true,
                'data' => $reviews->items(),
                'meta' => [
                    'current_page' => $reviews->currentPage(),
                    'last_page' => $reviews->lastPage(),
                    'per_page' => $reviews->perPage(),
                    'total' => $reviews->total(),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve reviews',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Create a review.
     */
    public function store(StoreReviewRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['user_id'] = $request->user()->id;
            $data['status'] = 'pending'; // Requires approval

            // Check if user has purchased this product (for verified purchase)
            if ($request->order_id) {
                $order = \App\Models\Order::where('id', $request->order_id)
                    ->where('user_id', $request->user()->id)
                    ->where('payment_status', 'paid')
                    ->first();

                if ($order && $order->items()->where('product_id', $request->product_id)->exists()) {
                    $data['verified_purchase'] = true;
                }
            }

            // Handle image uploads
            if ($request->hasFile('images')) {
                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('reviews', 'public');
                    $imagePaths[] = Storage::url($path);
                }
                $data['images'] = $imagePaths;
            }

            $review = Review::create($data);

            // Update product rating (average)
            $this->updateProductRating($request->product_id);

            return response()->json([
                'success' => true,
                'message' => 'Review submitted successfully. It will be published after approval.',
                'data' => $review->load('user:id,first_name,last_name'),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update review.
     */
    public function update(UpdateReviewRequest $request, Review $review): JsonResponse
    {
        try {
            // Ensure user owns this review
            if ($review->user_id !== $request->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }

            $data = $request->validated();

            // Handle image uploads
            if ($request->hasFile('images')) {
                // Delete old images
                if ($review->images) {
                    foreach ($review->images as $imagePath) {
                        $path = str_replace('/storage/', '', $imagePath);
                        Storage::disk('public')->delete($path);
                    }
                }

                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('reviews', 'public');
                    $imagePaths[] = Storage::url($path);
                }
                $data['images'] = $imagePaths;
            }

            $review->update($data);

            // Update product rating
            $this->updateProductRating($review->product_id);

            return response()->json([
                'success' => true,
                'message' => 'Review updated successfully',
                'data' => $review->fresh()->load('user:id,first_name,last_name'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete review.
     */
    public function destroy(Request $request, Review $review): JsonResponse
    {
        try {
            // Ensure user owns this review
            if ($review->user_id !== $request->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }

            $productId = $review->product_id;
            $review->delete();

            // Update product rating
            $this->updateProductRating($productId);

            return response()->json([
                'success' => true,
                'message' => 'Review deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Mark review as helpful.
     */
    public function markHelpful(Request $request, Review $review): JsonResponse
    {
        try {
            $review->increment('helpful_count');

            return response()->json([
                'success' => true,
                'message' => 'Review marked as helpful',
                'data' => [
                    'helpful_count' => $review->fresh()->helpful_count,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to mark review as helpful',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all reviews (Admin only).
     */
    public function adminIndex(Request $request): JsonResponse
    {
        try {
            $reviews = Review::query()
                ->with(['user:id,first_name,last_name', 'product:id,name'])
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('product_id'), function ($query) use ($request) {
                    $query->where('product_id', $request->product_id);
                })
                ->latest()
                ->paginate($request->get('per_page', 15));

            return response()->json([
                'success' => true,
                'data' => $reviews->items(),
                'meta' => [
                    'current_page' => $reviews->currentPage(),
                    'last_page' => $reviews->lastPage(),
                    'per_page' => $reviews->perPage(),
                    'total' => $reviews->total(),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve reviews',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Approve review (Admin only).
     */
    public function approve(Request $request, Review $review): JsonResponse
    {
        try {
            $review->update(['status' => 'approved']);
            $this->updateProductRating($review->product_id);

            return response()->json([
                'success' => true,
                'message' => 'Review approved successfully',
                'data' => $review->fresh(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to approve review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Reject review (Admin only).
     */
    public function reject(Request $request, Review $review): JsonResponse
    {
        try {
            $review->update(['status' => 'rejected']);
            $this->updateProductRating($review->product_id);

            return response()->json([
                'success' => true,
                'message' => 'Review rejected successfully',
                'data' => $review->fresh(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reject review',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update product rating based on approved reviews.
     */
    private function updateProductRating(int $productId): void
    {
        $approvedReviews = Review::where('product_id', $productId)
            ->where('status', 'approved')
            ->get();

        if ($approvedReviews->isEmpty()) {
            return;
        }

        $averageRating = $approvedReviews->avg('rating');
        $reviewsCount = $approvedReviews->count();

        Product::where('id', $productId)->update([
            'rating' => round($averageRating, 2),
            'reviews_count' => $reviewsCount,
        ]);
    }
}
