<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomputersTable extends Migration
{
    public function up()
    {
        Schema::create('komputers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('cabang_id'); // Foreign key ke 'cabangs'
            $table->enum('perangkat', ['PC', 'Laptop', 'Printer']); // Jenis perangkat
            $table->string('merk'); // Merk perangkat
            $table->integer('jumlah'); // Jumlah perangkat
            $table->enum('kondisi', ['baru', 'baru rakitan', 'second']); // Kondisi perangkat
            $table->text('keterangan')->nullable(); // Keterangan opsional
            $table->timestamp('diterima')->useCurrent(); // Tanggal otomatis saat data ditambahkan
        });
    }

    public function down()
    {
        Schema::dropIfExists('komputers'); // Menghapus tabel jika migrasi dibatalkan
    }
}
