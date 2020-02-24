
<div class="alert-btn-wrap">
  <div class="dropdown2">

    <span class="dropbtn2 fa fa-bell"></span>
    <div id="m1" class="dropdown2-content arrow_notification">
      <div class="alert-container-top">
        <div class="alert-catergory">Notification</div>
        <div class="alert-button">View All</div>
      </div>
      <div class="alert-container-wrap" id="style-4">
        <div class="alert-container-mid">
          <h5>Currently no Notification</h5>
        </div>
      </div>
    </div>

    <span class="dropbtn2 fa fa-envelope"></span>
    <div id="m2" class="dropdown2-content arrow_message">
      <div class="alert-container-top">
        <div class="alert-catergory">Messages</div>
        <div class="alert-button">View All</div>
      </div>
      <div class="alert-container-wrap" id="style-4">
        <div class="alert-container-mid">
          <h5>Currently have no Messages</h5>
        </div>
      </div>
    </div>

    <span class="dropbtn2 fa fa-users"></span>
    <div id="m3" class="dropdown2-content arrow_invites">
      <div class="alert-container-top">
        <div class="alert-catergory">Connect with Others</div>
        <div class="alert-button">View All</div>
      </div>
      
      <div class="alert-container-wrap" id="style-4">
      @foreach ($user as $u)
        <div class="alert-container-mid">  
          <div class="connect-container">
            <div class="connect-img">
              <img class="fa fa-user" src="{{ URL::asset('images/users/'. $u->avator) }}">
            </div>
            <div class="connect-profile-interests">
              <a href="{{ url('user/timeline?'. Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}">{{ $u->name }} {{ $u->surname }}</a>
              <span>{{ $u->section1[0] }}</span>
            </div>
          </div>
          <div class="connect-btn">
            <input id="name" type="hidden" name="" value="{{ $u->id }}">
            <button type=""><i  class="fa fa-user-plus"></i> Connect</button>
            <a href=""><i class="fa fa-user-times"></i> Remove</a>
            
          </div>
        </div> 
      @endforeach
      </div>

    </div>
  </div>
</div>