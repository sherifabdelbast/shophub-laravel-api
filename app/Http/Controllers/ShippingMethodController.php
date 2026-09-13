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
        $methods = ShippingMethod::active()->get();

<<<<<<< HEAD
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
=======
        return response()->json([
            'success' => true,
            'data' => ShippingMethodResource::collection($methods),
        ]);
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
    }

    public function adminIndex(Request $request): JsonResponse
    {
        $methods = ShippingMethod::query()
            ->when($request->filled('is_active'), function ($query) use ($request) {
                $query->where('is_active', $request->boolean('is_active'));
            })
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(min((int) $request->get('per_page', 15), 100));

<<<<<<< HEAD
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
=======
        return response()->json([
            'success' => true,
            'data' => ShippingMethodResource::collection($methods->items()),
            'meta' => [
                'currentPage' => $methods->currentPage(),
                'lastPage' => $methods->lastPage(),
                'perPage' => $methods->perPage(),
                'total' => $methods->total(),
            ],
        ]);
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
    }

    public function store(StoreShippingMethodRequest $request): JsonResponse
    {
        $method = ShippingMethod::create($request->validated());

<<<<<<< HEAD
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
=======
        return response()->json([
            'success' => true,
            'message' => 'Shipping method created successfully',
            'data' => new ShippingMethodResource($method),
        ], 201);
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
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
        $shippingMethod->update($request->validated());

<<<<<<< HEAD
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
=======
        return response()->json([
            'success' => true,
            'message' => 'Shipping method updated successfully',
            'data' => new ShippingMethodResource($shippingMethod->fresh()),
        ]);
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
    }

    public function destroy(ShippingMethod $shippingMethod): JsonResponse
    {
<<<<<<< HEAD
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
=======
        // Check if method is used in orders
        if ($shippingMethod->orders()->count() > 0) {
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
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
