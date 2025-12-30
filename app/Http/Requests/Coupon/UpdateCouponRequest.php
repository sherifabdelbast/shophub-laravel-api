<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $couponId = $this->route('coupon');
        $coupon = $couponId instanceof \App\Models\Coupon ? $couponId : \App\Models\Coupon::find($couponId);

        return [
            'code' => ['sometimes', 'string', 'max:50', Rule::unique('coupons', 'code')->ignore($coupon?->id)],
            'description' => ['nullable', 'string', 'max:500'],
            'type' => ['sometimes', 'string', 'in:percentage,fixed'],
            'value' => ['sometimes', 'numeric', 'min:0'],
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
            'code.unique' => 'This coupon code already exists.',
            'type.in' => 'Coupon type must be percentage or fixed.',
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
