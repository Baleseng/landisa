@extends('layouts.main.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Admin | Publish |' . $id->title)

@section('style')
  @include('include.admin.preview_upload_publish_styles')
@endsection

@section('searchfield')
  @include('include.admin.admin_header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.admin_header_section_admin_button')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

	<!-- PARALALAX ARTICLE IMAGE CONTAINER SECTION -->
  <div class="article-parallax headline" style="background-image: url('https://writer.triwink.app/images/articles/{{$news->article_img}}');">
  	<div class="article-parallax-container"></div>
  </div>

	<div class="news-article-container">
		
		<div class="article-container">
			
			<div class="article-section">
			  <a href="">{{ $news->section }}</a> 
			  <span>{{ $news->subsection }}</span> 
			</div>

			<div class="article-title">
			  <h1>{{ $news->title }}</h1>
			</div>

			<div class="article-author">
			  <!-- <div class="author-img">
			    <img class="fa fa-user" src="https://triwriter.app/images/writers/{{ $news->profile }}"/>
			  </div> -->
			  <div class="author-name-article-date"><i class="fa fa-user-edit"></i> by: <strong>{{ $news->writer_name }}</strong> <span><i class="fa fa-calendar-check"></i> {{ date('d M Y h:i', strtotime($news->publish)) }}</span></div>   
			</div>

			<!-- FULL ARTICLE SECTION -->
			<div class="article-min">{{ $news->synopsis }}</div>
			<div class="article-max">{!! $news->full_article !!}</div>


			<div class="content-wrapper-container">
				
				<div class="primary-content-wrapper">
					@include('include.admin.admin_preview_primary_block')
				</div>
				
				<div class="secondery-content-wrapper">
					<div class="main-content-wrap">
						@include('include.admin.admin_preview_secondary_block')
					</div>

					<div class="more-contnet-wrap">
						@include('include.admin.admin_preview_more_block')
					</div>
				</div>

			</div>

		</div>
		
		<!-- RIGHT SIDEBAR SECTION -->
		<div class="article-sidebar sticky-div-news">
			<div class="buttons">	  
			  <a href="{{ url($url.'/news') }}" class="cancel"><i class="fa fa-arrow-alt-circle-left"></i> Back</a>
			</div>
		</div>

	</div>

	@section('script')
  	@include('include.admin.preview_upload_publish_scripts')
  @endsection

@endsection