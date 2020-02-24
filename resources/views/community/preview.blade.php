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

	<div class="article-interactive-container">
		
		<div class="main-article-container">
			<div class="community-article-title-wrap">
				<div class="community-article-user-block">
					<div class="community-article-user-img">
						<a href="{{ url('wall') }}"><img class="fa fa-user" src="{{ URL::asset('images/profile/users/'.$stories->profileimg) }}"></a>
					</div>
					<div class="community-article-user-name">
						<a href="{{ url('wall') }}">{{ $stories->name }} {{ $stories->surname }}</a>
					</div>
				</div>
				<div class="community-article-title-block">
					<h1>{{ $stories->title }}</h1>
					<span>Community Member | {{ $stories->created_at->diffForHumans() }}</span>
				</div>
			</div>

			<div class="main-article-wrap community" id="modal">
				<div class="interactive-results">
				<!-- ARTICLE RESULTS CONTAINER SECTION -->
				@include('include.interactive_article_results')
				</div>
				<div class="interactive-wrap">
				<!-- ARTICLE SOCIALBTN CONTAINER SECTION -->
					<div class="interactive-socialbtn row">
						@include('include.community_article_interactive_btn')
					</div>
				</div>
				<!-- FULL ARTICLE SECTION -->
				<div class="article-min-article">{{ $stories->synopsis }}</div>
				<div class="article-max-article">{!! $stories->full_article !!}</div>		
				<div class="interactive-wrap">
				<!-- ARTICLE SOCIALBTN CONTAINER SECTION -->
					<div class="interactive-socialbtn row">
					@include('include.community_article_interactive_btn')
					</div>
				</div>
			</div>

			<!-- ARTICLE COMMENT CONTAINER SECTION -->
			<div class="interactive-comment" id="comment">
				@include('include.interactive_article_comment')
			</div>
		</div>
	</div>
	<!-- RIGHT SIDEBAR SECTION -->
	<div class="related-article-container sticky community">
		<div class="related-article-heading">Other Users Articles</div>
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


