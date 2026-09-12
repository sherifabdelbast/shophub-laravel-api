<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Fixed, frontend-linkable category set. Slugs are stable contract values.
     *
     * @var list<array{slug: string, name: string, description: string|null, parent_id: int|null, image_url: string|null, icon: string|null, status: string, display_index: string|null, meta: string|null}>
     */
    private array $categories = [
        ['slug' => 'living-room', 'name' => 'Living Room', 'description' => null, 'parent_id' => null, 'image_url' => null, 'icon' => null, 'status' => 'active', 'display_index' => null, 'meta' => null],
        ['slug' => 'workspace', 'name' => 'Workspace', 'description' => null, 'parent_id' => null, 'image_url' => null, 'icon' => null, 'status' => 'active', 'display_index' => null, 'meta' => null],
        ['slug' => 'outdoor', 'name' => 'Outdoor', 'description' => null, 'parent_id' => null, 'image_url' => null, 'icon' => null, 'status' => 'active', 'display_index' => null, 'meta' => null],
        ['slug' => 'objects', 'name' => 'Objects', 'description' => 'Essential elements for the modern interior — sculptural furniture and lighting that prioritise geometric purity.', 'parent_id' => null, 'image_url' => '/images/categories/objects.png', 'icon' => null, 'status' => 'active', 'display_index' => '01', 'meta' => 'Sculptural Elements'],
        ['slug' => 'atelier', 'name' => 'Atelier', 'description' => 'Limited editions and handcrafted masterworks — a celebration of material honesty and artisan dedication.', 'parent_id' => null, 'image_url' => '/images/categories/atelier.png', 'icon' => null, 'status' => 'active', 'display_index' => '02', 'meta' => 'Artisan Works'],
        ['slug' => 'collections', 'name' => 'Collections', 'description' => 'Thematic curations and seasonal narratives — each collection a story of spatial harmony and evolved living.', 'parent_id' => null, 'image_url' => '/images/categories/collections.png', 'icon' => null, 'status' => 'active', 'display_index' => '03', 'meta' => 'Thematic Series'],
        ['slug' => 'archives', 'name' => 'Archives', 'description' => 'A retrospective of foundational pieces and rare finds — access to our library of design history.', 'parent_id' => null, 'image_url' => '/images/categories/archives.png', 'icon' => null, 'status' => 'active', 'display_index' => '04', 'meta' => 'Legacy'],
    ];

    public function run(): void
    {
        foreach ($this->categories as $row) {
            Category::updateOrCreate(['slug' => $row['slug']], $row);
        }
    }
}
