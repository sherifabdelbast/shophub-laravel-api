<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Guards against a coupon being recorded twice for the same order
     * by enforcing a unique constraint on the (coupon_id, order_id) pair.
     */
    public function up(): void
    {
        Schema::table('coupon_usage', function (Blueprint $table) {
            $table->unique(['coupon_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupon_usage', function (Blueprint $table) {
            $table->dropUnique(['coupon_id', 'order_id']);
        });
    }
};
