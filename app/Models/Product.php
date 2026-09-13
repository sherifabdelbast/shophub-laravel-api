<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'series',
        'material',
        'alt',
        'released_at',
        'badge',
        'atelier_note',
        'specs',
        'gallery',
        'related_slugs',
    ];
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

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
<<<<<<< HEAD
            'specs' => 'array',
            'gallery' => 'array',
            'related_slugs' => 'array'
=======
            'released_at' => 'date',
            'specs' => 'array',
            'gallery' => 'array',
            'related_slugs' => 'array',
>>>>>>> 7c08fc79fdf0567617cc049853bcea94f3aa35fe
        ];
    }

    /**
     * Resolve route model bindings by slug instead of id.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock(Builder $query): Builder
    {
        return $query->where('stock_status', 'in_stock');
    }

    public function scopeSearch(Builder $query, string $term): Builder
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

    public function hasDiscount(): bool
    {
        return $this->discount_price !== null
            && bccomp((string) $this->discount_price, (string) $this->price, 2) < 0;
    }

    public function finalPrice(): string
    {
        $price = $this->hasDiscount() ? $this->discount_price : $this->price;

        // Normalize to a 2-decimal string regardless of source (DB cast or in-memory).
        return bcadd((string) $price, '0', 2);
    }

    public function profitMargin(): ?string
    {
        if ($this->cost_price === null) {
            return null;
        }

        return bcsub($this->finalPrice(), (string) $this->cost_price, 2);
    }
}
