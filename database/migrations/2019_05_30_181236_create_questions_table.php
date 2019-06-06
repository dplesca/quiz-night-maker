<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50);
            $table->integer('quiz_id');
            $table->enum('type', ['text', 'song']);
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question', 250);
            $table->string('answer', 250);
            $table->integer('order');
            $table->integer('round_id');
            $table->timestamps();
        });

        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('artist', 250);
            $table->string('song', 250);
            $table->string('youtube_id', 11);
            $table->string('start');
            $table->float('duration');
            $table->integer('order');
            $table->integer('round_id');
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
        Schema::dropIfExists('rounds');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('songs');
    }
}
