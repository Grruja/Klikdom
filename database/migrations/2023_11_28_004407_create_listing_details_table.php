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
            $table->string('furnishings', 20)->nullable();
            $table->string('condition', 30)->nullable();
            $table->unsignedInteger('year_built')->nullable();
            $table->string('registered', 20)->nullable();
            $table->integer('deposit')->nullable();
            $table->integer('payment_schedule');
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
