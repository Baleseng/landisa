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

	<div class="user-wall-board-container">
  	<!-- POSTBOARD LFETSIDE CONTENT CONTAINER SECTION -->
  	<div class="post-board-left-wrap">
  		
			<div class="post-board-left-content {{ $section1[0] }}">
				@include('include.user.post_user_board_article_section_1')
			</div>
			<div class="post-board-left-content {{ $section2[0] }}">
				@include('include.user.post_user_board_article_section_2')
			</div>
			<div class="post-board-left-content {{ $section3[0] }}">
				@include('include.user.post_user_board_article_section_3')
			</div>
			<div class="post-board-left-content {{ $section4[0] }}">
				@include('include.user.post_user_board_article_section_4')
			</div>

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

		<!-- POSTBOARD SHARING CONTENT CONTAINER SECTION -->
		<div class="user-timeline-container">
			
			<div class="post-shared-wrap">
		    @include('include.user.user_wall_timeline_post')	  
			</div>

			<!-- POSTBOARD RIGHTSIDE CONTENT CONTAINER SECTION -->
			<div class="post-board-right-wrap">		
				@include('include.user.user_wall_site_section')
				  <!-- POSTBOARD RIGHTSIDE CONTENT CONTAINER SECTION -->
			  <div class="post-board-right-news-content sticky-div-post">
			    <div class="post-board-sponsored-row">
			      <h3>Sponsored Content</h3>
			    </div>
			  </div>	
			</div>
		</div>

		</div>
  </div>

  @section('script')
  
  @include('layouts.user.postscript')
  @endsection

@endsection