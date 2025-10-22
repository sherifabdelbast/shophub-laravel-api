<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Brand;
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
        return [
            'name' => fake()->words(2, true),
            'description' => fake()->sentence(12),
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'brand_id' => Brand::inRandomOrder()->first()->id ?? 1,
            'price' => fake()->randomFloat(2, 50, 1000),
            'discount_price' => fake()->optional()->randomFloat(2, 30, 800),
            'stock' => fake()->numberBetween(0, 100),
            'sku' => strtoupper(fake()->bothify('SKU-###??')),
            'image_url' => fake()->imageUrl(400, 400, 'products', true),
            'gallery' => [fake()->imageUrl(), fake()->imageUrl()],
            'rating' => fake()->randomFloat(1, 1, 5),
            'status' => 'active',
        ];
    }
}
