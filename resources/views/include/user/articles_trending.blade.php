<div class="trending-main-row row">
	<div class="trending-main-col">
		<li></li>
		<div class="trending-main-heading">
			<a href="@include('include.user.articles_hyperlink')">{{ $articles->title }}</a>
			<!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
		  <span class="subsection">Trending | {{ $articles->section }} | {{ $articles->subsection }}</span>
		</div>
	</div>
	<div class="trending-main-status row">
	   <ul>
	    <li><i class="fa fa-eye"></i> <b> {{ views($articles)->unique()->count() }} </b></li>
	    <li><i class="fa fa-comment"></i> <b>0</b></li>
	    <li><i class="fa fa-share"></i> <b>0</b></li>
	  </ul>
	  <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
	</div>
</div>


  



