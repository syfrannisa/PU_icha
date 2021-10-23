<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPbjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pbj', function (Blueprint $table) {
            $table->integer('id_kpa')->unsigned()->nullable();
            $table->integer('id_program')->unsigned()->nullable();
            $table->integer('id_kegiatan')->unsigned()->nullable();
            $table->integer('id_pptk')->unsigned()->nullable();
            $table->integer('id_sub_kegiatan')->unsigned()->nullable();
            $table->integer('id_rincian')->unsigned()->nullable();
            $table->integer('id_sub_rincian')->unsigned()->nullable();

            $table->integer('pagu_anggaran')->nullable();
            $table->integer('nilai_kontrak')->nullable();
            $table->string('pelaksana')->nullable();
            $table->string('nomor_kontrak')->nullable();
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
            $table->string('sistem_pengadaan')->nullable();
            $table->string('fisik')->nullable();
            $table->integer('rupiah')->nullable();
            $table->integer('sisa_dana')->nullable();
            $table->string('catatan_masalah')->nullable();

            $table->foreign('id_kpa')->references('id')->on('kpa')->onDelete('cascade');
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
            $table->foreign('id_kegiatan')->references('id')->on('kegiatan')->onDelete('cascade');
            $table->foreign('id_pptk')->references('id')->on('pptk')->onDelete('cascade');
            $table->foreign('id_sub_kegiatan')->references('id')->on('sub_kegiatan')->onDelete('cascade');
            $table->foreign('id_rincian')->references('id')->on('rincian_subk_kegiatan')->onDelete('cascade');
            $table->foreign('id_sub_rincian')->references('id')->on('sub_rincian')->onDelete('cascade');
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
        Schema::dropIfExists('data_pbj');
    }
}
