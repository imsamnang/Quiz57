<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <tr>
      <th width="5%">ID</th>
      <th width="45%">Quiz Title</th>
      <th width="50%">User Name</th>
    </tr>
    @foreach($data as $row)
      <tr>
        <td>{{ $row->quizid }}</td>
        <td>{{ $row->title }}</td>
        <td>{{ $row->user_id }}</td>
      </tr>
    @endforeach
  </table>
  {!! $data->links('vendor.pagination.myown') !!}
</div>

{{ Form::close() }}
{{-- <div class="page-min-height appearQuiz"  style="background-color: rgb(69, 77, 102)">
  <?php 
    if(isset($_GET['page']))
      $page = $_GET['page']; 
    else
      $page=1;
  ?>
  <h3 style="color: #fff;text-align: center;font-size: 24px;font-weight: 700">{{ $quiz->title}} Quiz</h3>
  @foreach($questions as $iteration=>$question)
    <div class="main">
      @if ( $questions-> hasMorePages())
        {{ Form::open(array('url' => 'nextClick', 'role' => 'form', 'name' => 'quiz', 'class' => 'form-horizontal', 'id' => 'myForm')) }}
      @else
        {{ Form::open(array('url' => 'finishQuiz', 'role' => 'form', 'name' => 'quiz', 'class' => 'form-horizontal', 'id' => 'myForm')) }}
      @endif
      <h6 style="color: #fff">Time Left: <span id="counter" style="color: #009975; font-weight: 800 "></span></h6>
      <input name="page" type="hidden" value="{{ $page}}">
      <div id="hidden" hidden="hidden">
        <input type="" name="queDuration" id="queDuration" value="{{$question->question_duration}}">{{$question->question_duration}}
      </div>
      <input type="hidden" name="question_id[{{ $question->questionid }}]" value="{{$question->questionid}}">
      <div class="quiz-question">
        <h4 style="margin-bottom: 15px;">Question {{$page}} : {{ $question->question }}</h4>
      </div>
      <div style="margin-bottom: 15px;"> 
        @if($question->question_type == 'mcq')
          <input class="type_1" type="radio" name="answer[{{ $question->questionid }}]" id="mc_c{{ $question->option_1 }}" value="{{ $question->option_1}}"> <label for="">{{ $question->option_1}}</label> <br>
          <input class="type_1" type="radio" name="answer[{{ $question->questionid }}]" id="mc_c{{ $question->option_2 }}" value="{{ $question->option_2}}"> <label for=""> {{ $question->option_2}} </label><br>
          <input class="type_1" type="radio" name="answer[{{ $question->questionid }}]" id="mc_c{{ $question->option_3 }}" value="{{ $question->option_3}}"> <label for=""> {{ $question->option_3}} </label><br>
          <input class="type_1" type="radio" name="answer[{{ $question->questionid }}]" id="mc_c{{ $question->option_4 }}" value="{{ $question->option_4}}"> <label for=""> {{ $question->option_4}} </label><br>
        @elseif($question->question_type == 'fib')
          <div>
            <h4>Answer:
              <input  type="text" name="answer[{{ $question->questionid }}]">
            </h4>
          </div>
        @else
          <h4><strong>Answer:</strong>
            <select name="answer[{{ $question->questionid }}]">
              <option value="">Select</option>
              <option value="1">True</option>
              <option value="0">False</option>
            </select>
          </h4>        
        @endif
      </div>
      <input type="hidden" name="quiz-id" id="test-id" value="{{ $quiz->quizid }}">
      <input type="hidden" name="user-id" id="student-id" value="{{ Auth::user()->id }}">
      <p>{{ $questions->links('vendor.pagination.simple-default') }}</p>
      {{ Form::close() }}
    </div>
  </div>    
  @endforeach
</div> --}}