<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{

    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';            
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->integer('option_id')->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
