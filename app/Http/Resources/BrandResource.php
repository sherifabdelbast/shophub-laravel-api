<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
<<<<<<< HEAD
            'logoUrl' => $this->logo_url,
            'website' => $this->website,
            'sortOrder' => $this->sort_order,
            'status' => $this->status,
            'productsCount' => $this->whenCounted('products'),
        ];
    }
=======
            'logoUrl' => $this->absoluteUrl($this->logo_url),
            'website' => $this->website,
            'founded' => $this->founded,
            'discipline' => $this->discipline,
            'sortOrder' => $this->sort_order,
            'status' => $this->status,
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
