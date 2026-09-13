<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'slug' => $this->slug,
            'series' => $this->series,
            'material' => $this->material,
            'shortDescription' => $this->short_description,
            'description' => $this->description,
            'price' => (float) $this->price,
            'discountPrice' => $this->discount_price !== null ? (float) $this->discount_price : null,
<<<<<<< HEAD
            'discountPercentage' => $this->discount_percentage,
            'finalPrice' => (float) $this->finalPrice(),
            'image' => $this->image_url,
            'alt' => $this->alt,
            'rating' => (float) $this->rating,
            'reviewsCount' => $this->reviews_count,
            'isFeatured' => $this->is_featured,
            'stockStatus' => $this->stock_status,
            'inStock' => $this->stock_status === 'in_stock',
            'releasedAt' => $this->released_at,
            'badge' => $this->badge,
            'atelierNote' => $this->atelier_note,
            'specs' => $this->specs,
            'gallery' => $this->gallery,
            'relatedSlugs' => $this->related_slugs,
=======
            'discountPercentage' => (int) $this->discount_percentage,
            'finalPrice' => (float) $this->finalPrice(),
            'imageUrl' => $this->absoluteUrl($this->image_url),
            'image' => $this->absoluteUrl($this->image_url),
            'alt' => $this->alt,
            'weight' => $this->weight !== null ? (float) $this->weight : null,
            'dimensions' => $this->dimensions,
            'rating' => (float) $this->rating,
            'reviewsCount' => (int) $this->reviews_count,
            'isFeatured' => (bool) $this->is_featured,
            'stockStatus' => $this->stock_status,
            'inStock' => $this->stock_status === 'in_stock',
            'releasedAt' => optional($this->released_at)->toDateString(),
            'badge' => $this->badge,
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                    'slug' => $this->category->slug,
                ];
            }),
            'brand' => $this->whenLoaded('brand', function () {
                return [
                    'id' => $this->brand->id,
                    'name' => $this->brand->name,
                    'slug' => $this->brand->slug,
                ];
            }),
<<<<<<< HEAD
=======
            'images' => $this->whenLoaded('images', function () {
                return $this->images->map(fn ($image) => [
                    'url' => $this->absoluteUrl($image->url),
                    'altText' => $image->alt_text,
                    'isPrimary' => $image->is_primary,
                    'sortOrder' => $image->sort_order,
                ]);
            }),
            'gallery' => $this->mapGallery($this->gallery),
            'specs' => $this->specs ?? [],
            'atelierNote' => $this->atelier_note,
            'relatedSlugs' => $this->resolveRelatedSlugs(),
            // Hidden: cost_price, low_stock_threshold, stock (exact numbers), status, meta_title, meta_description, created_at, updated_at, deleted_at
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
        ];
    }

    private function mapGallery(?array $gallery): array
    {
        if (! $gallery) {
            return [];
        }

        return array_map(function (array $item) {
            return [
                'src' => $this->absoluteUrl($item['src'] ?? null),
                'alt' => $item['alt'] ?? null,
            ];
        }, $gallery);
    }

    /**
     * Returns curated related_slugs when set, otherwise auto-picks
     * top 3 same-category in-stock active products (excluding self).
     *
     * @return array<int, string>
     */
    private function resolveRelatedSlugs(): array
    {
        $curated = $this->related_slugs;
        if (is_array($curated) && count($curated) > 0) {
            return array_values($curated);
        }

        return \App\Models\Product::query()
            ->where('category_id', $this->category_id)
            ->where('status', 'active')
            ->where('stock_status', 'in_stock')
            ->whereKeyNot($this->getKey())
            ->limit(3)
            ->pluck('slug')
            ->all();
    }

    /**
     * Convert a stored image path into an absolute URL.
     * Leaves already-absolute URLs untouched.
     */
    private function absoluteUrl(?string $path): ?string
    {
        if ($path === null || $path === '') {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return url($path);
    }
}
