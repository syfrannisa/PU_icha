<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianSubkKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_subk_kegiatan', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_sub_kegiatan')->unsigned()->nullable();
            $table->string('nama_rincian')->nullable();
            $table->foreign('id_sub_kegiatan')->references('id')->on('sub_kegiatan')->onDelete('cascade');
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
        Schema::dropIfExists('rincian_subk_kegiatan');
    }
}
