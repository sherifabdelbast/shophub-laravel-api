<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'category_id',
        'brand_id',
        'price',
        'discount_price',
        'stock',
        'sku',
        'image_url',
        'gallery',
        'rating',
        'status'
    ];

    protected $casts = [
        'gallery' => 'array',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'rating' => 'decimal:2'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
