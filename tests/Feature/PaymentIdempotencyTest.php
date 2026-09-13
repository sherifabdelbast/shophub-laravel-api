<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentIdempotencyTest extends TestCase
{
    use RefreshDatabase;

    public function test_same_idempotency_key_returns_same_payment(): void
    {
        config(['payment.fake_gateway' => true]);
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'payment_status' => 'unpaid']);

        $first = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $order->id,
            'payment_method' => 'credit_card',
        ], ['Idempotency-Key' => 'key-abc-123']);

        $second = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $order->id,
            'payment_method' => 'credit_card',
        ], ['Idempotency-Key' => 'key-abc-123']);

        $first->assertStatus(201);
        $second->assertStatus(201);

        $this->assertSame(
            $first->json('data.id'),
            $second->json('data.id'),
            'Both responses should reference the same payment record'
        );

        $this->assertDatabaseCount('payments', 1);
    }

    public function test_same_idempotency_key_on_different_orders_creates_distinct_payments(): void
    {
        config(['payment.fake_gateway' => true]);
        $user = User::factory()->create();
        $orderA = Order::factory()->create(['user_id' => $user->id, 'payment_status' => 'unpaid']);
        $orderB = Order::factory()->create(['user_id' => $user->id, 'payment_status' => 'unpaid']);

        $responseA = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $orderA->id,
            'payment_method' => 'credit_card',
        ], ['Idempotency-Key' => 'shared-key-xyz']);

        $responseB = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $orderB->id,
            'payment_method' => 'credit_card',
        ], ['Idempotency-Key' => 'shared-key-xyz']);

        $responseA->assertStatus(201);
        $responseB->assertStatus(201);

        $this->assertNotSame(
            $responseA->json('data.id'),
            $responseB->json('data.id'),
            'Different orders with the same key must produce distinct payment records'
        );

        $this->assertDatabaseCount('payments', 2);
    }

    public function test_missing_idempotency_key_works_as_before(): void
    {
        config(['payment.fake_gateway' => true]);
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'payment_status' => 'unpaid']);

        $response = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $order->id,
            'payment_method' => 'credit_card',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseCount('payments', 1);
        $this->assertNull(Payment::first()->idempotency_key);
    }

    public function test_malformed_idempotency_key_is_rejected(): void
    {
        config(['payment.fake_gateway' => true]);
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user->id, 'payment_status' => 'unpaid']);

        $response = $this->actingAs($user)->postJson('/v1/payments', [
            'order_id' => $order->id,
            'payment_method' => 'credit_card',
        ], ['Idempotency-Key' => 'not!valid!']);

        $response->assertStatus(400)
            ->assertJson(['success' => false, 'message' => 'Invalid Idempotency-Key header']);

        $this->assertDatabaseCount('payments', 0);
    }
}
