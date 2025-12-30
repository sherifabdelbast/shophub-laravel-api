<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;  // تأكد من وجود هذا
use App\Models\Brand;     // تأكد من وجود هذا
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
   public function index(){
    $products = Product::with(['category', 'brand'])->paginate(2);
    return response()->json($products);
    } 

    public function show(Product $product){
        $product->load(['category', 'brand']);
        return response()->json($product);
    }
    public function store(StoreProductRequest $request){
        try {
            $data = $request->validated();
            
            // Auto-generate slug from name
            $slug = Str::slug($data['name']);
            // Ensure unique slug
            $originalSlug = $slug;
            $count = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $data['slug'] = $slug;

            $product = Product::create($data);

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
    public function getFormData(): JsonResponse{
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();

        return response()->json([
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
    public function updateStatus(Product $product){
        try {
            // تبديل الحالة بين active و inactive
            $newStatus = $product->status === 'active' ? 'inactive' : 'active';
            $product->update(['status' => $newStatus]);

            return response()->json([
                'success' => true,
                'message' => 'Product status updated successfully',
                'product' => $product->load(['category', 'brand'])
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update product status',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function update(UpdateProductRequest $request, Product $product): JsonResponse{
        // البيانات أصبحت مُتحقق منها تلقائياً عبر الـ Form Request
        $data = $request->validated();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_url) {
                $oldImagePath = str_replace('/storage', 'public', $product->image_url);
                Storage::delete($oldImagePath);
            }
            
            // Store new image
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image_url'] = Storage::url($imagePath);
        }

        // Handle gallery images if provided
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('products/gallery', 'public');
                $galleryPaths[] = Storage::url($path);
            }
            $data['gallery'] = array_merge($product->gallery ?? [], $galleryPaths);
        }

        // Update the product
        $product->update($data);

        // Load relationships
        $product->load(['category', 'brand']);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
    }
    public function destroy(Product $product){
        try {
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
