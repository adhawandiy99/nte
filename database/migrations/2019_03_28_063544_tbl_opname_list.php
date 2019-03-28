<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblOpnameList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_opname_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_nte')->nullable();
            $table->integer('opname_id')->nullable();
            $table->string('stok_terakhir')->nullable();
            $table->string('opname_value')->nullable();
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_opname_list');
    }
}
