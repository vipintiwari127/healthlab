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
        Schema::create('cities_', function (Blueprint $table) {
            $table->id();
            $table->string('city_countryName');
            $table->string('city_stateName');
            $table->string('cityUrl')->nullable();
            $table->string('city_name')->nullable();
            $table->string('city_about')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities_');
    }
};
