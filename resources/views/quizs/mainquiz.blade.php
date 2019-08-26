@extends('layouts.quiz_layout')

@section('head')
  <link href="{{ asset('css/front.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <script>
    window.Laravel =  <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
  </script>
@endsection

@section('top_bar')
  <nav class="navbar navbar-default navbar-static-top">
    <div class="logo-main-block">
      <div class="container">
        {{-- @if ($setting) --}}
          <a href="{{ url('/') }}" title="Laravel Quiz">
            <img src="{{asset('/images/logo/QuizLogo.png')}}" class="img-responsive" alt="Laravel Quiz">
          </a>
        {{-- @endif --}}
      </div>
    </div>
    <div class="nav-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="navbar-header">
              <!-- Branding Image -->
              {{-- @if($setting) --}}
                <h4 class="heading">Laravel Quiz</h4>
              {{-- @endif --}}
            </div>
          </div>
          <div class="col-md-6">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav">
                &nbsp;
              </ul>
              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                  <li><a href="{{ route('login') }}" title="Login">Login</a></li>
                  <li><a href="{{ route('register') }}" title="Register">Register</a></li>
                @else
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      {{-- @if ($auth->role == 'A') --}}
                        <li><a href="{{url('/admin')}}" title="Dashboard">Dashboard</a></li>
                      {{-- @elseif ($auth->role == 'S') --}}
                        {{-- <li><a href="{{url('/admin/my_reports')}}" title="Dashboard">Dashboard</a></li> --}}
                      {{-- @endif --}}
                      <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
              @endguest
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
@endsection

@section('content')
  <div class="container">
    <div class="quiz-main-block">
      <div class="row">
        @if ($allQuiz)
          @foreach ($allQuiz as $subject)
            <div class="col-md-4">
              <div class="topic-block">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    <span class="card-title">{{$subject->title}} Quiz</span>
                    <div class="row">
                      <div class="col-xs-6 pad-0">
                        <ul class="topic-detail">
                          <li>Per Question Mark <i class="fa fa-long-arrow-right"></i></li>
                          <li>Total Marks <i class="fa fa-long-arrow-right"></i></li>
                          <li>Total Questions <i class="fa fa-long-arrow-right"></i></li>
                          <li>Total Time <i class="fa fa-long-arrow-right"></i></li>
                        </ul>
                      </div>
                      <div class="col-xs-6">
                        <ul class="topic-detail right">
                          <li>{{$subject->per_q_mark}}</li>
                          <li>
                            @php
                              $qu_count = $subject->questions->count();
                            @endphp
                            {{$subject->per_q_mark*$qu_count}}
                          </li>
                          <li>
                            {{$qu_count}}
                          </li>
                          <li>
                            {{$subject->question_duration}} seconds
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <center>
                      @if ($countResult < $coundSubQuiz)
                        @if (Auth::user()->answers->count()<0 || Auth::user()->answers->count()==null)
                           <a href="{{route('quiz.start.quiz',$subject->slug)}}" class="btn btn-primary btn-block" title="Start Quiz">Start Quiz</a>
                        @else
                          @foreach (Auth::user()->answers as $answer)
                            @if ($subject->id==$answer->subject_id)
                              <a href="{{route('quiz.start.quiz',$subject->slug)}}" class="btn btn-warning btn-block" title="Start Quiz">Done Quiz</a>
                            @else
                              <a href="{{route('quiz.start.quiz',$subject->slug)}}" class="btn btn-success btn-block" title="Start Quiz">Start Quiz</a>
                            @endif
                          @endforeach                        
                        @endif
                      @else
                        <a href="{{route('quiz.start.quiz',$subject->slug)}}" class="btn btn-warning btn-block" title="Start Quiz">Done Quiz</a>                      
                      @endif  
                    </center>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection
