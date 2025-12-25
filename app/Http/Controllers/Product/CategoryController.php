<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
      public function index(Request $request)
    {
        $query = Category::with(['parent', 'children']);

        // Search filter
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        // Status filter
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Parent filter (for subcategories)
        if ($request->has('parent_id')) {
            $query->where('parent_id', $request->parent_id);
        }

        $categories = $query->latest()->paginate($request->get('per_page', 15));

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        try {
            // Generate slug
            $validated['slug'] = Str::slug($validated['name']);

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('categories', 'public');
                $validated['image_url'] = Storage::url($imagePath);
            }

            $category = Category::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully',
                'data' => $category->load(['parent', 'children'])
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Category $category)
    {
        $category->load(['parent', 'children']);
        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }

public function update(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        'description' => 'nullable|string|max:500',
        'parent_id' => 'nullable|sometimes|exists:categories,id',
        'image' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'status' => 'required|in:active,inactive'
    ]);

    try {
        // Generate slug if name changed
        if ($validated['name'] !== $category->name) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle parent_id - convert empty string to null
        if (isset($validated['parent_id']) && $validated['parent_id'] === '') {
            $validated['parent_id'] = null;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image_url) {
                $oldImage = str_replace('/storage/', '', $category->image_url);
                Storage::disk('public')->delete($oldImage);
            }

            $imagePath = $request->file('image')->store('categories', 'public');
            $validated['image_url'] = Storage::url($imagePath);
        }

        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => $category->load(['parent', 'children'])
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to update category',
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function destroy(Category $category)
    {
        // Check if category has products or subcategories
        if ($category->products()->count() > 0 || $category->children()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category. It has associated products or subcategories.'
            ], 422);
        }

        try {
            // Delete image if exists
            if ($category->image_url) {
                $oldImage = str_replace('/storage/', '', $category->image_url);
                Storage::disk('public')->delete($oldImage);
            }

            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getParentCategories()
    {
        $categories = Category::whereNull('parent_id')
            ->where('status', 'active')
            ->get(['id', 'name']);

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function updateStatus(Request $request, Category $category)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive'
        ]);

        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category status updated successfully',
            'data' => $category
        ]);
    }

}
