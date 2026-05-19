<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Attach products to every seeded category and brand so each
     * /categories/{slug} and /brands/{slug} page resolves with content.
     */
    public function run(): void
    {
        $brands = Brand::all();

        if ($brands->isEmpty()) {
            return;
        }

        Category::all()->each(function (Category $category) use ($brands): void {
            Product::factory(4)->create([
                'category_id' => $category->id,
                'brand_id' => $brands->random()->id,
            ]);
        });
    }
}
