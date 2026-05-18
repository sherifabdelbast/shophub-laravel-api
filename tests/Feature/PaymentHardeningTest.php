<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentHardeningTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_order_cannot_be_paid_twice(): void
    {
        config(['payment.fake_gateway' => true]);
        $order = Order::factory()->create(['payment_status' => 'unpaid']);
        $service = app(PaymentService::class);

        $service->processPayment($order, 'credit_card');

        try {
            $service->processPayment($order->fresh(), 'credit_card');
            $this->fail('Expected a DomainException for the second payment.');
        } catch (\DomainException $e) {
            $this->assertStringContainsString('already paid', $e->getMessage());
        }

        $this->assertDatabaseCount('payments', 1);
    }

    public function test_payment_data_rejects_nested_arrays(): void
    {
        config(['payment.fake_gateway' => true]);
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'payment_status' => 'unpaid']);

        $response = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $order->id,
            'payment_method' => 'credit_card',
            'payment_data' => ['card' => ['nested' => 'value']],
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors('payment_data.card');
    }

    public function test_payment_data_rejects_too_many_keys(): void
    {
        config(['payment.fake_gateway' => true]);
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'payment_status' => 'unpaid']);

        $response = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $order->id,
            'payment_method' => 'credit_card',
            'payment_data' => array_fill_keys(
                array_map(fn ($i) => "k{$i}", range(1, 21)),
                'v'
            ),
        ]);

        $response->assertStatus(422)->assertJsonValidationErrors('payment_data');
    }

    public function test_valid_flat_payment_data_is_accepted(): void
    {
        config(['payment.fake_gateway' => true]);
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'payment_status' => 'unpaid']);

        $response = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $order->id,
            'payment_method' => 'credit_card',
            'payment_data' => ['token' => 'tok_abc123'],
        ]);

        $response->assertStatus(201);
    }
}
