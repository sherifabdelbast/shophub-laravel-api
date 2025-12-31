<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coupon\StoreCouponRequest;
use App\Http\Requests\Coupon\UpdateCouponRequest;
use App\Http\Requests\Coupon\ValidateCouponRequest;
use App\Models\Coupon;
use App\Services\CouponService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct(private CouponService $couponService) {}

    /**
     * Validate coupon code.
     *
     * @group Coupons
     */
    public function validateCoupon(ValidateCouponRequest $request): JsonResponse
    {
        try {
            $result = $this->couponService->validateCoupon(
                $request->code,
                $request->user()->id,
                $request->subtotal
            );

            if (! $result['valid']) {
                return response()->json([
                    'success' => false,
                    'message' => $result['message'],
                ], 400);
            }

            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'data' => [
                    'code' => $result['coupon']->code,
                    'discount' => $result['discount'],
                    'type' => $result['coupon']->type,
                    'value' => $result['coupon']->value,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to validate coupon',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get all coupons (Admin only).
     *
     * @group Admin - Coupons
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $coupons = Coupon::query()
                ->when($request->filled('search'), function ($query) use ($request) {
                    $query->where('code', 'like', "%{$request->search}%")
                        ->orWhere('description', 'like', "%{$request->search}%");
                })
                ->when($request->filled('is_active'), function ($query) use ($request) {
                    $query->where('is_active', $request->boolean('is_active'));
                })
                ->latest()
                ->paginate($request->get('per_page', 15));

            return response()->json([
                'success' => true,
                'data' => $coupons->items(),
                'meta' => [
                    'current_page' => $coupons->currentPage(),
                    'last_page' => $coupons->lastPage(),
                    'per_page' => $coupons->perPage(),
                    'total' => $coupons->total(),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve coupons',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Create coupon (Admin only).
     *
     * @group Admin - Coupons
     */
    public function store(StoreCouponRequest $request): JsonResponse
    {
        try {
            $coupon = Coupon::create($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Coupon created successfully',
                'data' => $coupon,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create coupon',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get coupon details (Admin only).
     *
     * @group Admin - Coupons
     */
    public function show(Coupon $coupon): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $coupon->load('usage'),
        ]);
    }

    /**
     * Update coupon (Admin only).
     *
     * @group Admin - Coupons
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon): JsonResponse
    {
        try {
            $coupon->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Coupon updated successfully',
                'data' => $coupon->fresh(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update coupon',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete coupon (Admin only).
     *
     * @group Admin - Coupons
     */
    public function destroy(Coupon $coupon): JsonResponse
    {
        try {
            $coupon->delete();

            return response()->json([
                'success' => true,
                'message' => 'Coupon deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete coupon',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
