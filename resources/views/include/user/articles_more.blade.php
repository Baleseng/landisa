<div class="more-article-wrap">
  <div class="more-article-subsection">{{ $articles->subsection }}</div>
  <div class="more-article-image">
    <a href="@include('include.user.articles_hyperlink')">
      <img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}">
    </a>
  </div>
  
  <div class="more-article-heading">
    <a href="@include('include.user.articles_hyperlink')">{{ $articles->title }}</a>
  </div>

  <div class="more-article-synopsis">
    <a href="@include('include.user.articles_hyperlink')">{{ $articles->synopsis }}</a>
  </div>

  <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
  
  <div class="more-article-info">
    <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
    <span></span>
    <ul>
      <li><dl class="fa fa-eye"></dl> <b> {{ views($articles)->unique()->count() }} </b></li>
      <li><dl class="fa fa-comment"></dl> <b>0</b></li>
      <li><dl class="fa fa-share"></dl> <b>0</b></li>
    </ul>
  </div>
</div>


