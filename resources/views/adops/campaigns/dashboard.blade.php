@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Dashboard | Campaigns')

@section('style')
  @include('include.dashboard_charts_css')
@endsection

@section('searchfield')
  @include('include.admin_header_search_news')
@endsection

{!! $chartcolumn->script() !!}
{!! $chartbar->script() !!}


@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="admin-dashboard-article-container">
      
    <!-- <div class="admin-dashboard-nav">
      <a href="{{ url('news') }}" target="_parent"><i class="fa fa-arrow-circle-left" ></i> Dashboard</a>
    </div> -->

    <div class="admin-dashboard-widget">
      <div class="admin-dashboard-col-4">
        <div class="admin-dashboard-heading">
          <div class="view-results-heading">
            <i class="fa fa-newspaper-o"></i>
            <b>{{ $news->section }} / {{ $news->subsection }}</b>
          </div>
        </div>
        
        <div class="admin-dashboard-row"> 
          <div class="dashboard-article-img">
            <img src="{{ URL::asset('images/articles/'.$news->article_img) }}">
          </div>

          <div class="dasboard-article-title"><h3>{{ $news->title }}</h3></div>

          <div class="realtime-results">
            <p>Article Vieweship right now</p>
            <h4>0</h4>
          </div>
          
        </div>
      </div>
    </div>

    <div class="admin-dashboard-widget">
      <div class="admin-dashboard-col-2">  
        <div class="admin-dashboard-heading">
          <div class="view-results-heading">
            <i class="fa fa-users"></i>
            <b>Overview Users</b>
          </div>
          <div class="view-results-block">  
            <h2>0</h2> 
          </div>
        </div>
        <div class="admin-dashboard-user">
          <div class="table_heading_row">
            <div class="table_h_user_col">Name</div>
            <div class="table_h_ip_col">IP</div>
            <div class="table_h_email">Email</div>
            <div class="table_h_email">Time</div>
          </div>
        </div>
      </div>
    </div>

    <div class="admin-dashboard-widget">
      <div class="admin-dashboard-col-3">
        
        <div class="admin-dashboard-heading">
          <div class="view-results-heading">
            <i class="fa fa-eye"></i>
            <b>Age Overview</b>
          </div>

          <div class="view-results-block">  
            <h2>0</h2> 
          </div>

          <div class="view-results-gender"> 
            <span class="female">
              <i class="fa fa-female"></i> 
              <b>0%</b> 
            </span>
            <span class="male">
              <i class="fa fa-male"></i> 
              <b>0%</b>
            </span>
          </div>
  
        </div>

        <div class="admin-dashboard-filter">
          <div class="">Data from 11 May 2018 to 16 May 2018</div>
        </div>

      </div>
      
      <div class="admin-dashboard-col-3">
        {!! $chartbar->container() !!}
      </div>
      
    </div>

    <div class="admin-dashboard-widget">
      <div class="admin-dashboard-col-3">
        
        <div class="admin-dashboard-heading">
          <div class="view-results-heading">
            <i class="fa fa-comments-o"></i>
            <b>Overview Engagement</b>
          </div>
          <div class="view-results-block">  
            <h2>0</h2> 
          </div>
          <div class="view-results-gender"> 
            <span class="female">
              <i class="fa fa-female"></i> 
              <b>0%</b> 
            </span>
            <span class="male">
              <i class="fa fa-male"></i> 
              <b>0%</b>
            </span>
          </div>
        </div>

        <div class="admin-dashboard-filter">
            <div class="">Data from 11 May 2018 to 16 May 2018</div>
        </div>


        <div class="admin-dashboard-chart">
          {!! $chartcolumn->container() !!}
        </div> 

      </div>
    </div>
  </div>

@section('script')
  @include('include.dashboard_charts_js')
@endsection

@endsection
