<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Answer;
use App\Models\Quiz\Option;
use App\Models\Quiz\Question;
use App\Models\Quiz\SubjectQuiz;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{

  public function index()
  {

  }

  public function create($quiz)
  {
    $quiz = SubjectQuiz::with('questions')->where('slug', $quiz)->get()->first();
    return view('quizs.question.create', compact('quiz'));
  }

  public function store(Request $request, $quiz)
  {
    $quiz = SubjectQuiz::where('slug', $quiz)->get()->first();
    // $question = Question::create($request->except('options', '_token'));
    $question = Question::create([
                'title' => $request->title,
                'slug' => str_slug($request->title, '-'),
                'status' => $request->active
              ]);
    $question->subjects()->save($quiz)->save();
    foreach ($request->options as $option){
      $option = new Option($option);
      $question->options()->save($option);
    }
    return redirect()->route('quiz.subject.show', $quiz->slug);
  }

  public function show($quiz, $question)
  {
    $question = Question::where('slug', $question)->get()->first();
    $quiz = SubjectQuiz::where('slug', $quiz)->get()->first();
    return view('quizs.question.show', compact('question', 'quiz'));
  }

  public function saveAnswer(Request $request, $question)
  {
      $question = Question::where('slug', $question)->get()->first();
      foreach ($request->option as $option){
          $answer = new Answer();
          $answer->option()->associate($option);
          $answer->question()->associate($question);
          $answer->save();
      }
      return back();
  }

  public function edit($question)
  {
    $quiz = Question::with('answers')->where('slug', $question)->first();
    return view('quizs.question.edit', compact('quiz'));
  }

  public function update(Request $request, $id)
  {
      //
  }

  public function destroy($id)
  {
      //
  }
}
