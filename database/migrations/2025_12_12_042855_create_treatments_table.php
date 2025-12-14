<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();

            // Basic program info
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->string('category')->nullable();
            $table->string('duration')->nullable();
            $table->integer('effectiveness')->nullable();  // stored as number only
            $table->text('short_description')->nullable();

            // HTML content sections
            $table->string('content_section_title_1')->nullable();
            $table->longText('content_section_1')->nullable();

            $table->string('content_section_title_2')->nullable();
            $table->longText('content_section_2')->nullable();

            $table->string('content_section_title_3')->nullable();
            $table->longText('content_section_3')->nullable();

            // Includes / bullet list (JSON)
            $table->json('includes')->nullable();

            // Media
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            // Visibility / ordering
            $table->string('status')->default('draft');  // published/draft
            $table->integer('sort_order')->default(0);

            // SEO
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->json('meta_keywords')->nullable();  // ["health", "ayurveda"]
            $table->string('canonical_url')->nullable();
            $table->string('meta_robots')->nullable();  // index,follow / noindex,nofollow

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
