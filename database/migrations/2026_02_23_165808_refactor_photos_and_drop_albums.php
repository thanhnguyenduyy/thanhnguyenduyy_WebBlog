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
        Schema::table('photos', function (Blueprint $table) {
            // Add new relationship
            $table->foreignId('gallery_category_id')->nullable()->constrained()->onDelete('set null');
            
            // Remove old columns
            $table->dropForeign(['album_id']);
            $table->dropColumn(['album_id', 'category']);
        });

        Schema::dropIfExists('albums');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Not implementing detailed down migration for this major refactor
        // to avoid complexity with dropped tables.
    }
};
