<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karbar_prodoct', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karbar_id');
            $table->foreign('karbar_id')->references('id')->on('karbars');

            $table->integer('prodoct_id');
            $table->foreign('prodoct_id')->references('id')->on('prodocts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favs');
    }
}
