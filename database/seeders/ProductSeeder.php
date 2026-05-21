<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Frontend mock fixtures — these are the source of truth for the storefront.
     *
     * @var list<array<string, mixed>>
     */
    private array $products = [
        [
            'slug' => 'monolith-chair',
            'name' => 'Monolith Chair',
            'series' => 'Series 01',
            'material' => 'Raw Concrete',
            'price' => 1850,
            'category_slug' => 'objects',
            'brand_slug' => 'atelier-vauban',
            'image_url' => '/images/products/monolith-chair.png',
            'alt' => 'White concrete U-shaped monolith chair in a minimalist studio',
            'stock_status' => 'in_stock',
            'stock' => 10,
            'released_at' => '2026-04-02',
            'badge' => 'Limited Edition',
            'description' => 'A physical dialogue between industrial gravity and architectural grace. Cast in a single pour, hand-refined to a singular geometric tension.',
            'gallery' => [
                ['src' => '/images/product-detail/monolith-tower.png', 'alt' => 'Monolith Chair full silhouette against an alpine backdrop'],
                ['src' => '/images/product-detail/monolith-frame-detail.png', 'alt' => "Detail of the chair's structural oak frame joinery"],
                ['src' => '/images/product-detail/monolith-texture-detail.png', 'alt' => 'Close texture study of the cast concrete surface'],
            ],
            'specs' => [
                ['label' => 'Dimensions', 'value' => '78cm H × 64cm W × 60cm D'],
                ['label' => 'Mass', 'value' => '92kg / 203lbs'],
                ['label' => 'Composition', 'value' => 'Reinforced concrete, acid-washed finish.'],
            ],
            'atelier_note' => 'We left the surface slightly porous to absorb light rather than reflect it, creating a deep, grounded presence.',
            'related_slugs' => ['cemento-lamp', 'pillar-pedestal', 'slat-screen'],
            'status' => 'active',
            'is_featured' => true,
        ],
        [
            'slug' => 'cemento-lamp',
            'name' => 'Cemento Lamp',
            'series' => 'Series 02',
            'material' => 'Cast Grey',
            'price' => 420,
            'category_slug' => 'workspace',
            'brand_slug' => 'atelier-vauban',
            'image_url' => '/images/products/cemento-lamp.png',
            'alt' => 'Architectural concrete desk lamp with a warm glow',
            'stock_status' => 'in_stock',
            'stock' => 15,
            'released_at' => '2026-03-18',
            'badge' => null,
            'description' => 'A task lamp distilled to its structural essentials — a cast concrete base anchoring a single curved arm.',
            'gallery' => [
                ['src' => '/images/products/cemento-lamp.png', 'alt' => 'Cemento Lamp lit on a wooden desk'],
            ],
            'specs' => [
                ['label' => 'Dimensions', 'value' => '44cm H × 18cm W × 24cm D'],
                ['label' => 'Mass', 'value' => '3.1kg / 6.8lbs'],
                ['label' => 'Composition', 'value' => 'Cast grey concrete, brushed-steel arm.'],
            ],
            'atelier_note' => null,
            'related_slugs' => ['monolith-chair', 'pillar-pedestal', 'grid-storage'],
            'status' => 'active',
            'is_featured' => false,
        ],
        [
            'slug' => 'vestige-table',
            'name' => 'Vestige Table',
            'series' => 'Series 03',
            'material' => 'Travertine',
            'price' => 3200,
            'category_slug' => 'living-room',
            'brand_slug' => 'studio-monolith',
            'image_url' => '/images/products/vestige-table.png',
            'alt' => 'Geometric dining table with a travertine pedestal base',
            'stock_status' => 'in_stock',
            'stock' => 5,
            'released_at' => '2026-05-01',
            'badge' => 'Limited',
            'description' => 'A single travertine plane balanced on a monolithic pedestal — mass and lightness held in quiet equilibrium.',
            'gallery' => [
                ['src' => '/images/products/vestige-table.png', 'alt' => 'Vestige Table viewed at an angle'],
            ],
            'specs' => [
                ['label' => 'Dimensions', 'value' => '74cm H × 200cm W × 95cm D'],
                ['label' => 'Mass', 'value' => '180kg / 397lbs'],
                ['label' => 'Composition', 'value' => 'Solid travertine, honed matte finish.'],
            ],
            'atelier_note' => null,
            'related_slugs' => ['monolith-chair', 'slat-screen', 'pillar-pedestal'],
            'status' => 'active',
            'is_featured' => true,
        ],
        [
            'slug' => 'grid-storage',
            'name' => 'Grid Storage',
            'series' => 'Atelier',
            'material' => 'Brushed Steel',
            'price' => 1150,
            'category_slug' => 'workspace',
            'brand_slug' => 'forge-nord',
            'image_url' => '/images/products/grid-storage.png',
            'alt' => 'Modular brushed-steel grid shelving unit',
            'stock_status' => 'in_stock',
            'stock' => 8,
            'released_at' => '2026-02-10',
            'badge' => null,
            'description' => 'An open steel grid system that treats storage as architecture — every shelf a deliberate horizontal line.',
            'gallery' => [
                ['src' => '/images/products/grid-storage.png', 'alt' => 'Grid Storage unit against a grey wall'],
                ['src' => '/images/product-detail/grid-storage-setting.png', 'alt' => 'Grid Storage in a warehouse interior setting'],
            ],
            'specs' => [
                ['label' => 'Dimensions', 'value' => '210cm H × 160cm W × 40cm D'],
                ['label' => 'Mass', 'value' => '64kg / 141lbs'],
                ['label' => 'Composition', 'value' => 'Brushed steel, powder-coated joints.'],
            ],
            'atelier_note' => null,
            'related_slugs' => ['cemento-lamp', 'pillar-pedestal', 'monolith-chair'],
            'status' => 'active',
            'is_featured' => false,
        ],
        [
            'slug' => 'pillar-pedestal',
            'name' => 'Pillar Pedestal',
            'series' => 'Archives',
            'material' => 'Nero Marquina',
            'price' => 890,
            'category_slug' => 'objects',
            'brand_slug' => 'studio-monolith',
            'image_url' => '/images/products/pillar-pedestal.png',
            'alt' => 'Black marble display pedestal with gold veining',
            'stock_status' => 'out_of_stock',
            'stock' => 0,
            'released_at' => '2026-01-22',
            'badge' => null,
            'description' => 'A display plinth cut from Nero Marquina marble — a dark stage built to elevate a single object.',
            'gallery' => [
                ['src' => '/images/products/pillar-pedestal.png', 'alt' => 'Pillar Pedestal against a dark backdrop'],
            ],
            'specs' => [
                ['label' => 'Dimensions', 'value' => '100cm H × 40cm W × 40cm D'],
                ['label' => 'Mass', 'value' => '120kg / 265lbs'],
                ['label' => 'Composition', 'value' => 'Nero Marquina marble, polished.'],
            ],
            'atelier_note' => null,
            'related_slugs' => ['monolith-chair', 'vestige-table', 'cemento-lamp'],
            'status' => 'active',
            'is_featured' => false,
        ],
        [
            'slug' => 'slat-screen',
            'name' => 'Slat Screen',
            'series' => 'Series 04',
            'material' => 'Smoked Oak',
            'price' => 2400,
            'category_slug' => 'living-room',
            'brand_slug' => 'forge-nord',
            'image_url' => '/images/products/slat-screen.png',
            'alt' => 'Architectural smoked-oak folding room divider screen',
            'stock_status' => 'in_stock',
            'stock' => 4,
            'released_at' => '2026-04-20',
            'badge' => null,
            'description' => 'A folding screen of vertical smoked-oak slats — a room divider that filters light rather than blocking it.',
            'gallery' => [
                ['src' => '/images/products/slat-screen.png', 'alt' => 'Slat Screen folding divider'],
            ],
            'specs' => [
                ['label' => 'Dimensions', 'value' => '180cm H × 200cm W (open)'],
                ['label' => 'Mass', 'value' => '28kg / 62lbs'],
                ['label' => 'Composition', 'value' => 'Smoked oak slats, brass hinges.'],
            ],
            'atelier_note' => null,
            'related_slugs' => ['vestige-table', 'monolith-chair', 'grid-storage'],
            'status' => 'active',
            'is_featured' => true,
        ],
    ];

    public function run(): void
    {
        foreach ($this->products as $row) {
            $categoryId = Category::where('slug', $row['category_slug'])->value('id');
            $brandId = Brand::where('slug', $row['brand_slug'])->value('id');
            $sku = 'SKU-'.strtoupper($row['slug']);

            Product::updateOrCreate(
                ['slug' => $row['slug']],
                [
                    'sku' => $sku,
                    'name' => $row['name'],
                    'series' => $row['series'],
                    'material' => $row['material'],
                    'price' => $row['price'],
                    'category_id' => $categoryId,
                    'brand_id' => $brandId,
                    'image_url' => $row['image_url'],
                    'alt' => $row['alt'],
                    'stock_status' => $row['stock_status'],
                    'stock' => $row['stock'],
                    'released_at' => $row['released_at'],
                    'badge' => $row['badge'],
                    'description' => $row['description'],
                    'gallery' => $row['gallery'],
                    'specs' => $row['specs'],
                    'atelier_note' => $row['atelier_note'],
                    'related_slugs' => $row['related_slugs'],
                    'status' => $row['status'],
                    'is_featured' => $row['is_featured'],
                ]
            );
        }
    }
}
