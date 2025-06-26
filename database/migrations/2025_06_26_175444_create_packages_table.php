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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('package_category');
            $table->string('partner');
            $table->text('included_tests');
            $table->float('actual_price')->nullable();
            $table->float('net_price')->nullable();
            $table->float('offer_price')->nullable();
            $table->string('total_parameters')->nullable();
            $table->time('reporting_time');
            $table->string('specimen_requirement');
            $table->string('service_type');
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default('1');
            $table->boolean('feature')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
