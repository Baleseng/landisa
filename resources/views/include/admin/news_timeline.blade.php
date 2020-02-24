@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title',' ' .$url. ' | Timeline | ' .$id->title)

@section('style')
  @include('include.admin.timeliner_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_' .$url. '_button')
@endsection

@section('content')
  @if (session('status'))

    {{ session('status') }}

  @endif

    <div id="tracker" class="timeliner-container">
      <div class="container">
        <div class="page-header">
          <span id="timeline-header">Timeline</span>
        </div>
      </div>
    </div>

  @section('script')
    @include('include.admin.timeliner_scripts')
  @endsection

@endsection