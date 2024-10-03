<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // ID sebagai primary key
            $table->string('NIP'); // Foreign key ke tabel users
            $table->unsignedBigInteger('Komputer_ID'); // Foreign key ke tabel komputers
            $table->unsignedBigInteger('Cabang_ID'); // Foreign key ke tabel cabangs
            $table->string('Merek'); // Kolom merek
            $table->enum('Service', ['install OS', 'service khusus', 'jaringan', 'full service']); // Tipe layanan
            $table->string('Status'); // Kolom status
            $table->timestamp('Di_Kerjakan')->nullable(); // Waktu pengerjaan (nullable)

            // Foreign key constraints
            $table->foreign('NIP')->references('NIP')->on('users')->onDelete('cascade'); // Merujuk ke tabel users
            $table->foreign('Komputer_ID')->references('id')->on('komputers')->onDelete('cascade'); // Merujuk ke tabel komputers
            $table->foreign('Cabang_ID')->references('No_Cabang')->on('cabangs')->onDelete('cascade'); // Merujuk ke tabel cabangs
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
