<div class="user-stories-container row">
	@foreach ( $stories->take(4)->reverse() as $story )
	
	<div class="user-stories-row">		
	  
	  <div class="user-stories-images">
		  <div class="user-stories-cover">
		    <img class="fa fa-image" src="https://user.triwink.app/images/users/">
		  </div>
		  <div class="user-stories-avator">
		    <img class="fa fa-user" src="https://user.triwink.app/images/users/">
		  </div>
		</div>
	  
	  <div class="user-stories-heading">
	    <a href="">{{ $story ->title }}</a>
	  </div>
	  
	  <div class="user-stories-info">
	    <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
	    <span></span>
	    <ul>
	      <li><dl class="fa fa-eye"></dl> <b>0</b></li>
	      <li><dl class="fa fa-comment"></dl> <b>0</b></li>
	      <li><dl class="fa fa-share"></dl> <b>0</b></li>
	    </ul>
	  </div>

	</div>

	@endforeach
</div>