<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
<<<<<<< HEAD
    /**
     * Transform the resource into an array.
     *
     * All keys are camelCase — the API's standardized response convention.
     *
     * @return array<string, mixed>
     */
=======
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'parentId' => $this->parent_id,
<<<<<<< HEAD
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
=======
            'imageUrl' => $this->absoluteUrl($this->image_url),
            'index' => $this->display_index,
            'meta' => $this->meta,
            'icon' => $this->icon,
            'status' => $this->status,
            'children' => CategoryResource::collection($this->whenLoaded('children')),
        ];
    }

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
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
}
