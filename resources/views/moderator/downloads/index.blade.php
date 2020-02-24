@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title',' ' .$url. ' | downloads')

@section('style')
  @include('include.admin.dashboard_charts_activity_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_'.$url.'_button')
@endsection

@section('content')
	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="admin-user-map-index-container">

    @include('include.admin.user_map_nav_gender_'.$url)

    <div class="admin-user-map-index-widget">
      <div class="admin-user-map-index-col">
      
        <div class="admin_table_user_index">
          @include('include.admin.reg_index_users_downloads')
        </div>
        <div class="table_index_user_paginator"> 
          {{ $loads->links() }}
        </div>

      </div>     
    </div>

  </div>

  @section('script')
    @include('include.admin.reg_realtime_users')
    @include('include.admin.dashboard_charts_activity_scripts')
  @endsection

@endsection