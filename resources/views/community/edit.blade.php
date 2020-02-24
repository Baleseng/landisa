@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', '')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif
 <div class="community-mask">
    <div class="community-wrapper">
      <div class="community-container">

        <div class="community-header"> 
          <h3>{{ Auth::user()->name }} - Tell Us your Story</h3>
        </div>

        <div class="community-form-input">
          <div class="input-article">
            <textarea name="title" rows="1" class="input-article-title" placeholder="Type Story Title"></textarea>
          </div>
        </div>

        <div class="community-form-textarea">
          <div id="editor">
            <ckeditor v-model="content" class="article" name="story"></ckeditor> 
          </div>
        </div>

         <div class="community-form-button">
          <button type="submit" class="btn-article">
            <i class="fa fa-upload"></i> 
            <b>Change the Image</b>
            <i class="fa fa-arrow-right"></i> 
          </button>
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

  @section('script')
  @include('layouts.postscript')
  @endsection

@endsection