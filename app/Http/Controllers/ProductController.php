<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ✅ عرض كل المنتجات
    public function index()
    {
        $products = Product::with(['category', 'brand'])->where('status', 'active')->get();
        return response()->json($products);
    }

    // ✅ عرض منتج محدد
    public function show($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    // ✅ إنشاء منتج جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
        ]);

        $product = Product::create($validated + [
            'status' => 'active'
        ]);

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    // ✅ تحديث منتج
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->all());

        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
    }

    // ✅ حذف منتج
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update(['status' => 'deleted']);

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
