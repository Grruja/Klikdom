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
            $table->string('property_number');
            $table->string('construction_material', 30);
            $table->string('heating', 30);
            $table->json('interior_rooms');
            $table->float('rooms_number', 2, 1);
            $table->string('floor', 30);
            $table->integer('total_floors');
            $table->integer('storey_number');
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
