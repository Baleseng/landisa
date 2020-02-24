@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Community | Add')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

 <div class="community-mask">
    <div class="community-wrapper">
      <div class="community-addedit-container">

        <div class="community-header"> 
          <h3>{{ Auth::user()->name }} - Tell Us your Story</h3>
        </div>

        <form method="POST" action="{{ url('/community/') }}">
         
          {{ csrf_field() }}

          <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"/>
          <input type="hidden" value="{{ Auth::user()->avator }}" name="avator"/>
          <input type="hidden" value="{{ Auth::user()->name }}" name="name"/>
          <input type="hidden" value="{{ Auth::user()->surname }}" name="surname"/>
          <input type="hidden" value="{{ Auth::user()->email }}" name="email"/>

          <input type="hidden" value="activecomment" name="commentblock"/>

          <div class="community-form-input">
            <div class="input-article">
              <textarea rows="1" class="input-article-title" placeholder="Type Story Title" name="title"></textarea>
            </div>
          </div>

          <div class="community-form-textarea">
            <div id="editor">
              <ckeditor v-model="content" class="article" name="story"></ckeditor> 
            </div>
          </div>
          <input type="hidden" value="pending" name="status"/>

          <div class="community-form-bottom-wrap">
            <div class="community-form-button">
              <button type="submit" class="btn-article-submit">
                <i class="fa fa-eye"></i><b>Preview</b>
              </button>
              <a class="btn-article-cancel" href="{{ url('community') }}">
                <i class="fa fa-backspace"></i> Cancel</a>
            </div>
          </div>

        </form>
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
  @include('layouts.communityscript')
  @endsection

@endsection