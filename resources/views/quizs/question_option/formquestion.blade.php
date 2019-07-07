  <div class="form-group">
  {!! Form::label('question', 'Question:', ['class'=>'col-md-2 control-label']) !!}
  <div class="col-md-7">
      {!! Form::textarea('question', null, ['class'=>'form-control', 'size'=>'30x3']) !!}
  </div>
  </div>

  {{-- wrong answer --}}
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

  <div class="form-group">
    {!! Form::label('answer', 'Answers:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-2">
      {{-- {!! Form::select('answer',$answer, null,  [ 'class'=>'form-control']) !!} --}}
      {!! Form::text('answer', null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="form-group">
      {!! Form::label('status', 'Active', ['class'=>'col-md-2 control-label']) !!}
      <div class="col-md-10">
          {!! Form::checkbox('status') !!}
      </div>
  </div>  
  {!! Form::token() !!}
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      {!! Form::submit($title_button, ['class'=>'btn btn-primary']) !!}
    </div>
    @if(isset($question))
      <div class="col-sm-offset-1 col-sm-2">
          <a class="btn btn-danger" id="btn-delete" href="{{route('subjects.destroy', [$question->id])}}">Delete</a>
      </div>
    @endif
  </div>
{!! Form::close()!!}

