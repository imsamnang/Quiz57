<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\AverageScore;
use App\Models\QuizAppear;
use App\Models\Quiz\Question;
use App\Models\Quiz\QuestionQuiz;
use App\Models\Quiz\SubjectQuiz;
use App\Models\UserResponse;
use Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Response;

class QuizController extends Controller
{
  public function index()
  {
    // $generalSetting = GeneralSetting::findOrFail(1)->first();
    $allQuiz = SubjectQuiz::all();
    return view('quizs.subject.index',compact('allQuiz'));
  }

  public function front()
  {
    $allQuiz = SubjectQuiz::all();
    return view('quizs.mainquiz',compact('allQuiz'));    
  }

  public function create()
  {
    return view('quizs.subject.create');
  }

  public function store(Request $request)
  {
    $ref = '#'.str_random(10);
    $slug = str_slug($request->name,'-');
    $quiz = SubjectQuiz::create([
      'title'  => $request->name,
      'slug'  => $slug,
      'reference' => $ref,
      'max_attempts'  => $request->max_attempts,
      'pass_percentage' => (int)$request->pass_percentage,
      'question_duration' => (int)$request->question_duration,
      'status'  => $request->active
    ]);

    return redirect()->route('quiz.subject.show', $quiz->slug);
  }

  public function show($quiz)
  {
    $quiz = SubjectQuiz::where('slug', $quiz)->get()->first();
    return view('quizs.subject.show', compact('quiz'));
  }

  public function edit($quiz)
  {
      //
  }

  public function update(Request $request, $id)
  {
      //
  }

  public function destroy($quiz)
  {      
    $quiz = SubjectQuiz::where('id', $quiz)->first();
    $this->deleteQuestions($quiz);
    $subOps = QuestionQuiz::where('subject_quiz_id',$quiz->id)->delete();
    $quiz->delete();
    return back();
  }

  public function deleteQuestions($quiz)
  {
    $questions = $quiz->questions;
    foreach ($questions as $question) {
      $question->delete();
      foreach ($question->answers as $ans) {
        $ans->delete();
      }      
      foreach ($question->options as $option) {
        $option->delete();
      }
    }
  }

  public function start($quiz)
  {
    $quiz = SubjectQuiz::where('slug', $quiz)->get()->first();
    $question_id = QuestionQuiz::where('subject_quiz_id', $quiz->id)->get();
    $questions = collect();
    foreach ($question_id as $id){
        $question = Question::with('options', 'answers')->where('id', $id->question_id)->first();
        $questions->push($question);
    }
    return view('quizs.start', compact('quiz', 'questions'));
  }

  public function takeQuiz($quiz)
  {
    $sub = SubjectQuiz::where('slug',$quiz)->first();
    $allQuestion = $sub->questions()->paginate(1);
    $totalQuestionCount = $sub->questions()->count();
    return view('quizs.appearQuiz',compact('sub','allQuestion'));
    // return view('quizs.start',compact('sub','allQuestion'));
  }

  public function nextClickStore(request $request)
  {
    return $request->all();
    $page = $request->input('page');
    $question_id = $request->input('question_id');
    $time_remaining = $request->input('queDuration');
    $question_id = reset($question_id);
    $quizid = $request->input('quiz-id');
    $quizslug = $request->input('quiz-slug');
    $userId  = Auth::user()->id;
    $userName  = Auth::user()->name;  
    $answer = $request->input('answer');
    $answer = reset($answer);
    $duration = preg_split('/:/', $time_remaining);
    $time_remaining_in_seconds = ((int)$duration[0] * 60) + ((int)$duration[1]);
    if ($page == 1) {
        $newQuizAppear = new QuizAppear;
        $newQuizAppear->marks_scored = 0;
        $newQuizAppear->user_id = $userId;
        $newQuizAppear->user_name = $userName;
        $newQuizAppear->subject_id = $quizid;
        $newQuizAppear->save();
    }
    $uniqueQuizQuery = \DB::table('quiz_appears')->where('user_id', $userId)->orderBy('id','desc')->first();
    $uniqueQuizAppearId = $uniqueQuizQuery->id;
    $marks_scored = $uniqueQuizQuery->marks_scored;
    $userResponse = new UserResponse;
    $userResponse->user_id = $userId;
    $userResponse->userData_appear_id = $uniqueQuizAppearId;
    $userResponse->subject_id = $quizid;
    $userResponse->question_id = $question_id;
    if ($answer == null) {
        $userResponse->user_response = "Not Answered";
    }else{
        $userResponse->user_response = $answer;
    }
    $findQuestion = \DB::table('answers')->where('question_id', $question_id)->first();
    $correctAnsDb = $findQuestion->option_id;
    $findDuration = \DB::table('subject_quizzes')->where('id',$quizid)->first();
    $totalTimeForQuestion = $findDuration->question_duration;
    $time_taken = $totalTimeForQuestion - $time_remaining_in_seconds;
    $userResponse->time_taken = $time_taken;
    if ($correctAnsDb == $answer) {
        $marks_scored += 1;
        \DB::table('quiz_appears')
        ->where('id', $uniqueQuizAppearId)
        ->update(['marks_scored' => $marks_scored]);
        $userResponse->correct = 1;
    }else{
      $userResponse->correct = 0;
    }        
    $userResponse->save();
    $page += 1;
    return redirect('/quiz/takequiz/'.$quizslug.'?page='.$page);
  }

  public function storeQuiz(Request $request)
  {
    $question_id = $request->input('question_id');
    $time_remaining = $request->input('queDuration');
    $question_id = reset($question_id);
    $quizid = $request->input('quiz-id');
    $userId  = Auth::user()->id;
    $userName  = Auth::user()->name;
    $answer = $request->input('answer');
    if ($answer) {
        $answer = reset($answer);
    }else{
        $answer = '';
    }

    $duration = preg_split('/:/', $time_remaining);
    $time_remaining_in_seconds = ((int)$duration[0] * 60) + ((int)$duration[1]);      
    $uniqueQuizQuery = \DB::table('quiz_appears')->where('user_id', $userId)->orderBy('id','desc')->first();
    $uniqueQuizAppearId = $uniqueQuizQuery->id;
    $marks_scored = $uniqueQuizQuery->marks_scored;
    $userResponse = new UserResponse;
    $userResponse->user_id = $userId;
    $userResponse->userData_appear_id = $uniqueQuizAppearId;
    $userResponse->subject_id = $quizid;
    $userResponse->question_id = $question_id;
    if ($answer == null) {
        $userResponse->user_response = "Not Answered";
    }else{
        $userResponse->user_response = $answer;
    }
    $findQuestion = \DB::table('answers')->where('question_id', $question_id)->first();
    $correctAnsDb = $findQuestion->option_id;
    $findDuration = \DB::table('subject_quizzes')->where('id',$quizid)->first();
    $totalTimeForQuestion = $findDuration->question_duration;
    $time_taken = $totalTimeForQuestion - $time_remaining_in_seconds;
    $userResponse->time_taken = $time_taken;      
    if ($correctAnsDb == $answer) {
        $marks_scored += 1;
        \DB::table('quiz_appears')
        ->where('id', $uniqueQuizAppearId)
        ->update(['marks_scored' => $marks_scored]);
        $userResponse->correct = 1;
    }else{
        $userResponse->correct = 0;
    }
    $userResponse->save();
    $marks_scored = $marks_scored;
    /**
     * Storing average score for particular Quiz of user
    */
    $avgScoreCount = \DB::table('average_scores')->where('user_id', $userId)->where('subject_id', $quizid)->count();
    $quizAppearCount = \DB::table('quiz_appears')->where('user_id', $userId)->where('subject_id', $quizid)->count();
    $avg_marks = \DB::table('quiz_appears')
    ->where('user_id', $userId)
    ->where('subject_id', $quizid)
    ->avg('marks_scored');
    $avgScore = new AverageScore;
    if ($avgScoreCount == 0 ) {
        $avgScore->user_id = $userId;
        $avgScore->subject_id = $quizid;
        $avgScore->avg_score = $avg_marks;
        $avgScore->appear_count = $quizAppearCount;
        $avgScore->save();  
    }else{
        $userFindQuery = \DB::table('average_scores')->where('user_id', $userId)->where('subject_id', $quizid)->select('avgid');
        $getAvgidObj = $userFindQuery->get('avgid');
        foreach ($getAvgidObj as $id){
           $avgId = $id->avgid;
       }
       $updateAvgScore = ['avg_Score' => $avg_marks, 'appear_count' => $quizAppearCount];
       AverageScore::where('avgid', $avgId)->update($updateAvgScore);
   }
   $sub = SubjectQuiz::where('id', $quizid)->first();
   $questionsCount = $sub->questions()->count();
   $percentage_correct = 100 * $marks_scored / $questionsCount;
   return view('quizs.finishQuiz', [
    'score_percentage' => $percentage_correct, 'questionsCount' => $questionsCount, 'uniqueQuizAppearId' => $uniqueQuizAppearId]);
  }

// public function getBeforeStartTest($id){
  //   $subject = SubjectQuiz::find($id);
  //   session()->forget('next_question_id');
  //   return view('quizs.start', compact('subject'));
  // }
  // public function getStartTest($id, Request $request)
  // {
  //   $subject = SubjectQuiz::find($id);
  //   $questions = $subject->questions()->get();
  //   // return ($questions);
  //   $first_question_id = $subject->questions()->min('id');
  //   // dd($first_question_id);
  //   $last_question_id = $subject->questions()->max('id');
  //   $duration = $subject->duration;
    
  //   if(session('next_question_id')){
  //     $current_question_id = session('next_question_id');
  //   }
  //   else{
  //     $current_question_id = $first_question_id;
  //     session(['next_question_id'=>$current_question_id]);
  //   }
  //   // dd($current_question_id);
  //   return view('quizs.test', compact('subject', 'questions', 'current_question_id', 'first_question_id', 'last_question_id', 'duration'));    
  // }

  // public function getNextQuestion($id, Request $request)
  // {
  //   $question = Question::findOrFail($id);
  //   $last_question_id = count(Question::where('subject_id',$id)->get());
  //   return view('quizs.quiz-test',compact('question','last_question_id'));
  // }

  // public function postSaveQuestionResult($id, Request $req)
  // {
  //   // return $req->all();
  //   //save result
  //   $subject = SubjectQuiz::find($id);
  //   $question = Question::find($req->get('question_id'));
  //   $question_id = $question->id;
  //   $count_questions = $subject->questions()->max('id');
  //   // if ($req->get('option') != null) {
  //     //save the answer into table
  //     // $duration = $subject->duration * 60;
  //     // $time_taken = ((int) $req->get('time_spent' . $question->id));
  //     // $time_per_question = $duration - $time_taken;
  //   //dd($time_taken);
  //     // Answer::create([
  //     //   'user_id' => Auth::user()->id,
  //     //   'question_id' => $req->get('question_id'),
  //     //   'subject_id' => $id,
  //     //   'user_answer' => $req->get('option'),
  //     //   'question' => $question->question,
  //     //   'option1' => $question->option1,
  //     //   'option2' => $question->option2,
  //     //   'option3' => $question->option3,
  //     //   'option4' => $question->option4,
  //     //   'right_answer' => $question->answer,
  //     //   'time_taken' => $time_per_question
  //     // ]);
  //   // }
  //   $next_question_id = $subject->questions()->where('id', '>', $req->get('question_id'))->min('id');
  //   // return $next_question_id;
  //   // return redirect()->route('before-exam',[$next_question_id]);    
  //   if ($next_question_id !=null) {
  //     return Response::json(['next_question_id' => $next_question_id,'count_questions'=>$count_questions]);
  //     // return redirect()->route('before-exam',$next_question_id);
  //   }
  //   // return redirect()->route('result', [$id]);
  // }

  // public function saveAnswer(Request $request, $id)
  // {
  //   // return $request->all();
  //   // $qAns= $request->answer_option;
  //   // return $qAns;
  // }
  // public function create()
  // {
  //     //
  // }


}
