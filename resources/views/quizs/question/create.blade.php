@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{asset('assets/quiz/custom.css')}}">
@endpush

@section('menu-panel')
    @include('layouts.menu.menu_admin')
@endsection

@section('content')
  <div class="main-content">
    <div class="main-content-inner">
      <div class="page-content">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <div class="new-start">
                <h4>Quiz: {{ $quiz->title }}</h4>
                <hr>
                {!! Form::open(['method' => 'post', 'route' => ['quiz.question.store', $quiz->slug]]) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Question Title') !!}
                    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
                </div>

                <hr>
                <div class="question-options"></div>
                {{-- status --}}
                <div class="form-group">
                    {!! Form::label('status', 'Active', ['class'=>'control-label']) !!}
                      {!! Form::checkbox('status') !!}
                      <input type="hidden" name="active" id="active" value="0">                      
                </div>  
                <div class="add-question-option btn btn-info">Add New Option</div>
                <hr>

                <div class="form-group">
                    <a href="{{ route('quiz.subject.show', $quiz->slug) }}" class="btn btn-info">Back to quiz</a>
                    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                </div>
                {!! Form::close() !!}
            </div>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div><!-- /.page-content -->
  </div>
  <!-- /.main-content -->
@endsection

@push('custom-js')
  {{-- @include('includes.scripts.jquery_validation_scripts') --}}
  <script src="{{asset('assets/quiz/jquery.session.js')}}"></script>
  <script src="{{asset('assets/quiz/custom.js')}}"></script>
  <!-- inline scripts related to this page -->
  <script type="text/javascript">
    $('div.alert-success').delay(3000).slideUp(400);
    $(function(){
      $('a#btn-delete').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        var $a = this;
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this category!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: '#DD6B55',
          confirmButtonText: 'Yes, delete it!',
          closeOnConfirm: false
        },
        function(){
            //console.log($($a).attr('href'));
            document.location.href=$($a).attr('href');
        });
      });
    });
  </script>
  <script type="text/javascript">
    $("#status").click(function () {
      if ($(this).prop("checked")) {
        $("#active").val("1");
      }
      else {
        $("#active").val("0");
      }
    });    
  </script>
@endpush