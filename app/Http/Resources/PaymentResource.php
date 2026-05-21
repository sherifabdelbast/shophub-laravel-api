<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'transactionId' => $this->transaction_id,
            'paymentMethod' => $this->payment_method,
            'amount' => (float) $this->amount,
            'currency' => $this->currency,
            'status' => $this->status,
            'refundedAmount' => $this->refunded_amount !== null ? (float) $this->refunded_amount : null,
            'paidAt' => optional($this->paid_at)->toIso8601String(),
            // Hidden: gateway_response
        ];
    }
}
