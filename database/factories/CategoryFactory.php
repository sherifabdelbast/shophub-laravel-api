<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->word();

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(10),
            'parent_id' => null,
            'image_url' => fake()->imageUrl(400, 400, 'categories', true),
            'status' => 'active',
        ];
    }
}
