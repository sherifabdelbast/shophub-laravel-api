<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\StorePaymentRequest;
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
        $order = Order::findOrFail($request->order_id);
        $this->authorize('pay', $order);

        try {
            $payment = $this->paymentService->processPayment(
                $order,
                $request->payment_method,
                $request->payment_data ?? []
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
            'data' => [
                'id' => $payment->id,
                'transaction_id' => $payment->transaction_id,
                'status' => $payment->status,
                'amount' => $payment->amount,
                'currency' => $payment->currency,
                'paid_at' => $payment->paid_at,
            ],
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
            'data' => [
                'id' => $payment->id,
                'transaction_id' => $payment->transaction_id,
                'payment_method' => $payment->payment_method,
                'amount' => $payment->amount,
                'currency' => $payment->currency,
                'status' => $payment->status,
                'paid_at' => $payment->paid_at,
                // Hidden: gateway_response
            ],
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
            'data' => $payments->map(fn ($payment) => [
                'id' => $payment->id,
                'transaction_id' => $payment->transaction_id,
                'payment_method' => $payment->payment_method,
                'amount' => $payment->amount,
                'status' => $payment->status,
                'paid_at' => $payment->paid_at,
            ]),
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
                'data' => [
                    'id' => $refundedPayment->id,
                    'status' => $refundedPayment->status,
                ],
            ]);
        } catch (\DomainException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
