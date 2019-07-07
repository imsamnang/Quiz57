@extends('projectactivities.layout.master')

@section('css')
    <!-- page specific plugin styles -->

@endsection

@section('menu-panel')
    @include('projectactivities.layout.menu.menu_admin')
@endsection

@section('content')
  <div class="main-content">
    <div class="main-content-inner">
      <div class="page-content">
        <div class="row">
            <div class="col-xs-10 ">
                @include('quizs.errors.list')
                 {!! Form::open(['route' => ['subjects.update',$subject->id], 'method'=>'post', 'class'=>'form-horizontal']) !!}
                    {{method_field('PUT')}}
                    <div class="form-group">
                      {!! Form::label('name', 'Name of subject', ['class'=>'col-md-2 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::text('name', $subject->name, ['class'=>'form-control']) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('Topics', 'Topics', ['class'=>'col-md-2 control-label']) !!}
                      <div class="col-md-2">
                          {{-- {!! Form::select('topic_id', $topics, null, ['class'=>'form-control']) !!} --}}
                        <select name="topic_id" id="topic_id" class="form-control">
                          @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}"
                              {{ $topic->id==$subject->topic_id ?'selected':''}}
                              >{{ $topic->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('duration', 'Duration', ['class'=>'col-md-2 control-label']) !!}
                      <div class="col-md-4">
                        <div class="input-group">
                            {!! Form::text('duration', $subject->duration, ['class'=>'form-control']) !!}
                            <span class="input-group-addon">MINUTES</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('status', 'Active', ['class'=>'col-md-2 control-label']) !!}
                      <div class="col-md-10">
                        {!! Form::checkbox('status',null,$subject->status==1 ?['class'=>'checked']:'0') !!}
                      </div>
                       <input type="hidden" name="active" id="active" value="0">
                    </div>
                    {!! Form::token() !!}
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          {!! Form::submit('Update Subject', ['class'=>'btn btn-success']) !!}
                      </div>
                    </div>
                    {!! Form::close() !!}

            </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div><!-- /.page-content -->
  </div>
  <!-- /.main-content -->
@endsection


@section('js')
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
@endsection