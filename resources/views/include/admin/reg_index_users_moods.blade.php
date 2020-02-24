  <div class="table_index_head_row">   
    <div class="table_index_head_user_title">Article</div>
    <div class="table_index_head_user_title">Messages</div>
    <div class="table_index_head_user_btn"></div>
  </div>

  @foreach ($moods as $mood)
  <div class="table_index_row row">  
  
    <div class="table_index_user_title"></div>
    <div class="table_index_user_title"></div>

    <div class="table_index_user_created">{{ $mood->created_at->diffForHumans() }}</div>

    <div class="dropdown2">
      <span class="dropbtn2 fa fa-ellipsis-v"></span>
      <div id="m5" class="dropdown2-content">
        
        <div class="index-btn-row">
          <a href="{{ url('users/moods/'. $mood->id . '-' . str_replace(' ', '-', $mood->title)) }}">
            <i class="fa fa-eye"></i> Preview
          </a>
        </div>

        <div class="index-btn-row">
          <a href="{{ url('users/moods/'. $mood->id . '-' . str_replace(' ', '-', $mood->title)) }}">
            <i class="fa fa-dashboard"></i> Perfomance
          </a>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/comments/'.$mood->id) }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <input type="hidden" value="suspend" name="status"/>
            <button type="submit"><i class="fa fa-minus-circle"></i> Suspend {{ $mood->name }}</button>
          </form>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/moods/'.$mood->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="submitbtn"><i class="fa fa-trash"></i> Remove {{ $mood->name }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach