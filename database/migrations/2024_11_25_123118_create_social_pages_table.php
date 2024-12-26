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
        Schema::create('social_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('social_account_id')->constrained()->onDelete('cascade'); // Links to social_accounts table
            $table->string('platform')->index(); // String-based platform
            $table->string('page_id'); // Unique ID of the page or channel
            $table->json('picture'); // Unique ID of the page or channel
            $table->longText('link')->nullable(); // Unique ID of the page or channel
            $table->longText('about'); // Unique ID of the page or channel
            $table->timestamp('details_gotten_at')->nullable();
            $table->string('page_name');
            $table->string('access_token'); // Access token specific to the page/channel
            $table->timestamp('token_expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_pages');
    }
};
