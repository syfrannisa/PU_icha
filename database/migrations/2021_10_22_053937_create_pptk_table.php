<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePptkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pptk', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_kpa')->unsigned()->nullable();
            $table->string('nama_pptk')->nullable();
            $table->foreign('id_kpa')->references('id')->on('kpa')->onDelete('cascade');
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
        Schema::dropIfExists('pptk');
    }
}
