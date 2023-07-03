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
        Schema::create('app_visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('device');
            $table->string('browser');
            $table->integer('hits');
            $table->string('os');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_visits');
    }
};
