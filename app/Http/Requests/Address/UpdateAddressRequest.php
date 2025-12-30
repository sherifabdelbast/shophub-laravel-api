<?php

namespace App\Http\Requests\Address;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => ['sometimes', 'string', 'in:shipping,billing,both'],
            'label' => ['nullable', 'string', 'max:50'],
            'first_name' => ['sometimes', 'string', 'max:100'],
            'last_name' => ['sometimes', 'string', 'max:100'],
            'phone' => ['sometimes', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'street_line_1' => ['sometimes', 'string', 'max:255'],
            'street_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['sometimes', 'string', 'max:100'],
            'state_province' => ['sometimes', 'string', 'max:100'],
            'postal_code' => ['sometimes', 'string', 'max:20'],
            'country' => ['sometimes', 'string', 'size:2'],
            'delivery_instructions' => ['nullable', 'string', 'max:500'],
            'is_default' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'type.in' => 'Address type must be shipping, billing, or both.',
            'country.size' => 'Country must be a 2-letter ISO code.',
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
