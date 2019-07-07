<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\QuestionOption;
use Illuminate\Http\Request;

class QuestionsOptionsController extends Controller
{
  public function index()
  {
    $ans_options = QuestionOption::all();
    return view('quizs.question_option.index',compact('ans_options'));
  }

  public function create()
  {
      //
  }

  public function store(Request $request)
  {
      //
  }

  public function show($id)
  {
      //
  }

  public function edit($id)
  {
      //
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
