<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianTemporariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_temporaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ujian_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('soal_id')->unsigned();
            $table->string('jawaban', 500);
            $table->timestamps();

            $table->foreign('ujian_id')
                ->references('id')->on('ujian')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::table('ujian_temporaries', function (Blueprint $table) {
            $table->dropForeign('ujian_temporaries_ujian_id_foreign');
            $table->dropForeign('ujian_temporaries_user_id_foreign');
        });

        Schema::dropIfExists('ujian_temporaries');
    }
}
