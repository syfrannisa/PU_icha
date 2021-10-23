<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubRincianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_rincian', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_rincian')->unsigned()->nullable();
            $table->string('nama_sub_rincian')->nullable();
            $table->foreign('id_rincian')->references('id')->on('rincian_subk_kegiatan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_rincian');
    }
}
