<div class="ke country">
  <div class="admin-dashboard-region">
    <div class="admin-dashboard-header">
      <div class="table_heading_row">
        @include('include.admin.admin_map_col_title')
      </div>
    </div>
  
    <div class="admin-dashboard-countries" id="scroll-y"> 
     
      @foreach ($country->where('countries', '=', 'Kenya') as $region)
        @include('include.admin.admin_map_col_status_provinces')
      @endforeach
  
    </div>
  </div>
  <div class="admin-dashboard-map">
    <div id="ke"></div>
  </div>
</div>