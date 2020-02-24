<div class="admin-dashboard-widget">
  <div class="admin-dashboard-col-3">
    <div class="admin-dashboard-heading">
      <div class="view-results-heading">
        <i class="fa fa-list-ol"></i>
        <b>Viewership</b>
      </div>
      <div class="view-results-block">  
        <h2>{{ $viewsn->count() }}</h2> 
      </div>
      <div class="view-content-btn-block row">
        <span class="view-section">Published</span>
      </div>
    </div>

    <div class="admin-dashboard-col-3">
      <div class="admin-wrap-article">
        <div class="table_head_row">
          <div class="table_head_flag"></div>
          <div class="table_head_img"></div>
          <div class="table_head_title">Title</div>
          <div class="table_head_stats">UV's</div>
          <div class="table_head_stats">PV's</div>
          <div class="table_head_btn"></div>
        </div>
      </div>
    </div>

    <div class="admin-dashboard-col-3">
      <div class="admin-scroll-article" id="scroll-y">
      
        @foreach ($viewsn as $view)
          <div class="table_row row">

            <div class="table_flags"><img src="https://cms.mqoqowa.africa/images/africa/{{ $view->flag }}.svg" /></div>

            <div class="table_img">
              <a href="{{ url($url.'/news/upload/'. $view->id . '-' . str_replace(' ', '-', $view->title)) }}">
                <img class="fa fa-file-image" src="{{ URL::asset('images/articles/'.$view->article_img) }}"/>
              </a>
            </div>

            <div class="table_title"> {{ $view->title }} </div>
            <div class="table_stats"> {{ views($view)->unique()->count() }} </div>  
            <div class="table_stats"> {{ views($view)->count() }} </div> 
            
            <div class="dropdown2">
              <span class="dropbtn2 fa fa-ellipsis-v"></span>
              <div id="m5" class="dropdown2-content">
                
                <div class="index-btn-row">
                  <span class="row">
                    <i class="fa fa-{{ $view->section }}"></i> {{ $view->section }}
                  </span>
                </div>

                <div class="index-btn-row">
                  <a href="{{ url($url.'/writers/'.$view->writer_id) }}">
                  <i class="fa fa-user-edit"></i> Writer</a>
                </div>

                <div class="index-btn-row">
                  <a href="{{ url($url.'/editors/'.$view->editor_id) }}">
                  <i class="fa fa-user-cog"></i> Editor</a>
                </div>

                <div class="index-btn-row">
                  <a href="{{ url($url.'/news/preview/'. $view->id . '-' . str_replace(' ', '-', $view->title)) }}">
                    <i class="fa fa-eye"></i> Preview
                  </a>
                </div>

                <div class="index-btn-row">
                  <a href="{{ url($url.'/news/dashboard/'. $view->id . '-' . str_replace(' ', '-', $view->title)) }}">
                    <i class="fa fa-dashboard"></i> Perfomance
                  </a>
                </div>

                <div class="index-btn-row">
                  <span class="row">
                    <i class="fa fa-calendar"></i> Created {{ $view->created_at->diffForHumans() }}
                  </span>
                </div>
                
                <div class="index-btn-row">
                 <span class="row">
                    <i class="fa fa-calendar-check"></i> Published {{ date('d M Y @ h:i', strtotime($view->publish)) }}
                  </span>
                </div>
                <div class="index-btn-row">
                  <span class="row">
                    <i class="fa fa-calendar-times"></i> Archived {{ date('d M Y @ h:i', strtotime($view->archive)) }}
                  </span>
                </div>

                @include('include.admin.news_viewership_btn_'.$url)

              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</div>