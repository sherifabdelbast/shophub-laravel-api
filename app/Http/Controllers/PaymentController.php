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
     */
    public function store(StorePaymentRequest $request): JsonResponse
    {
        try {
            $order = Order::findOrFail($request->order_id);

            // Ensure user owns this order
            if ($order->user_id !== $request->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }

            $payment = $this->paymentService->processPayment(
                $order,
                $request->payment_method,
                $request->payment_data ?? []
            );

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
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Get payment details.
     */
    public function show(Request $request, Payment $payment): JsonResponse
    {
        try {
            // Ensure user owns the order
            if ($payment->order->user_id !== $request->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }

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
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve payment',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get order payments.
     */
    public function getOrderPayments(Request $request, Order $order): JsonResponse
    {
        try {
            // Ensure user owns this order
            if ($order->user_id !== $request->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 403);
            }

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
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve payments',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Process refund (Admin only - will be in admin routes).
     */
    public function refund(Request $request, Payment $payment): JsonResponse
    {
        try {
            $request->validate([
                'amount' => ['nullable', 'numeric', 'min:0'],
            ]);

            $refundedPayment = $this->paymentService->processRefund(
                $payment,
                $request->amount
            );

            return response()->json([
                'success' => true,
                'message' => 'Refund processed successfully',
                'data' => [
                    'id' => $refundedPayment->id,
                    'status' => $refundedPayment->status,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
