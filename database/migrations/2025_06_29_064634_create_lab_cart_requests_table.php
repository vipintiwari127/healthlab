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
        Schema::create('lab_cart_requests', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique()->after('id');
            $table->enum('type', ['lab', 'home']);
            $table->date('date');
            $table->time('time');
            $table->string('pincode')->nullable();
            $table->string('address')->nullable();
            $table->string('lab_name')->nullable();
            $table->string('lab_address')->nullable();
            $table->string('lab_net_price')->nullable();
            $table->string('lab_offer_price')->nullable();
            $table->string('lab_report_time')->nullable();
            $table->string('patient_name')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->enum('status', ['Pending', 'Confirmed'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_cart_requests');
    }
};
