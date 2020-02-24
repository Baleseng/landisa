<div class="index-btn-row">
  <form method="POST" action="{{ url($url.'/news/'.$news->id) }}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <input type="hidden" value="{{ Auth::user()->id }}" name="editor_id"/>
    <input type="hidden" value="{{$news->section}}" name="section"/>
    <input type="hidden" value="review" name="status"/>
    <button type="submit" class="acceptbtn"><i class="fa fa-edit"></i> Edit</button>
  </form>
</div>