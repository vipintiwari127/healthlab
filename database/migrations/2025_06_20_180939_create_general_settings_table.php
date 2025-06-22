<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_image')->nullable();
            $table->string('site_name');
            $table->string('search_distance');
            $table->string('primary_phone');
            $table->string('alternative_phone')->nullable();
            $table->string('website_email');
            $table->string('booking_email');
            $table->string('contact_email');
            $table->text('bussiness_address_1');
            $table->text('copyright_context');
            $table->text('footer_about_company');
            $table->json('slider_image')->nullable();
            $table->json('slider_title')->nullable();
            $table->json('button_name')->nullable();
            $table->json('slider_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
