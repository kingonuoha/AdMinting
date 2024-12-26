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
        Schema::create('metrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_page_id')->constrained()->onDelete('cascade'); // Links to social_pages table
            $table->string('name'); // e.g., views, likes, followers
            // $table->string('platform')->index(); // String-based platform
            $table->float('value');
            $table->timestamp('captured_at'); // When this metric was fetched from the platform
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metrics');
    }
};
