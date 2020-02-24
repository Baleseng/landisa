@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Extrovert')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif
  
	<div class="extrovert-submenu-vertical row">
	  <div class="submenu-vertical" id="submenu-nav">
      @include('include.user.section_nav_extrovert')
    </div>
	</div>

  <!-- HEADLINES ARTICLE SECTION CUSTOMIZED BY USER -->
  <div class="articles-main-container row">


    <div class="row more-section-container">

      @include('include.user.section_more_heading')

      <div class="more-article-container row extrovert-color-theme">
        @foreach ($news as $articles)

        @include('include.user.articles_more')
        
        @endforeach
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
  @include('layouts.user.sectionscript')
  @endsection

@endsection