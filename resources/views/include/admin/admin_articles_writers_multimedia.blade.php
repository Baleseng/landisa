<div class="admin-wrap-article" id="scroll-y">
  @foreach ($content as $media)
  <div class="tablecol">
    
    <div class="table_head">{{ $media->title }}</div>
    <div class="table_img">
      <a href="#">
        <img src="{{ URL::asset('images/articles/'.$media->cover_img) }}"/>
      </a>
    </div>
    <div class="table_section">{{ $media->section }}</div> 
    <div class="table_btn"><a href="admin/writer/media/preview/{{ $media->id }}"><i class="fa fa-eye"></i></a></div>
    <div class="table_btn"><a href="admin/writer/media/dashboard/{{ $media->id }}"><i class="fa fa-dashboard"></i></a></div>
    <div class="table_btn"><a href="admin/writer/media/edit/{{ $media->id }}"><i class="fa fa-edit"></i></a></div>
    
    <div class="table_status">{{ $media->status }}</div>
  </div>
  @endforeach
</div>