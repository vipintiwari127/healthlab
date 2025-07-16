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
        Schema::create('lab_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_partner_id');
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('category_id');
            $table->decimal('lab_mrp_price', 8, 2);
            $table->decimal('lab_net_price', 8, 2)->nullable();
            $table->decimal('offer_price', 8, 2)->nullable();
            $table->string('reporting_time')->nullable();
            $table->enum('service_type', ['Lab', 'Home', 'Both']);
            $table->string('specimen_requirement')->nullable();
            $table->string('patient_name');
            $table->integer('age')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('pin_code')->nullable();
            $table->text('address')->nullable();
            $table->time('lab_time')->nullable();
            $table->timestamps();

            // You can add foreign keys if needed like:
            // $table->foreign('lab_partner_id')->references('id')->on('lab_partners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_bookings');
    }
};
