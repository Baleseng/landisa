@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Campaigns | Active')

@section('style')
  @include('include.dashboard_campaign_charts_styles')
@endsection

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('menubutton')
  @include('include.header_section_adops_button')
@endsection

{!! $chartpiedevice->script() !!}

@section('content')
  @if (session('status'))
    {{ session('status') }}
  @endif

<div class="admin-dashboard-default-container">


  @include('include.widget_charts_home_devices')

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
          @include('include.adOps_archive')
        </div>
      </div>
      <div class="admin-wrap-paginator"> 
        {{ $ads->links() }}
      </div>

    </div>
  </div>

  @include('include.adOps_overview')

  @include('include.adOps_section_performance')

  @include('include.media_viewership')

  @include('include.news_viewership')

  @include('include.adOps_user_activity')

  @include('include.adOps_segments')

  @include('include.adOps_regional')
  


</div>   

@section('script')
  @include('include.dashboard_campaign_charts_scripts')
@endsection

@endsection