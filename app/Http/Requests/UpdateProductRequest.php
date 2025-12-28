<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
        // Get product ID from route (handles both model binding and raw ID)
        $product = $this->route('product');
        $productId = $product instanceof \App\Models\Product ? $product->id : $product;
        
        return [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'category_id' => 'sometimes|exists:categories,id',
            'brand_id' => 'sometimes|exists:brands,id',
            'price' => 'sometimes|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'sometimes|integer|min:0',
            'sku' => ['sometimes', 'string', Rule::unique('products', 'sku')->ignore($productId)],
            'image_url' => 'sometimes|url',
            'gallery' => 'sometimes|array',
            'gallery.*' => 'url',
            'rating' => 'sometimes|numeric|between:0,5',
            'status' => 'sometimes|in:active,inactive,draft'
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.exists' => 'The selected category does not exist.',
            'brand_id.exists' => 'The selected brand does not exist.',
            'sku.unique' => 'This SKU is already taken.',
        ];
    }
}
