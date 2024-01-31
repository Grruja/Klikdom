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
        Schema::create('listing_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->string('construction_material', 30)->nullable();
            $table->enum('year_built', config('enumOptions.listing_details.year_built'))->nullable();
            $table->string('property_number', 30)->nullable();
            $table->enum('condition', config('enumOptions.listing_details.condition'))->nullable();
            $table->string('water_supply', 20)->nullable();
            $table->enum('furnishings', config('enumOptions.listing_details.furnishings'))->nullable();
            $table->date('available_from')->nullable();
            $table->integer('available_now')->nullable();
            $table->text('description')->nullable();

            $table->foreign('listing_id')->references('id')->on('listings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_details');
    }
};
