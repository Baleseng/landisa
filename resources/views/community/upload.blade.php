@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Backpacker')


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

        <form method="POST" action="{{ url('/community') }}">
         
        {{ csrf_field() }}

        

         <div class="community-form-button">
          <button type="submit" class="btn-article">
            <i class="fa fa-paper-plane"></i> 
            <b>Send to Editor</b>
          </button>
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
  @include('layouts.postscript')
  @endsection

@endsection