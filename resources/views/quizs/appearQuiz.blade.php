@extends('layouts.master')
@section('page-title')
	{{--   @if(isset($generalSetting->institute))
	    IMS | {{$generalSetting->institute}}
	  @else
	    IMS Management
	  @endif --}}
@endsection

@push('custom-css')
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
							document.quiz.submit();
					}
			}, 1000);
		}
		jQuery(document).ready(function($) {
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
@endpush

@section('menu-panel')
    @include('layouts.menu.menu_admin')
@endsection

@section('content')
	<div class="container">
	  <div class="row">
			<div class="page-min-height appearQuiz"  style="background-color: rgb(69, 77, 102)">
			  <?php 
			    if(isset($_GET['page']))
			      $page = $_GET['page']; 
					else
						$page=1;
			  ?>
			  <h3 style="color: #fff;text-align: center;font-size: 24px;font-weight: 700">{{ $sub->title}} Quiz</h3>
			  <div class="col-md-8 col-md-offset-2">			  	
				  @foreach($allQuestion as $iteration => $question)
				    <div class="main">
							@if ( $allQuestion->hasMorePages())
								{{ Form::open(array('route' => 'quiz.next.quiz', 'role' => 'form', 'name' => 'quiz', 'class' => 'form-horizontal', 'id' => 'myForm')) }}
							@else
								{{ Form::open(array('route' => 'quiz.finish.quiz', 'role' => 'form', 'name' => 'quiz', 'class' => 'form-horizontal', 'id' => 'myForm')) }}
							@endif
							<h6 style="color: #009975">Time Left: <span id="counter" style="color: #009975; font-weight: 800 "></span></h6>
							<input name="page" type="hidden" value="{{ $page}}">
							<div id="hidden" hidden="hidden"> 
								<input type="" name="queDuration" id="queDuration" value="{{$question->question_duration}}">{{$question->question_duration}}</div>
							<input type="hidden" name="question_id[{{ $question->id }}]" value="{{$question->id}}">
							<div class="quiz-question"><h4 style="margin-bottom: 15px;">Question {{$page}} : {{ $question->question }}</h4></div>
							<div style="margin-bottom: 15px;">
								{{--@foreach ($question->options as $key => $ops)
									<input class="" type="radio" name="answer[{{ $ops->id }}]" id="mc_c{{ $ops->title }}" value="{{$ops->id}}"> <label for="">{{ $ops->title}}</label><br>
								@endforeach --}}
                @foreach($question->options as $ops)
                  @if($question->answers->count() === 1)
                    <div class="radio">
                      <label>
                        <input type="radio" class="input" name="answer[{{ $ops->id }}]" id="mc_c{{ $ops->title }}" value="{{$ops->id}}">
                        {{ $ops->title}}
                      </label>
                    </div>
                  @else
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="input" name="answer[{{ $ops->id }}]" id="mc_c{{ $ops->title }}" value="{{$ops->id}}">
                        {{ $ops->title}}
                      </label>
                    </div>
                  @endif
                @endforeach
							</div>

							<input type="hidden" name="quiz-id" id="test-id" value="{{ $sub->id }}">
							<input type="hidden" name="quiz-slug" id="test-slug" value="{{ $sub->slug }}">
							<input type="hidden" name="user-id" id="student-id" value="{{ Auth::user()->id }}">
							<p>{{ $allQuestion->links('vendor.pagination.myown') }}</p>
							{{ Form::close() }}
				    </div>
					</div>
				  @endforeach
			  </div>
			</div>
	  </div>
	  {{-- </form> --}}
	</div>		
@endsection
  {{-- For Custom JS --}}
@push('custom-js')
    
@endpush		  	