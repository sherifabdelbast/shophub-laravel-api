<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_filter_by_category_slug_returns_only_that_category(): void
    {
        $catA = Category::factory()->create(['slug' => 'cat-a']);
        $catB = Category::factory()->create(['slug' => 'cat-b']);
        $brand = Brand::factory()->create();

        Product::factory()->count(2)->create(['category_id' => $catA->id, 'brand_id' => $brand->id, 'status' => 'active']);
        Product::factory()->count(3)->create(['category_id' => $catB->id, 'brand_id' => $brand->id, 'status' => 'active']);

        $response = $this->getJson('/v1/products?category=cat-a');

        $response->assertStatus(200);
        $this->assertSame(2, $response->json('meta.total'));
    }

    public function test_filter_by_material_exact_match(): void
    {
        $cat = Category::factory()->create();
        $brand = Brand::factory()->create();

        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'material' => 'Concrete', 'status' => 'active']);
        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'material' => 'Steel', 'status' => 'active']);

        $response = $this->getJson('/v1/products?material=Concrete');

        $response->assertStatus(200);
        $this->assertSame(1, $response->json('meta.total'));
    }

    public function test_filter_in_stock_only(): void
    {
        $cat = Category::factory()->create();
        $brand = Brand::factory()->create();

        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'stock_status' => 'in_stock', 'status' => 'active']);
        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'stock_status' => 'out_of_stock', 'status' => 'active']);

        $response = $this->getJson('/v1/products?inStock=true');

        $response->assertStatus(200);
        $this->assertSame(1, $response->json('meta.total'));
    }

    public function test_sort_new_orders_by_released_at_desc(): void
    {
        $cat = Category::factory()->create();
        $brand = Brand::factory()->create();

        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'released_at' => '2026-01-01', 'status' => 'active', 'slug' => 'older']);
        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'released_at' => '2026-05-01', 'status' => 'active', 'slug' => 'newer']);

        $response = $this->getJson('/v1/products?sort=new');

        $response->assertStatus(200)
            ->assertJsonPath('data.0.slug', 'newer')
            ->assertJsonPath('data.1.slug', 'older');
    }

    public function test_sort_price_asc(): void
    {
        $cat = Category::factory()->create();
        $brand = Brand::factory()->create();

        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'price' => 100, 'status' => 'active', 'slug' => 'cheap']);
        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'price' => 500, 'status' => 'active', 'slug' => 'pricey']);

        $response = $this->getJson('/v1/products?sort=price-asc');

        $response->assertStatus(200)
            ->assertJsonPath('data.0.slug', 'cheap')
            ->assertJsonPath('data.1.slug', 'pricey');
    }

    public function test_nested_category_products_route(): void
    {
        $cat = Category::factory()->create(['slug' => 'living-room']);
        $brand = Brand::factory()->create();

        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'status' => 'active']);
        $other = Category::factory()->create(['slug' => 'workspace']);
        Product::factory()->create(['category_id' => $other->id, 'brand_id' => $brand->id, 'status' => 'active']);

        $response = $this->getJson('/v1/categories/living-room/products');

        $response->assertStatus(200);
        $this->assertSame(1, $response->json('meta.total'));
    }

    public function test_nested_brand_products_route(): void
    {
        $cat = Category::factory()->create();
        $brand = Brand::factory()->create(['slug' => 'atelier-vauban']);

        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'status' => 'active']);
        $other = Brand::factory()->create(['slug' => 'forge-nord']);
        Product::factory()->create(['category_id' => $cat->id, 'brand_id' => $other->id, 'status' => 'active']);

        $response = $this->getJson('/v1/brands/atelier-vauban/products');

        $response->assertStatus(200);
        $this->assertSame(1, $response->json('meta.total'));
    }

    public function test_per_page_camel_case_param_works(): void
    {
        $cat = Category::factory()->create();
        $brand = Brand::factory()->create();

        Product::factory()->count(8)->create(['category_id' => $cat->id, 'brand_id' => $brand->id, 'status' => 'active']);

        $response = $this->getJson('/v1/products?perPage=3');

        $response->assertStatus(200);
        $this->assertCount(3, $response->json('data'));
        $this->assertSame(3, $response->json('meta.perPage'));
    }
}
