  <div class="table_index_head_row">
    <div class="table_index_head_user_flag"></div>
    <div class="table_index_head_user_status"></div>
    <div class="table_index_head_user_img"></div>
    <div class="table_index_head_user_title">Articles</div>
    <div class="table_index_head_user_created">Created</div>
    <div class="table_index_head_user_status">Status</div>
    <div class="table_index_head_user_btn"></div>
  </div>

  @foreach ($stories as $story)
  <div class="table_index_row row">  
    <div class="table_index_user_flags">  
      <img class="fa fa-user" src="https://developer.triwink.app/images/africa/{{ $story->flag }}.svg" >
    </div>

    <div class="user_hover_wrapper">
      <div class="user_hover_btn"> 
        <img class="fa fa-user" src="https://developer.triwink.app/images/profile/users/{{ $story->avator }}" >
      </div>
      <div id="user_hover_show_user">
        <div class="user_hover_img">
          <img class="fa fa-user" src="https://developer.triwink.app/images/profile/users/{{ $story->avator }}" >
        </div>
        <span class="user_hover_info">
          <a href="" class="user_hover_info_name">{{ $story->name }} {{ $story->surname }}</a>
        </span>
      </div>
    </div>

    <div class="table_index_user_title">{{ $story->title }}</div>

    <div class="table_index_user_created">{{ $story->created_at->diffForHumans() }}</div>

    <div class="table_index_user_status">{{ $story->status }}</div>

    <div class="dropdown2">
      <span class="dropbtn2 fa fa-ellipsis-v"></span>
      <div id="m5" class="dropdown2-content">
        
        <div class="index-btn-row">
          <a href="{{ url('users/community/'. $story->id . '-' . str_replace(' ', '-', $story->title)) }}">
            <i class="fa fa-eye"></i> Preview
          </a>
        </div>

        <div class="index-btn-row">
          <a href="{{ url('users/community/'. $story->id . '-' . str_replace(' ', '-', $story->title)) }}">
            <i class="fa fa-dashboard"></i> Perfomance
          </a>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/community/'.$story->id) }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <input type="hidden" value="suspend" name="status"/>
            <button type="submit"><i class="fa fa-minus-circle"></i> Suspend {{ $story->name }}' Story</button>
          </form>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/community/'.$story->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="submitbtn"><i class="fa fa-trash"></i> Remove {{ $story->name }}' Story</button>
          </form>
        </div>

      </div>
    </div>

  </div>
  @endforeach