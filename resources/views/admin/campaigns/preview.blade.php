@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title', . $news->title ' | Campaigns')

@section('style')
  @include('include.admin.preview_upload_publish_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_'.$url.'_button')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

	<!-- PARALALAX ARTICLE IMAGE CONTAINER SECTION -->
  <div class="article-parallax headline" style="background-image: url('{{ URL::asset('images/articles/'.$news->article_img) }}');">
		<div class="article-parallax-container">
			<div class="article-parallax-title"><h1>{{ $news->title }}</h1></div>
			<div class="article-author-container">
			  <div class="article-author-img"><img src="{{ URL::asset('images/articles/'.$news->article_img) }}"/></div>
			  <div class="article-author">Writer: <span>{{ $news->writer }}</span></div>
			  <div class="article-date">{{ $news->publish_date }}, {{ $news->publish_time }}</div>
			</div>
		</div>
	</div>


	<div class="article-interactive-container">
		
		<div class="main-article-container">
		  <!-- FULL ARTICLE SECTION -->
		  <div class="main-article-wrap">
  			<div class="article-min-article">{{ $news->synopsis }}</div>
  			<div class="article-max-article">{!! $news->full_article !!}</div>
  		</div>
		</div>
		
		<!-- RIGHT SIDEBAR SECTION -->
		<div class="btn-sticky-container sticky ">

			<div class="content-heading">Widget Article Block One</div>
			<div class="content-wrapper">
				@include('include.admin.admin_preview_primary_block')
			</div>

			<div class="content-heading">Widget Article Block Three</div>
			<div class="content-wrapper">
				@include('include.admin.admin_preview_secondary_block')
			</div>

			<div class="content-heading">Widget Article Block Two</div>
			<div class="content-wrapper">
				@include('include.admin.admin_preview_sectionsecondary_block')
			</div>
				
			<div class="submi-btn">
			  <a href="{{ url('news/'. $news->id . '-' . str_replace(' ', '-', $news->title)) }}" class="editbtn"><i class="fa fa-edit"></i> Edit</a>
			  <a href="{{ url('/') }}" class="cancelbtn"><i class="fa fa-times"></i> Cancel</a>
			</div>
		</div>
	  
	</div>

	@section('script')
  	@include('include.admin.preview_upload_publish_scripts')
  @endsection

@endsection