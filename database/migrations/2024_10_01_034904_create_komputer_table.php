<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomputerTable extends Migration
{
    public function up()
    {
        Schema::create('komputer', function (Blueprint $table) {
            $table->id('id_komputer'); // Primary Key
            $table->foreignId('id_cabang')->constrained('cabang')->onDelete('cascade'); // Foreign Key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key
            $table->string('merek');
            $table->enum('kondisi', ['baru', 'second']);
            $table->text('keterangan')->nullable();
            $table->enum('tipe_service', ['hardware', 'software', 'jaringan']);
            $table->timestamps(); // timestamps diterima
        });
    }

    public function down()
    {
        Schema::dropIfExists('komputer');
    }
}
