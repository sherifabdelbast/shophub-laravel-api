<?php

namespace Tests\Feature;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CouponValidationRouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_request_is_rejected(): void
    {
        $response = $this->postJson('/v1/coupons/validate', [
            'code' => 'SAVE10',
            'subtotal' => 100,
        ]);

        $response->assertStatus(401);
    }

    public function test_authenticated_user_can_validate_a_valid_coupon(): void
    {
        $user = User::factory()->create();
        $coupon = Coupon::factory()->percentage(10)->create(['code' => 'SAVE10']);

        $response = $this->actingAs($user)->postJson('/v1/coupons/validate', [
            'code' => $coupon->code,
            'subtotal' => 200,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => ['discount' => '20.00'],
            ]);
    }

    public function test_invalid_coupon_code_is_reported(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/v1/coupons/validate', [
            'code' => 'DOES-NOT-EXIST',
            'subtotal' => 100,
        ]);

        $response->assertStatus(400)
            ->assertJson(['success' => false]);
    }
}
