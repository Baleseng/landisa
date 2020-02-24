<div class="header-nav-btn">

  <div class="naviconbtn">

    <div class="dropdown2">
      <span class="dropbtn2 fa fa-th"></span>
      <div id="m5" class="dropdown2-content arrow_app row">

        <div class="nav-btn-wrap {{ $section1[0] }}-color-theme">
          <a href="{{ url($section1[0]) }}" class="nav-link-btn">
            <i class="fa fa-{{ $section1[0] }}"></i> 
            <b>{{ $section1[0] }}</b>
          <a>
        </div>

        <div class="nav-btn-wrap {{ $section2[0] }}-color-theme">
          <a href="{{ url($section2[0]) }}" class="nav-link-btn">
            <i class="fa fa-{{ $section2[0] }}"></i> 
            <b>{{ $section2[0] }}</b>
          </a>
        </div>

        <div class="nav-btn-wrap {{ $section3[0] }}-color-theme">
          <a href="{{ url($section3[0]) }}" class="nav-link-btn">
            <i class="fa fa-{{ $section3[0] }}"></i> 
            <b>{{ $section3[0] }}</b>
          </a>
        </div>

        <div class="nav-btn-wrap {{ $section4[0] }}-color-theme">
          <a href="{{ url($section4[0]) }}" class="nav-link-btn">
            <i class="fa fa-{{ $section4[0] }}"></i> 
            <b>{{ $section4[0] }}</b>
          </a>
        </div>

        <div class="nav-btn-wrap multimedia-color-theme">
          <a href="{{ url('media') }}" class="nav-link-btn">
            <i class="fa fa-play"></i> <b>Mulitmedia</b>
          </a>
        </div>

        <div class="nav-btn-wrap community-color-theme">
          <a href="{{ url('community') }}" class="nav-link-btn">
            <i class="fa fa-users"></i> <b>Community</b>
          </a>
        </div>
      </div>
    </div>

    <div class="user_hover_wrapper">
      <div class="user_hover_btn">
        <div class="user_hover_img">
          <a href="{{ url('/') }}" class="user_hover_name"> 
            <i class="fa fa-sticky-note"></i>
          </a>
        </div>
      </div>  
      <div id="user_hover_show">Sticky Posts</div>
    </div>

    
    <div class="user_hover_wrapper">
      <div class="user_hover_btn">
        <div class="user_hover_img">
          <a href="{{ action('WallController@timeline', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="img-block" class="user_hover_name"> 
            <img class="fa fa-user-circle" src="{{ URL::asset('images/users/'.Auth::user()->avator) }}">
          </a>
        </div>
      </div>  
      <div id="user_hover_show">
        @guest 
          @else {{ Auth::user()->name }}
        @endguest
      </div>
    </div>

    <div class="user_hover_wrapper">
      <div class="user_hover_btn">
        <div class="user_hover_img">
          <a href="{{ url('chatroom') }}" class="user_hover_name"> 
            <i class="fa fa-paper-plane"></i>
          </a>
        </div>
      </div>  
      <div id="user_hover_show">Chatroom</div>
    </div>

    <div class="dropdown2">
      <span class="dropbtn2 fa fa-gear"></span>
      <div id="m6" class="dropdown2-content arrow_setting">
        <span class="setting-btn-row">
          <a href="{{ action('SectionController@edit', Auth::user()->id) }}" class="app-section-link">
            <i class="fa fa-th"></i> Personalise Content
          </a>
        </span>
        <span class="setting-btn-row">
          <a href="{{ url('settings/profile') }}">
            <i class="fa fa-user"></i> Edit Your Profile
          </a>
        </span>
        <span class="setting-btn-row">
          <a href="{{ url('settings/upload') }}">
            <i class="fa fa-camera"></i> Upload Profile Picture
          </a>
        </span>
        <span class="setting-btn-row">
          <a href="{{ url('settings/page') }}">
            <i class="fa fa-file-text"></i> Create / Manage Page
          </a>
        </span>

        <div class="setting-line-divider"></div>

        <span class="setting-btn-row">
          <a href="{{ url('settings/security') }}">
            <i class="fa fa-expeditedssl"></i> Security & Privacy
          </a>
        </span>
        <span class="setting-btn-row">
          <a href="{{ url('settings/policy') }}">
            <i class="fa fa-dashcube"></i> Terms & Conditions
          </a>
        </span>

        <div class="setting-line-divider"></div>

        <span class="setting-btn-row">
          <a href="{{ url('settings/ai') }}">
            <i class="fa fa-connectdevelop"></i> Setting A.I
          </a>
        </span>
        <span class="setting-btn-row">
          <a href="{{ url('settings/notices-messages') }}">
            <i class="fa fa-bell-o"></i> Setting Notification & Messaging
          </a>
        </span>
        <span class="setting-btn-row">
          <a href="{{ url('settings/requests') }}">
            <i class="fa fa-user-plus"></i> Setting Requests
          </a>
        </span>

        <div class="setting-line-divider"></div>

        <span class="setting-btn-row">
          <a href="{{ url('settings/sitemap') }}">
            <i class="fa fa-sitemap"></i> Sitemap
          </a>
        </span>
        <span class="setting-btn-row">
          <a href="{{ url('settings/feedback') }}">
            <i class="fa fa-comment-alt"></i> Feedback
          </a>
        </span>
        <span class="setting-btn-row">
          <a href="{{ url('settings/help') }}">
            <i class="fa fa-question-circle-o"></i> Help
          </a>
        </span>

        <div class="setting-line-divider"></div>
        
        <span class="setting-btn-row">      
            @guest
              @else
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i class="fa fa-power-off"></i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            @endguest
        </span>
      </div>
    </div>

  </div>
</div>
  


