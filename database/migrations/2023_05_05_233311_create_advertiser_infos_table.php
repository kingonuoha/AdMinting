<?php

use App\Models\AdvertiserInfo;
use App\Models\User;
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
        Schema::create('advertiser_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('bio')->nullable();
            $table->string('dob')->nullable();
            $table->json('work_experience')->nullable();
            $table->string('category')->nullable();
            $table->string('educational_status')->nullable();
            $table->json('education')->nullable();
            $table->json('phone_number')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->enum('religion', AdvertiserInfo::$religion)->nullable();
            $table->string('state')->nullable();
            // note that 0000 means all price tags 
            $table->integer('min_price')->default(0000);
            $table->integer('max_price')->default(0000);
            $table->integer('lga_NG')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertiser_infos');
    }
};
