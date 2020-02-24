@extends('layouts.user.main')

@section('description', Auth::user()->name . ' ' . Auth::user()->surname)
@section('keywords', '')

@section('title',  Auth::user()->name . ' ' . Auth::user()->surname)

@section('style')
  @include('layouts.user.poststyle')
@endsection

@section('searchfield')
  @include('include.user.header_search_users')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

	@extends('layouts.user.wall')

	@section('content_user_nav')

    <div class="user-wall-hover-wrapper">
      <a href="{{ action('UserController@timeline', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="user-profile-nav-inactive"><i class="fa fa-sticky-note"></i> <b>Timeline</b></a>
      <div id="user-wall-hover-show">Timeline</div>
    </div>

    <div class="user-wall-hover-wrapper">
      <span class="user-profile-nav-active"><i class="fa fa-pencil-square"></i> <b>Stories</b></span>  
      <div id="user-wall-hover-show">Stories</div>
    </div>

    <div class="user-wall-hover-wrapper">
      <a href="{{ action('UserController@multimedia', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="user-profile-nav-inactive"><i class="fa fa-images"></i> <b>Multimedia</b></a>  
      <div id="user-wall-hover-show">Multimedia</div>
    </div>

    <div class="user-wall-hover-wrapper">
      <a href="{{ action('UserController@activity', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="user-profile-nav-inactive"><i class="fa fa-user-edit"></i> <b>Activity</b></a>  
      <div id="user-wall-hover-show">Activity</div>
    </div>

    <div class="user-wall-hover-wrapper">
      <a href="{{ action('UserController@about', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="user-profile-nav-inactive"><i class="fa fa-user-cog"></i> <b>About</b></a>  
      <div id="user-wall-hover-show">About</div>
    </div>

	@endsection
	
	@section('content_user_wall')
		
		@include('include.user.user_wall_stories')	
	  
	@endsection

  @section('script')
  @include('layouts.user.postscript')
  @endsection

@endsection
