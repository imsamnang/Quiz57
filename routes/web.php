<?php

use Illuminate\Support\Facades\DB;

Auth::routes();
Route::get('/','HomeController@index');
Route::get('front','Quiz\QuizController@front')->name('front')->middleware('auth');
Route::get('/home', 'HomeController@viewAllQuiz')->name('home');

// Quiz Subject
    Route::group(['as'=>'quiz.','prefix'=>'quiz/','namespace'=>'Quiz','middleware' =>['auth']],function (){
    Route::get('subject','QuizController@index')->name('subject.index');
    Route::get('subject/create','QuizController@create')->name('subject.create');
    Route::post('subject/save','QuizController@store')->name('subject.store');
    Route::get('subject/{quiz}/show','QuizController@show')->name('subject.show');
    Route::delete('subject/{quiz}/delete', 'QuizController@destroy')->name('subject.destroy');

    Route::get('takequiz/{quiz}', 'QuizController@takeQuiz')->name('start.quiz');
    Route::post('nextclick', 'QuizController@nextClickStore')->name('next.quiz');
    Route::post('finishQuiz', 'QuizController@storeQuiz')->name('finish.quiz');

    Route::get('/userResults', 'UserController@showAppearedQuiz')->name('user.result');
    Route::get('/viewSigleResult/{quizappearid}', 'UserController@singleResult')->name('single.result');
    Route::get('/quizLeaderboard/{quiz}', 'UserController@viewLeaderboard')->name('leaderboard');
    });
// Quiz Questions
  Route::group(['as'=>'quiz.','prefix'=>'quiz/','namespace'=>'Quiz','middleware' =>['auth']],function (){
    Route::get('{question}/question/create','QuestionsController@create')->name('question.create');
    Route::post('{question}/question/store','QuestionsController@store')->name('question.store');
    Route::get('{question}/question/edit','QuestionsController@edit')->name('question.edit');
    Route::get('{subject}/{question}/show','QuestionsController@show')->name('question.show');
    Route::post('{question}/question/update','QuestionsController@update')->name('question.update');
    Route::get('question/{question}/destroy','QuestionsController@destroy')->name('question.destroy');
// Quiz Answers
  Route::post('answer/{question}/save','QuestionsController@saveAnswer')->name('answer.store');
});

