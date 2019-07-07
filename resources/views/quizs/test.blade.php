@extends('quizs.layouts.app')

@section('content')
    <div id="counter1"></div>
@section('script_clock')
  <script>    
    $(function() {
      var clock = $('#counter1').FlipClock({{$duration*60}}, {
          autoStart: false,
          countdown: true,
          clockFace: 'MinuteCounter',
          callbacks: {
            interval: function () {
              var time = clock.getTime().time;
              //alert(time);
              @foreach($questions as $q)
                $('#time_taken{{$q->id}}').val(time);
              @endforeach
            },
          stop: function(){
          alert("The time has run out!");
          window.location.replace("{{ route('quiz.save.test', [$subject->id]) }}");
          }
        }
       });      
      clock.start();
    });
  </script>
 @stop

@foreach($questions as $question)
  <div class="jumbotron" id="jumbotron{{$question->id}}"
    @if($question->id != $current_question_id)
        style="display: none;"
    @endif
    >
    <p>Question #{{$question->id}}</p>
    <p>{{$question->question}}</p>
    {!! Form::open(['route'=>['quiz.save.test', $subject->id], 'method'=>'post', 'id'=>'frm'.$question->id]) !!}
    <ul id="answer-radio{{$question->id}}">
        <div class="btn-group" data-toggle="buttons">
          @foreach ($question->options as $option)
            <li>
                <label>
                    <input type="radio" name="option" value="{{$option->id}}" /> {{$option->option}}
                </label>
            </li>
          @endforeach
        </div>
    </ul>
    {!! Form::input('hidden','question_id', $question->id) !!}
    {!! Form::input('hidden','time_taken'.$question->id,null,['id'=>'time_taken'.$question->id]) !!}
    {!! Form::token() !!}
    @if($question->id != $first_question_id)

    @endif

    @if($question->id == $last_question_id)
      {!! Form::submit('Last', ['class'=>'btn btn-info']) !!}
    @else
      {!! Form::submit('Next', ['class'=>'btn btn-info']) !!}
    @endif
    {!! Form::close() !!}
  </div>
  @if($questions->count()>1)
  @section('script_form')
  <script>    
    $(function() {
      $('#frm{!!$question->id!!}').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        var $formAction = form.attr('action');
        var $userAnswer = $('input[name=option]:checked', $('#frm{{$question->id}}')).val();
        alert ($userAnswer);
        $.post($formAction, $(this).serialize(), function(data){ 
          $('#jumbotron{{$question->id}}').hide();
        //console.log(data.next_question_id);
          $('#jumbotron' + data.next_question_id+'').show();
        });
      });
    });
    // });
  </script>
  @stop
@endif
@endforeach

@stop