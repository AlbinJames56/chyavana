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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('condition')->nullable();
            $table->string('improvement')->nullable(); // e.g. "80%" or "Significant"
            $table->string('duration')->nullable(); // e.g. "10 weeks"
            $table->text('quote')->nullable();
            $table->string('video_url')->nullable(); // external URL (YouTube/Vimeo)
            $table->string('video_file')->nullable(); // stored path for uploaded video
            $table->string('thumbnail')->nullable(); // optional thumbnail image
            $table->boolean('is_published')->default(true);
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
