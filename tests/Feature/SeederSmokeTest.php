<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeederSmokeTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeders_load_frontend_fixtures_cleanly(): void
    {
        $this->seed([
            \Database\Seeders\CategorySeeder::class,
            \Database\Seeders\BrandSeeder::class,
            \Database\Seeders\ProductSeeder::class,
        ]);

        $this->assertGreaterThanOrEqual(7, Category::count());
        $this->assertGreaterThanOrEqual(3, Brand::count());
        $this->assertGreaterThanOrEqual(6, Product::count());

        $this->assertNotNull(Product::where('slug', 'monolith-chair')->first());
        $this->assertSame('Series 01', Product::where('slug', 'monolith-chair')->value('series'));
        $this->assertSame('atelier-vauban', Product::where('slug', 'monolith-chair')->first()->brand->slug);
        $this->assertSame('objects', Product::where('slug', 'monolith-chair')->first()->category->slug);
    }
}
