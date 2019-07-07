<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{

    public function index()
    {
      $topics = Topic::all();
      return view('quizs.topic.index',compact('topics'));
    }

    public function create()
    {
      return view('quizs.topic.create');
    }

    public function store(Request $request)
    {
      Topic::create(['name'=>$request->name,'status'=>$request->active]);
      session()->flash('flash_mess', 'Category was created completely');
      return redirect(route('topics.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $topic = Topic::findOrFail($id);
      return view('quizs.topic.edit',compact('topic'));
    }

    public function update(Request $request, $id)
    {
      // return $request->all();
      $topic = Topic::findOrFail($id);
      $topic->name = $request->name;
      $topic->status = $request->active;
      $topic->save();
      return redirect()->route('topics.index');
    }

    public function destroy($id)
    {
      $topic = Topic::findOrFail($id);
      $topic->delete();
      return redirect()->route('topics.index');
    }
}
