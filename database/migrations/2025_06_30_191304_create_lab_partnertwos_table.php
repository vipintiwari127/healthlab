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
        Schema::create('lab_partnertwos', function (Blueprint $table) {
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
            $table->enum('ambulance_service', ['Yes', 'No']);
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('pincode')->nullable();
            $table->text('address')->nullable();
            $table->text('services')->nullable();
            $table->text('certification')->nullable();
            $table->time('ultrasound_time')->nullable();
            $table->string('offday')->nullable();
            $table->string('lab_timing')->nullable();
            $table->string('sunday_lab_timing')->nullable();
            $table->text('description')->nullable();
            $table->text('trust_matter')->nullable();
            $table->string('logo')->nullable();
            $table->string('document')->nullable();
            $table->string('lab_photo')->nullable();
            $table->string('location')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->string('center_phone_number')->nullable();
            $table->enum('home_collection_facility', ['Available', 'Not Available']);
            $table->decimal('home_collection_charges', 8, 2);
            $table->string('home_collection_number');
            $table->text('about_us')->nullable();
            $table->string('home_collection_timing');
            $table->string('home_collection_sunday_timing');
            $table->string('our_branches');
            $table->string('facility');
            $table->enum('payment_mode', ['Cash', 'Card', 'UPI', 'Net Banking', 'All']);
            $table->text('navigation')->nullable();
            $table->json('testimonial_rating')->nullable();
            $table->json('testimonial_description')->nullable();
            $table->json('testimonial_name')->nullable();
            $table->json('testimonials_Designation')->nullable();
            $table->json('info_title')->nullable();
            $table->json('info_link')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_partnertwos');
    }
};
