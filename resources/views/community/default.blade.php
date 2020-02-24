@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Community')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="row community-section-container">

    <div class="community-widget-container row">
      <div class="community-widget-headline-wrap">
        <div class="community-widget-border"></div>
        <div class="community-widget-headline">Community</div>
      </div>   
    </div>
    
    @include('include.user_wall_stories')

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