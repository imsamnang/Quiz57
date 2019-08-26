@extends('layouts.master')

@section('custom-css')
    <!-- page specific plugin styles -->

@endsection

@section('menu-panel')
    @include('layouts.menu.menu_admin')
@endsection

@section('content')
  <div class="main-content">
    <div class="main-content-inner">
      <div class="page-content">
        <div class="row">
          <div class="new-start">
              <table class="table">
                  <thead>
                  <th>Quiz Title</th>
                  <th>Show</th>
                  <th>Questions</th>
                  <th>Total Questions</th>
                  <th>Start</th>
                  <th>Action</th>
                  </thead>
                  <tbody>
                  @if($allQuiz)
                    @foreach($allQuiz as $quiz)
                      <tr>
                          <td>{{ $quiz->title }}</td>
                          <td>
                            <a href="{{ route('quiz.subject.show',$quiz->slug) }}">View Quiz</a>
                          </td>
                          <td>
                            <a href="{{ route('quiz.question.create',$quiz->slug) }}" class="btn btn-info btn-sm">Add Questions</a>
                          </td>
                          <td>
                            @if(count($quiz->questions) <= 1)
                              {{ $quiz->questions->count() }} Question
                            @else
                              {{ $quiz->questions->count() }} Questions
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('quiz.start.quiz', $quiz->slug) }}" class="btn btn-success btn-sm">Start Quiz</a>
                          </td>
                          <td>
                            <form method="POST" action="{{route('quiz.subject.destroy',$quiz->id)}}" accept-charset="UTF-8" style="display:inline" id="deleteObject-{{$quiz->id}}">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                              <a href="#" class="btn btn-primary btn-sm btn-danger" onclick="deleteObject({{$quiz->id}})">Remove
                              </a>
                            </form>
                            {{-- <a href="{{ route('quiz.subject.destroy',$quiz->id) }}" class="btn btn-danger">Remove</a> --}}
                          </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="3">You have no available quizzes.</td>
                    </tr>
                  @endif
                  </tbody>
              </table>
              <a href="{{ route('quiz.subject.create') }}" class="btn btn-info btn-block">Create a new Quiz</a>
          </div>
        </div><!-- /.row -->
      </div>
    </div><!-- /.page-content -->
  </div>
  <!-- /.main-content -->
@endsection


@push('custom-js')
  {{-- @include('includes.scripts.jquery_validation_scripts') --}}
  <!-- inline scripts related to this page -->
  <script type="text/javascript">

  </script>
  {{-- @include('includes.dataTable_scripts') --}}
  @include('quizs.delete_confirm')
@endpush
