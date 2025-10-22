<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'image_url',
        'status'
    ];

    // فئة رئيسية
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // فئات فرعية
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // المنتجات المرتبطة
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
