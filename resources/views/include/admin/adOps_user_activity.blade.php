<div class="admin-dashboard-widget">
  <div class="admin-dashboard-col-1">         
  
    <div class="table_index_head_row">
      <div class="table_index_head_user_flag"></div>
      <div class="table_index_head_user_status"></div>
      <div class="table_index_head_user_img"></div>
      <div class="table_index_head_user_stats">Articles</div>
      <div class="table_index_head_user_stats">Community</div>
      <div class="table_index_head_user_stats">Posts</div>
      <div class="table_index_head_user_stats">Comment</div>
      <div class="table_index_head_user_stats">Messages</div>
      <div class="table_index_head_user_stats">Downloads</div>
      <div class="table_index_head_user_created">Registered</div>
      <div class="table_index_head_user_btn"></div>
    </div>

    @foreach ($users as $user)
    <div class="table_index_row row">  

      <div class="table_index_user_flags">  
        <img class="fa fa-flag" src="https://developer.triwink.app/images/africa/{{ $user->flag }}.svg">
      </div> 
      
      <div class="table_index_user_status"><i class="fa fa-circle {{ $user->status }}"></i></div>

      <div class="user_hover_wrapper">
        <div class="user_hover_btn"> 
          <img class="fa fa-user" src="https://developer.triwink.app/images/profile/users/{{ $user->avator }}" >
        </div>
        <div id="user_hover_show_user">
          <div class="user_hover_img">
            <img class="fa fa-user" src="https://developer.triwink.app/images/profile/users/{{ $user->avator }}" >
          </div>
          <span class="user_hover_info">
            <a href="" class="user_hover_info_name">{{ $user->name }} {{ $user->surname }}</a>
          </span>
        </div>
      </div>

      <div class="table_index_user_stats">{{ $user->articles }}</div> 
      <div class="table_index_user_stats">{{ $user->communities }}</div> 
      <div class="table_index_user_stats">{{ $user->posts }}</div>
      <div class="table_index_user_stats">{{ $user->comments }}</div> 
      <div class="table_index_user_stats">{{ $user->comments }}</div> 
      <div class="table_index_user_stats">{{ $user->comments }}</div>

      <div class="table_index_user_created">{{ $user->created_at->diffForHumans() }}</div> 

      <div class="dropdown2">
        <span class="dropbtn2 fa fa-ellipsis-v"></span>
        <div id="m5" class="dropdown2-content">
          
          <div class="index-btn-row">
            <a href="{{ url($url.'/users/'.$user->id.'-'.str_replace(' ', '-',$user->name)) }}">
              <i class="fa fa-user"></i> {{$user->name}}'s Profile
            </a>
          </div>

          <div class="index-btn-row">
            <form method="POST" action="{{ url('users/'.$user->id) }}">
              {{ method_field('PATCH') }}
              {{ csrf_field() }}
              <input type="hidden" value="suspend" name="status"/>
              <button type="submit"><i class="fa fa-minus-circle"></i> Suspend {{ $user->name }}</button>
            </form>
          </div>

          <div class="index-btn-row">
            <form method="POST" action="{{ url('users/'.$user->id) }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="submitbtn"><i class="fa fa-trash"></i> Remove {{ $user->name }}</button>
            </form>
          </div>
          
        </div>
      </div>

    </div>
    @endforeach
  </div>
</div>