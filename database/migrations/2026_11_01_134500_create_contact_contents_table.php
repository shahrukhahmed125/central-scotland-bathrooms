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
        Schema::create('contact_contents', function (Blueprint $table) {
            $table->id();

            // Page Hero
            $table->string('hero_title')->default('Let’s talk about your bathroom.');
            $table->text('hero_lead')->default('Call, WhatsApp or email Robert, or send your details with the form below.');

            // Direct Contact & Coverage
            $table->string('direct_title')->default('Talk to Robert directly');
            $table->string('coverage_title')->default('We cover Central Scotland.');
            $table->text('coverage_text')->default('Not sure if that includes you? Send your town or postcode and Robert will confirm.');

            // Quote Form Card
            $table->string('form_title')->default('Ask for a quote');
            $table->text('form_lead')->default("Fill in a few details and we'll be in touch to discuss your bathroom project.");
            $table->string('form_note')->default('Prefer to call or message directly? Use the contact options above.');

            // SEO & Social
            $table->string('meta_title')->nullable()->default('Contact | Scotland Bathrooms');
            $table->text('meta_description')->nullable()->default('Get in touch with Robert for a bathroom quote across Central Scotland. Call, WhatsApp, email or send your details.');
            $table->text('meta_keywords')->nullable()->default('contact scotland bathrooms, bathroom quote, bathroom fitters central scotland');
            $table->string('og_title')->nullable()->default('Let’s talk about your bathroom.');
            $table->text('og_description')->nullable()->default('Call, WhatsApp or email Robert, or send your details for a free bathroom refit consultation across Central Scotland.');
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_contents');
    }
};
