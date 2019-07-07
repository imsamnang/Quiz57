<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizAppearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_appears', function (Blueprint $table) {
          $table->increments('id');
          $table->decimal('marks_scored', 5, 2);
          $table->integer('user_id')->unsigned();
          $table->integer('subject_id')->unsigned();
          $table->string('user_name');            
          $table->timestamps();
        });
        Schema::table('quiz_appears', function (Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('subject_id')->references('id')->on('subject_quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_appears');
    }
}
