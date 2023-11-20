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
        Schema::create('listings_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->string('furnishings', 20);
            $table->string('condition', 30);
            $table->integer('year_built');
            $table->string('registered', 40);
            $table->decimal('deposit', 10, 2);
            $table->string('payment_schedule', 20);
            $table->string('available_from', 15);
            $table->text('description');

            $table->foreign('listing_id')->references('id')->on('listings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings_details');
    }
};
