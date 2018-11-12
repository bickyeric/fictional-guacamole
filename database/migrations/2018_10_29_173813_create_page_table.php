<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $t) {
            $t->increments('id');
            $t->char('link');
            $t->integer('episode_id')->unsigned();
            $t->integer('source_id')->unsigned();

            $t->foreign('source_id')->references('id')->on('sources')->onUpdate('cascade');
            $t->foreign('episode_id')->references('id')->on('episodes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
