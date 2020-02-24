@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Campaign Manager | Suspended')

@section('style')
  @include('include.dashboard_charts_css')
@endsection

@section('searchfield')
  @include('include.admin_header_search_news')
@endsection

{!! $chartcolumn->script() !!}

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="admin-dashboard-article-container admin-container">
    
    @include('include.admin_reg_users_define_btn')

    <div class="admin-dashboard-widget">
      <div class="admin-dashboard-col-1">
        <div class="admin-dashboard-heading">
          <div class="view-results-heading">
            <i class="fa fa-newspaper-o"></i>
            <b>{{ Auth::user()->name }}'s News Content</b>
          </div>

          <div class="view-results-block">  
            <h2>{{ $news->count() }}</h2> 
          </div>

          <div class="view-button-block row">  
            <a href="{{ url('news/add')}}" class="related-page">
              <i class="fa fa-file-alt"></i> Add Article</a>
          </div>

          <div class="view-option-block row">
            <a href="{{ url('/') }}">Published</a>
            <a href="{{ url('news/reviewed') }}">Reviewed</a>
            <span class="active">Suspended</span>
          </div>
  
        </div>
        <div class="admin-dashboard-chart">
          @include('include.admin_articles_writers_news')
        </div>    
      </div>
    </div>

    @include('include.admin_articles_writers_profile_perfomance')

  </div>

@section('script')
  @include('include.dashboard_charts_js')
@endsection

@endsection