<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->company();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence(8),
            'logo_url' => fake()->imageUrl(200, 200, 'brands', true),
            'website' => fake()->url(),
            'status' => 'active',
        ];
    }
}
