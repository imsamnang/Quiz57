<?php

use Illuminate\Support\Facades\DB;

Auth::routes();
Route::view('front','layouts.quiz_layout');
Route::get('/','HomeController@viewAllQuiz');
Route::get('/home', 'HomeController@viewAllQuiz')->name('home');

//Quiz Route
  // Route::prefix('quiz/')->group(function(){
  //   Route::resource('topics', 'Quiz\TopicsController');
  //   Route::post('topics_mass_destroy', ['uses' => 'Quiz\TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
  //   Route::get('{id}/active','Quiz\TopicsController@active');
  //   Route::get('{id}/in-active','Quiz\TopicsController@inActive');

  //   Route::resource('subjects', 'Quiz\SubjectQuizController');
  //   Route::post('subjects_mass_destroy', ['uses' => 'Quiz\SubjectQuizController@massDestroy', 'as' => 'subjects.mass_destroy']);
  //   Route::get('{id}/active','Quiz\TopicsController@active');
  //   Route::get('{id}/in-active','Quiz\TopicsController@inActive');

  //   Route::get('subject/{id}','Quiz\SubjectQuizController@createQuestion')->name('subjects.createQuestion');
  //   Route::post('subject/{id}','Quiz\SubjectQuizController@saveQuestion')->name('subjects.saveQuestion');

  //   Route::resource('questions', 'Quiz\QuestionsController');
  //   Route::post('questions_mass_destroy', ['uses' => 'Quiz\QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);

  //   Route::resource('questions_options', 'Quiz\QuestionsOptionsController');
  //   Route::post('questions_options_mass_destroy', ['uses' => 'Quiz\QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);

  //   Route::resource('tests', 'Quiz\TestsController');
  //   Route::resource('results', 'Quiz\ResultsController');
  //   Route::post('results_mass_destroy', ['uses' => 'Quiz\ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
  // });

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
  
  Route::get('/userResults', 'userController@showAppearedQuiz')->name('user.result');
  Route::get('/viewSigleResult/{quizappearid}', 'userController@singleResult')->name('single.result');
  Route::get('/quizLeaderboard/{quiz}', 'userController@viewLeaderboard')->name('leaderboard');
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
  
//   });

//  // Take Quiz
  // Route::get('{quiz}/start','Quiz\QuizController@start')->name('quiz.start');

// // Submit Quiz
//   Route::post('{quiz}/submit','Quiz\QuizResultsController@store')->name('quiz.submit');

// // Quiz Results
//   Route::get('{quiz}/results','Quiz\QuizResultsController@index')->name('quiz.results');

// //Test Result
//   Route::get('test', function (){
//       $user = auth()->user();
//       dd($user->quiz_results);
//   });  

// Route::get('/pagination', 'Quiz\PaginationController@index');
// Route::get('pagination/fetch_data', 'Quiz\PaginationController@fetch_data');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/createQuiz', 'QuizController@showQuiz');
// Route::post('/createQuiz', 'QuizController@createQuiz');
// Route::delete('/deleteQuiz/{quiz}', 'QuizController@deleteQuiz');
// Route::get('/viewQuiz/{quiz}', 'QuizController@viewQuiz');

// Route::post('addQuestion/{quizId}', 'QuizController@addQuestion');
// Route::post('/deleteQuestion/{quizId}', 'QuizController@deleteQuestion');
// Route::post('/activateQuiz/{quizId}', 'QuizController@activateQuiz');
// Route::post('/deactivateQuiz/{quizId}', 'QuizController@deactivateQuiz');

// Route::get('/quizWelcome/{quiz}', 'QuizController@quizWelcome');
// Route::get('/takeQuiz/{quiz}', 'Quiz\QuizController@takeQuiz');
// Route::post('/nextClick', 'Quiz\QuizController@nextClickStore');
// Route::post('/finishQuiz', 'Quiz\QuizController@storeQuiz');
// Route::get('/finishQuiz','HomeController@viewAllQuiz');

// Route::get('/userResults', 'userController@showAppearedQuiz');
// Route::get('/viewSigleResult/{quizappearid}', 'userController@singleResult');
// Route::get('/quizLeaderboard/{quiz}', 'QuizController@viewLeaderboard');

// Route::get('/first_quiz', 'QuizController@getQuiz');
// Route::get('/next_quiz', 'QuizController@getNextQuiz');
