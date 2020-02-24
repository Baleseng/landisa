<div class="admin-wrap-article" id="scroll-y">
  @foreach ($content as $articles)
  <div class="tablecol">
    
    <div class="table_head">{{ $articles->title }}</div>
    <div class="table_img">
      <img src="{{ URL::asset('images/articles/'.$articles->cover_img) }}"/>
    </div>
    <div class="table_section">{{ $articles->section }}</div> 
    <div class="table_btn"><a href="news/preview/{{ $articles->id }}"><i class="fa fa-eye"></i></a></div>
    <div class="table_btn"><a href="news/dashboard/{{ $articles->id }}"><i class="fa fa-dashboard"></i></a></div>
    <div class="table_btn"><a href="news/edit/{{ $articles->id }}"><i class="fa fa-edit"></i></a></div>
    <div class="table_btn">
      <form method="POST" action="{{ url('/admin/news/'.$articles->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="submitbtn"><i class="fa fa-trash"></i></button>  
      </form>
    </div>   
  </div>
  @endforeach
</div>