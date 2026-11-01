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
        Schema::create('services_contents', function (Blueprint $table) {
            $table->id();

            // Page Hero
            $table->string('hero_title')->default('Bathroom refits, from strip-out to sign-off.');
            $table->text('hero_lead')->default('Wet wall and tiled bathrooms across Central Scotland, handled by one team that keeps you updated every day.');

            // Services Intro
            $table->string('services_title')->default('What every job includes');
            $table->text('services_lead')->default('You deal with one team from the day the old bathroom comes out to the day you sign off the new one.');

            // Guarantee Ribbon
            $table->string('guarantee_amount')->default('£0');
            $table->string('guarantee_title')->default("No fitting cost to pay until you're happy with the whole job.");
            $table->text('guarantee_lead')->default("Check the finished bathroom first. If anything isn't right, we put it right before you pay for the fitting.");

            // FAQ Intro
            $table->string('faq_title')->default('Questions people ask');
            $table->text('faq_lead')->default('Straight answers about how a bathroom refit with us works.');

            // CTA Section
            $table->string('cta_title')->default('Talk to Robert about your bathroom.');
            $table->text('cta_lead')->default('Fitting wet wall and tiled bathrooms across Central Scotland since 2019.');
            $table->integer('since_year')->default(2019);

            // SEO & Social
            $table->string('meta_title')->nullable()->default('Services | Scotland Bathrooms');
            $table->text('meta_description')->nullable()->default('Wet wall and tiled bathroom refits across Central Scotland. Handled by one team from strip-out to sign-off.');
            $table->text('meta_keywords')->nullable();
            $table->string('og_title')->nullable()->default('Bathroom refits, from strip-out to sign-off');
            $table->text('og_description')->nullable()->default('Wet wall and tiled bathrooms across Central Scotland, handled by one team that keeps you updated every day.');
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_contents');
    }
};
