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
            $table->unsignedTinyInteger('elevator')->nullable();
            $table->json('parking')->nullable();
            $table->json('garage')->nullable();
            $table->string('internet_type', 20)->nullable();
            $table->unsignedTinyInteger('smoking_allowed')->nullable();
            $table->unsignedTinyInteger('pets_allowed')->nullable();
            $table->json('additional')->nullable();

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
