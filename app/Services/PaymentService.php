<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PaymentService
{
    /**
     * Process payment for an order.
     */
    public function processPayment(Order $order, string $paymentMethod, array $paymentData = []): Payment
    {
        if ($order->payment_status === 'paid') {
            throw new \Exception('Order is already paid');
        }

        return DB::transaction(function () use ($order, $paymentMethod, $paymentData) {
            // In a real application, you would integrate with payment gateways here
            // For now, we'll simulate payment processing

            $payment = Payment::create([
                'order_id' => $order->id,
                'transaction_id' => 'TXN-'.strtoupper(uniqid()),
                'payment_method' => $paymentMethod,
                'amount' => $order->total,
                'currency' => 'USD',
                'status' => 'completed', // In real app, this would come from gateway
                'gateway_response' => $paymentData,
                'paid_at' => now(),
            ]);

            // Update order payment status
            $order->update([
                'payment_status' => 'paid',
                'payment_method' => $paymentMethod,
            ]);

            return $payment;
        });
    }

    /**
     * Process refund for a payment.
     */
    public function processRefund(Payment $payment, ?float $amount = null): Payment
    {
        if ($payment->status !== 'completed') {
            throw new \Exception('Only completed payments can be refunded');
        }

        $refundAmount = $amount ?? $payment->amount;

        // In real application, process refund through payment gateway
        // For now, just update status

        $payment->update([
            'status' => 'refunded',
        ]);

        $payment->order->update([
            'payment_status' => 'refunded',
        ]);

        return $payment->fresh();
    }
}
