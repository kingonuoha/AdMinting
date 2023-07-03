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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->nullable();
            $table->string('app_email')->nullable();
            $table->string('app_logo')->nullable();
            $table->string('app_facebook')->nullable();
            $table->string('app_youtube')->nullable();
            $table->string('app_instagram')->nullable();
            $table->string('app_linkedin')->nullable();
            $table->json('app_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
