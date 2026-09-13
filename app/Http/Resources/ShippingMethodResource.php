<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShippingMethodResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'cost' => (float) $this->cost,
            'estimatedDaysMin' => $this->estimated_days_min,
            'estimatedDaysMax' => $this->estimated_days_max,
            'estimatedDelivery' => $this->estimated_delivery,
            'isActive' => $this->is_active,
            'sortOrder' => $this->sort_order,
        ];
    }
}
