@extends('layouts.master')
@section('page-title')
  {{--@if(isset($generalSetting->institute))
    IMS | {{$generalSetting->institute}}
  @else
    IMS Management
  @endif --}}
@endsection
  {{-- For Custom CSS --}}
@push('custom-css')
  <script>
    function str_pad_left(string,pad,length) {
      return (new Array(length+1).join(pad)+string).slice(-length);
    }
    jQuery(document).ready(function($) {
	    window.history.pushState(null, "", window.location.href);        
	    window.onpopstate = function() {
	    window.history.pushState(null, "", window.location.href);
	    };
    });
	</script>
@endpush

@section('menu-panel')
  @include('layouts.menu.menu_admin')
@endsection


@section('content')
  <div class="container">
    <div class="row">
      <div class="new-start">
				<div class="col-md-8 col-md-offet-2">
					<div class="page-min-height"  style="background-color: rgb(69, 77, 102)">
					    <div class="container">
					        <div class="row justify-content-center" style="margin: 30px 0px">
					            <div class="col-md-5">
					                <section class="all_quiz_list" style="padding: 40px 0px 16px">
					                    <div class="inner-container">
					                        <div class="card cardHome">
					                            <div class="content active">
					                                <h5>Total Questions: <span style="font-size: 15px;">{{ $questionsCount }}</span></h5>
					                                <h5>Your Correct: <span style="font-size: 15px;">{{ $score_percentage }}%</span></h5>
					                                <h5>View Detailed Result: <span style="text-decoration: none;color:#fff;font-size: 15px"><a href="/viewSigleResult/{{ $uniqueQuizAppearId }}"> Click here </a></span></h5>
					                            </div>
					                        </div>
					                    </div>
					                </section>
					            </div>
					        </div>
					    </div>
					</div>					
				</div>
      </div>     
    </div>
  </div>
@endsection
  {{-- For Custom JS --}}
@push('custom-js')

@endpush