<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('reference');
            $table->integer('max_attempts');
            $table->float('pass_percentage');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz');
    }
}
