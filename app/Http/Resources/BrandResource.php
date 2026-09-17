<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * All keys are camelCase — the API's standardized response convention.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'logoUrl' => $this->logo_url,
            'website' => $this->website,
            'sortOrder' => $this->sort_order,
            'status' => $this->status,
            'productsCount' => $this->whenCounted('products'),
        ];
    }
}
