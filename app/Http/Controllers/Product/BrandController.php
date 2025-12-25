<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class BrandController extends Controller
{
       public function index(Request $request)
    {
        try {
            \Log::info('Brand index called', ['request' => $request->all()]);
            
            $query = Brand::query();
            
            // Search functionality
            if ($request->has('search') && $request->search != '') {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            
            // Status filter
            if ($request->has('status') && $request->status != '') {
                $query->where('status', $request->status);
            }
            
            // Sorting
            $sortField = $request->get('sort_field', 'created_at');
            $sortDirection = $request->get('sort_direction', 'desc');
            $query->orderBy($sortField, $sortDirection);
            
            $perPage = $request->get('per_page', 10);
            $brands = $query->paginate($perPage);
            
            \Log::info('Brands retrieved successfully', ['count' => $brands->count()]);
            
            return response()->json([
                'success' => true,
                'data' => $brands,
                'message' => 'Brands retrieved successfully'
            ]);
            
        } 
        catch (\Exception $e) {
            \Log::error('Error retrieving brands', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve brands',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created brand
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:brands,name',
                'description' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'website' => 'nullable|url|max:255',
                'status' => 'required|in:active,inactive'
            ]);

            $brandData = [
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name']),
                'description' => $validated['description'] ?? null,
                'website' => $validated['website'] ?? null,
                'status' => $validated['status']
            ];

            // Handle logo upload
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('brands/logos', 'public');
                $brandData['logo_url'] = Storage::url($logoPath);
            }

            $brand = Brand::create($brandData);

            return response()->json([
                'success' => true,
                'data' => $brand,
                'message' => 'Brand created successfully'
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create brand',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified brand
     */
    public function show(Brand $brand)
    {
        return response()->json([
            'success' => true,
            'data' => $brand,
            'message' => 'Brand retrieved successfully'
        ]);
    }

    /**
     * Update the specified brand
     */
public function update(Request $request, Brand $brand)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo_url' => 'nullable|string',
            'website' => 'nullable|string',
            'status' => 'nullable|in:active,inactive'
        ]);

        $brand->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Brand updated successfully',
            'data' => $brand
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong',
            'errors' => $e->getMessage(),
            'data' => null
        ], 500);
    }
}
    /**
     * Remove the specified brand
     */
    public function destroy(Brand $brand)
    {
        try {
            // Check if brand has products
            if ($brand->products()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete brand with associated products'
                ], 422);
            }
            
            // Delete logo if exists
            if ($brand->logo_url) {
                $logoPath = str_replace('/storage/', '', $brand->logo_url);
                Storage::disk('public')->delete($logoPath);
            }
            
            $brand->delete();

            return response()->json([
                'success' => true,
                'message' => 'Brand deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete brand',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update brand status
     */
    public function updateStatus(Request $request, Brand $brand)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:active,inactive'
            ]);

            $brand->update(['status' => $validated['status']]);

            return response()->json([
                'success' => true,
                'data' => $brand,
                'message' => 'Brand status updated successfully'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update brand status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all active brands for frontend (public route)
     */
    public function activeBrands()
    {
        try {
            $brands = Brand::where('status', 'active')
                          ->orderBy('name', 'asc')
                          ->get();
            
            return response()->json([
                'success' => true,
                'data' => $brands,
                'message' => 'Active brands retrieved successfully'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active brands',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
