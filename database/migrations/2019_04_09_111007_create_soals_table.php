<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipe_soal_id')->unsigned();
            $table->integer('kategori_soal_id')->unsigned();
            $table->text('soal');
            $table->string('jawaban_1', 500);
            $table->string('jawaban_2', 500);
            $table->string('jawaban_3', 500);
            $table->string('jawaban_4', 500)->nullable();
            $table->string('jawaban_benar', 500);
            $table->string('file')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('tipe_soal_id')
                ->references('id')->on('tipe_soal')
                ->onDelete('cascade');

            $table->foreign('kategori_soal_id')
                ->references('id')->on('kategori_soal')
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
        Schema::dropForeign('soal_tipe_soal_id_foreign');
        Schema::dropForeign('soal_ketegori_soal_id_foreign');
        Schema::dropIfExists('soal');
    }
}
