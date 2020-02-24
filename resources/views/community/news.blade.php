@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')
@section('author', '')

@section('title', 'community | '.$stories->title)


@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

	<div class="community-stories-container">
		<div class="community-stories">

			<div class="community-stories-top">

				<div class="community-stories-user">
					<div class="community-stories-user-img">
						<a href="{{ url('wall') }}"><img class="fa fa-user" src="{{ URL::asset('images/profile/users/'.$stories->profileimg) }}"></a>
					</div>
					<div class="community-stories-user-name">
						<a href="{{ url('wall') }}">{{ $stories->name }} {{ $stories->surname }}</a>
					</div>
				</div>

				<div class="community-stories-title">
					<h1>{{ $stories->title }}</h1>
					<span>Community Member | {{ $stories->created_at->diffForHumans() }}</span>
				</div>

			</div>

			<div class="community-stories-wrap community" id="modal">
				
				<!-- FULL ARTICLE SECTION -->
				<div class="community-stories-full">{!! $stories->story !!}</div>		
				
				<div class="community-stories-btn-wrap">
				<!-- ARTICLE SOCIALBTN CONTAINER SECTION -->
					<div class="community-stories-btn-socialbtn row">
					@include('include.community_stories_interactive_btn')
					</div>
				</div>

				<!-- ARTICLE COMMENT CONTAINER SECTION -->
	      <comment comment-url="{{ $pageId }}"></comment>

			</div>
		</div>

		<!-- RIGHT SIDEBAR SECTION -->
	  <div class="right-sidebar-article-container">

	  	<div class="interactive-article-results">
				<ul>
			    <li><i class="fa fa-eye"></i> <b>{{$stories->views}}</b></li>
			    <li><i class="fa fa-comment"></i> <b>{{$stories->comment}}</b></li>
			    <li><i class="fa fa-share"></i> <b>{{$stories->shared}}</b></li>
			    <li><i class="fa fa-smile"></i> <b>{{$stories->mood}}</b></li>
			  </ul>
			</div>

	    <div class="related-article-heading">Trending Community Stories</div>

	    </div>
	  </div>

	</div>
	

  <!-- FOOTER SECTION -->
  <footer>
    <div class="footer-container row">
      @include('include.user.footer_section')
    </div>
  </footer>
  
  @section('script')
  @include('layouts.communityscript')
  @endsection

@endsection


