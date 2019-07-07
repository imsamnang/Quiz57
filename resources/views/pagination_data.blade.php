<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <tr>
      <th width="5%">ID</th>
      <th width="45%">Quiz Title</th>
      <th width="50%">User Name</th>
    </tr>
    @foreach($data as $row)
      <tr>
        <td>{{ $row->quizid }}</td>
        <td>{{ $row->title }}</td>
        <td>{{ $row->user_id }}</td>
      </tr>
    @endforeach
  </table>
  {!! $data->links('vendor.pagination.simple-bootstrap-4') !!}
</div>