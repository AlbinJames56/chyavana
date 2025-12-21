<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pain_techniques', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            // Two content sections
            $table->longText('description')->nullable();   // Section 1
            $table->longText('more_info')->nullable();     // Section 2

            $table->string('image')->nullable();
            $table->string('duration')->nullable();

            $table->boolean('featured')->default(false);
            $table->boolean('available')->default(true);

            $table->json('benefits')->nullable(); // array of bullet points

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pain_techniques');
    }
};
