<div class="row">
    <div class="col-xs-12">
        @include('quizs.question.data_table_header')
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
                  <th>@lang('Question Name')</th>
                  <th>@lang('Status')</th>
                  <th>@lang('Action')</th>
                </tr>
              </thead>
                <tbody>
                  @if (isset($questions) && $questions->count() > 0)
                    @php($i=1)
                    @foreach($questions as $question)
                      <tr>
                        <td class="center first-child">
                            <label>
                                <input type="checkbox" name="chkIds[]" value="{{ $question->id }}" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td>{{ $i }}</td>
                        <td><a href="{{ $question->id }}">{{ $question->subject->name }}</a></td>
                        <td><a href="{{ $question->id }}">{{ $question->question_text }}</a></td>
                        <td class="hidden-480 ">
                          <div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-primary btn-minier dropdown-toggle {{ $question->status == '1'?"btn-info":"btn-warning" }}" >
                                  {{ $question->status == '1'?"Active":"In Active" }}
                                  <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                              </button>
                              <ul class="dropdown-menu">
                                  <li>
                                      <a href="{{ $question->id }}" title="Active"><i class="fa fa-check" aria-hidden="true"></i></a>
                                  </li>
                                  <li>
                                      <a href="{{ $question->id }}" title="In-Active"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                  </li>
                              </ul>
                          </div>
                        </td>
                        <td>
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a href="{{ $question->id }}" class="btn btn-primary btn-minier btn-primary">
                                    <i class="ace-icon fa fa-eye bigger-130"></i>
                                </a>
                                <a href="{{ $question->id }}" class="btn btn-primary btn-minier btn-success">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a href="{{ $question->id }}" class="btn btn-primary btn-minier btn-danger bootbox-confirm" >
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="{{ $question->id }}" class="tooltip-success" data-rel="tooltip" title="Edit">
                                            <span class="blue">
                                                <i class="ace-icon fa fa-eye bigger-120"></i>
                                            </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $question->id }}" class="tooltip-success" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                            </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ $question->id }}" class="tooltip-error bootbox-confirm" data-rel="tooltip" title="Delete">
                                                    <span class="red ">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </span>
                                            </a>
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