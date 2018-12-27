<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_artist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('answer_id');
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->integer('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists');
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
        Schema::table('answer_artist', function (Blueprint $table) {
            //
        });
    }
}
