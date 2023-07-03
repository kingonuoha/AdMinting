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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['creator', 'brand', 'adm_admin'])->default('creator');
            $table->decimal('rating')->default(0.0);
            $table->string('auth_type')->default('sign_in');
            $table->integer('dialogue_last_complete')->default(0);
            $table->boolean('dialogue_complete')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
             // Google socials
             $table->string('social_google_id')->nullable();
             $table->string('social_google_token')->nullable();
             $table->string('social_google_profile')->nullable();
             // Facebook socials
             $table->string('social_facebook_id')->nullable();
             $table->string('social_facebook_token')->nullable();
             $table->string('social_facebook_profile')->nullable();
             // twitter socials
             $table->string('social_twitter_id')->nullable();
             $table->string('social_twitter_token')->nullable();
             $table->string('social_twitter_profile')->nullable();
             // linkedin socials
             $table->string('social_linkedin_id')->nullable();
             $table->longText('social_linkedin_token')->nullable();
             $table->string('social_linkedin_profile')->nullable();
             // INstagram socials
             $table->string('social_instagram_id')->nullable();
             $table->string('social_instagram_token')->nullable();
             $table->string('social_instagram_profile')->nullable();
             // github socials
             $table->string('social_github_id')->nullable();
             $table->string('social_github_token')->nullable();
             $table->string('social_github_profile')->nullable();
             $table->boolean('blocked')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
