<div class="content-article-img">
  <a href="#">
    <img src="{{ URL::asset('images/articles/'.$id->article_img) }}" />
  </a>
</div>

<div class="content-article-caption">
  <a class="content-article-heading" href="#">{{ $id->title }}</a>

  <span class="content-article-subsection">{{ $id->section }} | {{ $id->subsection }}</span>

  <a class="content-article-synopsis" href="#">{{ $id->synopsis }}</a>
</div>

<div class="content-article-status row">
   <ul>
    <li><i class="fa fa-eye"></i> <b>0</b></li>
    <li><i class="fa fa-comment"></i> <b>0</b></li>
    <li><i class="fa fa-share"></i> <b>0</b></li>
  </ul>
  <span class="published">{{ $id->created_at->diffForHumans() }}</span>
</div>

