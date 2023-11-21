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
            $table->string('furnishings', 20);
            $table->string('condition', 30);
            $table->unsignedTinyInteger('year_built');
            $table->string('registered', 20);
            $table->decimal('deposit', 10, 2);
            $table->integer('payment_schedule');
            $table->date('available_from');
            $table->integer('available_now');
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
        Schema::dropIfExists('listing_details');
    }
};
