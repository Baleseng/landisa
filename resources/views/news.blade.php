@extends('layouts.user.main')

@section('description', 'News')
@section('keywords', 'News')

@section('title', 'News')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="articles-main-container row {{ $section1[0] }}-color-theme"> 

    <div class="content-section-headline-wrap">
      <div class="content-section-border"></div>
      <div class="content-section-headline">Personalised</div>
    </div>

    <div class="articles-main-wrapper {{ $section1[0] }}-color-theme">
      <div class="content">
         
        @foreach ($news->where('section', '=',  $section1[0])->take(1) as $articles ) 
        <div class="content-article-tab">
          <span class="content-section {{$section1[0]}}">
            <i class="fa fa-{{$section1[0]}}"></i>
          </span> 
          @include($section1[0] . '.tab'. $section1[0] . '_main')
        </div>
        @endforeach
      
        <div class="content-sub-article-tab">
          @foreach ($news->where('section', '=',  $section1[0])->take(4)->reverse() as $articles )
          <div class="content-sub-article-row">
            <span class="content-section {{$section1[0]}}">
             <i class="fa fa-{{$section1[0]}}"></i>
            </span>  
            @include($section1[0] .'.tab'.$section1[0] )
          </div>
          @endforeach
        </div>
        
      </div>
    </div>

    <div class="trending-main-wrapper {{ $section1[0] }}-color-theme">  
      <div class="trending-main-wrap"> 
        <ol>
        @foreach ($news->where('section', '=',  $section1[0])->take(5)->reverse() as $articles )
          @include('include.user.articles_trending')
          @endforeach
        </ol>
      </div>
    </div>
    

    <div class="multimedia-index-container {{ $section1[0] }}-media-bg">
      <div class="multimedia-section-wrapper">
        <section class='gallery {{ $section1[0] }}-color-theme' id="section">
          @foreach ($media->where('subsection', '=', $section1[0] )->take(4) as $articles)
            @include( $section1[0] . '.tab'. $section1[0] . '_multimedia' )
          @endforeach
        </section>
      </div>
    </div>

    <div class="article-other-container row">
      
      <div class="article-other-primary-col {{ $section2[0] }}-color-theme"> 
        @foreach ( $news->where( 'section', '=',  $section2[0] )->take(1) as $articles ) 
        <div class="content-article-tab"> 
          <span class="content-section {{ $section2[0] }}">
            <i class="fa fa-{{ $section2[0] }}"></i>
          </span> 
          @include( $section2[0] . '.tab'. $section2[0] . '_main' )
        </div>
        @endforeach
        
        <div class="content-sub-article-tab">
          @foreach ( $news->where( 'section', '=',  $section2[0] )->take(4)->reverse() as $articles )
          <div class="content-sub-article-row">
            <span class="content-section {{ $section2[0] }}">
             <i class="fa fa-{{ $section2[0] }}"></i>
            </span>  
            @include( $section2[0] .'.tab'. $section2[0] )
          </div> 
          @endforeach
        </div>     
      </div>

      <div class="article-other-primary-col {{ $section3[0] }}-color-theme margin-side row">
        
        @foreach ($news->where('section', '=',  $section3[0])->take(1) as $articles ) 
        <div class="content-article-tab">
          <span class="content-section {{ $section3[0] }}">
            <i class="fa fa-{{ $section3[0] }}"></i>
          </span>  
          @include($section3[0] . '.tab'. $section3[0] . '_main')
        </div>
        @endforeach
      
        <div class="content-sub-article-tab"> 
          @foreach ( $news->where( 'section', '=',  $section3[0] )->take(4)->reverse() as $articles )
            <div class="content-sub-article-row">
              <span class="content-section {{ $section3[0] }}">
               <i class="fa fa-{{ $section3[0] }}"></i>
              </span>  
              @include($section3[0] .'.tab'.$section3[0] )
            </div>
          @endforeach
        </div> 
        
      </div>

      <div class="article-other-primary-col {{ $section4[0] }}-color-theme">     
        @foreach ($news->where('section', '=',  $section4[0] )->take(1) as $articles )
        <div class="content-article-tab">
          <span class="content-section {{ $section4[0] }}">
            <i class="fa fa-{{ $section4[0] }}"></i>
          </span>    
          @include($section4[0] . '.tab'. $section4[0] . '_main')
        </div>
        @endforeach

        <div class="content-sub-article-tab">
        @foreach ( $news->where('section', '=',  $section4[0] )->take(4)->reverse() as $articles )
          <div class="content-sub-article-row">
            <span class="content-section {{ $section4[0] }}">
             <i class="fa fa-{{ $section4[0] }}"></i>
            </span>  
            @include($section4[0] .'.tab'.$section4[0] )
          </div>
        @endforeach 
        </div>

      </div>
    </div>

    <div class="multimedia-index-container multimedia-index-postion-top">
      
      <div class="multimedia-section-headline-wrap">
        <div class="multimedia-section-border"></div>
        <div class="multimedia-section-headline">Multimedia</div>
      </div>

      <div class="multimedia-section-wrapper multimedia-background-color">
        <section class='gallery multimedia-color-theme' id="section">
          @foreach ($media->where('category', '=', 'multimedia')->take(4) as $articles)
            @include('include.user.multimedia_content_article')
          @endforeach
        </section>
      </div>
    </div>

    <div class="community-widget-container row">
      <div class="community-widget-headline-wrap">
        <div class="community-widget-border"></div>
        <div class="community-widget-headline">Community</div>
      </div>

      <div class="community-widget-row">
        @foreach ( $news->where( 'section', '=',  $section4[0] )->take(1)->reverse() as $articles )
          @include( 'community.communitybox' )
        @endforeach
      </div>     
    </div>

    <div class="news-round-container">

      <div class="news-round-section-headline-wrap">
        <div class="news-round-section-border"></div>
        <div class="news-round-section-headline">News</div>
      </div>

      <div class="news-round-wrapper">
        <div class="news-round-content">
           
          @foreach ($news->where('section', '=',  $section1[0])->take(1) as $articles ) 
          <div class="content-article-tab">
            <div class="content-article-img">
              <a href="@include('include.user.articles_hyperlink')">
                <img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}" />
              </a>
            </div>
            <div class="content-article-caption">
              <a class="content-article-heading" href="@include('include.user.articles_hyperlink')">{{ $articles->title }}</a>
              <span class="content-article-subsection">Current Affairs</span>
              <a class="content-article-synopsis" href="@include('include.user.articles_hyperlink')">{{ $articles->synopsis }}</a>
            </div>
            <div class="content-article-status row">
               <ul>
                <li><i class="fa fa-eye"></i> <b> {{ views($articles)->unique()->count() }} </b></li>
                <li><i class="fa fa-comment"></i> <b>0</b></li>
                <li><i class="fa fa-share"></i> <b>0</b></li>
              </ul>
              <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
            </div>
          </div>
          @endforeach
          
          <div class="content-sub-article-tab news-round-sidemargin row">
            @foreach ($news->where('section', '=',  $section1[0])->take(3)->reverse() as $articles )
            <div class="content-sub-article-row">
              <div class="content-sub-article-img">
                <a href="@include('include.user.articles_hyperlink')">
                  <img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}"/>
                </a>
              </div>
              <div class="content-sub-article-heading">
                <a class="content-article-heading" href="@include('include.user.articles_hyperlink')">{{ $articles->title }}</a>
                 <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
                <span class="subsection">Current Affairs</span>
              </div>
              <div class="content-sub-article-status row">
                 <ul>
                  <li><i class="fa fa-eye"></i> <b> {{ views($articles)->unique()->count() }} </b></li>
                  <li><i class="fa fa-comment"></i> <b>0</b></li>
                  <li><i class="fa fa-share"></i> <b>0</b></li>
                </ul>
                <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
              </div>
            </div>
            @endforeach
          </div>

          <div class="content-sub-article-tab">
            @foreach ($news->where('section', '=',  $section1[0])->take(3) as $articles )
            <div class="content-sub-article-row">
              <div class="content-sub-article-img">
                <a href="@include('include.user.articles_hyperlink')">
                  <img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}"/>
                </a>
              </div>
              <div class="content-sub-article-heading">
                <a class="content-article-heading" href="@include('include.user.articles_hyperlink')">{{ $articles->title }}</a>
                 <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
                <span class="subsection">Current Affairs</span>
              </div>
              <div class="content-sub-article-status row">
                 <ul>
                  <li><i class="fa fa-eye"></i> <b> {{ views($articles)->unique()->count() }} </b></li>
                  <li><i class="fa fa-comment"></i> <b>0</b></li>
                  <li><i class="fa fa-share"></i> <b>0</b></li>
                </ul>
                <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
              </div>
            </div>
            @endforeach
          </div>
          
        </div>
      </div>
    </div>

  </div>

  <!-- FOOTER SECTION -->
  <footer>
    <div class="footer-container row">
      @include('include.user.footer_section')
    </div>
  </footer>

  <script src="{{ URL::asset('js/fixdiv-index.js') }}"></script>
  
  @section('script')
  @include('layouts.user.indexscript')
  @endsection

@endsection