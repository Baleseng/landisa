@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Backpacker')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="backpacker-submenu-vertical row">
     <div class="submenu-vertical-wrap">
      <div class="submenu-vertical" id="submenu-nav">
        @include('include.user.section_nav_backpacker')
      </div>
    </div>
  </div>

  <!-- HEADLINES ARTICLE SECTION CUSTOMIZED BY USER -->
  <div class="articles-main-container row">

    @include('include.user.section_latest_heading')
    
    <div class="articles-main-wrapper backpacker-color-theme">
      <div class="content">
         
        @foreach ($news->where('section', '=', 'backpacker')->take(1) as $articles)
        <div class="content-article-tab"> 
          @include('backpacker.tabbackpacker_main')
        </div>
        @endforeach
        
        <div class="content-sub-article-tab">
          @foreach ($news->where('section', '=', 'backpacker')->take(4) as $articles)
          <div class="content-sub-article-row">
            <span class="content-section backpacker">
             <i class="fa fa-backpacker"></i>
            </span>  
            @include( 'backpacker.tabbackpacker' )
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="trending-main-wrapper backpacker-color-theme">  
      <div class="trending-main-wrap"> 
        <ol>
          @foreach ($news->where('section', '=', 'backpacker')->take(5)->reverse() as $articles)
            @include('include.user.articles_trending')
          @endforeach
        </ol>
      </div>
    </div>

    <!-- BACKPACKER MULTIMEDIA -->
    <div class="multimedia-section-container">

      @include('include.user.section_multimedia_heading')

      <div class="multimedia-section-wrapper backpacker-media-bg">
        <section class='gallery backpacker-color-theme' id="section">
          @foreach ($content->where('subsection', '=', 'backpacker')->take(10) as $articles)
            @include('backpacker.tabbackpacker_multimedia' )
          @endforeach
        </section>
      </div>
    </div>

    <div class="row more-section-container">

      @include('include.user.section_more_heading')

      <div class="more-article-container row backpacker-color-theme">
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