<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandSortingTest extends TestCase
{
    use RefreshDatabase;

    public function test_malicious_sort_field_falls_back_to_default_without_error(): void
    {
        Brand::factory()->count(3)->create();

        $response = $this->getJson('/v1/brands?sort_field=password)+--&sort_direction=evil');

        $response->assertStatus(200)
            ->assertJson(['success' => true]);
    }

    public function test_whitelisted_sort_field_orders_results(): void
    {
        Brand::factory()->create(['name' => 'Zeta']);
        Brand::factory()->create(['name' => 'Alpha']);

        $response = $this->getJson('/v1/brands?sort_field=name&sort_direction=asc');

        $response->assertStatus(200);
        $names = array_column($response->json('data.data'), 'name');
        $this->assertSame('Alpha', $names[0]);
    }
}
