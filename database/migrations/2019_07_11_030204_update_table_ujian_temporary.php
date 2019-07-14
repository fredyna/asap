<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableUjianTemporary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ujian_temporaries', function (Blueprint $table) {
            $table->dropForeign('ujian_temporaries_ujian_id_foreign');
            $table->dropForeign('ujian_temporaries_user_id_foreign');
            $table->dropColumn('ujian_id');
            $table->dropColumn('user_id');
            $table->bigInteger('ujian_user_id')->unsigned()->default(0)->after('id');
            $table->string('jawaban', 500)->nullable()->change();

            $table->foreign('ujian_user_id')
                ->references('id')->on('ujian_users')
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
            $table->dropForeign('ujian_temporaries_ujian_user_id_foreign');
            $table->bigInteger('ujian_id')->unsigned()->default(0)->after('id');
            $table->bigInteger('user_id')->unsigned()->default(0)->after('ujian_id');
        });
    }
}
