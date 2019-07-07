@extends('layouts.master')
@section('page-title')
{{--   @if(isset($generalSetting->institute))
    IMS | {{$generalSetting->institute}}
  @else
    IMS Management
  @endif --}}
@endsection

@push('custom-css')
    
@endpush

@section('menu-panel')
    @include('layouts.menu.menu_admin')
@endsection

@section('content')
  {{-- @include('ProjectActivities.layout.left.admin') --}}
<div class="container">
  {{-- <form action="" id="start_quiz" name="start_quiz" method="POST"> --}}
    <div class="row">
	    <div class="new-start">
	        <h4>Quiz: {{ $quiz->title }}</h4>
	        <hr>
	        <div class="bottom-10"></div>
	        <table class="table">
	            <thead>
	                <th>Questions</th>
	                <th>Options</th>
	                <th>Correct Answer</th>
	                <th>Tools</th>
	            </thead>
	            <tbody>
	                @foreach($quiz->questions as $question)
	                    <tr>
	                        <td><a href="{{ route('quiz.question.show', [$quiz->slug, $question->slug]) }}">{{ $question->title }}</a></td>
	                        <td>{{ count($question->options) }}</td>
	                        <td>
	                            @if(count($question->answers) === 0)
	                                <a href="{{ route('quiz.question.show',[$quiz->slug, $question->slug]) }}">Add Answer</a>
	                            @else
	                                {{ \App\Models\Quiz\Option::find($question->answers->first()->option_id)->title }}
	                            @endif
	                        </td>
	                        <td><a href="{{route('quiz.question.destroy',$question->slug)}}">Delete Question</a></td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>

	        <a href="{{ route('quiz.subject.index') }}" class="btn btn-success">Home</a>
	        <a href="{{ route('quiz.question.create', $quiz->slug) }}" class="btn btn-info">Add Questions</a>
	    </div>    
    </div>
  {{-- </form> --}}
</div>
@endsection
  {{-- For Custom JS --}}
@push('custom-js')
    
@endpush