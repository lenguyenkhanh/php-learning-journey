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
        Schema::create('chat', function (Blueprint $table) {
            $table->id('chatID');
            $table->foreignId('userID')->constrained('users', 'userID')->onDelete('cascade');
            $table->foreignId('adminID')->constrained('admin','adminID') ->onDelete('cascade');
            $table->text('message');
            $table->boolean('readStatus')->default(false);
            $table->date('createdDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat');
    }
};
