<span class="dropbtn2 fa fa-gear"></span>
<div id="m5" class="dropdown2-content arrow_setting">

  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-user"></i> Edit Your Profile
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-camera"></i> Upload Profile Picture
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-file-text"></i> Create / Manage Page
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-expeditedssl"></i> Security / Privacy
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-connectdevelop"></i> Setting A.I
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-bell-o"></i> Setting Notification
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-envelope-open-o"></i> Setting Message
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-user-plus"></i> Setting Requests
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-sitemap"></i> Sitemap
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-dashcube"></i> Feedback
    </a>
  </span>
  <span class="setting-btn-row">
    <a href="">
      <i class="fa fa-question-circle-o"></i> Help
    </a>
  </span>

  <span class="setting-btn-row">
    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      <i class="fa fa-power-off"></i>{{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
  </span>
    
</div>
