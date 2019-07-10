<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function showAppearedQuiz(Request $request)
	{
		$userId  = Auth::user()->id;
		$quizAppeared = \DB::table('quiz_appears')
		->join('subject_quizzes', 'subject_quizzes.id', '=', 'quiz_appears.subject_id')
		->join('users','users.id', '=', 'subject_quizzes.user_id')
		->where('quiz_appears.user_id', $userId)
		->select(array('quiz_appears.*', 'users.name','subject_quizzes.title','subject_quizzes.total_questions'))
		->paginate(12);
		return view('userResults', ['quizAppeared' => $quizAppeared]);
	}

	public function singleResult(Request $request, QuizAppear $quizappearid)
	{
		$allQuestions = \DB::table('user_responses')
		->join('questions','questions.questionid', '=', 'user_responses.question_id')
		->join('quizzes','quizzes.quizid', '=', 'user_responses.quiz_id')
		->where('user_responses.userData_appear', $quizappearid->quizappearid)
		->get(array('user_responses.*', 'quizzes.*', 'questions.*'));

		//for chart************
		$countTrue = \DB::table('user_responses')->where('userData_appear' , $quizappearid->quizappearid)->where('correct' , 1)->count();

		$countFalse = \DB::table('user_responses')->where('userData_appear' , $quizappearid->quizappearid)->where('correct' , 0)->count();

		$totalQuestion = $countTrue + $countFalse;
		$chart = Charts::create('pie', 'highcharts')
		->title('Result Analysis')
		->labels(['Correct', 'Incorrect'])
		->values([$countTrue,$countFalse])
		->dimensions(350,300)
		->responsive(false);

		return view('viewSingleResult', ['question' => $allQuestions, 'chart' => $chart, 'countTrue' => $countTrue, 'totalQuestion' =>$totalQuestion]);
	}

	public function viewLeaderboard(Request $request, Quiz $quiz)
	{
		$topScorer = \DB::table('average_scores')
		->join('quizzes', 'quizzes.quizid', '=' , 'average_scores.quiz_id')
		->join('users', 'users.id', '=', 'average_scores.user_id')
		->where('quiz_id', $quiz->quizid)
		->orderBy('avg_score', 'desc')
		->limit(10)
		->get(array('users.name', 'quizzes.title', 'quizzes.total_questions', 'average_scores.*'));

		return view('quizLeaderboard', ['leaderboard' => $topScorer]);
	}
}
