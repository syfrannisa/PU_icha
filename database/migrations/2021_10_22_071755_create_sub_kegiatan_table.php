<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kegiatan', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_laporan')->unsigned()->nullable();
            $table->integer('id_kegiatan')->unsigned()->nullable();
            $table->string('nama_sub_kegiatan')->nullable();
            $table->integer('pagu_anggaran')->nullable();
            $table->integer('nilai_kontrak')->nullable();
            $table->integer('rupiah')->nullable();
            $table->integer('sisa_dana')->nullable();
            $table->foreign('id_laporan')->references('id')->on('laporans')->onDelete('cascade');
            $table->foreign('id_kegiatan')->references('id')->on('kegiatan')->onDelete('cascade');
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
        Schema::dropIfExists('sub_kegiatan');
    }
}
