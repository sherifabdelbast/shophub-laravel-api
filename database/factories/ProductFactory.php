<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(2, true);

        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name).'-'.fake()->unique()->numberBetween(1000, 9999),
            'description' => fake()->sentence(12),
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'brand_id' => Brand::inRandomOrder()->first()?->id ?? Brand::factory(),
            'price' => fake()->randomFloat(2, 50, 1000),
            'discount_price' => fake()->optional()->randomFloat(2, 30, 800),
            'stock' => fake()->numberBetween(10, 100),
            'sku' => strtoupper(fake()->bothify('SKU-###??')),
            'image_url' => fake()->imageUrl(400, 400, 'products', true),
            'rating' => fake()->randomFloat(1, 1, 5),
            'status' => 'active',
            'is_featured' => fake()->boolean(20),
        ];
    }
}
