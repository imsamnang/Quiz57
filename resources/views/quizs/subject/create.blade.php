@extends('layouts.master')

@section('css')

@endsection

@section('menu-panel')
    @include('layouts.menu.menu_admin')
@endsection

@section('content')
  <div class="main-content">
    <div class="main-content-inner">
      <div class="page-content">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="new-start">
                <h4>New Quiz</h4>
                <hr>
                {!! Form::open(['route'=>['quiz.subject.store'],'method'=>'post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('max_attempts', 'Max Attempts') !!}
                    {!! Form::input('number', 'max_attempts', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('pass_percentage', 'Pass Percentage') !!}
                    {!! Form::input('text', 'pass_percentage', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('question_duration', 'Question Duration') !!}
                    {!! Form::input('number', 'question_duration', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Active', ['class'=>'control-label']) !!}
                    {!! Form::checkbox('status') !!}
                    <input type="hidden" name="active" id="active" value="0">
                </div>

                {!! Form::hidden('reference') !!}

                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                </div>
                {!! Form::close() !!}
            </div>            
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