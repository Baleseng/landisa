<div class="user_hover_wrapper">
  <div class="user_hover_btn">
    <div class="user_hover_img">
      <img class="fa fa-user-circle" src="{{ URL::asset('images/profile/users/') }}">
    </div>
  </div>  
  <div id="user_hover_show">
    <a class="user_hover_name" href="{{ url($url.'/profile/'.Auth::user()->id.'-'.str_replace(' ', '-',Auth::user()->name)) }}">  
      @guest 
        @else {{ Auth::user()->name }}
      @endguest
    </a>
  </div>
</div>

<div class="dropdown2">

  <span class="dropbtn2 fa fa-th"></span>
  <div id="m4" class="dropdown2-content arrow_app">

    <div class="app-block">
      <a href="{{ url('/campaigns/active') }}" class="app-link"><i class="fa fa-money-check-alt"></i> <b>Active</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/inactive') }}" class="app-link"><i class="fa fa-money-check"></i> <b>Inactive</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/archive') }}" class="app-link"><i class="fa fa-archive"></i> <b>Archive</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/programmatic') }}" class="app-link"><i class="fa fa-project-diagram"></i> <b>Programmatic</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/orders') }}" class="app-link"><i class="fa fa-list-alt"></i> <b>Orders</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/inventories') }}" class="app-link"><i class="fa fa-cubes"></i> <b>Inventories</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/reporting') }}" class="app-link"><i class="fa fa-clipboard-check"></i> <b>Reports</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/campaign') }}" class="app-link"><i class="fa fa-plus"></i> <b>Campaigns</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/advertiser') }}" class="app-link"><i class="fa fa-plus"></i> <b>Advertisers</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/campaigns/agency') }}" class="app-link"><i class="fa fa-plus"></i> <b>Agencies</b></a>
    </div>

  </div>