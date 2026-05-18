<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Services\PaymentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentGatewayConfigTest extends TestCase
{
    use RefreshDatabase;

    public function test_process_payment_throws_when_fake_gateway_is_disabled(): void
    {
        config(['payment.fake_gateway' => false]);
        $order = Order::factory()->create(['payment_status' => 'unpaid']);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Payment gateway not configured');

        app(PaymentService::class)->processPayment($order, 'credit_card');
    }

    public function test_process_payment_succeeds_when_fake_gateway_is_enabled(): void
    {
        config(['payment.fake_gateway' => true]);
        $order = Order::factory()->create(['payment_status' => 'unpaid']);

        $payment = app(PaymentService::class)->processPayment($order, 'credit_card');

        $this->assertSame('completed', $payment->status);
        $this->assertSame('paid', $order->fresh()->payment_status);
    }
}
