@extends('layouts.user.main')

@section('description', $id->description)
@section('keywords', $id->keywords)
@section('author', )


@section('title', $id->title)

@section('style')
  @include('layouts.user.articlestyle')
@endsection

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <!-- PARALALAX ARTICLE IMAGE CONTAINER SECTION -->
  <div class="articleparallax extrovert">
  	@include('include.user.news_article_parallax')
	</div>

	<div class="extrovert-submenu-article row">
     <div class="submenu-vertical-wrap">
      <div class="submenu-vertical" id="submenu-nav">
        @include('include.user.section_nav_extrovert')
      </div>
    </div>
	</div>

  <div id="extrovert">
    @include('include.user.news_article_body')
  </div>

  <!-- FOOTER SECTION -->
  <footer>
    <div class="footer-container row">
      @include('include.user.footer_section')
    </div>
  </footer>

  @section('script')
  @include('layouts.user.articlescript')
  @endsection
@endsection