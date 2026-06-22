<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cafes', function (Blueprint $table) {
            // Menambahkan kolom baru setelah kolom maps_url
            $table->string('image_url')->nullable()->after('maps_url');
            $table->string('price_category')->nullable()->after('price_max'); // Contoh: 'Low Budget', 'Sedang', 'Mahal'
        });
    }

    public function down(): void
    {
        Schema::table('cafes', function (Blueprint $table) {
            $table->dropColumn(['image_url', 'price_category']);
        });
    }
};