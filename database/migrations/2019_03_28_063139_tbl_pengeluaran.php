<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tujuan')->nullable();
            $table->string('tgl_keluar')->nullable();
            $table->integer('petugas_id')->nullable();
            $table->string('petugas_nama')->nullable();
            $table->text('file_sn_out')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pengeluaran');
    }
}