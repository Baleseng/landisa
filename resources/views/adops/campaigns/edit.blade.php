@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title',  . $news->title ' | Campaigns')

@section('style')
  @include('include.add_edit_styles')
@endsection

@section('searchfield')
  @include('include.admin_header_search_news')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

	<div class="admin-container">

    <!-- <div class="admin-back-btn">
      <a href="{{ url('news') }}" target="_parent">
        <i class="fa fa-arrow-circle-left" ></i> News / Edit
      </a>
    </div> -->
  
    <form method="POST" action="{{ url('news/'.$news->id) }}">

      {{ method_field('PATCH') }}
      {{ csrf_field() }}

    	<div class="widget-wrap">
        @include('include.admin_widget_radiobtn') <!-- SWITCH ON / OFF INTERACTIVE BUTTON & COMMENT SECTION -->
      </div>
      <div class="article-wrap">
        
        <h3>Add Article Content</h3>

        @include('include.admin_input_add_news_select') <!-- SELECT SECTION & SUBSECTION FOR THE ARTICLE -->
        
        @include('include.admin_input_add_meta') <!-- META DATA FOR GOOGLE SEARCH OPTIMISATION ENGINE  -->
        
        <label>Full Article Box</label>
        <textarea name="full_article" class="maxarticle" id="editor" rows="35">{{ $news->full_article }}</textarea>

        <input type="hidden" value="{{ $news->status }}" name="status"/> <!-- DEFAULT INPUT ARTICLE STATUS -->

        <div class="submi-btn">
          <button type="submit" class="submitbtn"><i class="fa fa-cloud-upload-alt"></i> Update</button> 
          <a class="cancelbtn" href="{{ url('/') }}"><i class="fa fa-times"></i> Cancel</a>
        </div>
      </div>

    </form>
  </div>

@section('script')
  @include('include.add_edit_scripts')
@endsection

@endsection