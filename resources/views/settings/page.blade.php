@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Create Page')

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="settings-container">
    <div class="settings-show-title">Create Page</div>
  </div>
  
  
  <!-- FOOTER SECTION -->
  <footer>
    <div class="footer-container row">
      @include('include.user.footer_section')
    </div>
  </footer>

  @section('script')
  @include('layouts.indexscript')
  @endsection

@endsection