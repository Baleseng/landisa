	@foreach ($post as $p)
		<div class="shareuserpost" id="showpost">
			@include('include.user.user_wall_timeline_post_filter_btn')
		</div>
	@endforeach

	<div class="welcomecontainer">
		<div class="welcome">
		  <div class="image"> 
		    <img class="fa fa-user" src="{{ URL::asset('images/users/'.Auth::user()->avator) }}" />
		  </div>
		  <div class="headingpost"> 
		    <h4>
		      <a href="">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
		    </h4>
		    <span>{{ Auth::user()->created_at }}</span>
		  </div>
		  <h2></h2>
		  <p>Welcome {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
		  <div class="imageradius">
		    <img class="fa fa-user" src="{{ URL::asset('images/users/'.Auth::user()->avator) }}" />
		  </div>
		</div>
	</div>
