@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Admin')

@section('style')
  @include('include.admin.dashboard_charts_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_moderator_button')
@endsection


@section('content')
	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="flex-center position-ref full-height">
    <div class="content">
      
      <div class="m-b-md">
        <div class="logo">
          <img src="https://cms.mqoqowa.africa//images/logo/signageadmin.svg"/>
        </div>
      </div>

      <div class="links">
        <a href="{{ url('/moderator/users') }}">Users</a>
        <span class="separetor"></span>
        <a href="{{ url('/moderator/community') }}">Stories</a>
        <span class="separetor"></span>
        <a href="{{ url('/moderator/posts') }}">Posts</a>
        <span class="separetor"></span>
        <a href="{{ url('/moderator/comments') }}">Comments</a>
        <span class="separetor"></span>
        <a href="{{ url('/moderator/messages') }}">Messages</a>
        <span class="separetor"></span>
        <a href="{{ url('/moderator/moods') }}">Moods</a>
        <span class="separetor"></span>
        <a href="{{ url('/moderator/emails') }}">Email</a>
        <span class="separetor"></span>
        <a href="{{ url('/moderator/downloads') }}">Downloads</a>
      </div>
  
    </div>
  </div>

  @section('script')
    @include('include.admin.dashboard_charts_scripts')
  @endsection

@endsection