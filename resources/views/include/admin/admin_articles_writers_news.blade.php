<div class="admin-wrap-article" id="scroll-y">
  @foreach ($news as $articles)
  <div class="tablecol">
    
    <div class="table_head">{{ $articles->title }}</div>
    <div class="table_img">
      <a href="{{ url('admin/writer/upload/'. $articles->id . '-' . str_replace(' ', '-', $articles->title)) }}">
        <img class="fa fa-file-image" src="{{ URL::asset('images/articles/'.$articles->article_img) }}"/>
      </a>
    </div>
    <div class="table_section">{{ $articles->section }}</div> 
    <div class="table_btn">
      <a href="{{ url('admin/writer/news/preview/'. $articles->id . '-' . str_replace(' ', '-', $articles->title)) }}">
        <i class="fa fa-eye"></i>
      </a>
    </div>
    <div class="table_btn">
      <a href="{{ url('admin/writer/news/dashboard/'. $articles->id . '-' . str_replace(' ', '-', $articles->title)) }}">
        <i class="fa fa-dashboard"></i>
      </a>
    </div>
    <div class="table_btn">
      <a href="{{ url('admin/writer/news/edit/'. $articles->id . '-' . str_replace(' ', '-', $articles->title)) }}">
        <i class="fa fa-edit"></i>
      </a>
    </div>

    <div class="table_status">{{ $articles->status }}</div>    
  </div>
  @endforeach
</div>