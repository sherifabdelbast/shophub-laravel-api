<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\StorePaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Order;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(private PaymentService $paymentService) {}

    /**
     * Process payment for an order.
     *
     * @group Payments
     */
    public function store(StorePaymentRequest $request): JsonResponse
    {
        $idempotencyKey = $request->header('Idempotency-Key');

        if ($idempotencyKey !== null && ! preg_match('/^[A-Za-z0-9_-]{1,128}$/', $idempotencyKey)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Idempotency-Key header',
            ], 400);
        }

        $order = Order::findOrFail($request->order_id);
        $this->authorize('pay', $order);

        try {
            $payment = $this->paymentService->processPayment(
                $order,
                $request->payment_method,
                $request->payment_data ?? [],
                $idempotencyKey,
            );
        } catch (\DomainException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Payment processed successfully',
            'data' => new PaymentResource($payment),
        ], 201);
    }

    /**
     * Get payment details.
     *
     * @group Payments
     */
    public function show(Request $request, Payment $payment): JsonResponse
    {
        $this->authorize('view', $payment);

        return response()->json([
            'success' => true,
            'data' => new PaymentResource($payment),
        ]);
    }

    /**
     * Get order payments.
     *
     * @group Payments
     */
    public function getOrderPayments(Request $request, Order $order): JsonResponse
    {
        $this->authorize('viewPayments', $order);

        $payments = $order->payments()->get();

        return response()->json([
            'success' => true,
            'data' => PaymentResource::collection($payments),
        ]);
    }

    /**
     * Process refund (Admin only - will be in admin routes).
     *
     * @group Admin - Payments
     */
    public function refund(Request $request, Payment $payment): JsonResponse
    {
        try {
            $request->validate([
                'amount' => ['nullable', 'numeric', 'min:0'],
            ]);

            $refundedPayment = $this->paymentService->processRefund(
                $payment,
                $request->filled('amount')
                    ? number_format((float) $request->amount, 2, '.', '')
                    : null
            );

            return response()->json([
                'success' => true,
                'message' => 'Refund processed successfully',
                'data' => new PaymentResource($refundedPayment),
            ]);
        } catch (\DomainException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
