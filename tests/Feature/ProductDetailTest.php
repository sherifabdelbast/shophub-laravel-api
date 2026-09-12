<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductDetailTest extends TestCase
{
    use RefreshDatabase;

    private function makeProduct(array $attributes = []): Product
    {
        Category::factory()->create();
        Brand::factory()->create();

        return Product::factory()->create($attributes);
    }

    public function test_show_resolves_product_by_slug(): void
    {
        $product = $this->makeProduct(['slug' => 'aurora-desk-lamp']);

        $response = $this->getJson('/v1/products/aurora-desk-lamp');

        $response->assertStatus(200)
            ->assertJsonPath('success', true)
            ->assertJsonPath('data.id', $product->id)
            ->assertJsonPath('data.slug', 'aurora-desk-lamp');
    }

    public function test_show_returns_404_for_unknown_slug(): void
    {
        $this->makeProduct();

        $this->getJson('/v1/products/does-not-exist')->assertStatus(404);
    }

    public function test_show_does_not_leak_internal_fields(): void
    {
        $product = $this->makeProduct(['cost_price' => 90.00]);

        $response = $this->getJson("/v1/products/{$product->slug}");

        $data = $response->json('data');
        $this->assertArrayNotHasKey('cost_price', $data);
        $this->assertArrayNotHasKey('low_stock_threshold', $data);
        $this->assertArrayNotHasKey('meta_title', $data);
        $this->assertArrayNotHasKey('created_at', $data);
    }

    public function test_show_includes_product_images(): void
    {
        $product = $this->makeProduct();
        ProductImage::factory()->primary()->create(['product_id' => $product->id]);
        ProductImage::factory()->count(2)->create(['product_id' => $product->id]);

        $response = $this->getJson("/v1/products/{$product->slug}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'images' => [['url', 'altText', 'isPrimary', 'sortOrder']],
                ],
            ]);
        $this->assertCount(3, $response->json('data.images'));
    }

    public function test_image_url_is_returned_absolute(): void
    {
        $product = $this->makeProduct(['image_url' => '/storage/products/x.jpg']);

        $response = $this->getJson("/v1/products/{$product->slug}");

        $this->assertSame(url('/storage/products/x.jpg'), $response->json('data.imageUrl'));
    }

    public function test_related_returns_same_category_products_excluding_self(): void
    {
        $product = $this->makeProduct();
        $otherCategory = Category::factory()->create();

        Product::factory()->count(3)->create(['category_id' => $product->category_id]);
        Product::factory()->count(2)->create(['category_id' => $otherCategory->id]);

        $response = $this->getJson("/v1/products/{$product->slug}/related");

        $response->assertStatus(200)->assertJsonPath('success', true);

        $ids = array_column($response->json('data'), 'id');
        $this->assertNotContains($product->id, $ids);
        $this->assertCount(3, $ids);
    }

    public function test_related_is_capped_at_four(): void
    {
        $product = $this->makeProduct();
        Product::factory()->count(10)->create(['category_id' => $product->category_id]);

        $response = $this->getJson("/v1/products/{$product->slug}/related");

        $response->assertStatus(200);
        $this->assertCount(4, $response->json('data'));
    }

    public function test_show_includes_editorial_fields(): void
    {
        $category = \App\Models\Category::factory()->create();
        $brand = \App\Models\Brand::factory()->create();

        $product = \App\Models\Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'slug' => 'editorial-product',
            'series' => 'Series 99',
            'material' => 'Test Material',
            'alt' => 'Alt text',
            'released_at' => '2026-05-01',
            'badge' => 'Limited',
            'atelier_note' => 'Note paragraph.',
            'specs' => [['label' => 'Mass', 'value' => '1kg']],
            'gallery' => [['src' => '/img/g1.png', 'alt' => 'gallery 1']],
            'related_slugs' => ['other-a', 'other-b'],
        ]);

        $response = $this->getJson("/v1/products/{$product->slug}");

        $response->assertStatus(200)
            ->assertJsonPath('data.series', 'Series 99')
            ->assertJsonPath('data.material', 'Test Material')
            ->assertJsonPath('data.alt', 'Alt text')
            ->assertJsonPath('data.releasedAt', '2026-05-01')
            ->assertJsonPath('data.badge', 'Limited')
            ->assertJsonPath('data.atelierNote', 'Note paragraph.')
            ->assertJsonPath('data.image', $response->json('data.imageUrl'))
            ->assertJsonPath('data.inStock', true)
            ->assertJsonPath('data.specs.0.label', 'Mass')
            ->assertJsonPath('data.gallery.0.alt', 'gallery 1')
            ->assertJsonPath('data.relatedSlugs', ['other-a', 'other-b']);
    }

    public function test_related_slugs_falls_back_when_not_curated(): void
    {
        $category = \App\Models\Category::factory()->create();
        $brand = \App\Models\Brand::factory()->create();

        $main = \App\Models\Product::factory()->create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'slug' => 'main',
            'status' => 'active',
            'stock_status' => 'in_stock',
            'related_slugs' => null,
        ]);

        foreach (['rel-a', 'rel-b', 'rel-c', 'rel-d'] as $slug) {
            \App\Models\Product::factory()->create([
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'slug' => $slug,
                'status' => 'active',
                'stock_status' => 'in_stock',
            ]);
        }

        $response = $this->getJson("/v1/products/{$main->slug}");

        $response->assertStatus(200);
        $slugs = $response->json('data.relatedSlugs');
        $this->assertCount(3, $slugs);
        $this->assertNotContains('main', $slugs);
        foreach ($slugs as $slug) {
            $this->assertContains($slug, ['rel-a', 'rel-b', 'rel-c', 'rel-d']);
        }
    }
}
