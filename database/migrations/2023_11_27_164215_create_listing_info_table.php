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
        Schema::create('listing_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->integer('payment_schedule');
            $table->enum('registered', config('enumOptions.listing_info.registered'))->nullable();
            $table->integer('deposit')->nullable();
            $table->enum('rooms_number', config('enumOptions.listing_info.rooms_number'))->index();
            $table->enum('floor', config('enumOptions.listing_info.floor'))->index();
            $table->integer('total_floors');
            $table->integer('storeys_number')->nullable();
            $table->integer('land_area')->nullable();
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_info');
    }
};
