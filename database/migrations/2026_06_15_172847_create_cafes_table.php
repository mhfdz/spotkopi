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
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('operating_hours')->nullable();
            $table->string('wifi_quality')->nullable();
            $table->string('power_outlets')->nullable();
            $table->string('noise_level')->nullable();
            $table->boolean('air_conditioner')->default(false);
            $table->integer('price_min')->nullable();
            $table->integer('price_max')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('maps_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafes');
    }
};