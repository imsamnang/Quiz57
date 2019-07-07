@extends('layouts.master')
@section('page-title')
  @if(isset($generalSetting->institute))
    IMS | {{$generalSetting->institute}}
  @else
    IMS Management
  @endif
@endsection

@push('custom-css')
    
@endpush

@section('menu-panel')
    @include('layouts.menu.menu_admin')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="new-start">
          <h4>Question: {{ $question->title }}</h4>
          <div class="bottom-10"></div>

          @if($question->answerIsSet())
              <table class="table">
                  <thead>
                      <th>Answer Option</th>
                      <th>Correct</th>
                  </thead>
                  <tbody>
                      @foreach($question->options as $option)
                          <tr>
                              <td>{{ $option->title }}</td>
                              <td>
                                  @if($option->isCorrect())
                                      Correct
                                  @else
                                      Incorrect
                                  @endif
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              <a href="{{ route('quiz.subject.show', $quiz->slug) }}" class="btn btn-info">Back to Quiz</a>
          @else
              <p>Please select your answers for this question</p>
              <hr>
              {!! Form::open(['method' => 'post', 'route' => [ 'quiz.answer.store', $question->slug ]]) !!}
                  @foreach($question->options as $option)
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" class="" name="option[]" value="{{ $option->id }}">
                              {{ $option->title }}
                          </label>
                      </div>
                  @endforeach
              <hr>
                  {!! Form::submit('Save Changes', ['class' => 'btn btn-info']) !!}
              {!! Form::close() !!}
          @endif
      </div>
    </div>
  </div>
@endsection
  {{-- For Custom JS --}}
@push('custom-js')
    
@endpush