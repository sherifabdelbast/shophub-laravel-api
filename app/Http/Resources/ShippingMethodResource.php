<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingMethodResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'cost' => (float) $this->cost,
            'estimatedDelivery' => $this->estimated_delivery,
            'estimatedDaysMin' => $this->when($request->user()?->isAdmin(), $this->estimated_days_min),
            'estimatedDaysMax' => $this->when($request->user()?->isAdmin(), $this->estimated_days_max),
            'isActive' => $this->when($request->user()?->isAdmin(), (bool) $this->is_active),
            'sortOrder' => $this->when($request->user()?->isAdmin(), $this->sort_order),
            'createdAt' => $this->when(
                $request->user()?->isAdmin(),
                optional($this->created_at)->toIso8601String()
            ),
            'updatedAt' => $this->when(
                $request->user()?->isAdmin(),
                optional($this->updated_at)->toIso8601String()
            ),
        ];
    }
}
