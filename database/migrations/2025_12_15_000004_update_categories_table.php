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
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('level')->default(0)->after('parent_id');
            $table->integer('sort_order')->default(0)->after('level');
            $table->string('icon')->nullable()->after('image_url');
            $table->softDeletes();
            
            // Indexes
            $table->index(['parent_id', 'sort_order']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex(['parent_id', 'sort_order']);
            $table->dropIndex(['status']);
            $table->dropSoftDeletes();
            $table->dropColumn(['level', 'sort_order', 'icon']);
        });
    }
};

