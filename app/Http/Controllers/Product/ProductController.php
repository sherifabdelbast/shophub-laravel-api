<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Get all products.
     *
     * @group Products
     */
    public function index(ProductIndexRequest $request): JsonResponse
    {
        $query = Product::with(['category', 'brand']);

        if ($request->filled('search')) {
            $search = $request->validated('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // sort_by / sort_order are whitelisted by ProductIndexRequest validation.
        $query->orderBy(
            $request->validated('sort_by', 'created_at'),
            $request->validated('sort_order', 'desc')
        );

        // per_page is capped at 100 by ProductIndexRequest validation.
        $products = $query->paginate($request->validated('per_page', 15));

        return response()->json([
            'success' => true,
            'data' => ProductResource::collection($products->items()),
            'meta' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ],
        ]);
    }

    /**
     * Get product details.
     *
     * @group Products
     */
    public function show(Product $product)
    {
        $product->load(['category', 'brand']);

        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    }

    /**
     * Store a newly created product.
     *
     * @group Admin - Products
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            // Auto-generate slug from name
            $slug = Str::slug($data['name']);
            $originalSlug = $slug;
            $count = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug.'-'.$count++;
            }
            $data['slug'] = $slug;

            $product = Product::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
                'data' => $product->load(['category', 'brand']),
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create product',
            ], 500);
        }
    }

    /**
     * Get form data (categories and brands).
     *
     * @group Products
     * @group Admin - Products
     */
    public function getFormData(): JsonResponse
    {
        $categories = Category::where('status', 'active')->get();
        $brands = Brand::where('status', 'active')->get();

        return response()->json([
            'success' => true,
            'data' => [
                'categories' => $categories,
                'brands' => $brands,
            ],
        ]);
    }

    /**
     * Toggle product status between active and inactive.
     *
     * @group Admin - Products
     */
    public function updateStatus(Product $product): JsonResponse
    {
        try {
            $newStatus = $product->status === 'active' ? 'inactive' : 'active';
            $product->update(['status' => $newStatus]);

            return response()->json([
                'success' => true,
                'message' => 'Product status updated successfully',
                'data' => $product->load(['category', 'brand']),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update product status',
            ], 500);
        }
    }

    /**
     * Update the specified product.
     *
     * @group Admin - Products
     */
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        try {
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

            $product->update($data);
            $product->load(['category', 'brand']);

            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
                'data' => $product,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update product',
            ], 500);
        }
    }

    /**
     * Remove the specified product.
     *
     * @group Admin - Products
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete product',
            ], 500);
        }
    }
}
