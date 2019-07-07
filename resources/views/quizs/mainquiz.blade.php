@extends('Projectactivities.layout.master')
@section('page-title')
  @if(isset($generalSetting->institute))
    IMS | {{$generalSetting->institute}}
  @else
    IMS Management
  @endif
@endsection

@push('custom-css')
    
@endpush

@section('menu-panel')
  @include('projectactivities.layout.menu.menu_admin')
@endsection

@section('content')
  {{-- @include('ProjectActivities.layout.left.admin') --}}
<div class="container">
  <div class="row">
      Question-{{$first_question_id}}
  </div>
</div>

@endsection
{{-- For Custom JS --}}
@push('custom-js')
    
@endpush