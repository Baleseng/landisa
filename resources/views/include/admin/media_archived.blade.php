@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title',' ' .$url. ' | Media | Archive')

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

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="admin-dashboard-default-container">

    @include('include.admin.media_viewership')

    <div class="admin-dashboard-widget">
      <div class="admin-dashboard-col-3">
        <div class="admin-dashboard-heading">
          <div class="view-results-heading">
            <i class="fa fa-newspaper-o"></i>
            <b>Articles</b>
          </div>
          <div class="view-results-block">  
            <h2>{{ $counts->count() }}</h2> 
          </div>
          <div class="view-content-btn-block row">

            @include('include.admin.media_add_btn_'.$url)
            
          </div>
        </div>
        <div class="admin-dashboard-chart">
          <div class="admin-wrap-article">
            

            <div class="table_head_row">
              <div class="table_head_flag"></div>
              <div class="table_head_img"></div>
              <div class="table_head_title">Title</div>
              <div class="table_head_created">Created</div>
              <div class="table_head_btn"></div>
            </div>

            @foreach ($id as $media)
              <div class="table_row row ">
                
                <div class="table_flags">  
                  <img src="https://cms.mqoqowa.africa//images/africa/{{ $media->flag }}.svg">
                </div> 

                <div class="table_img">
                  <a href="{{ url('media/upload/'. $media->id . '-' . str_replace(' ', '-', $media->title)) }}">
                    <img class="fa fa-file-image" src="{{ URL::asset('images/articles/'.$media->article_img) }}"/>
                  </a>
                </div> 

                <div class="table_title">{{ $media->title }}</div>

                <div class="table_created">{{ $media->created_at->diffForHumans() }}</div>
                
                <div class="dropdown2">
                  <span class="dropbtn2 fa fa-ellipsis-v"></span>
                  <div id="m5" class="dropdown2-content">
                    
                    <div class="index-btn-row">
                      <span class="row">
                        <i class="fa fa-{{ $media->section }}"></i> {{ $media->section }}
                      </span>
                    </div>

                    <div class="index-btn-row">
                      <a href="{{ url($url.'/writers/'.$media->writer_id) }}">
                      <i class="fa fa-user-edit"></i> Writer</a>
                    </div>

                    <div class="index-btn-row">
                      <a href="{{ url($url.'/profile/'.$media->editor_id) }}">
                      <i class="fa fa-user-cog"></i> Editor</a>
                    </div>

                    <div class="index-btn-row">
                      <a href="{{ url($url.'/news/preview/'. $media->id . '-' . str_replace(' ', '-', $media->title)) }}">
                        <i class="fa fa-eye"></i> Preview
                      </a>
                    </div>

                    <div class="index-btn-row">
                      <a href="{{ url($url.'/news/dashboard/'. $media->id . '-' . str_replace(' ', '-', $media->title)) }}">
                        <i class="fa fa-dashboard"></i> Perfomance
                      </a>
                    </div>

                    <div class="index-btn-row">
                      <span class="row">
                        <i class="fa fa-calendar-check"></i> Published {{ date('d M Y @ h:i', strtotime($media->publish)) }}
                      </span>
                    </div>
                    <div class="index-btn-row">
                      <span class="row">
                        <i class="fa fa-calendar-times"></i> Archived {{ date('d M Y @ h:i', strtotime($media->archive)) }}
                      </span>
                    </div>

                  </div>
                </div>

              </div>
            @endforeach


          </div>
        </div> 
        <div class="admin-wrap-paginator"> {{ $id->links() }}</div> 
      </div>
    </div>

    @include('include.admin.widget_charts_media_useractivity')

  </div>

@section('script')
  @include('include.admin.dashboard_charts_scripts')
@endsection

@endsection