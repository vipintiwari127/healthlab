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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('ProfilePhoto')->nullable();               // Stores file path or filename
            $table->string('Qualification');
            $table->string('YearsofExperience');
            $table->json('languages');                    // Stores checkbox values as JSON
            $table->string('email');
            $table->string('gender');
            $table->string('zip');
            $table->string('DateofBirth');
            $table->string('City');
            $table->text('address');
            $table->text('specialization');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};