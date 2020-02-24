<div id="app" class="media-article-container">
  <div class="article-container">  
	  <div class="article-section">
	    <a href="">{{ $content->section }}</a> 
	    <span>{{ $content->subsection }}</span> 
	  </div>
	  <div class="article-title">
	    <h1>{{ $content->title }}</h1>
	  </div>
	  <div class="article-author">
	    <!-- <div class="author-img">
	      <img class="fa fa-user" src="https://triwriter.app/images/writers/{{ $content->profile }}"/>
	    </div> -->
	    <div class="author-name-article-date"><i class="fa fa-user-edit"></i> by: <strong>{{ $writer->name }}</strong> 
	    <span><i class="fa fa-calendar-check"></i> {{ date('d M Y h:i', strtotime($content->publish)) }}</span></div>   
	  </div>
	  <!-- FULL ARTICLE SECTION -->
	  <div class="article-min">{{ $content->synopsis }}</div>
	  <!-- ARTICLE COMMENT CONTAINER SECTION -->
	  @include('include.user.media_article_'.$content->commentblock)
	</div>
  @include('include.user.media_article_sidebar')
</div>