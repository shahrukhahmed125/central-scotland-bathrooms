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
            $table->enum('icon_type', ['svg', 'icon', 'image'])->default('icon')->after('image');
            $table->string('icon_name')->nullable()->after('icon_type');
            $table->json('chips')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('icon_type');
            $table->dropColumn('chips');
        });
    }
};
