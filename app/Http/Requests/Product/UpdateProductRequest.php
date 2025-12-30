<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->getProductId();

        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'category_id' => ['sometimes', 'exists:categories,id'],
            'brand_id' => ['sometimes', 'exists:brands,id'],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'discount_price' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['sometimes', 'integer', 'min:0'],
            'sku' => ['sometimes', 'string', Rule::unique('products', 'sku')->ignore($productId)],
            'image_url' => ['sometimes', 'url'],
            'gallery' => ['sometimes', 'array'],
            'gallery.*' => ['url'],
            'rating' => ['sometimes', 'numeric', 'between:0,5'],
            'status' => ['sometimes', 'in:active,inactive,draft'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.max' => 'Product name cannot exceed 255 characters.',
            'category_id.exists' => 'The selected category does not exist.',
            'brand_id.exists' => 'The selected brand does not exist.',
            'price.numeric' => 'Price must be a number.',
            'price.min' => 'Price cannot be negative.',
            'discount_price.numeric' => 'Discount price must be a number.',
            'discount_price.min' => 'Discount price cannot be negative.',
            'stock.integer' => 'Stock must be a whole number.',
            'stock.min' => 'Stock cannot be negative.',
            'sku.unique' => 'This SKU is already taken.',
            'rating.between' => 'Rating must be between 0 and 5.',
            'status.in' => 'Status must be active, inactive, or draft.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation error',
            'errors' => $validator->errors()
        ], 422));
    }

    /**
     * Get the product ID from the route.
     */
    private function getProductId(): ?int
    {
        $product = $this->route('product');

        // If model binding resolved to Product instance
        if ($product instanceof \App\Models\Product) {
            return $product->id;
        }

        // If raw ID was passed
        if (is_numeric($product)) {
            return (int) $product;
        }

        return null;
    }
}

