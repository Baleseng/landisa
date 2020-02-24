<div class="user-multimedia-container row">
	@foreach ( $stories->take(4)->reverse() as $story )
	
	<div class="user-multimedia-row">		
	  
	  <div class="user-media-images">
		  <div class="user-media-cover">
		  	<span class="user-media-icon">
		  		<i class="fa fa-images"></i>
		  	</span>
		    <img class="fa fa-image" src="https://cms.mqoqowa.africa/images/articles/{{ $story ->section }}">
		  </div>

			<a href="" class="user-media-info">
		    <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
		    <span class="user-media-title"></span>
		    <ul>
		      <li><dl class="fa fa-eye"></dl> <b>0</b></li>
		      <li><dl class="fa fa-comment"></dl> <b>0</b></li>
		      <li><dl class="fa fa-share"></dl> <b>0</b></li>
		    </ul>
		  </a>

		</div>

	</div>

	@endforeach

</div>