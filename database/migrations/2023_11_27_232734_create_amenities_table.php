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
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->unsignedTinyInteger('elevator');
            $table->json('infrastructure');
            $table->json('parking');
            $table->json('garage');
            $table->string('water_supply', 20);
            $table->string('internet_type', 20);
            $table->boolean('smoking_allowed');
            $table->boolean('pets_allowed');
            $table->json('additional');

            $table->foreign('listing_id')->references('id')->on('listings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenities');
    }
};
