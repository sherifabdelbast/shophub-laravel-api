<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Fixed, frontend-linkable brand set. Slugs are stable contract values.
     *
     * @var list<array{slug: string, name: string, description: string, logo_url: string|null, website: string, sort_order: int, status: string, founded: string, discipline: string}>
     */
    private array $brands = [
        ['slug' => 'atelier-vauban', 'name' => 'Atelier Vauban', 'description' => 'A Paris workshop casting raw concrete into furniture that holds light rather than reflects it. Every piece is poured once and refined by hand.', 'logo_url' => null, 'website' => 'https://example.com/atelier-vauban', 'sort_order' => 1, 'status' => 'active', 'founded' => 'Est. 2009', 'discipline' => 'Cast Concrete'],
        ['slug' => 'forge-nord', 'name' => 'Forge Nord', 'description' => 'A Copenhagen metalworks treating storage as architecture — brushed steel grids and screens built on the discipline of the horizontal line.', 'logo_url' => null, 'website' => 'https://example.com/forge-nord', 'sort_order' => 2, 'status' => 'active', 'founded' => 'Est. 2014', 'discipline' => 'Brushed Steel'],
        ['slug' => 'studio-monolith', 'name' => 'Studio Monolith', 'description' => 'A stone studio working travertine and Nero Marquina marble — mass and lightness held in quiet equilibrium across tables and pedestals.', 'logo_url' => null, 'website' => 'https://example.com/studio-monolith', 'sort_order' => 3, 'status' => 'active', 'founded' => 'Est. 2006', 'discipline' => 'Natural Stone'],
    ];

    public function run(): void
    {
        foreach ($this->brands as $row) {
            Brand::updateOrCreate(['slug' => $row['slug']], $row);
        }
    }
}
