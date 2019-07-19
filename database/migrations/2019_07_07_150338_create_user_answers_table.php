<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_answers', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->charset = 'utf8';
        $table->collation = 'utf8_general_ci';        
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->integer('userData_appear_id')->unsigned();
        $table->integer('subject_id')->unsigned();
        $table->integer('question_id')->unsigned();
        $table->string('user_response');
        $table->boolean('correct')->default(false);
        $table->integer('time_taken');
        $table->timestamps();
      });

      Schema::table('user_answers', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('subject_id')->references('id')->on('subject_quizzes')->onDelete('cascade');
        $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        $table->foreign('userData_appear_id')->references('id')->on('quiz_results')->onDelete('cascade');
      });
    }
    public function down()
    {
      Schema::dropIfExists('user_answers');
    }
}
