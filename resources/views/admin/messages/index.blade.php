@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title',' ' .$url. ' | messages')

@section('style')
  @include('include.dashboard_charts_activity_styles')
@endsection

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('menubutton')
  @include('include.header_section_'.$url.'_button')
@endsection

@section('content')
	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="admin-user-map-index-container">

    @include('include.user_map_nav_gender_'.$url)

    <div class="admin-user-map-index-widget">
      <div class="admin-user-map-index-col">
      
        <div class="admin_table_user_index">
          @include('include.reg_index_users_messages')
        </div>
        <div class="table_index_user_paginator"> 
          {{ $messages->links() }}
        </div>

      </div>     
    </div>

  </div>

  @section('script')
    @include('include.reg_realtime_users')
    @include('include.dashboard_charts_activity_scripts')
  @endsection

@endsection