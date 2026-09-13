<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'parentId' => $this->parent_id,
            'imageUrl' => $this->image_url,
            'icon' => $this->icon,
            'status' => $this->status,
            'level' => $this->level,
            'sortOrder' => $this->sort_order,
            'displayIndex' => $this->display_index,
            'meta' => $this->meta,
            'productsCount' => $this->whenCounted('products'),
            'children' => CategoryResource::collection($this->whenLoaded('children')),
        ];
    }
}
