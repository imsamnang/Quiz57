<?php

namespace App\Http\Controllers;

use App\Models\Quiz\SubjectQuiz;
use Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  // public function __construct()
  // {
    // $this->middleware('auth'); 
  // }

  public function index()
  {
    return view('quizs.home');
  }

  public function viewAllQuiz()
  {
    $allQuiz = SubjectQuiz::all();
    return view('quizs.subject.index',compact('allQuiz'));
  }

}
