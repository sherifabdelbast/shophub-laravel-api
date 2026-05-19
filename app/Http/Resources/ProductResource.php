<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'slug' => $this->slug,
            'shortDescription' => $this->short_description,
            'description' => $this->description,
            'price' => $this->price,
            'discountPrice' => $this->discount_price,
            'discountPercentage' => $this->discount_percentage,
            'finalPrice' => $this->finalPrice(),
            'imageUrl' => $this->absoluteUrl($this->image_url),
            'weight' => $this->weight,
            'dimensions' => $this->dimensions,
            'rating' => $this->rating,
            'reviewsCount' => $this->reviews_count,
            'isFeatured' => $this->is_featured,
            'stockStatus' => $this->stock_status,
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
            'images' => $this->whenLoaded('images', function () {
                return $this->images->map(fn ($image) => [
                    'url' => $this->absoluteUrl($image->url),
                    'altText' => $image->alt_text,
                    'isPrimary' => $image->is_primary,
                    'sortOrder' => $image->sort_order,
                ]);
            }),
            // Hidden: cost_price, low_stock_threshold, stock (exact numbers), status, meta_title, meta_description, created_at, updated_at, deleted_at
        ];
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
