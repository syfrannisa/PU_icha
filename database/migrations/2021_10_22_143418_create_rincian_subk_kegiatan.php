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
        Schema::create('rincian', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_laporan')->unsigned()->nullable();
            $table->integer('id_sub_kegiatan')->unsigned()->nullable();
            $table->string('nama_rincian')->nullable();
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
            $table->foreign('id_sub_kegiatan')->references('id')->on('sub_kegiatan')->onDelete('cascade');
            $table->foreign('id_laporan')->references('id')->on('laporans')->onDelete('cascade');
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
