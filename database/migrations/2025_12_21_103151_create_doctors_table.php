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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('qualification')->nullable();
            $table->json('specialties')->nullable(); // array of strings
            $table->string('experience')->nullable();  // e.g. "12 years"
            $table->string('patients')->nullable();    // e.g. "2,500+"
            $table->longText('approach')->nullable();  // rich text
            $table->string('image')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('available')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
