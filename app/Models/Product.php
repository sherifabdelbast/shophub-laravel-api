<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sku',
        'name',
        'slug',
        'short_description',
        'description',
        'category_id',
        'brand_id',
        'cost_price',
        'price',
        'discount_price',
        'discount_percentage',
        'stock',
        'low_stock_threshold',
        'stock_status',
        'image_url',
        'weight',
        'dimensions',
        'rating',
        'reviews_count',
        'views_count',
        'sold_count',
        'is_featured',
        'meta_title',
        'meta_description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'dimensions' => 'array',
            'price' => 'decimal:2',
            'discount_price' => 'decimal:2',
            'cost_price' => 'decimal:2',
            'weight' => 'decimal:2',
            'rating' => 'decimal:2',
            'is_featured' => 'boolean',
        ];
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_status', 'in_stock');
    }

    public function scopeSearch($query, $term)
    {
        return $query->whereFullText(['name', 'description'], $term);
    }

    // Helper methods
    public function isInStock()
    {
        return $this->stock > 0;
    }

    public function isLowStock()
    {
        return $this->stock <= $this->low_stock_threshold && $this->stock > 0;
    }

    public function hasDiscount()
    {
        return $this->discount_price !== null && $this->discount_price < $this->price;
    }

    public function finalPrice()
    {
        return $this->hasDiscount() ? $this->discount_price : $this->price;
    }

    public function profitMargin()
    {
        if (!$this->cost_price) return null;
        return $this->finalPrice() - $this->cost_price;
    }
}

