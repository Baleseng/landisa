@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Editor | Preview | ' . $id->title )

@section('style')
  @include('include.admin.preview_upload_publish_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_editor_button')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

	<!-- PARALALAX ARTICLE IMAGE CONTAINER SECTION -->
  <div class="article-parallax headline" style="background-image: url('https://writer.triwink.app/images/articles/{{$id->article_img}}');">
  	<div class="article-parallax-container"></div>
  </div>

	<div class="news-article-container">
		
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
			<div class="article-max">{!! $id->full_article !!}</div>


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
			  <a href="{{ url($url.'/news/publish/'. $id->id . '-' . str_replace(' ', '-', $id->title)) }}" class="publish"><i clas.s="fa fa-cloud-upload-alt"></i> Publish</a>
			 
			  <a href="{{ url($url.'/news/reviewed') }}" class="cancel"><i class="fa fa-times"></i> Cancel</a>
			</div>

			<form method="POST" action="{{ url('notes')}}">
				{{ csrf_field() }}
				<input type="hidden" value="{{ $id->id }}" name="article_id"/>
				<input type="hidden" value="{{ $id->writer_id}}" name="writer_id"/>
				<input type="hidden" value="{{ $id->editor_id}}" name="editor_id"/>
				<input type="hidden" value="{{ $id->title}}" name="article"/>
				<textarea name="notes" class="feedback" id="editor"></textarea>
				<span class="feedback">Feedback to the Article</span>
				<button type="submit" class="feedback" ><i class="fa fa-comment-alt"></i> Feedback</button>	
			</form>	
		</div>

	</div>

	@section('script')
  	@include('include.admin.preview_upload_publish_scripts')
  @endsection

@endsection