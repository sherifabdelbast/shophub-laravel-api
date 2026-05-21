<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingMethod\StoreShippingMethodRequest;
use App\Http\Requests\ShippingMethod\UpdateShippingMethodRequest;
use App\Models\ShippingMethod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    /**
     * Get active shipping methods (Public).
     *
     * @group Shipping Methods
     */
    public function index(Request $request): JsonResponse
    {
        $methods = ShippingMethod::active()->get();

        return response()->json([
            'success' => true,
            'data' => $methods->map(fn ($method) => [
                'id' => $method->id,
                'name' => $method->name,
                'description' => $method->description,
                'cost' => $method->cost,
                'estimated_delivery' => $method->estimated_delivery,
            ]),
        ]);
    }

    /**
     * Get all shipping methods (Admin only).
     *
     * @group Admin - Shipping Methods
     */
    public function adminIndex(Request $request): JsonResponse
    {
        $methods = ShippingMethod::query()
            ->when($request->filled('is_active'), function ($query) use ($request) {
                $query->where('is_active', $request->boolean('is_active'));
            })
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(min((int) $request->get('per_page', 15), 100));

        return response()->json([
            'success' => true,
            'data' => $methods->items(),
            'meta' => [
                'currentPage' => $methods->currentPage(),
                'lastPage' => $methods->lastPage(),
                'perPage' => $methods->perPage(),
                'total' => $methods->total(),
            ],
        ]);
    }

    /**
     * Create shipping method (Admin only).
     *
     * @group Admin - Shipping Methods
     */
    public function store(StoreShippingMethodRequest $request): JsonResponse
    {
        $method = ShippingMethod::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Shipping method created successfully',
            'data' => $method,
        ], 201);
    }

    /**
     * Get shipping method details (Admin only).
     *
     * @group Admin - Shipping Methods
     */
    public function show(ShippingMethod $shippingMethod): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $shippingMethod,
        ]);
    }

    /**
     * Update shipping method (Admin only).
     *
     * @group Admin - Shipping Methods
     */
    public function update(UpdateShippingMethodRequest $request, ShippingMethod $shippingMethod): JsonResponse
    {
        $shippingMethod->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Shipping method updated successfully',
            'data' => $shippingMethod->fresh(),
        ]);
    }

    /**
     * Delete shipping method (Admin only).
     *
     * @group Admin - Shipping Methods
     */
    public function destroy(ShippingMethod $shippingMethod): JsonResponse
    {
        // Check if method is used in orders
        if ($shippingMethod->orders()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete shipping method. It has associated orders.',
            ], 422);
        }

        $shippingMethod->delete();

        return response()->json([
            'success' => true,
            'message' => 'Shipping method deleted successfully',
        ]);
    }
}
