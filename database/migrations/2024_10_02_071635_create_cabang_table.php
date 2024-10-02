<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangTable extends Migration
{
    public function up()
    {
        Schema::create('cabang', function (Blueprint $table) {
            $table->id('No_Cabang');  // Primary key
            $table->string('Nama_Cabang');  // Nama cabang
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cabang');
    }
}
