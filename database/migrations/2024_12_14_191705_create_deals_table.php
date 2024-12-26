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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id'); // References `creator_listings` table
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('is_optional')->default(false); // Indicates if it is an optional deal
            $table->integer('delivery_duration')->nullable(); // Duration in days
            $table->json('questions')->nullable(); // Questions buyers must answer
            $table->timestamps();
        
            $table->foreign('listing_id')->references('id')->on('creator_listings')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
