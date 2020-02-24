<div v-for="img in images">
  <div class="content-sub-multimedia-img">
  	<i class="content-multimedia-section-icon fa fa-{{ $articles->section }}"></i>
    <div class="content-multimedia-img">
      <img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}"/>
    </div>
    <div class="content-sub-multimedia-caption">
    	<a class="content-sub-multimedia-heading" href="@include('include.user.multimediahyperlink')">
      	{{ $articles->title }}
    	</a>
    	<!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
    	<span class="content-sub-multimedia-section">{{ $articles->subsection }}</span>
    	
      <div class="content-sub-multimedia-status row">
        <ul>
          <li><i class="fa fa-eye"></i> <b> {{ views($articles)->unique()->count() }} </b></li>
          <li><i class="fa fa-comment"></i> <b>0</b></li>
          <li><i class="fa fa-share"></i> <b>0</b></li>
        </ul>
        <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
      </div>
      
    </div>
  </div>
</div>