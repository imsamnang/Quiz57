@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
            <div class="card-columns">
              @foreach ($allQuiz as $index =>$qz)
                <div class="card bg-info">
                  <div class="card-body text-center">
                    <div class="content active">
                      <h4>{{ $qz->title}} Quiz</h4>
                      <p>Created   by {{$qz->name}}<i class="em em-coffee"></i></p>
                      <a href="/takeQuiz/{{ $qz->quizid }}" class="btn btn-primary btn-sm float-right">Start</a>
                      <a href="/quizLeaderboard/{{ $qz->quizid }}" class="btn btn-success btn-sm float-left">Leaderboard</a>
                      <br>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
