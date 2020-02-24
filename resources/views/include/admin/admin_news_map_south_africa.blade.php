<div class="za country">
  <div class="admin-dashboard-region">
    <div class="admin-dashboard-header">
      <div class="table_heading_row">
        @include('include.admin.admin_map_col_title')
      </div>
    </div>
    
    <div class="admin-dashboard-countries" id="scroll-y"> 
      
      @foreach ($country->where('countries', '=', 'South Africa') as $region)
        @include('include.admin.admin_map_col_status_provinces')
      @endforeach

    </div>
  </div>
  <div class="admin-dashboard-map">
    <div id="za"></div>
  </div>
</div>