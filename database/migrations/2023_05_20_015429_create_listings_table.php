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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('location');
            $table->integer('price')->nullable();
            $table->date('due_date')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_highlighted')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('onboarded_by')->nullable();
            $table->date('onboarded_on')->nullable();
            $table->date('creator_marked_complete_on')->nullable();
            $table->date('completed_on')->nullable();
            $table->text('content');
            $table->string('apply_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
