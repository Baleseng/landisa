<div class="africa country">
  <div class="admin-dashboard-region">
    <div class="admin-dashboard-header">
      <div class="table_heading_row">
        @include('include.admin.admin_map_col_title')
      </div>
    </div>
    <div class="admin-dashboard-countries" id="scroll-y"> 
      @foreach ($africa as $region)
        @include('include.admin.admin_map_col_status_region')
      @endforeach
    </div>
  </div>
  <div class="admin-dashboard-map">
    <div id="africa"></div>
  </div>

</div>