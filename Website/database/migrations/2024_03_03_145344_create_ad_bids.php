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
        Schema::create('ad_bids', function (Blueprint $table) {
            $table->id();
            $table->double('bid');
            $table->unsignedBigInteger('ad_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('ad_id')->references('id')->on('ad');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_bids');
    }
};
