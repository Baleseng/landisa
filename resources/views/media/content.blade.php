@extends('layouts.user.main')

@section('description', $content->description)
@section('keywords', $content->keywords)
@section('author', $content->writer)

@section('title', $content->title)

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

    <div class="multimedia-container">
    <div class="multimedia-box">
      
      @include('include.user.multimedia'.$content->section )
     
    </div>
  </div>

  <div class="multimedia-submenu-vertical row">
    <div class="submenu-vertical-wrap">
      <div class="submenu-vertical" id="submenu-nav">
        <span class="active"><i class="fa fa-picture-o"></i></span>
        <a href="">Gallery</a>
        <a href="">Video</a>
        <a href="">Embed Video</a>
        <a href="">Audio</a>
        <a href="">Virtual Reality 360</a>
        <a href="javascript:void(0);" class="icon" onclick="submenuHamburger()"><i class="fa fa-bars"></i></a>
      </div>
    </div>
  </div>

  <div id="multimedia">
    @include('include.user.media_article_body')
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
