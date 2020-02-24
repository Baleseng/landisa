<div class="admin-dashboard-widget">
    <div class="admin-dashboard-col-1">
      <div class="admin-dashboard-heading">    
        <div class="view-results-heading">
          <i class="fa fa-map-marker"></i>
          <b>Regional</b>
        </div>
        <div class="view-results-block">  
          <h2>0</h2> 
          <span></span>
        </div>
        <div class="admin-dashboard-map-option">
          <select>
            <option value="africacountry">Africa</option>
            <option value="aocountry">Angola</option>
            <option value="bwcountry">Botswana</option>
            <option value="kecountry">Kenya</option>
            <option value="mzcountry">Mozambique</option>
            <option value="nacountry">Namibia</option>
            <option value="tzcountry">Tanzania</option>
            <option value="zacountry">South Africa</option>
            <option value="zmcountry">Zambia</option>
            <option value="zwcountry">Zimbabwe</option>
          </select>
        </div>
      </div>
      @include('include.admin.admin_news_map_africa')
      @include('include.admin.admin_news_map_angola')
      @include('include.admin.admin_news_map_botswana')
      @include('include.admin.admin_news_map_kenya')
      @include('include.admin.admin_news_map_mozambique')
      @include('include.admin.admin_news_map_namibia')
      @include('include.admin.admin_news_map_tanzania')
      @include('include.admin.admin_news_map_south_africa')
      @include('include.admin.admin_news_map_zambia')
      @include('include.admin.admin_news_map_zimbabwe') 
    </div>  
  </div>