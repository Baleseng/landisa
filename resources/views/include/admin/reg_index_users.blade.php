  <div class="table_index_head_row">
    <div class="table_index_head_user_flag"></div>
    <div class="table_index_head_user_img"></div>
    <div class="table_index_head_user_created">Signed Up</div>
    <div class="table_index_head_user_status">Status</div>
    <div class="table_index_head_user_btn"></div>
  </div>

  @foreach ($users as $user)
  <div class="table_index_row row">  
    
    <div class="table_index_user_flags">  
      <img class="fa fa-user" src="https://developer.triwink.app/images/africa/{{ $user->flag }}.svg" >
    </div>

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

    <div class="table_index_user_title">{{ $user->title }}</div>
    <div class="table_index_user_title">{{ $user->post }}</div>

    <div class="table_index_user_created">{{ $user->created_at->diffForHumans() }}</div>

    <div class="table_index_user_status">{{ $user->status }}</div>
  
    <div class="dropdown2">
      <span class="dropbtn2 fa fa-ellipsis-v"></span>
      <div id="m5" class="dropdown2-content">

        <div class="index-btn-row">
          <a href="{{ url('users/'. $user->user_id .'-'. $user->name .'-'. $user->surname) }}">
            <i class="fa fa-user"></i> {{$user->name}}'s Profile
          </a>
        </div>
        
        <div class="index-btn-row">
          <a href="{{ url('users/posts/'. $user->id . '-' . str_replace(' ', '-', $user->title)) }}">
            <i class="fa fa-eye"></i> Preview
          </a>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/posts/'.$user->id) }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <input type="hidden" value="suspend" name="status"/>
            <button type="submit"><i class="fa fa-minus-circle"></i> Suspend {{ $user->name }}' Post</button>
          </form>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/posts/'.$user->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="submitbtn"><i class="fa fa-trash"></i> Remove {{ $user->name }}' Post</button>
          </form>
        </div>

      </div>
    </div>

  </div>
  @endforeach