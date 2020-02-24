
	<div id="app" class="news-article-container">
	  
	  <div class="article-container">
		  <div class="article-section">
		    <a href="">{{ $id->section }}</a> 
		    <span>{{ $id->subsection }}</span> 
		  </div>
		  <div class="article-title">
		    <h1>{{ $id->title }}</h1>
		  </div>
		  <div class="article-author">
		    <!-- <div class="author-img">
		      <img class="fa fa-user" src="https://triwriter.app/images/writers/{{ $id->profile }}"/>
		    </div> -->
		    <div class="author-name-article-date"><i class="fa fa-user-edit"></i> by: <strong></strong> <span><i class="fa fa-calendar-check"></i> {{ date('d M Y h:i', strtotime($id->publish)) }}</span></div>   
		  </div>
		  <!-- FULL ARTICLE SECTION -->
		  <div class="article-min">{{ $id->synopsis }}</div>
		  <div class="article-max">{!! $id->full_article !!}</div>
		  <!-- ARTICLE COMMENT CONTAINER SECTION -->
		  
		</div>

		@include('include.user.news_article_sidebar')
		
		@include('include.user.news_article_'.$id->commentblock)
	 
	</div>
