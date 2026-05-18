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
            'short_description' => $this->short_description,
            'description' => $this->description,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'discount_percentage' => $this->discount_percentage,
            'final_price' => $this->finalPrice(),
            'image_url' => $this->absoluteUrl($this->image_url),
            'weight' => $this->weight,
            'dimensions' => $this->dimensions,
            'rating' => $this->rating,
            'reviews_count' => $this->reviews_count,
            'is_featured' => $this->is_featured,
            'stock_status' => $this->stock_status,
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
                    'alt_text' => $image->alt_text,
                    'is_primary' => $image->is_primary,
                    'sort_order' => $image->sort_order,
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
