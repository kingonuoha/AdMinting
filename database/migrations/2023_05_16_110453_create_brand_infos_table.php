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
        Schema::create('brand_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('brand_name')->nullable();
            $table->longText('description')->nullable();
            $table->string('position')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('logo_path')->nullable();
            $table->json('phone_number')->nullable();
            $table->json('brand_email')->nullable();
            $table->text('location')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_infos');
    }
};
