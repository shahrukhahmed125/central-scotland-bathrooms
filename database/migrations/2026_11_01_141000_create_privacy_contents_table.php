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
        Schema::create('privacy_contents', function (Blueprint $table) {
            $table->id();

            // Page Hero
            $table->string('hero_title')->default('Privacy policy');

            // Document Body
            $table->string('last_updated')->default('14 October 2026');
            $table->longText('content')->nullable();

            // SEO & Social
            $table->string('meta_title')->nullable()->default('Privacy Policy | Central Scotland Bathroom Consultancy');
            $table->text('meta_description')->nullable()->default('Privacy policy explaining how Central Scotland Bathroom Consultancy handles your personal information.');
            $table->text('meta_keywords')->nullable()->default('privacy policy, data protection, gdpr, scotland bathrooms');
            $table->string('og_title')->nullable()->default('Privacy policy');
            $table->text('og_description')->nullable()->default('Privacy policy explaining how Central Scotland Bathroom Consultancy handles your personal information.');
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_contents');
    }
};
