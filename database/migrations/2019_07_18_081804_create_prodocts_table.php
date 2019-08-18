<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdoctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodocts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('seo');
            $table->integer('dasteh1');
            $table->integer('dasteh2');
            $table->integer('dasteh3');
            $table->string('gheymat');
            $table->string('takhfif');
            $table->string('pic');
            $table->text('dis');
            $table->text('estefadeh');
            $table->integer('brand_id');
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
        Schema::dropIfExists('prodocts');
    }
}
