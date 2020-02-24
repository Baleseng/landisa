  <div class="table_index_head_row">
    <div class="table_index_head_user_flag"></div>
    <div class="table_index_head_user_img"></div>
    <div class="table_index_head_user_title">Stories</div>
    <div class="table_index_head_user_title">Post</div>
    <div class="table_index_head_user_created">Posted</div>
    <div class="table_index_head_user_status">Status</div>
    <div class="table_index_head_user_btn"></div>
  </div>

  @foreach ($posts as $post)
  <div class="table_index_row row">  
    
    <div class="table_index_user_flags">  
      <img class="fa fa-user" src="https://developer.triwink.app/images/africa/{{ $post->flag }}.svg" >
    </div>

    <div class="user_hover_wrapper">
      <div class="user_hover_btn"> 
        <img class="fa fa-user" src="https://developer.triwink.app/images/profile/users/{{ $post->avator }}" >
      </div>
      <div id="user_hover_show_user">
        <div class="user_hover_img">
          <img class="fa fa-user" src="https://developer.triwink.app/images/profile/users/{{ $post->avator }}" >
        </div>
        <span class="user_hover_info">
          <a href="" class="user_hover_info_name">{{ $post->name }} {{ $post->surname }}</a>
        </span>
      </div>
    </div>

    <div class="table_index_user_title">{{ $post->title }}</div>
    <div class="table_index_user_title">{{ $post->post }}</div>

    <div class="table_index_user_created">{{ $post->created_at->diffForHumans() }}</div>

    <div class="table_index_user_status">{{ $post->status }}</div>
  
    <div class="dropdown2">
      <span class="dropbtn2 fa fa-ellipsis-v"></span>
      <div id="m5" class="dropdown2-content">

        <div class="index-btn-row">
          <a href="{{ url('users/'. $post->user_id .'-'. $post->name .'-'. $post->surname) }}">
            <i class="fa fa-user"></i> {{$post->name}}'s Profile
          </a>
        </div>
        
        <div class="index-btn-row">
          <a href="{{ url('users/posts/'. $post->id . '-' . str_replace(' ', '-', $post->title)) }}">
            <i class="fa fa-eye"></i> Preview
          </a>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/posts/'.$post->id) }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <input type="hidden" value="suspend" name="status"/>
            <button type="submit"><i class="fa fa-minus-circle"></i> Suspend {{ $post->name }}' Post</button>
          </form>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/posts/'.$post->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="submitbtn"><i class="fa fa-trash"></i> Remove {{ $post->name }}' Post</button>
          </form>
        </div>

      </div>
    </div>

  </div>
  @endforeach