<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcaraTable extends Migration
{
    public function up()
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('komputer_id'); // Foreign key ke komputers
            $table->unsignedBigInteger('cabang_id'); // Foreign key ke cabangs
            $table->string('NIP'); // Menggunakan NIP sebagai foreign key
            $table->string('merek');
            $table->string('service');
            $table->string('status');
            $table->enum('keterangan', ['bisa diambil', 'dikembalikan'])->nullable();
            $table->date('tgl_di_ambil')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('NIP')->references('NIP')->on('users')->onDelete('cascade'); // Referensi ke NIP di tabel users
            $table->foreign('komputer_id')->references('id')->on('komputers')->onDelete('cascade'); // Referensi ke tabel komputers
            $table->foreign('cabang_id')->references('No_Cabang')->on('cabangs')->onDelete('cascade'); // Referensi ke No_Cabang di tabel cabangs
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita_acaras');
    }
}
