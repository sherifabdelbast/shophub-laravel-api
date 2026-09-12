<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DomainExceptionResponseTest extends TestCase
{
    use RefreshDatabase;

    public function test_domain_exception_returns_400_with_safe_message_and_no_leak(): void
    {
        $user = User::factory()->create();
        $order = Order::factory()->create([
            'user_id' => $user->id,
            'status' => 'shipped',
        ]);

        $response = $this->actingAs($user)
            ->patchJson("/v1/orders/{$order->id}/cancel");

        $response->assertStatus(400)
            ->assertJson([
                'success' => false,
                'message' => 'This order cannot be cancelled',
            ]);

        // No raw exception detail leaked into the response body.
        $this->assertArrayNotHasKey('error', $response->json());
        $this->assertArrayNotHasKey('trace', $response->json());
    }
}
