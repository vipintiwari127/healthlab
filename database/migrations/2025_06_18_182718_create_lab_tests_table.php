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
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('lab_partner_id');
            $table->integer('test_id');
            $table->string('category');
            $table->decimal('lab_mrp_price', 10, 2);
            $table->decimal('lab_net_price', 10, 2)->nullable();
            $table->decimal('offer_price', 10, 2)->nullable();
            $table->string('reporting_time')->nullable();
            $table->string('specimen_requirement')->nullable();
            $table->string('service_type');
            $table->text('description')->nullable();
            $table->boolean('feature')->default('1');
            $table->boolean('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_tests');
    }
};
