<div id="container" class="admin-user-map-container"></div>

<div class="admin-user-gender-container">
  <div class="admin-user-gender-wrap">

    <div class="admin-dashboard-heading admin-user-dashboard-head">
      <div class="view-results-heading admin-user-results-heading">
        <i class="fa fa-th-large"></i>
        <b>Real time Audience</b>
      </div>
    </div>

    <div class="view-results-block admin-user-results-block">  
      <h2>{{ $adops->count() }}</h2> 
      <span class="user-results-realtime">ultrices sagittis nisi quis gravida</span>
    </div>

    <div class="admin-gender-wrap admin-user-gender-wrap">
      <div class="admin-gender-block admin-user-gender-block">
        <i class="fa fa-male"></i>
        <span class="male">Male</span>
        <b class="male">100%</b>
      </div>
      <div class="admin-gender-block admin-user-gender-block">
        <i class="fa fa-female"></i>
        <span class="female">Female</span>
        <b class="female">0%</b>
      </div>
    </div> 
    
  </div>
</div>