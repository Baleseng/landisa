@extends('layouts.user.main')

@section('description', Auth::user()->name . ' ' . Auth::user()->surname)
@section('keywords', '')

@section('title',  Auth::user()->name . ' ' . Auth::user()->surname)

@section('style')
  @include('layouts.user.poststyle')
  
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>

  {!! $chartcolumn->script() !!}
@endsection


@section('searchfield')
  @include('include.user.header_search_users')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="user-wall-board-container">
    
  <!-- POSTBOARD LFETSIDE CONTENT CONTAINER SECTION -->
  <div class="post-board-left-wrap">
    <div class="post-board-disclaimer">
      <ul>
        <li><a href="">About</a></li> 
        <li><a href=""> Help Center</a></li> 
        <li><a href="">Privacy & Terms</a></li> 
        <li><a href="">Advertising</a></li> 
        <li><a href="">Business Services</a></li> 
        <li><a href="">Get the APP</a></li> 
        <li><a href="">More</a></li>
      </ul>
    </div>
  </div>

  <div class="user-wall-cover-image-container">   
    
    <div class="user-wall-cover-image">
      <img class="fa fa-image" src="{{ URL::asset('images/users/'.Auth::user()->coverimg) }}"/>
    </div>

    <div class="user-wall-board-profile-wrap">
      <div class="user-wall-board-profile-img">
        <img class="fa fa-user" src="{{ URL::asset('images/users/'.Auth::user()->avator) }}" />  
      </div>

      <div class="user-wall-board-profile-button">
        <div class="user-wall-board-profile-nav row">
          
          <div class="user-wall-hover-wrapper">
            <span class="user-profile-nav-active" id="btn1"><i class="fa fa-sticky-note"></i> <b>Timeline</b></a>
          </div>

          <div class="user-wall-hover-wrapper">
            <span class="user-profile-nav-active" id="btn2"><i class="fa fa-pencil-square"></i> <b>Stories</b></span>  
          </div>

          <div class="user-wall-hover-wrapper">
            <span class="user-profile-nav-active" id="btn3"><i class="fa fa-images"></i> <b>Multimedia</b></span>  
          </div>

          <div class="user-wall-hover-wrapper">
            <span class="user-profile-nav-active" id="btn4"><i class="fa fa-user-edit"></i> <b>Activity</b></span>  
          </div>

          <div class="user-wall-hover-wrapper">
            <span class="user-profile-nav-active" id="btn5"><i class="fa fa-user-cog"></i> <b>About</b></span>  
          </div>

        </div>
      </div>

    </div>
  </div>

	<div class="user-profile-container">
    
		<div class="user-profile-row row">
			<div class="user-profile-name">
				<h1>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h1>
			</div>
		</div>

    <div id="div1">@include('include.user.user_wall_profile')</div>
    
	</div>

  <script>
    $(document).ready(function(){
      $("#btn1").click(function(){
        $.ajax({url: "@include('include.user.user_wall_timeline')", success: function(result){
          $("#div1").html(result);
        }});
      });
    });
  </script>
		

  @section('script')
  @include('include.user.user_wall_profile_chart')
  @include('layouts.user.postscript')
  @endsection

@endsection
