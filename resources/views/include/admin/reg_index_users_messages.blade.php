  <div class="table_index_head_row">   
    <div class="table_index_head_user_title">Article</div>
    <div class="table_index_head_user_title">Messages</div>
    <div class="table_index_head_user_btn"></div>
  </div>

  @foreach ($messages as $message)
  <div class="table_index_row row">  
  
    <div class="table_index_user_title">{{ $message->page_id }}</div>
    <div class="table_index_user_title">{{ $message->comment }}</div>

    <div class="table_index_user_created">{{ $message->created_at->diffForHumans() }}</div>

    <div class="dropdown2">
      <span class="dropbtn2 fa fa-ellipsis-v"></span>
      <div id="m5" class="dropdown2-content">
        
        <div class="index-btn-row">
          <a href="{{ url('users/message/'. $message->id . '-' . str_replace(' ', '-', $message->title)) }}">
            <i class="fa fa-eye"></i> Preview
          </a>
        </div>

        <div class="index-btn-row">
          <a href="{{ url('users/message/'. $message->id . '-' . str_replace(' ', '-', $message->title)) }}">
            <i class="fa fa-dashboard"></i> Perfomance
          </a>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/moods/'.$message->id) }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <input type="hidden" value="suspend" name="status"/>
            <button type="submit"><i class="fa fa-minus-circle"></i> Suspend {{ $message->name }}</button>
          </form>
        </div>

        <div class="index-btn-row">
          <form method="POST" action="{{ url('users/messages/'.$message->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="submitbtn"><i class="fa fa-trash"></i> Remove {{ $message->name }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach