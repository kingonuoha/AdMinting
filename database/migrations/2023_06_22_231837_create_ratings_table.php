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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("brand_id")->nullable();
            $table->unsignedBigInteger("applicant_id")->nullable();
            $table->unsignedBigInteger("listing_id")->nullable();
            $table->decimal("experience_rating")->nullable();
            $table->decimal("applicant_rating")->nullable();
            $table->longText("comments")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
