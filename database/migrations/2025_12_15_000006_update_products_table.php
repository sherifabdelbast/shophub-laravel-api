<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add new columns after existing ones
            $table->string('slug')->unique()->after('name');
            $table->text('short_description')->nullable()->after('slug');
            $table->decimal('cost_price', 10, 2)->nullable()->after('brand_id');
            $table->integer('discount_percentage')->nullable()->after('discount_price');
            $table->integer('low_stock_threshold')->default(10)->after('stock');
            $table->enum('stock_status', ['in_stock', 'out_of_stock', 'low_stock'])->default('in_stock')->after('low_stock_threshold');
            $table->decimal('weight', 8, 2)->nullable()->after('image_url');
            $table->json('dimensions')->nullable()->after('weight');
            $table->integer('reviews_count')->default(0)->after('rating');
            $table->integer('views_count')->default(0)->after('reviews_count');
            $table->integer('sold_count')->default(0)->after('views_count');
            $table->boolean('is_featured')->default(false)->after('sold_count');
            $table->string('meta_title')->nullable()->after('is_featured');
            $table->text('meta_description')->nullable()->after('meta_title');
            
            // Remove gallery column (we'll use product_images table)
            $table->dropColumn('gallery');
            
            // Change status enum
            $table->dropColumn('status');
        });
        
        Schema::table('products', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive', 'draft'])->default('active')->after('meta_description');
            $table->softDeletes();
            
            // Indexes
            $table->index(['category_id', 'status']);
            $table->index(['brand_id', 'status']);
            $table->index('is_featured');
            $table->index('rating');
            $table->index('created_at');
            $table->index('status');
            
            // Only create fulltext index on databases that support it (MySQL, MariaDB, PostgreSQL)
            if (Schema::getConnection()->getDriverName() !== 'sqlite') {
                $table->fullText(['name', 'description']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['category_id', 'status']);
            $table->dropIndex(['brand_id', 'status']);
            $table->dropIndex(['is_featured']);
            $table->dropIndex(['rating']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['status']);
            if (Schema::getConnection()->getDriverName() !== 'sqlite') {
                $table->dropFullText(['name', 'description']);
            }
            $table->dropSoftDeletes();
            
            $table->dropColumn([
                'slug', 'short_description', 'cost_price', 'discount_percentage',
                'low_stock_threshold', 'stock_status', 'weight', 'dimensions',
                'reviews_count', 'views_count', 'sold_count', 'is_featured',
                'meta_title', 'meta_description', 'status'
            ]);
            
            $table->json('gallery')->nullable();
            $table->enum('status', ['active', 'inactive', 'deleted'])->default('active');
        });
    }
};

