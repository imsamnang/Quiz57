@extends('layouts.quiz_layout')

@section('head')
  <link href="{{ asset('css/front.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('assets/flipclock/flipclock.css')}}"> --}}
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
                <h4 class="heading">Laravel Quiz</h4>
            </div>
          </div>
          <div class="col-md-6">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <ul class="nav navbar-nav">
                &nbsp;
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li id="counter"></li>
              </ul>
            </div>        	
        	</div>
        </div>
      </div>
    </div>
  </nav>
@stop
@section('script_clock')
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/flipclock/flipclock.min.js') }}"></script> --}}
	<script>
		function str_pad_left(string,pad,length) {
			return (new Array(length+1).join(pad)+string).slice(-length);
		}
		function startTimer(){
			var count;
			var timer = setInterval(function() {
					var div = document.querySelector("#counter");
					var queDur = document.querySelector("#queDuration").value;
					var hidden_div = document.querySelector("#hidden");
					count = count != undefined ? count * 1 -1 : hidden_div.textContent * 1 - 1;
					var minutes = Math.floor(count / 60);
					var seconds = count - minutes * 60;
					var finalTime = str_pad_left(minutes,'0',2)+':'+str_pad_left(seconds,'0',2);
					div.textContent = finalTime;
					document.getElementById("queDuration").value = finalTime;
					queDur = finalTime;
					console.log(queDur);
					if (count == 0 && document.querySelector(".next")) {
							clearInterval(timer);
							document.querySelector(".next").click();
					}else if(count == 0){
							console.log("Submit");
							clearInterval(timer);
							document.querySelector(".btn_quiz").click();
					}
			}, 1000);
		}
		$(document).ready(function($) {
			startTimer();
			window.history.pushState(null, "", window.location.href);        
			window.onpopstate = function() {
					window.history.pushState(null, "", window.location.href);
			};
			$('.next').on('click', ()=>{
					startTimer();
			})
		});
	</script>    
@stop

@section('content')
  <div class="container">
		<div class="home-main-block">
			<?php 
		    if(isset($_GET['page']))
		      $page = $_GET['page']; 
				else
					$page=1;
		  ?>
			<div id="question_block" class="question-block">
				<div class="main-questions">
					<div class="myQuestion active">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								@foreach($allQuestion as $iteration => $question)
									<blockquote> Total Questions &nbsp;&nbsp;{{ $page}} / {{ $totalQuestionCount }}	</blockquote>
				        	<h3 class="question">{{ $question->title }}</h3>
									@if ( $allQuestion->hasMorePages())
										{{ Form::open(array('route' => 'quiz.next.quiz', 'role' => 'form', 'name' => 'quiz', 'class' => 'form-horizontal', 'id' => 'myForm')) }}
									@else
										{{ Form::open(array('route' => 'quiz.finish.quiz', 'role' => 'form', 'name' => 'quiz', 'class' => 'form-horizontal', 'id' => 'myForm')) }}
									@endif
										<input name="page" type="hidden" value="{{ $page}}">
										<div id="hidden" hidden="hidden"> 
											<input type="" name="queDuration" id="queDuration" value="{{$sub->question_duration}}">{{$sub->question_duration}}
										</div>
										<input type="hidden" name="question_id[{{ $question->id }}]" value="{{$question->id}}">
		                @foreach($question->options as $ops)
		                  @if($question->answers->count() === 1)
		 										<div class="radio">
		                      <label>
		                        <input type="radio" class="input" name="answer[]" id="mc_c{{ $ops->title }}" value="{{$ops->id}}">
		                        {{ $ops->title}}
		                      </label>
		                    </div>
		                  @else
		                    <div class="checkbox">
		                      <label>
		                        <input type="checkbox" class="input" name="answer[]" id="mc_c{{ $ops->title }}" value="{{$ops->id}}">
		                        {{ $ops->title}}
		                      </label>
		                    </div>
		                  @endif
		                @endforeach
					        	<div class="row">
											<input type="hidden" name="quiz-id" id="test-id" value="{{ $sub->id }}">
											<input type="hidden" name="quiz-slug" id="test-slug" value="{{ $sub->slug }}">
											<input type="hidden" name="user-id" id="student-id" value="{{ Auth::user()->id }}">
											{!! Form::input('hidden','time_taken'.$question->id,null,['id'=>'time_taken'.$question->id]) !!}
											<p>{{ $allQuestion->links('vendor.pagination.myown') }}</p>					        		
					        	</div>
					        </form>
				        @endforeach
		      		</div> 
		    		</div>
		  		</div>
		  	</div>
		  </div>
		</div>
	</div>
@endsection

@section('scripts')
	{{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('js/jquery.cookie.js') }}"></script> --}}
	{{-- <script src="{{ asset('js/jquery.countdown.js') }}"></script> --}}	
@endsection