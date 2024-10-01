<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangTable extends Migration
{
    public function up()
    {
        Schema::create('cabang', function (Blueprint $table) {
            $table->id('id_cabang'); // Primary Key
            $table->string('nama_cabang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabang');
    }
}
