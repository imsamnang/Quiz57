<div class="row">
  <div class="col-xs-12">
    @include('quizs.subject.data_table_header')
    <!-- div.table-responsive -->
    <div class="table-responsive">
      {!! Form::open() !!}
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center">
              <label class="pos-rel">
                <input type="checkbox" class="ace" />
                <span class="lbl"></span>
              </label>
            </th>
            <th>@lang('No.')</th>
            <th>@lang('Subject Name')</th>
            <th>@lang('Topic Name')</th>
            <th>@lang('Duration')</th>
            <th>@lang('Status')</th>
            <th>@lang('Action')</th>
          </tr>
        </thead>
        <tbody>
          @if (isset($subjects) && $subjects->count() > 0)
            @php($i=1)
            @foreach($subjects as $subject)
              <tr>
                <td class="center first-child">
                  <label>
                    <input type="checkbox" name="chkIds[]" value="{{ $subject->id }}" class="ace" />
                      <span class="lbl"></span>
                  </label>
                </td>
                <td>{{ $i }}</td>
                <td><a href="{{ $subject->id }}">{{ $subject->name }}</a></td>
                <td><a href="{{ $subject->id }}">{{ $subject->topic->name }}</a></td>
                 <td><a href="{{ $subject->id }}">{{ $subject->duration }} mins</a></td>
                <td class="hidden-480 ">
                  <div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-primary btn-minier dropdown-toggle {{ $subject->status == '1'?"btn-info":"btn-warning" }}" >
                          {{ $subject->status == '1'?"Active":"In Active" }}
                          <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="{{ $subject->id }}" title="Active"><i class="fa fa-check" aria-hidden="true"></i></a>
                        </li>
                        <li>
                          <a href="{{ $subject->id }}" title="In-Active"><i class="fa fa-remove" aria-hidden="true"></i></a>
                        </li>
                      </ul>
                  </div>
                </td>
                <td>
                  <div class="hidden-sm hidden-xs action-buttons">
                    <a class="btn btn-primary btn-minier" href="{{route('subjects.createQuestion', $subject->id)}}">Manage Questions</a>
                    <a href="{{ route('subjects.show',$subject->id) }}" class="btn btn-primary btn-minier btn-primary">
                      <i class="ace-icon fa fa-eye bigger-130"></i>
                    </a>
                    <a href="{{ route('subjects.edit',$subject->id) }}" class="btn btn-primary btn-minier btn-success">
                      <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <form method="POST" action="{{route('subjects.destroy',$subject->id)}}" accept-charset="UTF-8" style="display:inline" id="deleteObject-{{$subject->id}}">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      {{--<button class="btn btn-primary btn-minier btn-danger" onclick="deleteObject({{$subject->id}})" type="button">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                      </button> --}}
                      <a href="#" class="btn btn-primary btn-minier btn-danger" onclick="deleteObject({{$subject->id}})"><i class="ace-icon fa fa fa-trash-o bigger-120"></i>
                      </a>
                    </form>   
                  </div>
                  <div class="hidden-md hidden-lg">
                      <div class="inline pos-rel">
                          <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                              <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                              <li>
                                  <a href="{{ $subject->id }}" class="tooltip-success" data-rel="tooltip" title="Edit">
                                  <span class="blue">
                                      <i class="ace-icon fa fa-eye bigger-120"></i>
                                  </span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ $subject->id }}" class="tooltip-success" data-rel="tooltip" title="Edit">
                                  <span class="green">
                                      <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                  </span>
                                  </a>
                              </li>
                              <li>
                                <form method="POST" action="{{route('subjects.destroy',$subject->id)}}" accept-charset="UTF-8" style="display:inline" id="deleteObject-{{$subject->id}}">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                  {{--<button class="btn btn-primary btn-minier btn-danger" onclick="deleteObject({{$subject->id}})" type="button">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                  </button> --}}
                                  <a href="#" class="btn btn-primary btn-minier btn-danger" onclick="deleteObject({{$subject->id}})"><i class="ace-icon fa fa fa-trash-o bigger-120"></i>
                                  </a>
                                </form>                                  
                              </li>
                          </ul>
                      </div>
                  </div>
                </td>
              </tr>
            @php($i++)
            @endforeach
          @else
            <tr>
                <td colspan="11">No data found.</td>
            </tr>
          @endif
        </tbody>
      </table>
      {!! Form::close() !!}
    </div>
    </div>
  </div>
</div>