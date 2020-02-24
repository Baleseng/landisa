<div class="admin-subnav-btn-container"> 
  <div class="admin-subnav-btn-row row">
    
    <div class="admin-subnav-btn-wrapper"> 
      <a href="{{ url('admin/campaigns') }}" class="admin-subnav-btn">
        <i class="fa fa-money-check-alt"></i>
        <b>Active</b>
       </a>
    </div>
    <div class="admin-subnav-btn-wrapper"> 
      <a href="{{ url('admin/campaigns/inactive') }}" class="admin-subnav-btn">
        <i class="fa fa-money-check"></i>
        <b>Inactive</b>
       </a>
    </div>
    <div class="admin-subnav-btn-wrapper"> 
      <a href="{{ url('admin/campaigns/archive') }}" class="admin-subnav-btn">
        <i class="fa fa-archive"></i>
        <b>Archive</b>
       </a>
    </div>

    <div class="admin-subnav-btn-wrapper">
     <a href="{{ url('admin/campaigns/programmatic') }}" class="admin-subnav-btn">
        <i class="fa fa-project-diagram"></i> 
        <b>Programmatic</b>
      </a>
    </div>
    <div class="admin-subnav-btn-wrapper">
      <a href="{{ url('admin/campaigns/inventory') }}" class="admin-subnav-btn">
        <i class="fa fa-cubes"></i>
        <b>Inventory</b>
      </a>
    </div>
    <div class="admin-subnav-btn-wrapper">
      <a href="{{ url('admin/campaigns/reporting') }}" class="admin-subnav-btn">
        <i class="fa fa-clipboard-check"></i>
        <b>Reporting</b>
      </a>
    </div>
    <div class="admin-subnav-btn-wrapper">
      <a href="{{ url('admin/campaigns/order') }}" class="admin-subnav-btn">
        <i class="fa fa-list-alt"></i>
        <b>Orders</b>
      </a>
    </div>

    <div class="admin-subnav-btn-wrapper"> 
      <a href="{{ url('admin/campaigns/advertiser') }}" class="admin-subnav-btn">
        <i class="fa fa-comment"></i>
        <b>Advertisers</b>
       </a>
    </div>
    <div class="admin-subnav-btn-wrapper"> 
      <a href="{{ url('admin/campaigns/agency') }}" class="admin-subnav-btn">
        <i class="fa fa-comment"></i>
        <b>Agencies</b>
       </a>
    </div>

  </div>
</div>