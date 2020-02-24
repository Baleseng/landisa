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
     <div class="submenu-vertical-wrap">
      <div class="submenu-vertical" id="submenu-nav">
        @include('include.user.section_nav_extrovert')
      </div>
    </div>
  </div>

  <!-- HEADLINES ARTICLE SECTION CUSTOMIZED BY USER -->
  <div class="articles-main-container row">

    @include('include.user.section_latest_heading')
    
    <div class="articles-main-wrapper extrovert-color-theme">
      <div class="content">
           
        @foreach ($news->where('section', '=', 'extrovert')->take(1) as $articles) 
        <div class="content-article-tab">  
          @include('extrovert.tabextrovert_main')
        </div>
        @endforeach
       
        <div class="content-sub-article-tab">
          @foreach ($news->where('section', '=', 'extrovert')->take(4) as $articles)
          <div class="content-sub-article-row">
            <span class="content-section extrovert">
             <i class="fa fa-extrovert"></i>
            </span>  
            @include( 'extrovert.tabextrovert' )
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="trending-main-wrapper extrovert-color-theme">  
      <div class="trending-main-wrap"> 
        <ol>
          @foreach ($news->where('section', '=', 'extrovert')->take(5)->reverse() as $articles)
            @include('include.user.articles_trending')
          @endforeach
        </ol>
      </div>
    </div>

    <!-- EXTROVERT MULTIMEDIA -->
    <div class="multimedia-section-container">

      @include('include.user.section_multimedia_heading')

      <div class="multimedia-section-wrapper extrovert-media-bg">
        <section class='gallery extrovert-color-theme' id="section">
          @foreach ($content->where('subsection', '=', 'extrovert')->take(10) as $articles)
            @include('extrovert.tabextrovert_multimedia' )
          @endforeach
        </section>
      </div>
    </div>

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