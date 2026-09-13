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
        ];
    }
}
