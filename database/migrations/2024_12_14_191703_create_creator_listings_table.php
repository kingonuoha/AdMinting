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
        Schema::create('creator_listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id'); // References `users` table
            $table->unsignedBigInteger('social_page_id')->nullable(); // References `social_pages` table
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->json('media')->nullable(); // Stores JSON for media data
            $table->enum('status', ['published', 'awaiting approval', 'admin declined', "draft"])->default("draft");
            $table->timestamps();
            $table->softDeletes(); // Enables soft delete
        
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('social_page_id')->references('id')->on('social_pages')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creator_listings');
    }
};
