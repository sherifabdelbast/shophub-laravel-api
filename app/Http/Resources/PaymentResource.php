<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
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
            'order' => $this->whenLoaded('order', function () {
                return [
                    'id' => $this->order->id,
                    'orderNumber' => $this->order->order_number,
                    'customer' => $this->order->relationLoaded('user') && $this->order->user ? [
                        'id' => $this->order->user->id,
                        'name' => $this->order->user->full_name,
                        'email' => $this->order->user->email,
                    ] : null,
                ];
            }),
            // Hidden: gateway_response
        ];
    }
}
