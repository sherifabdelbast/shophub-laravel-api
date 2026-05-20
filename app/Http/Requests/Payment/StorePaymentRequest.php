<?php

namespace App\Http\Requests\Payment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => ['required', 'integer', 'exists:orders,id'],
            'payment_method' => ['required', 'string', 'in:credit_card,debit_card,paypal,stripe,cash_on_delivery'],
            // Flat scalar map only — bounds key count and value size, no nested arrays.
            'payment_data' => ['nullable', 'array', 'max:20'],
            'payment_data.*' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'order_id.required' => 'Order ID is required.',
            'order_id.exists' => 'The selected order does not exist.',
            'payment_method.required' => 'Payment method is required.',
            'payment_method.in' => 'Invalid payment method.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors()->first() ?: 'Validation error',
            'errors' => $validator->errors(),
        ], 422));
    }
}
