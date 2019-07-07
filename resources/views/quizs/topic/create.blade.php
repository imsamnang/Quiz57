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
                {!! Form::open(['route' => ['topics.store'], 'method'=>'post', 'class'=>'form-horizontal']) !!}


                <div class="form-group">
                    {!! Form::label('name', 'Name of Topic', ['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Active', ['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::checkbox('status',0) !!}
                        <input type="hidden" name="active" id="active" value="0">
                    </div>
                </div>
                {!! Form::token() !!}

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::submit('Create Topic', ['class'=>'btn btn-primary']) !!}
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