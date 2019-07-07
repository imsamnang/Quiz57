@extends('projectactivities.layout.master')

@section('css')
    <!-- page specific plugin styles -->
@endsection

@section('menu-panel')
    @include('projectactivities.layout.menu.menu_admin')
@endsection

@section('content')
  @if(Session::has('flash_mess'))
    <div class="alert alert-success">{{Session::get('flash_mess')}}</div>
  @endif
  <div class="main-content">
    <div class="main-content-inner">
      <div class="page-content">
        <div class="row">
          <div class="col-xs-10 ">
            <div class="row">
              <div class="col-md-offset-1 col-md-7">
                <h3>Subject name: {{$subject->name}}</h3>
                <h3>Category: {{$subject->topic->name}}</h3>
                <h3>Duration: {{$subject->duration}} minutes</h3>
              </div>
            </div>
            <br>
            @include('quizs.errors.list')
            {!! Form::open(['route'=>['subjects.saveQuestion', $subject->id], 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'add-new-question'])!!}
              <div class="form-group">
                <h3>{!! Form::label('question', 'Question:', ['class'=>'col-md-2 control-label']) !!}</h3>
                <div class="col-md-7">
                    {!! Form::textarea('question', null, ['class'=>'form-control', 'size'=>'30x3']) !!}
                </div>
              </div>
              {{-- answer options --}}
              <div class="form-group">
                <div class="col-md-7 col-md-offset-2">                  
                  <div class="table-responsive">
                    <table class="table table-hover" id="dynamic_field" border="0">      
                      <tr>  
                        <td>
                          <input type="text" name="question_option[]" id="question_option" class="form-control option_list" placeholder="Enter Answers" value="">
                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm">Add More</button></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              {{-- correct answer --}}
              <div class="form-group">
                {!! Form::label('answer', 'Answers:', ['class'=>'col-md-2 control-label']) !!}
                <div class="col-md-2">
                  {{-- {!! Form::select('answer',$answer, null,  [ 'class'=>'form-control']) !!} --}}
                  {!! Form::text('answer', null, ['class'=>'form-control']) !!}
                </div>
              </div>
              {{-- status --}}
              <div class="form-group">
                  {!! Form::label('status', 'Active', ['class'=>'col-md-2 control-label']) !!}
                  <div class="col-md-10">
                      {!! Form::checkbox('status') !!}
                  </div>
              </div>  
              {!! Form::token() !!}
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                  <a class="btn btn-warning" href="{{route('subjects.index')}}"><span class="glyphicon glyphicon-arrow-left"></span> Back to subjects</a>
                  {!! Form::submit($title_button, ['class'=>'btn btn-primary']) !!}
                </div>
              </div>
            {!! Form::close()!!}


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

    // $('#add-new-question').hide();
    // $('#btn-add-new-question').on('click', function(){
    //   $('#add-new-question').slideDown();
    // });

    jQuery(document).ready(function() {
      var i=1;
      // button add more field
      $('#add').click(function(event) {
        i++;
        $('#dynamic_field').append('' + 
          '<tr id="row'+i+'" class="dynamic-added">'+
          '<td><input type="text" name="question_option[]" id="question_option" class="form-control option_list" placeholder="Enter Answers"></td>'+
          '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn-remove">x</button></td>'+
          '</tr>');
      });

      // Action on button remove
      $(document).on('click','.btn-remove',function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
      });
    });
  </script>

@endsection