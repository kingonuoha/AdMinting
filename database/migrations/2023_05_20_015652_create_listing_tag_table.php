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
        Schema::create('categories_listing', function (Blueprint $table) {
            $table->unsignedBigInteger('listing_id');
            $table->unsignedBigInteger('categories_id');
            $table->string('listing_type')->default('brand'); // e.g., 'brand' or 'creator'
            $table->timestamps();
        
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_tag');
    }
};
