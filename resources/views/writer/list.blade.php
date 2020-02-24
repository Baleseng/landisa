@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Admin')

@section('style')
  @include('include.dashboard_charts_activity_styles')
@endsection

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('menubutton')
  @include('include.header_section_admin_button')
@endsection

@section('content')
	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="admin-user-map-index-container">

    @include('include.widget_charts_home_genderdemo')

    <div class="admin-user-map-index-widget">
      <div class="admin-user-map-index-col">
      
        <div class="admin_table_user_index">
          @include('include.reg_writers')
        </div>
        <div class="admin-wrap-paginator"> 
          {{ $writers->links() }}
        </div>

      </div>     
    </div>

  </div>

  @section('script')
    @include('include.reg_users_realtime')
    @include('include.dashboard_charts_activity_scripts')
  @endsection

@endsection