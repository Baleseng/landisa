<div class="admin-dashboard-widget">
  <div class="admin-dashboard-col-4">
    <div class="admin-dashboard-heading">
      <div class="view-results-heading">
        <i class="fa fa-list-ol"></i>
        <b>Section</b>
      </div>
    </div>

    <div class="admin-dashboard-col-4">
      <div class="admin-wrap-article">
        <div class="table_head_section_row">
          <div class="table_head_section_icon"></div>
          <div class="table_head_section_section">Section</div>
          <div class="table_head_section_num">Viewership</div>
          <div class="table_head_section_btn"></div>
        </div>
      </div>
    </div>

    <div class="admin-dashboard-col-4">
      <div class="admin-scroll-article" id="scroll-y">
      
        @foreach ($sections as $section)
          <div class="table_section_row row">
            
            <div class="table_section_icon">
              <i class="fa fa-{{ $section->section }}"></i> 
            </div>

            <div class="table_section_section"> {{ $section->section }} </div>

            <div class="table_section_num"> 0 </div>
            
            <div class="dropdown2">
              <span class="dropbtn2 fa fa-ellipsis-v"></span>
              <div id="m5" class="dropdown2-content">
                
                <div class="index-btn-row">
                  <a href="{{ url($url.'/editors/'.$section->editor_id) }}">
                  <i class="fa fa-user-cog"></i> Editor</a>
                </div>

                <div class="index-btn-row">
                  <a href="{{ url($url.'/news/preview/'. $section->id . '-' . str_replace(' ', '-', $section->title)) }}">
                    <i class="fa fa-eye"></i> Preview
                  </a>
                </div>

                <div class="index-btn-row">
                  <a href="{{ url($url.'/news/dashboard/'. $section->id . '-' . str_replace(' ', '-', $section->title)) }}">
                    <i class="fa fa-dashboard"></i> Perfomance
                  </a>
                </div>

                <div class="index-btn-row">
                  <span class="row">
                    <i class="fa fa-calendar"></i> Created {{ $section->created_at->diffForHumans() }}
                  </span>
                </div>
                
                <div class="index-btn-row">
                 <span class="row">
                    <i class="fa fa-calendar-check"></i> Published {{ date('d M Y @ h:i', strtotime($section->publish)) }}
                  </span>
                </div>
                <div class="index-btn-row">
                  <span class="row">
                    <i class="fa fa-calendar-times"></i> Archived {{ date('d M Y @ h:i', strtotime($section->archive)) }}
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