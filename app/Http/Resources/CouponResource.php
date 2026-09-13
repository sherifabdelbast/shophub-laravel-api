<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
<<<<<<< HEAD
=======
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
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
<<<<<<< HEAD
            'validFrom' => $this->valid_from,
            'validTo' => $this->valid_to,
            'isActive' => $this->is_active,
=======
            'validFrom' => optional($this->valid_from)->toIso8601String(),
            'validTo' => optional($this->valid_to)->toIso8601String(),
            'isActive' => (bool) $this->is_active,
            'createdAt' => optional($this->created_at)->toIso8601String(),
            'updatedAt' => optional($this->updated_at)->toIso8601String(),
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
        ];
    }
}
