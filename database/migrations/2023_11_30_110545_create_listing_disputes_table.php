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
        Schema::create('listing_disputes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('listing_id');
            $table->json('supporting_files');
            $table->text('description');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->foreign('listing_id')
                    ->references('id')
                    ->on('listings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_disputes');
    }
};
