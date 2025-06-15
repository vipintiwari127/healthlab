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
        Schema::create('partner_labs', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('url')->nullable();
            $table->string('website_link')->nullable();
            $table->string('email');
            $table->string('mobile');
            $table->string('contact_person');
            $table->string('contact_person_number');
            $table->text('cc')->nullable();
            $table->text('bcc')->nullable();
            $table->string('ambulance_service');
            $table->string('state_id');
            $table->text('city_id');
            $table->string('pincode')->nullable();
            $table->text('address')->nullable();
            $table->text('services')->nullable();
            $table->string('certification')->nullable();
            $table->string('ultrasound_time')->nullable();
            $table->string('offday')->nullable();
            $table->string('lab_timing')->nullable();
            $table->string('sunday_lab_timing')->nullable();
            $table->string('payment_mode');
            $table->text('description')->nullable();
            $table->text('trust_matter')->nullable();
            $table->string('logo')->nullable();
            $table->string('document')->nullable();
            $table->text('lab_photos')->nullable();
            $table->boolean('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_labs');
    }
};