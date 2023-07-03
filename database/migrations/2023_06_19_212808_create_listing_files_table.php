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
        Schema::create('listing_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->unsignedBigInteger('listing_id')->nullable();
            $table->string('name')->nullable();
            $table->string('folder')->nullable();
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_files');
    }
};
