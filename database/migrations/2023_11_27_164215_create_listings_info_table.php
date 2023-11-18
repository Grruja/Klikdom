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
        Schema::create('listings_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('street');
            $table->string('property_number');
            $table->string('heating');
            $table->string('rooms_number');
            $table->float('storey_number', 3, 1);
            $table->string('floor', 30);
            $table->string('total_floors', 20);
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('listings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_infos');
    }
};
