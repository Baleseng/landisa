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
  @include('include.admin.header_section_admin_button')
@endsection

{!! $chartrealtime->script() !!}
{!! $chartpieviewed->script() !!}
{!! $chartpiedevice->script() !!}
{!! $chartcolumn->script() !!}
{!! $chartbarview->script() !!}
{!! $chartspline->script() !!}


@section('content')
	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="admin-dashboard-default-container"> 

    @include('include.admin.widget_charts_home_realtime')

    <div class="admin-dashboard-widget">
      <div class="admin-dashboard-col-4"> 
        @include('include.admin.widget_charts_home_genderdemo')
      </div>
    </div>

    @include('include.admin.widget_charts_home_useractivity')

    @include('include.admin.widget_charts_home_agegroup')

    @include('include.admin.widget_charts_home_comparison')

    @include('include.admin.widget_charts_home_devices')

    @include('include.admin.widget_charts_home_africa')

  </div>   

  @section('script')
    @include('include.admin.dashboard_charts_scripts')
  @endsection

@endsection