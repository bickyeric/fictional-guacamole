<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodeSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_source', function (Blueprint $table) {
            $table->integer('source_id')->unsigned();
            $table->integer('episode_id')->unsigned();
            $table->char('link', 255);

            $table->foreign('source_id')->references('id')->on('sources')->onUpdate('cascade');
            $table->foreign('episode_id')->references('id')->on('episodes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode_source');
    }
}
