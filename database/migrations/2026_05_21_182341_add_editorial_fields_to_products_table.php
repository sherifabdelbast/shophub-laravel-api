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
            $table->string('series', 64)->nullable()->after('slug');
            $table->string('material', 64)->nullable()->after('series');
            $table->string('alt', 255)->nullable()->after('image_url');
            $table->date('released_at')->nullable()->after('alt');
            $table->string('badge', 64)->nullable()->after('released_at');
            $table->text('atelier_note')->nullable()->after('description');
            $table->json('specs')->nullable()->after('dimensions');
            $table->json('gallery')->nullable()->after('specs');
            $table->json('related_slugs')->nullable()->after('gallery');

            $table->index('material');
            $table->index('released_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['material']);
            $table->dropIndex(['released_at']);
            $table->dropColumn(['series', 'material', 'alt', 'released_at', 'badge', 'atelier_note', 'specs', 'gallery', 'related_slugs']);
        });
    }
};
