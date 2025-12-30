<?php

namespace App\Http\Requests\Order;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shipping_address' => ['required', 'array'],
            'shipping_address.first_name' => ['required', 'string', 'max:100'],
            'shipping_address.last_name' => ['required', 'string', 'max:100'],
            'shipping_address.phone' => ['required', 'string', 'max:20'],
            'shipping_address.street_line_1' => ['required', 'string', 'max:255'],
            'shipping_address.city' => ['required', 'string', 'max:100'],
            'shipping_address.state_province' => ['required', 'string', 'max:100'],
            'shipping_address.postal_code' => ['required', 'string', 'max:20'],
            'shipping_address.country' => ['required', 'string', 'size:2'],
            'billing_address' => ['nullable', 'array'],
            'shipping_method_id' => ['nullable', 'integer', 'exists:shipping_methods,id'],
            'coupon_code' => ['nullable', 'string', 'max:50'],
            'customer_notes' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'shipping_address.required' => 'Shipping address is required.',
            'shipping_address.first_name.required' => 'First name is required.',
            'shipping_address.street_line_1.required' => 'Street address is required.',
            'shipping_address.city.required' => 'City is required.',
            'shipping_address.postal_code.required' => 'Postal code is required.',
            'shipping_address.country.required' => 'Country is required.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation error',
            'errors' => $validator->errors(),
        ], 422));
    }
}
