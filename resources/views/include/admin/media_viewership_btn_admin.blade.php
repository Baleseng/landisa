<div class="index-btn-row">
  <form method="POST" action="{{ url($url.'/media/'.$view->id) }}">
    {{ method_field('PATCH') }}
    {{ csrf_field() }}
    <input type="hidden" value="suspend" name="status"/>
    <button type="submit"><i class="fa fa-minus-circle"></i> Suspend this Article</button>
  </form>
</div>
