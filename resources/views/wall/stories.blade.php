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

  @section('wall')
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

        @include('include.user.user_wall_cover_img_btn')
      
        <div class="user-wall-board-profile-wrap">
          <div class="user-wall-board-profile-img">
            <img class="fa fa-user" src="{{ URL::asset('images/users/'.Auth::user()->avator) }}" />
            @include('include.user.user_wall_avator_btn')
          </div>

          <div class="user-wall-board-profile-button">
            <div class="user-wall-board-profile-nav row">
              
              <div class="user-wall-hover-wrapper">
                <a href="{{ action('WallController@timeline', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="user-profile-nav-inactive"><i class="fa fa-sticky-note"></i> <b>Timeline</b></a>
                <div id="user-wall-hover-show">Timeline</div>
              </div>

              <div class="user-wall-hover-wrapper">
                <span class="user-profile-nav-active"><i class="fa fa-pencil-square"></i> <b>Stories</b></span>  
                <div id="user-wall-hover-show">Stories</div>
              </div>

              <div class="user-wall-hover-wrapper">
                <a href="{{ action('WallController@multimedia', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="user-profile-nav-inactive"><i class="fa fa-images"></i> <b>Multimedia</b></a>  
                <div id="user-wall-hover-show">Multimedia</div>
              </div>

              <div class="user-wall-hover-wrapper">
                <a href="{{ action('WallController@activity', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="user-profile-nav-inactive"><i class="fa fa-user-edit"></i> <b>Activity</b></a>  
                <div id="user-wall-hover-show">Activity</div>
              </div>

              <div class="user-wall-hover-wrapper">
                <a href="{{ action('WallController@about', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="user-profile-nav-inactive"><i class="fa fa-user-cog"></i> <b>About</b></a>  
                <div id="user-wall-hover-show">About</div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      
      @include('include.user.user_wall_stories') 
    <!-- POSTBOARD SHARING CONTENT CONTAINER SECTION -->
    </div>
	@endsection


  @section('script')
    <script type="text/javascript">
    	$(".btn").click(function () {
  		  $("input[type='file']").trigger('click');
  		});

  		$('input[type="file"]').on('change', function() {
  		  var val = $(this).val();
  		  $(this).siblings('span').text(val);
  		})
    </script>
    @include('layouts.user.postscript')
  @endsection

@endsection
