<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;  // تأكد من وجود هذا
use App\Models\Brand;     // تأكد من وجود هذا
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class ProductController extends Controller
{
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
    public function store(StoreProductRequest $request){
        try {
            $product = Product::create($request->validated());

            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product->load(['category', 'brand'])
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create product',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // ✅ بيانات الفورم (الكاتيجوريات والبراندات)
    public function getFormData(): JsonResponse
    {
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();

        return response()->json([
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    // ✅ تحديث المنتج
    public function update(StoreProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            
            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            $product->update($request->validated());

            return response()->json([
                'message' => 'Product updated successfully',
                'product' => $product->load(['category', 'brand'])
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update product',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // ✅ حذف المنتج
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            
            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            $product->delete();

            return response()->json([
                'message' => 'Product deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete product',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
