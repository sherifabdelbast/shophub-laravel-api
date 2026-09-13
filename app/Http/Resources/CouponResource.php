<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
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
            'validFrom' => $this->valid_from,
            'validTo' => $this->valid_to,
            'isActive' => $this->is_active,
        ];
    }
}
