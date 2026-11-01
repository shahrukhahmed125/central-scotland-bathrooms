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
        Schema::create('gallery_contents', function (Blueprint $table) {
            $table->id();

            // Page Hero
            $table->string('hero_eyebrow')->default('OUR WORK');
            $table->string('hero_title')->default('Bathroom Transformations Across Central Scotland');
            $table->text('hero_lead')->default('Explore our completed bathroom installations, from contemporary wet wall panels to beautifully tiled finishes. Every project reflects our commitment to quality workmanship and keeping you informed throughout the job.');
            $table->string('hero_note')->default('Wet wall and tiled bathrooms, fitted with care since 2019.');

            // CTA Section
            $table->string('cta_title')->default('Planning a New Bathroom?');
            $table->text('cta_lead')->default('Talk to Robert about your bathroom, compare wet wall and tiled finishes, and get advice on the right solution for your home.');

            // SEO & Social
            $table->string('meta_title')->nullable()->default('Gallery | Scotland Bathrooms');
            $table->text('meta_description')->nullable()->default('Explore our completed bathroom installations across Central Scotland, from contemporary wet wall panels to beautifully tiled finishes.');
            $table->text('meta_keywords')->nullable()->default('bathroom gallery, bathroom installations, wet wall panels, tiled bathrooms, central scotland');
            $table->string('og_title')->nullable()->default('Bathroom Transformations Across Central Scotland');
            $table->text('og_description')->nullable()->default('Explore our completed bathroom installations across Central Scotland, from contemporary wet wall panels to beautifully tiled finishes.');
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_contents');
    }
};
