@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title',' ' .$url. ' | Preview |' .$id->title)

@section('style')
  @include('include.admin.preview_upload_publish_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_' .$url. '_button')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="galleryparallax">
    <div class="galleryparallaxcontainer">
      <div class="mediaphotoswrapper">
        @include('include.admin.multimedia'.$id->section )
        <div class="gallery-content-sidebar">
          <div class="gallery-list-container">
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="media-article-container">
    
    <div class="article-container">
      
      <div class="article-section">
        <a href="">{{ $id->section }}</a> 
        <span>{{ $id->subsection }}</span> 
      </div>

      <div class="article-title">
        <h1>{{ $id->title }}</h1>
      </div>

      <div class="article-author">
        <!-- <div class="author-img">
          <img class="fa fa-user" src="https://triwriter.app/images/writers/{{ $id->profile }}"/>
        </div> -->
        <div class="author-name-article-date"><i class="fa fa-user-edit"></i> by: <strong>{{ $id->writer_name }}</strong> <span><i class="fa fa-calendar-check"></i> {{ date('d M Y h:i', strtotime($id->publish)) }}</span></div>   
      </div>

      <!-- FULL ARTICLE SECTION -->
      <div class="article-min">{{ $id->synopsis }}</div>

    </div>

    <!-- RIGHT SIDEBAR SECTION -->
    <div class="article-sidebar sticky-div-news">
      <div class="buttons">   
        <a href="{{ url($url.'/media') }}" class="cancel"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
      </div>
    </div>

  </div>

  <script src="https://cms.mqoqowa.africa//js/app.js"></script>
  
  @section('script')
    @include('include.admin.preview_upload_publish_scripts')
  @endsection

@endsection