<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentWebhookTest extends TestCase
{
    use RefreshDatabase;

    public function test_webhook_with_invalid_signature_returns_401(): void
    {
        config(['payment.webhook_secrets.test_provider' => 'correct-secret']);

        $body = ['type' => 'payment.success', 'id' => 'evt_001'];
        $wrongSig = hash_hmac('sha256', json_encode($body), 'wrong-secret');

        $this->postJson('/v1/webhooks/payments/test_provider', $body, [
            'X-Webhook-Signature' => $wrongSig,
        ])->assertStatus(401)
            ->assertJson(['success' => false, 'message' => 'Invalid signature']);
    }

    public function test_webhook_with_unknown_provider_returns_401(): void
    {
        // No secret configured for 'unknown_provider'
        $body = ['type' => 'payment.success'];
        $sig = hash_hmac('sha256', json_encode($body), 'some-secret');

        $this->postJson('/v1/webhooks/payments/unknown_provider', $body, [
            'X-Webhook-Signature' => $sig,
        ])->assertStatus(401)
            ->assertJson(['success' => false, 'message' => 'Invalid signature']);
    }

    public function test_webhook_with_valid_signature_returns_ok(): void
    {
        $secret = 'shh';
        config(['payment.webhook_secrets.test_provider' => $secret]);

        $body = ['type' => 'payment.success', 'id' => 'evt_002'];
        $rawBody = json_encode($body);
        $sig = hash_hmac('sha256', $rawBody, $secret);

        $this->postJson('/v1/webhooks/payments/test_provider', $body, [
            'X-Webhook-Signature' => $sig,
        ])->assertStatus(200)
            ->assertJson(['success' => true]);
    }
}
