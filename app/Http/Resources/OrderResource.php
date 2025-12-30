<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_number' => $this->order_number,
            'status' => $this->status,
            'payment_status' => $this->payment_status,
            'payment_method' => $this->payment_method,
            'subtotal' => $this->subtotal,
            'tax' => $this->tax,
            'shipping_cost' => $this->shipping_cost,
            'discount' => $this->discount,
            'total' => $this->total,
            'shipping_address' => $this->shipping_address,
            'billing_address' => $this->billing_address,
            'tracking_number' => $this->tracking_number,
            'customer_notes' => $this->customer_notes,
            'shipped_at' => $this->shipped_at,
            'delivered_at' => $this->delivered_at,
            'items' => $this->whenLoaded('items', function () {
                return $this->items->map(fn ($item) => [
                    'id' => $item->id,
                    'product_name' => $item->product_name,
                    'product_sku' => $item->product_sku,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'subtotal' => $item->subtotal,
                ]);
            }),
            'shipping_method' => $this->whenLoaded('shippingMethod', function () {
                return [
                    'id' => $this->shippingMethod->id,
                    'name' => $this->shippingMethod->name,
                ];
            }),
            'created_at' => $this->created_at,
            // Hidden: user_id, coupon_id, shipping_method_id, admin_notes, cancelled_at, cancellation_reason
        ];
    }
}
