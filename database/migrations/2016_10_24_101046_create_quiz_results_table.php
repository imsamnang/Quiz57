<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizResultsTable extends Migration
{

    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('quiz_id')->unsigned();
            $table->integer('total_attempt');
            $table->integer('correct_answers');
            $table->float('percentage');
            $table->boolean('passed');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quiz')->onDelete('cascade');
            $table->timestamps();          
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_results');
    }
}
