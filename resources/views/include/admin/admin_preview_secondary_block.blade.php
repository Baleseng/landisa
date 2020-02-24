<div class="content-sub-article-img">
  <a href="#">
    <img src="{{ URL::asset('images/articles/'.$id->article_img) }}"/>
  </a>
</div>

<div class="content-sub-article-heading">
  
  <a class="content-article-heading" href="#">{{ $id->title }}</a>

   <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
  <span class="subsection">{{ $id->section }} | {{ $id->subsection }}</span>

</div>
<div class="content-sub-article-status row">
   <ul>
    <li><i class="fa fa-eye"></i> <b>0</b></li>
    <li><i class="fa fa-comment"></i> <b>0</b></li>
    <li><i class="fa fa-share"></i> <b>0</b></li>
  </ul>
  <span class="published">{{ $id->created_at->diffForHumans() }}</span>
</div>
