<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcaraTable extends Migration
{
    public function up()
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('komputer_id'); // Foreign key ke tabel komputers
            $table->unsignedBigInteger('cabang_id'); // Foreign key ke tabel cabangs
            $table->string('NIP'); // Foreign key ke tabel users (menggunakan NIP)
            $table->string('merek'); // Kolom untuk menyimpan merek perangkat
            $table->enum('service', ['install OS', 'service khusus', 'jaringan', 'full service']); // Pilihan jenis layanan
            $table->enum('status', ['pending', 'selesai', 'dalam proses']); // Status layanan
            $table->enum('keterangan', ['bisa diambil', 'dikembalikan'])->nullable(); // Keterangan (nullable)
            $table->date('tgl_di_ambil')->nullable(); // Tanggal pengambilan perangkat (nullable)
            $table->timestamps(); // Otomatis untuk created_at dan updated_at

            // Foreign key constraints
            $table->foreign('NIP')->references('NIP')->on('users')->onDelete('cascade'); // Merujuk ke tabel users
            $table->foreign('komputer_id')->references('id')->on('komputers')->onDelete('cascade'); // Merujuk ke tabel komputers
            $table->foreign('cabang_id')->references('No_Cabang')->on('cabangs')->onDelete('cascade'); // Merujuk ke tabel cabangs
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita_acaras');
    }
}
