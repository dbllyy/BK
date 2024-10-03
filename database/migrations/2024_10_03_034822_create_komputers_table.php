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
            $table->unsignedBigInteger('cabang_id'); // Foreign key to 'cabangs'
            $table->integer('jumlah');
            $table->enum('kondisi', ['baru', 'second']);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('cabang_id')->references('No_Cabang')->on('cabangs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('komputers');
    }
}
