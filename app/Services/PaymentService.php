<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentService
{
    /**
     * Process payment for an order.
     */
    public function processPayment(Order $order, string $paymentMethod, array $paymentData = []): Payment
    {
        if (! config('payment.fake_gateway')) {
            throw new \RuntimeException('Payment gateway not configured');
        }

        return DB::transaction(function () use ($order, $paymentMethod, $paymentData) {
            // Lock the order row so concurrent payment attempts are serialized
            // and the already-paid check cannot be raced.
            $order = Order::whereKey($order->id)->lockForUpdate()->firstOrFail();

            if ($order->payment_status === 'paid') {
                throw new \DomainException('Order is already paid');
            }

            // Fake gateway: simulated success. Enabled only via config('payment.fake_gateway').
            $payment = Payment::create([
                'order_id' => $order->id,
                'transaction_id' => 'TXN-'.strtoupper(Str::random(20)),
                'payment_method' => $paymentMethod,
                'amount' => $order->total,
                'currency' => 'USD',
                'status' => 'completed', // In real app, this would come from gateway
                'gateway_response' => $paymentData,
                'paid_at' => now(),
            ]);

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
    public function processRefund(Payment $payment, ?string $amount = null): Payment
    {
        if ($payment->status !== 'completed') {
            throw new \DomainException('Only completed payments can be refunded');
        }

        $refundAmount = $amount !== null
            ? bcadd($amount, '0', 2)
            : bcadd((string) $payment->amount, '0', 2);

        if (bccomp($refundAmount, '0', 2) <= 0) {
            throw new \DomainException('Refund amount must be greater than zero');
        }

        if (bccomp($refundAmount, (string) $payment->amount, 2) > 0) {
            throw new \DomainException('Refund amount cannot exceed the original payment amount');
        }

        return DB::transaction(function () use ($payment, $refundAmount) {
            $payment->update([
                'status' => 'refunded',
                'refunded_amount' => $refundAmount,
            ]);

            $payment->order->update([
                'payment_status' => 'refunded',
            ]);

            return $payment->fresh();
        });
    }
}
