@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title',' ' .$url. ' | Dashboard |' .$id->title)

@section('style')
  @include('include.admin.dashboard_charts_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_' .$url. '_button')
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
            <b>{{ $id->subsection }}</b>
          </div>
        </div>
        
        <div class="admin-dashboard-row"> 
          <div class="dashboard-article-img">
            <img src="{{ URL::asset('images/articles/'.$id->article_img) }}">
          </div>

          <div class="dasboard-article-title"><h3>{{ $id->title }}</h3></div>

          <div class="realtime-results-views">
            <p>Article Vieweship right now</p>
            <h4>0</h4>
          </div>
          <div class="realtime-results-btn">
            <ul>
              <li><i class="fa fa-comment"></i> <span>Comments</span> <b>0</b></li>
              <li><i class="fa fa-share"></i> <span>Shared</span> <b>0</b></li>
              <li><i class="fa fa-smile"></i> <span>Moods</span> <b>0</b></li>
              <li><i class="fa fa-envelope"></i> <span>Messages</span> <b>0</b></li>
              <li><i class="fa fa-download"></i> <span>Downloads</span> <b>0</b></li>
            </ul>
          </div>
          
        </div>
      </div>
    </div>

    @include('include.admin.widget_charts_article_engagement')

    @include('include.admin.widget_users_article_profile')

    @include('include.admin.widget_charts_article_agegroup')

  </div>

@section('script')
  @include('include.admin.dashboard_charts_scripts')
@endsection

@endsection