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
            $table->integer('id_pptk')->unsigned()->nullable();
            $table->string('subkgt')->nullable();
            $table->foreign('id_pptk')->references('id')->on('pptk')->onDelete('cascade');
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
