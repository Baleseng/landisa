  <div class="table_head_row">
    <div class="table_head_flag"></div>
    <div class="table_head_img"></div>
    <div class="table_head_title"></div>
    <div class="table_head_created">Created</div>
    <div class="table_head_stats">Impressions</div>
    <div class="table_head_stats">Viewership</div>
    <div class="table_head_stats">Clicks</div>
    <div class="table_head_stats">CTR %</div>
    <div class="table_head_stats">Avg eCPM</div>
    <div class="table_head_stats">Target</div>
    <div class="table_head_stats">Budget</div>
    <div class="table_head_btn"></div>
  </div>

  @foreach ($ads as $ad)
  <div class="table_row row">
  
    <div class="table_campaign_flags">  
      <img src="https://cms.mqoqowa.africa//images/africa/{{ $ad->flag }}" />
    </div>

    <div class="table_campaign_img">  
      <img class="fa fa-file-image" src=""/>
    </div> 
    
    <div class="table_campaign_title">{{ $ad->campaign_name }}</div>
    <div class="table_campaign_created">{{ $ad->created_at->diffForHumans() }}</div>
    <div class="table_campaign_status">{{ $ad->campaign_impression }}</div>
    <div class="table_campaign_status">{{ $ad->campaign_viewership }}</div>
    <div class="table_campaign_status">{{ $ad->campaign_clicks }}</div>
    <div class="table_campaign_status">{{ $ad->campaign_ctr }}</div>
    <div class="table_campaign_status">{{ $ad->campaign_cpm }}</div>
    <div class="table_campaign_status">{{ $ad->campaign_target }}</div>
    <div class="table_campaign_status">{{ $ad->campaign_target}}</div>

    <div class="dropdown2">
      <span class="dropbtn2 fa fa-ellipsis-v"></span>
      <div id="m5" class="dropdown2-content">
        
        <div class="index-btn-row">
          <a href="{{ url('campaign/preview/'. $ad->id . '-' . str_replace(' ', '-', $ad->title)) }}">
            <i class="fa fa-eye"></i> Preview
          </a>
        </div>

        <div class="index-btn-row">
          <a href="{{ url('campaign/dashboard/'. $ad->id . '-' . str_replace(' ', '-', $ad->title)) }}">
            <i class="fa fa-dashboard"></i> Perfomance
          </a>
        </div>

        <div class="index-btn-row">
          <a href="#">
            <i class="fa fa-user-cog"></i> Operator
          </a>
        </div>

        <div class="index-btn-row">
          <a href="#">
            <i class="fa fa-calendar-check"></i> Activated {{ date('d M Y @ h:i', strtotime($ad->publish)) }}
          </a>
        </div>

        <div class="index-btn-row">
          <a href="#">
            <i class="fa fa-calendar-times"></i> Archived {{ date('d M Y @ h:i', strtotime($ad->archive)) }}
          </a>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('campaign/'.$ad->id) }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <input type="hidden" value="suspend" name="status"/>
            <button type="submit"><i class="fa fa-cloud"></i> Re-Activate</button>
          </form>
        </div>

      </div>
    </div>
    
  </div>
  @endforeach
