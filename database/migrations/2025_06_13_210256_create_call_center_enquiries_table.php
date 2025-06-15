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
        Schema::create('call_center_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('prefix')->nullable();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('remark')->nullable();
            $table->string('lab_partner')->nullable();
            $table->string('test_package')->nullable();
            $table->string('medicine')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_center_enquiries');
    }
};
