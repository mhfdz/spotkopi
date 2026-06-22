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
            $table->string('slug')->unique();

            $table->string('jam_operasional')->nullable();

            $table->string('wifi')->nullable();
            $table->string('colokan')->nullable();
            $table->string('kebisingan')->nullable();

            $table->boolean('ac')->default(false);

            $table->integer('price_min')->nullable();
            $table->integer('price_max')->nullable();

            $table->string('payment_method')->nullable();

            $table->text('maps_url')->nullable();
            $table->text('foto_url')->nullable();

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