<div class="user-profile-update-img-btn">
  <a href="{{ action('WallController@upload_profile', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="fa fa-camera"></a>
</div>