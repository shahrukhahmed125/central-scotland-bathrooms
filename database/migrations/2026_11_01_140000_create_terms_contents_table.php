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
        Schema::create('terms_contents', function (Blueprint $table) {
            $table->id();

            // Page Hero
            $table->string('hero_title')->default('Terms of use');

            // Document Body
            $table->string('last_updated')->default('14 October 2026');
            $table->longText('content')->nullable();

            // SEO & Social
            $table->string('meta_title')->nullable()->default('Terms of Use | Central Scotland Bathroom Consultancy');
            $table->text('meta_description')->nullable()->default('Terms of use for the Central Scotland Bathroom Consultancy website.');
            $table->text('meta_keywords')->nullable()->default('terms of use, terms and conditions, scotland bathrooms');
            $table->string('og_title')->nullable()->default('Terms of use');
            $table->text('og_description')->nullable()->default('Terms of use for the Central Scotland Bathroom Consultancy website.');
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms_contents');
    }
};
