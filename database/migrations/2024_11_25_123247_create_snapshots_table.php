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
        Schema::create('snapshots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_page_id')->constrained()->onDelete('cascade'); // Links to social_pages table
            $table->string('title'); // String-based platform
            $table->string('description'); // String-based platform
            $table->string('name'); // String-based platform
            $table->json('data'); // Store complex data structures as JSON
            $table->timestamp('captured_at'); // When the snapshot was taken
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snapshots');
    }
};
