<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Fixed, frontend-linkable category set. Slugs are stable contract values.
     *
     * @var list<array{name: string, slug: string, description: string, icon: string}>
     */
    private array $categories = [
        ['name' => 'Objects', 'slug' => 'objects', 'description' => 'Everyday objects and homeware.', 'icon' => 'cube'],
        ['name' => 'Furniture', 'slug' => 'furniture', 'description' => 'Chairs, tables and storage.', 'icon' => 'armchair'],
        ['name' => 'Lighting', 'slug' => 'lighting', 'description' => 'Lamps and ambient lighting.', 'icon' => 'lamp'],
        ['name' => 'Textiles', 'slug' => 'textiles', 'description' => 'Rugs, throws and soft goods.', 'icon' => 'blanket'],
        ['name' => 'Kitchen', 'slug' => 'kitchen', 'description' => 'Cookware and kitchen tools.', 'icon' => 'utensils'],
    ];

    public function run(): void
    {
        foreach ($this->categories as $sortOrder => $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['description'],
                    'parent_id' => null,
                    'level' => 0,
                    'sort_order' => $sortOrder,
                    'image_url' => 'https://picsum.photos/seed/'.$category['slug'].'/400/400',
                    'icon' => $category['icon'],
                    'status' => 'active',
                ]
            );
        }
    }
}
