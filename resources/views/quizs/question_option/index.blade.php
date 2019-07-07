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
            <div class="col-xs-12 ">

            </div><!-- /.col -->
        </div><!-- /.row -->
        @include('quizs.question_option.table')     
      </div>
    </div><!-- /.page-content -->
  </div>
  <!-- /.main-content -->
@endsection


@section('js')
  {{-- @include('includes.scripts.jquery_validation_scripts') --}}
  <!-- inline scripts related to this page -->
  <script type="text/javascript">

  </script>
  @include('projectactivities.students.includes.dataTable_scripts')
@endsection