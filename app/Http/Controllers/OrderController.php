<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderService $orderService) {}

    /**
     * Get user's orders.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $orders = Order::where('user_id', $request->user()->id)
                ->with(['items', 'shippingMethod'])
                ->latest()
                ->paginate($request->get('per_page', 15));

            return response()->json([
                'success' => true,
                'data' => OrderResource::collection($orders->items()),
                'meta' => [
                    'current_page' => $orders->currentPage(),
                    'last_page' => $orders->lastPage(),
                    'per_page' => $orders->perPage(),
                    'total' => $orders->total(),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve orders',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Create new order from cart.
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        try {
            $order = $this->orderService->createOrderFromCart(
                $request->user(),
                $request->validated(),
                $request->shipping_method_id,
                $request->coupon_code,
                $request->customer_notes
            );

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
                'data' => new OrderResource($order),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Get order details.
     */
    public function show(Request $request, Order $order): JsonResponse
    {
        try {
            // Ensure user owns this order
            if ($order->user_id !== $request->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }

            $order->load(['items.product', 'shippingMethod', 'coupon', 'payments']);

            return response()->json([
                'success' => true,
                'data' => new OrderResource($order),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve order',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Cancel order.
     */
    public function cancel(Request $request, Order $order): JsonResponse
    {
        try {
            $request->validate([
                'reason' => ['nullable', 'string', 'max:500'],
            ]);

            $order = $this->orderService->cancelOrder(
                $order,
                $request->user(),
                $request->reason
            );

            return response()->json([
                'success' => true,
                'message' => 'Order cancelled successfully',
                'data' => new OrderResource($order->load(['items', 'shippingMethod'])),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
