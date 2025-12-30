<?php

namespace App\Http\Requests\Cart;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:999'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Product ID is required.',
            'product_id.exists' => 'The selected product does not exist.',
            'quantity.required' => 'Quantity is required.',
            'quantity.min' => 'Quantity must be at least 1.',
            'quantity.max' => 'Quantity cannot exceed 999.',
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
