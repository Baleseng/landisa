<div class="post-board-left-caption">
	<a href="@include('include.articles_hyperlink')">{{ $articles->title }}</a>
	<!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
  <span class="subsection">{{ $articles->section }} | {{ $articles->subsection }}</span>
</div>
<div class="post-board-left-status row">
   <ul>
    <li><i class="fa fa-eye"></i> <b>0</b></li>
    <li><i class="fa fa-comment"></i> <b>0</b></li>
    <li><i class="fa fa-share"></i> <b>0</b></li>
  </ul>
  <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
</div>