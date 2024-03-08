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
        Schema::create('ad', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->double('price');
            $table->string('postalcode');
            $table->dateTime('rent_start')->nullable();
            $table->dateTime('rent_stop')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->foreignId('type_id');
            $table->foreignId('business_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad');
    }
};
