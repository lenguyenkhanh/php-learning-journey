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
        Schema::create('tour', function (Blueprint $table) {
            $table->id('tourID');
            $table->string('title');
            $table->string('description');
            $table->integer('images');
            $table->integer('quantity');
            $table->double('priceAdult');
            $table->double('priceChild');
            $table->string('duration');
            $table->string('destination');
            $table->boolean('availability')->default(true);
            $table->string('itinerary');
            $table->string('review');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour');
    }
};
