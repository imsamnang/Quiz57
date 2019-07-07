<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionQuiz;
use App\Models\SubjectQuiz;
use Illuminate\Http\Request;

class TakeQuizController extends Controller
{
  public function start($quiz)
  {
    $quiz = SubjectQuiz::where('slug', $quiz)->get()->first();
    $question_id = QuestionQuiz::where('quiz_id', $quiz->id)->get();

    $questions = collect();
    foreach ($question_id as $id){
        $question = Question::with('options', 'answers')->where('id', $id->question_id)->first();
        $questions->push($question);
    }
    return view('quiz.start', compact('quiz', 'questions'));
  }
}
