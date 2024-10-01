<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email unik
            $table->timestamp('email_verified_at')->nullable(); // Tanggal verifikasi email
            $table->string('password'); // Password
            $table->enum('role', ['admin', 'staff', 'user'])->default('user'); // Role pengguna
            $table->rememberToken(); // Token untuk "remember me"
            $table->timestamps(); // timestamps untuk created_at dan updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email sebagai Primary Key
            $table->string('token'); // Token reset password
            $table->timestamp('created_at')->nullable(); // Waktu pembuatan token
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID session sebagai Primary Key
            $table->foreignId('user_id')->nullable()->constrained('users')->index(); // Foreign Key ke tabel users
            $table->string('ip_address', 45)->nullable(); // Alamat IP
            $table->text('user_agent')->nullable(); // User agent
            $table->longText('payload'); // Payload session
            $table->integer('last_activity')->index(); // Waktu terakhir aktivitas
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
}
