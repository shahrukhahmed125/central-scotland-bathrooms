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
        Schema::table('services', function (Blueprint $table) {
            $table->enum('icon_color', ['white', 'orange', 'coral', 'brand'])->default('white')->after('icon_name');
            $table->enum('card_style', ['default', 'coral', 'brand'])->default('default')->after('icon_color');
            $table->json('chip_icons')->nullable()->after('chips');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['icon_color', 'card_style', 'chip_icons']);
        });
    }
};
