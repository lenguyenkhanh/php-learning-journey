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
    Schema::create('users', function (Blueprint $table) {
        // Sửa id() thành id('userID') để khớp với các bảng khác đang trỏ tới
        $table->id('userID'); 
        $table->string('username')->unique(); // Đổi name thành username cho chuyên nghiệp
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        
        // Thêm các cột bạn cần cho project Hotel Booking
        $table->string('phoneNumber')->nullable();
        $table->string('address')->nullable();
        $table->string('isActive')->default('active');
        $table->string('status')->nullable();
        
        $table->rememberToken();
        $table->timestamps();
        $table->softDeletes(); // Thêm cái này để dùng xóa mềm như mình đã bàn
    });

    // Giữ nguyên 2 bảng này nhưng lưu ý bảng sessions
    Schema::create('password_reset_tokens', function (Blueprint $table) {
        $table->string('email')->primary();
        $table->string('token');
        $table->timestamp('created_at')->nullable();
    });

    Schema::create('sessions', function (Blueprint $table) {
        $table->string('id')->primary();
        // QUAN TRỌNG: Phải đổi user_id thành userID ở đây để đồng bộ
        $table->foreignId('userID')->nullable()->index(); 
        $table->string('ip_address', 45)->nullable();
        $table->text('user_agent')->nullable();
        $table->longText('payload');
        $table->integer('last_activity')->index();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
