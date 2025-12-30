<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:50', 'unique:coupons,code'],
            'description' => ['nullable', 'string', 'max:500'],
            'type' => ['required', 'string', 'in:percentage,fixed'],
            'value' => ['required', 'numeric', 'min:0'],
            'min_purchase' => ['nullable', 'numeric', 'min:0'],
            'max_discount' => ['nullable', 'numeric', 'min:0'],
            'usage_limit' => ['nullable', 'integer', 'min:1'],
            'per_user_limit' => ['nullable', 'integer', 'min:1'],
            'valid_from' => ['nullable', 'date'],
            'valid_to' => ['nullable', 'date', 'after:valid_from'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Coupon code is required.',
            'code.unique' => 'This coupon code already exists.',
            'type.required' => 'Coupon type is required.',
            'type.in' => 'Coupon type must be percentage or fixed.',
            'value.required' => 'Coupon value is required.',
            'valid_to.after' => 'Valid to date must be after valid from date.',
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
