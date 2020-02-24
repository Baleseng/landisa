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
      <a href="{{ url('editor/users') }}" class="app-link"><i class="fa fa-users"></i> <b>Users</b></a> 
    </div>

    <div class="app-block">
      <a href="{{ url('editor/news') }}" class="app-link"><i class="fa fa-newspaper-o"></i> <b>Articles</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('editor/writers') }}" class="app-link"><i class="fa fa-user-edit"></i> <b>Writers</b></a> 
    </div>

    <div class="app-block">
      <a href="{{ url('editor/media') }}" class="app-link"><i class="fa fa-play-circle"></i> <b>Multimedia</b></a>
    </div>

  </div>