<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coupon\StoreCouponRequest;
use App\Http\Requests\Coupon\UpdateCouponRequest;
use App\Http\Requests\Coupon\ValidateCouponRequest;
use App\Http\Resources\CouponResource;
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
        $result = $this->couponService->validateCoupon(
            $request->code,
            $request->user()->id,
            number_format((float) $request->subtotal, 2, '.', '')
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
    }

    /**
     * Get all coupons (Admin only).
     *
     * @group Admin - Coupons
     */
    public function index(Request $request): JsonResponse
    {
        $coupons = Coupon::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('code', 'like', "%{$request->search}%")
                    ->orWhere('description', 'like', "%{$request->search}%");
            })
            ->when($request->filled('is_active'), function ($query) use ($request) {
                $query->where('is_active', $request->boolean('is_active'));
            })
            ->latest()
            ->paginate(min((int) $request->get('per_page', 15), 100));

        return response()->json([
            'success' => true,
            'data' => CouponResource::collection($coupons->items()),
            'meta' => [
                'currentPage' => $coupons->currentPage(),
                'lastPage' => $coupons->lastPage(),
                'perPage' => $coupons->perPage(),
                'total' => $coupons->total(),
            ],
        ]);
    }

    /**
     * Create coupon (Admin only).
     *
     * @group Admin - Coupons
     */
    public function store(StoreCouponRequest $request): JsonResponse
    {
        $coupon = Coupon::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Coupon created successfully',
            'data' => new CouponResource($coupon),
        ], 201);
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
            'data' => new CouponResource($coupon),
        ]);
    }

    /**
     * Update coupon (Admin only).
     *
     * @group Admin - Coupons
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon): JsonResponse
    {
        $coupon->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Coupon updated successfully',
            'data' => new CouponResource($coupon->fresh()),
        ]);
    }

    /**
     * Delete coupon (Admin only).
     *
     * @group Admin - Coupons
     */
    public function destroy(Coupon $coupon): JsonResponse
    {
        $coupon->delete();

        return response()->json([
            'success' => true,
            'message' => 'Coupon deleted successfully',
        ]);
    }
}
