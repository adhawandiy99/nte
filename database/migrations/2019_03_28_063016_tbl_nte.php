<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblNte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nte', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sn')->nullable();
            $table->string('jenis_nte')->nullable();
            $table->string('merk')->nullable();
            $table->string('model')->nullable();
            $table->integer('do_id')->nullable();
            $table->integer('pengeluaran_id')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_nte');
    }
}
