<div class="more-article-wrap">
  <div class="more-article-subsection">{{ $id->subsection }}</div>
  <div class="more-article-image">
    <a href="#">
      <img src="{{ URL::asset('images/articles/'.$id->article_img) }}">
    </a>
  </div>
  
  <div class="more-article-heading">
    <a href="#">{{ $id->title }}</a>
  </div>

  <div class="more-article-synopsis">
    <a href="#">{{ $id->synopsis }}</a>
  </div>

  <span class="published">{{ $id->created_at->diffForHumans() }}</span>
  
  <div class="more-article-info">
    <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
    <span></span>
    <ul>
      <li><dl class="fa fa-eye"></dl> <b>0</b></li>
      <li><dl class="fa fa-comment"></dl> <b>0</b></li>
      <li><dl class="fa fa-share"></dl> <b>0</b></li>
    </ul>
  </div>
</div>