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
      <a href="{{ url('/moderator/users') }}" class="app-link"><i class="fa fa-user"></i> <b>Users</b></a>
    </div>

     <div class="app-block">
      <a href="{{ url('/moderator/community') }}" class="app-link"><i class="fa fa-user-edit"></i> <b>Stories</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/moderator/moods') }}" class="app-link"><i class="fa fa-meh"></i> <b>Moods</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/moderator/posts') }}" class="app-link"><i class="fa fa-pencil-square"></i> <b>Posts</b></a> 
    </div>

    <div class="app-block">
      <a href="{{ url('/moderator/comments') }}" class="app-link"><i class="fa fa-comment"></i> <b>Comments</b></a> 
    </div>

    <div class="app-block">
      <a href="{{ url('/moderator/messages') }}" class="app-link"><i class="fa fa-comments"></i> <b>Messages</b></a> 
    </div>

    <div class="app-block">
      <a href="{{ url('/moderator/emails') }}" class="app-link"><i class="fa fa-envelope"></i> <b>Emails</b></a>
    </div>

    <div class="app-block">
      <a href="{{ url('/moderator/downloads') }}"" class="app-link"><i class="fa fa-download"></i> <b>Downloads</b></a> 
    </div>
  </div>