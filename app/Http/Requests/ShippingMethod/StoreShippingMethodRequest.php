<?php

namespace App\Http\Requests\ShippingMethod;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreShippingMethodRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'cost' => ['required', 'numeric', 'min:0'],
            'estimated_days_min' => ['nullable', 'integer', 'min:1'],
            'estimated_days_max' => ['nullable', 'integer', 'min:1', 'gte:estimated_days_min'],
            'is_active' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Shipping method name is required.',
            'cost.required' => 'Shipping cost is required.',
            'cost.min' => 'Shipping cost cannot be negative.',
            'estimated_days_max.gte' => 'Maximum days must be greater than or equal to minimum days.',
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
