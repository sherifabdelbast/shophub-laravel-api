<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'productId' => $this->product_id,
            'rating' => (int) $this->rating,
            'title' => $this->title,
            'comment' => $this->comment,
            'images' => $this->mapImages($this->images),
            'helpfulCount' => (int) $this->helpful_count,
            'verifiedPurchase' => (bool) $this->verified_purchase,
            'createdAt' => optional($this->created_at)->toIso8601String(),
            'user' => $this->whenLoaded('user', fn () => [
                'id' => $this->user->id,
                'firstName' => $this->user->first_name,
                'lastName' => $this->user->last_name,
            ]),
            'status' => $this->when($request->user()?->isAdmin(), $this->status),
            'orderId' => $this->when($request->user()?->isAdmin(), $this->order_id),
            'updatedAt' => $this->when(
                $request->user()?->isAdmin(),
                optional($this->updated_at)->toIso8601String()
            ),
        ];
    }

    /**
     * Convert image paths to absolute URLs, leaving already-absolute URLs untouched.
     *
     * @return array<int, string>
     */
    private function mapImages(?array $images): array
    {
        if (! $images) {
            return [];
        }

        return array_map(function (string $path) {
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }

            return url($path);
        }, $images);
    }
}
