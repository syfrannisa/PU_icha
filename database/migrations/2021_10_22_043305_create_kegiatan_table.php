<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_laporan')->unsigned()->nullable();
            $table->integer('id_program')->unsigned()->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('nama_pptk')->nullable();
            $table->integer('pagu_anggaran')->nullable();
            $table->integer('nilai_kontrak')->nullable();
            $table->integer('rupiah')->nullable();
            $table->integer('sisa_dana')->nullable();
            $table->foreign('id_laporan')->references('id')->on('laporans')->onDelete('cascade');
            $table->foreign('id_program')->references('id')->on('program')->onDelete('cascade');
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
        Schema::dropIfExists('kegiatan');
    }
}
