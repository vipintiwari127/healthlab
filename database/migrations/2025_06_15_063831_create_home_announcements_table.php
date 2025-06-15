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
        Schema::create('home_announcements', function (Blueprint $table) {
            $table->id();
               $table->string('title');
            $table->string('button_name');
            $table->string('link');
            $table->text('message');
            $table->boolean('display_announcement')->default(true);
            $table->boolean('display_query_form')->default(true);
            $table->boolean('show_name_field')->default(true);
            $table->boolean('show_email_field')->default(true);
            $table->boolean('show_phone_field')->default(true);
            $table->boolean('show_message_field')->default(true);
            $table->boolean('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_announcements');
    }
};

