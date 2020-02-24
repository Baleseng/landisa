@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Campaigns | Active')

@section('style')
  @include('include.admin.dashboard_campaign_charts_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_adops_button')
@endsection

{!! $chartpiedevice->script() !!}

@section('content')
  @if (session('status'))
    {{ session('status') }}
  @endif

<div class="admin-dashboard-default-container">


  @include('include.admin.widget_charts_home_devices')

  <div class="admin-dashboard-widget">
    <div class="admin-dashboard-col-2">
      <div class="admin-dashboard-heading">
        
        <div class="view-results-heading">
          <i class="fa fa-newspaper-o"></i>
          <b>Campaigns</b>
        </div>

        <div class="view-results-block">  
          <h2>0</h2> 
        </div>

      </div>
      
      <div class="admin-dashboard-campaign">
        <div class="admin-wrap-article">
          @include('include.admin.adOps_active')
        </div>
      </div>
      <div class="admin-wrap-paginator"> 
        {{ $ads->links() }}
      </div>

    </div>
  </div>

  @include('include.admin.adOps_overview')

  @include('include.admin.adOps_section_performance')

  @include('include.admin.media_viewership')

  @include('include.admin.news_viewership')

  @include('include.admin.adOps_user_activity')

  @include('include.admin.adOps_segments')

  @include('include.admin.adOps_regional')
  


</div>   

@section('script')
  @include('include.admin.dashboard_campaign_charts_scripts')
@endsection

@endsection