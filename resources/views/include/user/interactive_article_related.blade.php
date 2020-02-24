<div class="related-article-heading">Related Articles</div>
<div class="related-article-wrapper">
  @foreach ( $news->take(5) as $articles )
  <div class="related-article-row">
    <div class="related-article-img">
      <a href="">
        <img src="https://writer.triwink.app/images/articles/{{.$articles->article_img}}"/>
      </a>
    </div>
    <div class="related-article-title">
      <h5>
        <a href="">{{ $articles->title }}</a>
      </h5>
      <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
      <span></span>

      <ul>
        <li><dl class="fa fa-eye"></dl> <b>0</b></li>
        <li><dl class="fa fa-comment"></dl> <b>0</b></li>
        <li><dl class="fa fa-share-square-o"></dl> <b>0</b></li>
      </ul>
    </div>
  </div>
  @endforeach
</div>
