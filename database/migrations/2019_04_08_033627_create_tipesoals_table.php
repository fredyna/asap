<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipesoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipe');
            $table->string('deskripsi')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Artisan::call('db:seed', array('--class' => 'TipeSoalSeeder'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe_soal');
    }
}
