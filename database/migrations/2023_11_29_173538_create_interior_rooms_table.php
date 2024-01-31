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
        Schema::create('interior_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->enum('room_name', config('enumOptions.interior_rooms.room_name'))->nullable();

            $table->foreign('listing_id')->references('id')->on('listings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interior_rooms');
    }
};
