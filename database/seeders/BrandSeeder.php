<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Fixed, frontend-linkable brand set. Slugs are stable contract values.
     *
     * @var list<array{name: string, slug: string, description: string, website: string}>
     */
    private array $brands = [
        ['name' => 'Northpeak', 'slug' => 'northpeak', 'description' => 'Minimal Scandinavian design.', 'website' => 'https://northpeak.example.com'],
        ['name' => 'Atelier Co', 'slug' => 'atelier-co', 'description' => 'Handcrafted studio pieces.', 'website' => 'https://atelier-co.example.com'],
        ['name' => 'Forma', 'slug' => 'forma', 'description' => 'Function-first modern goods.', 'website' => 'https://forma.example.com'],
        ['name' => 'Lumen', 'slug' => 'lumen', 'description' => 'Lighting specialists.', 'website' => 'https://lumen.example.com'],
    ];

    public function run(): void
    {
        foreach ($this->brands as $sortOrder => $brand) {
            Brand::updateOrCreate(
                ['slug' => $brand['slug']],
                [
                    'name' => $brand['name'],
                    'description' => $brand['description'],
                    'logo_url' => 'https://picsum.photos/seed/'.$brand['slug'].'/200/200',
                    'website' => $brand['website'],
                    'sort_order' => $sortOrder,
                    'status' => 'active',
                ]
            );
        }
    }
}
