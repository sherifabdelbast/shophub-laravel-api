<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Enforces one review per user per product at the database level.
     *
     * NOTE: if deployed against existing data, any pre-existing duplicate
     * (user_id, product_id) rows must be cleaned up first or this will fail.
     */
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unique(['user_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'product_id']);
        });
    }
};
