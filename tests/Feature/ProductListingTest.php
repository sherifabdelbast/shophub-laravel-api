<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductListingTest extends TestCase
{
    use RefreshDatabase;

    private function seedProducts(int $count): void
    {
        Category::factory()->create();
        Brand::factory()->create();
        Product::factory()->count($count)->create();
    }

    public function test_product_index_is_paginated(): void
    {
        $this->seedProducts(30);

        $response = $this->getJson('/v1/products');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'data',
                'meta' => ['currentPage', 'lastPage', 'perPage', 'total'],
            ])
            ->assertJsonPath('meta.total', 30)
            ->assertJsonPath('meta.perPage', 15);

        $this->assertCount(15, $response->json('data'));
    }

    public function test_per_page_above_100_is_rejected(): void
    {
        $this->seedProducts(5);

        $response = $this->getJson('/v1/products?per_page=99999');

        $response->assertStatus(422);
    }

    public function test_per_page_within_limit_is_honored(): void
    {
        $this->seedProducts(30);

        $response = $this->getJson('/v1/products?per_page=20');

        $response->assertStatus(200)->assertJsonPath('meta.perPage', 20);
        $this->assertCount(20, $response->json('data'));
    }

    public function test_search_filter_returns_only_matching_products(): void
    {
        Category::factory()->create();
        Brand::factory()->create();
        Product::factory()->create(['name' => 'Unique Widget Xylo']);
        Product::factory()->count(5)->create();

        $response = $this->getJson('/v1/products?search=Xylo');

        $response->assertStatus(200)->assertJsonPath('meta.total', 1);
    }

    public function test_products_can_be_sorted_by_price_ascending(): void
    {
        Category::factory()->create();
        Brand::factory()->create();
        Product::factory()->create(['price' => 900]);
        Product::factory()->create(['price' => 100]);
        Product::factory()->create(['price' => 500]);

        $response = $this->getJson('/v1/products?sort_by=price&sort_order=asc');

        $response->assertStatus(200);
        $prices = array_column($response->json('data'), 'price');
        $sorted = $prices;
        sort($sorted, SORT_NUMERIC);
        $this->assertSame($sorted, $prices);
    }
}
