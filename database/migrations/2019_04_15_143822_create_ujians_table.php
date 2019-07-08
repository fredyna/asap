<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kategori_ujian_id')->unsigned();
            $table->string('nama');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('kategori_ujian_id')
            ->references('id')->on('kategori_ujian')
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
        Schema::dropForeign('ujian_kategori_ujian_id_foreign');
        Schema::dropIfExists('ujian');
    }
}
