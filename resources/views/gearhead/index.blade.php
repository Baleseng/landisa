@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Gearhead')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="gearhead-submenu-vertical row">
    <div class="submenu-vertical-wrap">
      <div class="submenu-vertical" id="submenu-nav">
        @include('include.user.section_nav_gearhead')
      </div>
    </div>
  </div>

  <!-- HEADLINES ARTICLE SECTION CUSTOMIZED BY USER -->
  <div class="articles-main-container row">

    @include('include.user.section_latest_heading')
    
    <div class="articles-main-wrapper gearhead-color-theme">
      <div class="content">
          
        @foreach ($news->where('section', '=', 'gearhead')->take(1) as $articles)
        <div class="content-article-tab"> 
          @include('gearhead.tabgearhead_main')
        </div>
        @endforeach
        
        <div class="content-sub-article-tab">
          @foreach ($news->where('section', '=', 'gearhead')->take(4) as $articles)
          <div class="content-sub-article-row">
            <span class="content-section gearhead">
             <i class="fa fa-gearhead"></i>
            </span>  
            @include( 'gearhead.tabgearhead' )
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="trending-main-wrapper gearhead-color-theme">  
      <div class="trending-main-wrap"> 
        <ol>
          @foreach ($news->where('section', '=', 'gearhead')->take(5)->reverse() as $articles)
            @include('include.user.articles_trending')
          @endforeach
        </ol>
      </div>
    </div>

    <!-- GEARHEAD MULTIMEDIA -->
    <div class="multimedia-section-container">

      @include('include.user.section_multimedia_heading')

      <div class="multimedia-section-wrapper gearhead-media-bg">
        <section class='gallery gearhead-color-theme' id="section">
          @foreach ($content->where('subsection', '=', 'gearhead')->take(10) as $articles)
            @include('gearhead.tabgearhead_multimedia' )
          @endforeach
        </section>
      </div>
    </div>

    <div class="row more-section-container">

      @include('include.user.section_more_heading')

      <div class="more-article-container row gearhead-color-theme">
        @foreach ($news->where('section', '=', 'gearhead') as $articles)

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