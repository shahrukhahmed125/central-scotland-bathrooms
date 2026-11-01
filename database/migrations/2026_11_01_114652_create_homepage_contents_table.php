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
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_title')->default('A new bathroom, without the worry.');
            $table->text('hero_lead')->default('Wet wall and tiled bathrooms across Central Scotland. Daily updates from Robert, and you pay the fitting once you\'re happy.');

            // Day Section
            $table->string('day_title')->default('You\'ll hear from us every day of your job.');
            $table->text('day_lead')->default('Robert stays in touch from the first morning to the last, so you always know where your bathroom\'s at.');
            $table->json('day_stops')->nullable();

            // Promise Section
            $table->string('promise_amount')->default('£0');
            $table->string('promise_caption')->default('fitting cost to pay until you\'re happy with the whole job');
            $table->string('promise_title')->default('You pay the fitting cost once you\'re happy.');
            $table->text('promise_lead')->default('Check the finished bathroom first. If anything isn\'t right, we put it right before you pay for the fitting.');
            $table->json('promise_list')->nullable();

            // Walls Section
            $table->string('walls_title')->default('Wet wall or tiles? Compare them on one wall.');
            $table->text('walls_lead')->default('Drag the handle to see both finishes. We fit either, and Robert can help you choose what suits your bathroom.');
            $table->string('tiles_title')->default('Tiled walls');
            $table->json('tiles_list')->nullable();
            $table->string('panels_title')->default('Wet wall panels');
            $table->json('panels_list')->nullable();

            // Process Section
            $table->string('process_title')->default('One team, from strip-out to sign-off.');
            $table->text('process_lead')->default('Every job follows the same four steps, and you hear from Robert at each one.');
            $table->json('process_steps')->nullable();

            // CTA Section
            $table->string('cta_title')->default('Talk to Robert about your bathroom.');
            $table->text('cta_lead')->default('Fitting wet wall and tiled bathrooms across Central Scotland since 2019.');
            $table->integer('since_year')->default(2019);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};
