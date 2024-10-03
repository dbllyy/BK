<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaacaraTable extends Migration // 
{

    public function up()
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('komputer_id');
            $table->unsignedBigInteger('cabang_id');
            $table->string('merek');
            $table->string('service');
            $table->string('status');
            $table->enum('keterangan', ['bisa diambil', 'dikembalikan'])->nullable();
            $table->date('tgl_di_ambil')->nullable();
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
            $table->foreign('komputer_id')->references('id')->on('komputers')->onDelete('cascade');
            $table->foreign('cabang_id')->references('id')->on('cabangs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita_acaras');
    }
}
