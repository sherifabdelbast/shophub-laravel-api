<?php

namespace Tests\Feature;

use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentRefundTest extends TestCase
{
    use RefreshDatabase;

    public function test_refund_exceeding_original_amount_is_rejected(): void
    {
        $payment = Payment::factory()->create(['amount' => '100.00', 'status' => 'completed']);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('cannot exceed');

        app(PaymentService::class)->processRefund($payment, '150.00');
    }

    public function test_already_refunded_payment_cannot_be_refunded_again(): void
    {
        $payment = Payment::factory()->create(['amount' => '100.00', 'status' => 'refunded']);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only completed payments');

        app(PaymentService::class)->processRefund($payment);
    }

    public function test_full_refund_stores_amount_and_updates_statuses(): void
    {
        $payment = Payment::factory()->create(['amount' => '110.00', 'status' => 'completed']);

        $refunded = app(PaymentService::class)->processRefund($payment);

        $this->assertSame('refunded', $refunded->status);
        $this->assertSame('110.00', $refunded->refunded_amount);
        $this->assertSame('refunded', $payment->order->fresh()->payment_status);
    }

    public function test_partial_refund_stores_the_partial_amount(): void
    {
        $payment = Payment::factory()->create(['amount' => '110.00', 'status' => 'completed']);

        $refunded = app(PaymentService::class)->processRefund($payment, '40.00');

        $this->assertSame('40.00', $refunded->refunded_amount);
    }
}
