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
<<<<<<< HEAD
        $products = Product::with(['category', 'brand'])
            ->where('status', 'active')
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => ProductResource::collection($products)->resolve(),
=======
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

        if ($request->filled('featured')) {
            $query->where('is_featured', filter_var($request->featured, FILTER_VALIDATE_BOOLEAN));
        }

        // New camelCase / slug-based filters from the storefront.
        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->input('category')));
        }

        if ($request->filled('brand')) {
            $query->whereHas('brand', fn ($q) => $q->where('slug', $request->input('brand')));
        }

        if ($request->filled('material')) {
            $query->where('material', $request->input('material'));
        }

        if ($request->filled('inStock') && $request->boolean('inStock')) {
            $query->where('stock_status', 'in_stock');
        }

        $sort = $request->input('sort');

        if ($sort !== null) {
            match ($sort) {
                'new' => $query->orderByDesc('released_at')->orderByDesc('created_at'),
                'price-asc' => $query->orderBy('price', 'asc'),
                'price-desc' => $query->orderBy('price', 'desc'),
            };
        } else {
            // Legacy sort_by / sort_order (for admin and older clients).
            $query->orderBy(
                $request->validated('sort_by', 'created_at'),
                $request->validated('sort_order', 'desc'),
            );
        }

        $perPage = $request->input('perPage') ?? $request->validated('per_page', 15);
        $products = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => ProductResource::collection($products->items()),
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
            'meta' => [
                'currentPage' => $products->currentPage(),
                'lastPage' => $products->lastPage(),
                'perPage' => $products->perPage(),
                'total' => $products->total(),
            ],
        ]);
    }

    /**
     * Get product details.
     *
     * @group Products
     */
    public function show(Product $product): JsonResponse
    {
        $product->load(['category', 'brand', 'images']);

        return response()->json([
            'success' => true,
            'data' => new ProductResource($product),
        ]);
    }

    /**
     * Get products related to the given product (same category, excluding self).
     *
     * @group Products
     */
    public function related(Product $product): JsonResponse
    {
        $related = Product::with(['category', 'brand', 'images'])
            ->where('status', 'active')
            ->where('category_id', $product->category_id)
            ->whereKeyNot($product->getKey())
            ->limit(4)
            ->get();

        return response()->json([
            'success' => true,
            'data' => ProductResource::collection($related),
        ]);
    }

    /**
     * List products filtered by category slug.
     *
     * @group Products
     */
    public function indexByCategory(ProductIndexRequest $request, string $slug): JsonResponse
    {
        $request->merge(['category' => $slug]);

        return $this->index($request);
    }

    /**
     * List products filtered by brand slug.
     *
     * @group Products
     */
    public function indexByBrand(ProductIndexRequest $request, string $slug): JsonResponse
    {
        $request->merge(['brand' => $slug]);

        return $this->index($request);
    }

    /**
     * Store a newly created product.
     *
     * @group Admin - Products
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $data = $request->validated();

<<<<<<< HEAD
            // Auto-generate slug from name
            $slug = Str::slug($data['name']);
            $originalSlug = $slug;
            $count = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $data['slug'] = $slug;

            $product = Product::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
                'data' => new ProductResource($product->load(['category', 'brand'])),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create product',
                'error' => $e->getMessage(),
            ], 500);
=======
        // Auto-generate slug from name
        $slug = Str::slug($data['name']);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug.'-'.$count++;
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
        }
        $data['slug'] = $slug;

        $product = Product::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product->load(['category', 'brand']),
        ], 201);
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
        $newStatus = $product->status === 'active' ? 'inactive' : 'active';
        $product->update(['status' => $newStatus]);

<<<<<<< HEAD
            return response()->json([
                'success' => true,
                'message' => 'Product status updated successfully',
                'data' => new ProductResource($product->load(['category', 'brand'])),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update product status',
                'error' => $e->getMessage(),
            ], 500);
        }
=======
        return response()->json([
            'success' => true,
            'message' => 'Product status updated successfully',
            'data' => $product->load(['category', 'brand']),
        ]);
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
    }

    /**
     * Update the specified product.
     *
     * @group Admin - Products
     */
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $data = $request->validated();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_url) {
                $oldImagePath = str_replace('/storage', 'public', $product->image_url);
                Storage::delete($oldImagePath);
            }

<<<<<<< HEAD
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
                'data' => new ProductResource($product),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update product',
                'error' => $e->getMessage(),
            ], 500);
=======
            // Store new image
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image_url'] = Storage::url($imagePath);
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
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
    }

    /**
     * Remove the specified product.
     *
     * @group Admin - Products
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

<<<<<<< HEAD
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete product',
                'error' => $e->getMessage(),
            ], 500);
        }
=======
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
        ]);
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
    }
}
