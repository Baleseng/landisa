@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Multimedia')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif
  
  <div class="multimedia-submenu-vertical row">
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

  <div class="multimedia-section-container">
    <div class="multimedia-section-wrapper">
      <div class="multimedia-gallery-names">
        <a href="" class="multimedia-color-theme">
          <!-- <i class="fa fa-{{ $section1[0] }}"></i> -->
          Latest Multimedia Content
        </a>
      </div>

      <section class='gallery multimedia-color-theme' id="section">
        @foreach ($content->where('category', '=', 'multimedia')->take(10) as $articles)
        @include('include.user.multimedia_content_article')
        @endforeach
      </section>

    </div>
  </div>

  <div class="multimedia-section-container">
    <div class="multimedia-section-wrapper">

      <div class="multimedia-gallery-names">
        <a href="" class="{{ $section1[0] }}-color-theme">
          <i class="fa fa-{{ $section1[0] }}"></i>
          {{ $section1[0] }}
        </a>
      </div>
      <section class='gallery {{ $section1[0] }}-color-theme' id="section">    
        @foreach ( $content->where('subsection', '=', $section1[0] )->take(10) as $articles )  
        @include( $section1[0] . '.tab' . $section1[0] . '_multimedia' )
        @endforeach
      </section>

    </div>
  </div>

  <div class="multimedia-section-container">
    <div class="multimedia-section-wrapper">

      <div class="multimedia-gallery-names">
        <a href="" class="{{ $section2[0] }}-color-theme">
          <i class="fa fa-{{ $section2[0] }}"></i>
          {{ $section2[0] }}
        </a>
      </div>
      <section class='gallery {{ $section2[0] }}-color-theme' id="section">
        @foreach ( $content->where('subsection', '=', $section2[0] )->take(10) as $articles )
        @include( $section2[0] . '.tab' . $section2[0] . '_multimedia' )
        @endforeach
      </section>

    </div>
  </div>

  <div class="multimedia-section-container">
    <div class="multimedia-section-wrapper">

      <div class="multimedia-gallery-names">
        <a href="" class="{{ $section3[0] }}-color-theme">
          <i class="fa fa-{{ $section3[0] }}"></i>
          {{ $section3[0] }}
        </a>
      </div>
      <section class='gallery {{ $section3[0] }}-color-theme' id="section">
        @foreach ( $content->where('subsection', '=', $section3[0] )->take(10) as $articles )
        @include( $section3[0] . '.tab' . $section3[0] . '_multimedia' )
        @endforeach
      </section>

    </div>
  </div>

  <div class="multimedia-section-container">
    <div class="multimedia-section-wrapper">

      <div class="multimedia-gallery-names">
        <a href="" class="{{ $section4[0] }}-color-theme">
          <i class="fa fa-{{ $section4[0] }}"></i>
          {{ $section4[0] }}
        </a>
      </div>
      <section class='gallery {{ $section4[0] }}-color-theme' id="section">
        @foreach ( $content->where('subsection', '=', $section4[0] )->take(10) as $articles )
        @include( $section4[0] . '.tab' . $section4[0] . '_multimedia' )
        @endforeach
      </section>

    </div>
  </div>

  <!-- FOOTER SECTION -->
  <footer>
    <div class="footer-container row">
      @include('include.user.footer_section')
    </div>
  </footer>

  @section('script')
  @include('layouts.user.indexscript')
  @endsection

@endsection