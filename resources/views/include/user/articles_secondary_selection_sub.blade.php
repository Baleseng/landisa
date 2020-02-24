<div class="articles-subsection">
  <div class="articles-subsection-box">
    <div class="articles-subsection-img">
      <a href="@include('include.user.articles_hyperlink')">
        <img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}"/>
      </a>
    </div>
    <div class="articles-subsection-caption">

      <a href="@include('include.user.articles_hyperlink')">{{ $articles->title }}</a>
      
      <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
      <span>{{ $articles->section }} | {{ $articles->created_at->diffForHumans() }}</span>

      <ul>
        <li><i class="fa fa-eye"></i> <b> {{ views($articles)->unique()->count() }} </b></li>
        <li><i class="fa fa-comment"></i> <b>0</b></li>
        <li><i class="fa fa-share-square-o"></i> <b>0</b></li>
      </ul>

    </div>
  </div>
</div>