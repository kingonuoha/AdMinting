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
        Schema::create('deal_purchases', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('deal_id'); // References `deals` table
            $table->unsignedBigInteger('buyer_id'); // References `users` table
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
            $table->timestamp('delivery_expires_at')->nullable(); // Expiration timestamp
            $table->json('additional_data')->nullable(); // Buyer-provided answers and optional deals
            $table->timestamps();
        
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade');
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deal_purchases');
    }
};
