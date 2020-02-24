
	<div class="user-wall-board-container">
		
  	<!-- POSTBOARD LFETSIDE CONTENT CONTAINER SECTION -->
  	<div class="post-board-left-wrap">
			<div class="post-board-disclaimer">
        <ul>
          <li><a href="">About</a></li> 
          <li><a href=""> Help Center</a></li> 
          <li><a href="">Privacy & Terms</a></li> 
          <li><a href="">Advertising</a></li> 
          <li><a href="">Business Services</a></li> 
          <li><a href="">Get the APP</a></li> 
          <li><a href="">More</a></li>
        </ul>
      </div>
		</div>

  	<div class="user-wall-cover-image-container">	  
		  
		  <div class="user-wall-cover-image">
		    <img class="fa fa-image" src="{{ URL::asset('images/users/'.Auth::user()->coverimg) }}"/>
		  </div>

		  @yield('content_user_cover_img')
		
		  <div class="user-wall-board-profile-wrap">
			  <div class="user-wall-board-profile-img">
			    
			    <img class="fa fa-user" src="{{ URL::asset('images/users/'.Auth::user()->avator) }}" />
			    
			    @yield('content_user_avator')
			    
			  </div>
			  <div class="user-wall-board-profile-button">
			  	<div class="user-wall-board-profile-nav row">
			  		
			  		@yield('content_user_nav')
			  		
			  	</div>
			  </div>
			</div>
	  </div>

		<!-- POSTBOARD SHARING CONTENT CONTAINER SECTION -->
		@yield('content_user_wall')

  </div>