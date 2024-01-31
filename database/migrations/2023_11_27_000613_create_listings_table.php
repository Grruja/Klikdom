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
            $table->string('transaction', 15);
            $table->string('property', 20);
            $table->enum('property_type', config('enumOptions.listings.property_type'))->index();
            $table->unsignedBigInteger('location_id');
            $table->string('street');
            $table->integer('price');
            $table->integer('property_area');
            $table->enum('heating', config('enumOptions.listings.heating'))->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
