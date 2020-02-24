@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Editor | Publish | ' . $id->title )

@section('style')
  @include('include.admin.preview_upload_publish_styles')
@endsection

<script src="https://cms.mqoqowa.africa//js/ckeditor/ckeditor.js"></script>
<script src="https://cms.mqoqowa.africa//js/ckeditor/samples/js/sample.js"></script>

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

	<div class="admin-container">
    <div class="article-publish-wrap">

      <div class="article-publish">  
        <div class="articles-section-img">
          <a href="#"><img src="{{ URL::asset('images/articles/'.$id->article_img) }}"/></a>
        </div>
        <div class="articles-section-headline">
          <a href="#">{{ $id->title }}</a>
        </div>
      </div>

      <form autocomplete="off" method="POST" action="{{ url('news/'.$id->id) }}">

        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <input type="hidden" value="{{ Auth::user()->id }}" name="editor_id"/>
        <input type="hidden" value="publish" name="status"/> <!-- DEFAULT INPUT ARTICLE STATUS -->
        
        <div class="article-select-section">
          @include('include.admin.admin_edit_news_select')
        </div>

        <div class="article-input-fields">
          <div class="article-input-text-synopsis">
            <label>Article Synopsis, Brief, Abstract</label>
            <textarea name="synopsis" class="article-synopsis" rows="35">{{ $id->synopsis }}</textarea>
          </div>
        </div>

        <div class="addedit-input-text-synopsis">
            <textarea name="full_article" class="maxarticle" id="editor" rows="35">{{ $id->full_article }}</textarea>
        </div>

        <div class="article-input-fields-meta row">
          <div class="article-input-keyword-meta">
            <label>Meta - Keywords</label>
            <textarea name="keywords" class="article-meta" rows="35">{{ $id->keywords }}</textarea>
          </div>

          <div class="article-input-descript-meta">
            <label>Meta - Description</label>
            <textarea name="description" class="article-meta" rows="35">{{ $id->description }}</textarea>
          </div>
        </div>

        <div class="article-input-fields">
          @include('include.admin.editor_comment_input')
        </div>

        <div class="article-publish-date">
          <label><i class="fa fa-calendar-check"></i> Publish</label>
          <input type="text" name="publish" value="{{ $id->publish }}" id="search-from-date"/>
        </div>

        <div class="article-publish-date">
          <label><i class="fa fa-calendar-times"></i> Archive</label>
          <input type="text" name="archive" value="{{ $id->archive }}" id="search-to-date"/> 
        </div>
      
        <div class="submi-btn">
          <button type="submit" class="submitbtn"><i class="fa fa-cloud-upload-alt"></i> Publish</button>
           <a class="previewbtn" href="{{ url($url.'/news/preview/'. $id->id . '-' . str_replace(' ', '-', $id->title)) }}"><i class="fa fa-eye"></i> Preview</a>
          <a class="cancelbtn" href="{{ url($url.'/news') }}"><i class="fa fa-times"></i> Cancel</a>
        </div>
      </form>
      
    </div>
  </div>

  @section('script')
    @include('include.admin.preview_upload_publish_scripts')
  @endsection

@endsection

  