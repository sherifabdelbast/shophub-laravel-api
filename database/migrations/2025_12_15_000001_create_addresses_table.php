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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->enum('type', ['shipping', 'billing', 'both'])->default('shipping');
            $table->string('label', 50)->nullable(); // Home, Work, etc.
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('phone', 20);
            $table->string('email')->nullable();
            $table->string('street_line_1');
            $table->string('street_line_2')->nullable();
            $table->string('city', 100);
            $table->string('state_province', 100);
            $table->string('postal_code', 20);
            $table->char('country', 2)->default('US'); // ISO country code
            $table->text('delivery_instructions')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();
            
            // Indexes
            $table->index(['user_id', 'is_default']);
            $table->index(['user_id', 'type']);
            $table->index('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

