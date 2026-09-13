<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'type' => $this->type,
            'label' => $this->label,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'fullName' => $this->full_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'streetLine1' => $this->street_line_1,
            'streetLine2' => $this->street_line_2,
            'city' => $this->city,
            'stateProvince' => $this->state_province,
            'postalCode' => $this->postal_code,
            'country' => $this->country,
            'fullAddress' => $this->full_address,
            'deliveryInstructions' => $this->delivery_instructions,
            'isDefault' => (bool) $this->is_default,
            'createdAt' => optional($this->created_at)->toIso8601String(),
        ];
    }
}
