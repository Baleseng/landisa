  <div class="content-sub-article-img">
    <a href="@include('include.user.articles_hyperlink')">
    	<img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}"/>
    </a>
  </div>

  <div class="content-sub-article-heading">
    
    <a class="content-article-heading" href="@include('include.user.articles_hyperlink')">{{ $articles->title }}</a>
  
     <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
    <span class="subsection">{{ $articles->section }} | {{ $articles->subsection }}</span>

  </div>
  <div class="content-sub-article-status row">
     <ul>
      <li><i class="fa fa-eye"></i> <b> {{ views($articles)->unique()->count() }} </b></li>
      <li><i class="fa fa-comment"></i> <b>0</b></li>
      <li><i class="fa fa-share"></i> <b>0</b></li>
    </ul>
    <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
  </div>

