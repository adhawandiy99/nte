<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_do', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_do')->nullable();
            $table->string('tgl_terima')->nullable();
            $table->integer('penerima_id')->nullable();
            $table->string('penerima_nama')->nullable();
            $table->text('file_sn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_do');
    }
}
