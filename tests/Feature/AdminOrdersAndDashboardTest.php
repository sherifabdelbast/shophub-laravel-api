<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminOrdersAndDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_list_all_orders(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Order::factory()->count(3)->create();

        $response = $this->actingAs($admin)->getJson('/v1/admin/orders');

        $response->assertStatus(200)
            ->assertJsonStructure(['success', 'data', 'meta' => ['currentPage', 'lastPage', 'perPage', 'total']]);
        $this->assertCount(3, $response->json('data'));
    }

    public function test_non_admin_cannot_list_all_orders(): void
    {
        $customer = User::factory()->create(['role' => 'customer']);

        $this->actingAs($customer)->getJson('/v1/admin/orders')->assertStatus(403);
    }

    public function test_admin_can_show_any_order(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $order = Order::factory()->create();

        $response = $this->actingAs($admin)->getJson("/v1/admin/orders/{$order->id}");

        $response->assertStatus(200)
            ->assertJsonPath('data.id', $order->id)
            ->assertJsonPath('data.orderNumber', $order->order_number);
    }

    public function test_dashboard_returns_expected_shape(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Order::factory()->count(2)->create(['payment_status' => 'paid', 'total' => 100]);
        Product::factory()->count(3)->create(['sold_count' => 10]);

        $response = $this->actingAs($admin)->getJson('/v1/admin/dashboard');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data' => [
                    'revenue' => ['total', 'today', 'thisMonth', 'deltaPct'],
                    'ordersCount' => ['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'total', 'deltaPct'],
                    'customersCount' => ['total', 'deltaPct'],
                    'topProducts',
                    'recentOrders',
                ],
            ]);
    }

    public function test_products_featured_filter_returns_only_featured(): void
    {
        Product::factory()->count(2)->create(['is_featured' => true, 'status' => 'active']);
        Product::factory()->count(3)->create(['is_featured' => false, 'status' => 'active']);

        $response = $this->getJson('/v1/products?featured=1');

        $response->assertStatus(200);
        $data = $response->json('data');
        $this->assertCount(2, $data);
        foreach ($data as $product) {
            $this->assertTrue($product['isFeatured']);
        }
    }

    public function test_auth_me_returns_current_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson('/v1/auth/me');

        $response->assertStatus(200)
            ->assertJsonPath('user.id', $user->id)
            ->assertJsonPath('user.email', $user->email);
    }
}
