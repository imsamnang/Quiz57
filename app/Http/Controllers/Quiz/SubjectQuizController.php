<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\SubjectQuiz;
use App\Models\Topic;
use Illuminate\Http\Request;
use DB;

class SubjectQuizController extends Controller
{
  
  public function index()
  {
    $subjects = SubjectQuiz::all();
    return view('quizs.subject.index',compact('subjects'));
  }

  public function create()
  {
    $topics = Topic::all();
    return view('quizs.subject.create',compact('topics'));
  }

  public function store(Request $request)
  {
    SubjectQuiz::create([
      'name'=>$request->name,
      'topic_id'=>$request->topic_id,
      'duration'=>$request->duration,
      'status'=>$request->active
    ]);
    session()->flash('flash_mess', 'Question was created completely');
    return redirect(route('subjects.index'));
  }

  public function show($id)
  {
    $need = DB::table('faculties')
        ->join('course_short', 'faculties.id', '=', 'course_short.course_code_id')
        ->select('course_short.course_code_id')
        ->where('table.colurm','=','parameter')
        ->first();
    dd($need);    
  }

  public function edit($id)
  {
    $topics = Topic::all();
    $tps = array();
    foreach ($topics as $topic) {
      $tps[$topic->id] = $topic->name;
    }
    $subject = SubjectQuiz::findOrFail($id);
    // return view('quizs.subject.edit',compact('subject','tps'));
    return view('quizs.subject.edit')->withSubject($subject)->withTopics($topics);
  }

  public function update(Request $request, $id)
  {
    // return $request->all();
    $subject = SubjectQuiz::findOrFail($id);
    $subject->name = $request->name;
    $subject->topic_id = $request->topic_id;
    $subject->duration = $request->duration;
    $subject->status = $request->active;
    $subject->save();
    return redirect()->route('subjects.index');
  }

  public function destroy($id)
  {
    $subject = SubjectQuiz::findOrFail($id);
    $subject->delete();
    return redirect()->route('subjects.index');
  }

  public function active(request $request, $id)
  {
      $row = Subject::findOrFail($id);
      $request->request->add(['status' => '1']);
      $row->update($request->all());
      $request->session()->flash($this->message_success, $row->faculty.' '.$this->panel.' Active Successfully.');
      return redirect()->route($this->base_route);
  }

  public function inActive(request $request, $id)
  {
    $row = Subject::findOrFail($id);
    $request->request->add(['status' => '0']);
    $row->update($request->all());
    $request->session()->flash($this->message_success, $row->faculty.' '.$this->panel.' In-Active Successfully.');
    return redirect()->route($this->base_route);
  }

  public function createQuestion($id)
  {
    $subject = SubjectQuiz::findOrFail($id);
    $title = "Manage questions";
    // $answer = ['1'=>1, '2'=>2,'3'=> 3,'4'=> 4];
    $questions = $subject->questions;
    $title_button = "Save question";
    // dd($questions);
    return view('quizs.question.create', compact('subject', 'title','questions', 'title_button'));
  }

  public function saveQuestion(Request $request, $id)
  {
    $subj = SubjectQuiz::find($id);
    $question = new Question();
    $question->subject_id = $subj->id;
    $question->question_text = $request->question;
    $question->status = $request->active;
    // $qAns= $request->question_option;
    // $countAns = count( $request->question_option);
    // $ans = $request->answer;    
    if($question->save()){
      foreach ($request->input('question_option') as $key => $value) {
        $key++;
        $correct = $request->input('answer') == $key ? 1 : 0;
          QuestionOption::create([
              'question_id' => $question->id,
              'option'      => $value,
              'correct'     => $correct,
              'status'      => $request->active
          ]);
      }
      return redirect()->back();
    }
  }
}
