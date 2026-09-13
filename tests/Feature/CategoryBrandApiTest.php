<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryBrandApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_show_resolves_by_slug_with_camel_case_shape(): void
    {
        $parent = Category::factory()->create(['slug' => 'objects']);
        Category::factory()->create(['slug' => 'sub-object', 'parent_id' => $parent->id]);

        $response = $this->getJson('/v1/categories/objects');

        $response->assertStatus(200)
            ->assertJsonPath('data.slug', 'objects')
            ->assertJsonStructure([
                'data' => ['id', 'name', 'slug', 'description', 'parentId', 'imageUrl', 'icon', 'status', 'children'],
            ])
            ->assertJsonMissingPath('data.parent_id')
            ->assertJsonMissingPath('data.deleted_at');
    }

    public function test_category_index_keeps_pagination_meta(): void
    {
        Category::factory()->count(3)->create();

        $response = $this->getJson('/v1/categories');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['data', 'links', 'meta'],
            ]);
    }

    public function test_brand_show_resolves_by_slug_with_camel_case_shape(): void
    {
        Brand::factory()->create(['slug' => 'northpeak', 'logo_url' => '/storage/brands/logos/n.png']);

        $response = $this->getJson('/v1/brands/northpeak');

        $response->assertStatus(200)
            ->assertJsonPath('data.slug', 'northpeak')
            ->assertJsonStructure([
                'data' => ['id', 'name', 'slug', 'description', 'logoUrl', 'website', 'sortOrder', 'status'],
            ])
            ->assertJsonMissingPath('data.logo_url')
            ->assertJsonMissingPath('data.deleted_at');
    }

    public function test_brand_index_keeps_pagination_meta(): void
    {
        Brand::factory()->count(3)->create();

        $response = $this->getJson('/v1/brands');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['data', 'links', 'meta'],
            ]);
    }

    public function test_category_resource_exposes_index_and_meta(): void
    {
        $category = Category::factory()->create([
            'display_index' => '07',
            'meta' => 'Test Subtitle',
        ]);

        $response = $this->getJson("/v1/categories/{$category->slug}");

        $response->assertStatus(200)
            ->assertJsonPath('data.index', '07')
            ->assertJsonPath('data.meta', 'Test Subtitle');
    }

    public function test_brand_resource_exposes_founded_and_discipline(): void
    {
        $brand = Brand::factory()->create([
            'founded' => 'Est. 1999',
            'discipline' => 'Test Discipline',
        ]);

        $response = $this->getJson("/v1/brands/{$brand->slug}");

        $response->assertStatus(200)
            ->assertJsonPath('data.founded', 'Est. 1999')
            ->assertJsonPath('data.discipline', 'Test Discipline');
    }
}
