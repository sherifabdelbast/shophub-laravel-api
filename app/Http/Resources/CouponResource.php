<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'code' => $this->code,
            'description' => $this->description,
            'type' => $this->type,
            'value' => (float) $this->value,
            'minPurchase' => $this->min_purchase !== null ? (float) $this->min_purchase : null,
            'maxDiscount' => $this->max_discount !== null ? (float) $this->max_discount : null,
            'usageLimit' => $this->usage_limit,
            'usedCount' => $this->used_count,
            'perUserLimit' => $this->per_user_limit,
            'validFrom' => optional($this->valid_from)->toIso8601String(),
            'validTo' => optional($this->valid_to)->toIso8601String(),
            'isActive' => (bool) $this->is_active,
            'createdAt' => optional($this->created_at)->toIso8601String(),
            'updatedAt' => optional($this->updated_at)->toIso8601String(),
        ];
    }
}
