@extends('layouts.quiz_layout')

@section('head')
	<link href="{{ asset('css/front.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<script>
	  window.Laravel =  <?php echo json_encode([
	      'csrfToken' => csrf_token(),
	  ]); ?>
	</script>
@stop

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
                <h4 class="heading">Laravel Quiz</h4>
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
                        <li><a href="#" title="Dashboard">Dashboard</a></li>
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
@stop

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="home-main-block">
          <div class="question-block">
            <h2 class="text-center main-block-heading">{{$sub->title}} Result</h2>
            <table class="table table-bordered result-table">
              <thead>
                <tr>
                  <th>Total Questions</th>
                  <th>My Marks</th>
                  <th>My Marks %</th>
                  <th>Per Question Mark</th>
                  <th>Total Marks</th>
                </tr>
              </thead>
              <tbody>
              	<tr>
              		<td>{{$questionsCount}}</td>
              		<td>{{$marks_scored}}</td>
              		<td>{{$percentage_correct}}</td>
              		<td>{{$sub->per_q_mark}}</td>
              		<td>{{$questionsCount * $sub->per_q_mark}}</td>
              	</tr>
              </tbody>
            </table>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">Thank You!</h2>
                <a href="{{ route('front') }}" class="btn btn-success">Take More Quiz</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script_clock')
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script>
	    function str_pad_left(string,pad,length) {
	        return (new Array(length+1).join(pad)+string).slice(-length);
	    }
	    jQuery(document).ready(function($) {
	        window.history.pushState(null, "", window.location.href);        
	        window.onpopstate = function() {
	            window.history.pushState(null, "", window.location.href);
	        };
	    });
	</script>	
@endsection

@section('scripts')

@endsection