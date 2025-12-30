<?php

namespace App\Http\Requests\Address;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => ['required', 'string', 'in:shipping,billing,both'],
            'label' => ['nullable', 'string', 'max:50'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'street_line_1' => ['required', 'string', 'max:255'],
            'street_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'state_province' => ['required', 'string', 'max:100'],
            'postal_code' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'size:2'],
            'delivery_instructions' => ['nullable', 'string', 'max:500'],
            'is_default' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Address type is required.',
            'type.in' => 'Address type must be shipping, billing, or both.',
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'phone.required' => 'Phone number is required.',
            'street_line_1.required' => 'Street address is required.',
            'city.required' => 'City is required.',
            'state_province.required' => 'State/Province is required.',
            'postal_code.required' => 'Postal code is required.',
            'country.required' => 'Country is required.',
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
