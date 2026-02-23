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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->enum('category', ['IT', 'PHOTOGRAPHY', 'THOUGHTS'])->default('IT');
            $table->timestamp('published_at')->nullable();
            $table->string('image_url')->nullable();
            $table->enum('status', ['Published', 'Draft'])->default('Draft');
            $table->integer('views_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->integer('reading_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
