<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingMethod\StoreShippingMethodRequest;
use App\Http\Requests\ShippingMethod\UpdateShippingMethodRequest;
use App\Http\Resources\ShippingMethodResource;
use App\Models\ShippingMethod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        try {
            $methods = ShippingMethod::active()->get();

            return response()->json([
                'success' => true,
                'data' => ShippingMethodResource::collection($methods)->resolve(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve shipping methods',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function adminIndex(Request $request): JsonResponse
    {
        try {
            $methods = ShippingMethod::query()
                ->when($request->filled('is_active'), function ($query) use ($request) {
                    $query->where('is_active', $request->boolean('is_active'));
                })
                ->orderBy('sort_order')
                ->orderBy('name')
                ->paginate($request->get('per_page', 15));

            return response()->json([
                'success' => true,
                'data' => ShippingMethodResource::collection($methods)->resolve(),
                'meta' => [
                    'currentPage' => $methods->currentPage(),
                    'lastPage' => $methods->lastPage(),
                    'perPage' => $methods->perPage(),
                    'total' => $methods->total(),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve shipping methods',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(StoreShippingMethodRequest $request): JsonResponse
    {
        try {
            $method = ShippingMethod::create($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Shipping method created successfully',
                'data' => new ShippingMethodResource($method),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create shipping method',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(ShippingMethod $shippingMethod): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => new ShippingMethodResource($shippingMethod),
        ]);
    }

    public function update(UpdateShippingMethodRequest $request, ShippingMethod $shippingMethod): JsonResponse
    {
        try {
            $shippingMethod->update($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Shipping method updated successfully',
                'data' => new ShippingMethodResource($shippingMethod->fresh()),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update shipping method',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(ShippingMethod $shippingMethod): JsonResponse
    {
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete shipping method',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
