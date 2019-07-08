<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('soal_id')->unsigned();
            $table->bigInteger('ujian_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('soal_id')->references('id')->on('soal')
                    ->onDelete('cascade');
            $table->foreign('ujian_id')->references('id')->on('ujian')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('soal_soal_id_foreign');
        Schema::dropForeign('soal_ujian_id_foreign');
        Schema::dropIfExists('soal_ujian');
    }
}
