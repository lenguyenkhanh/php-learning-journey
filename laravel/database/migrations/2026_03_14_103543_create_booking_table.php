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
        Schema::create('booking', function (Blueprint $table) {
            $table->id('bookingID');
            // // Khóa ngoại trỏ tới Tour và User
            $table->foreignId('tourID')->constrained('tour', 'tourID')->onDelete('cascade');
            $table->foreignId('userID')->constrained('users', 'userID')->onDelete('cascade');
            $table->date('bookingDate');
            $table->integer('numAdults');
            $table->integer('numChildren');
            $table->double('totalPrice');
            $table->string('paymentStatus');
            $table->string('bookingStatus');
            $table->text('specialRequests')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
