<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAverageScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('average_scores', function (Blueprint $table) {
            $table->increments('avgid');
            $table->integer('user_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->decimal('avg_score', 5, 2);
            $table->integer('appear_count');
            $table->timestamps();
        });

        Schema::table('average_scores', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subject_quizzes')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('average_scores');
    }
}
