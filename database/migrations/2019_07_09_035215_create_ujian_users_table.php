<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ujian_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->tinyInteger('jawaban_benar')->default(0);
            $table->tinyInteger('jawaban_salah')->default(0);
            $table->tinyInteger('jawaban_kosong')->default(0);
            $table->softDeletes();
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
        Schema::table('ujian_users', function (Blueprint $table) {
            $table->dropForeign('ujian_users_ujian_id_foreign');
            $table->dropForeign('ujian_users_user_id_foreign');
        });

        Schema::dropIfExists('ujian_users');
    }
}
