	<div class="user-timeline-postcontent-tab" id="app">
		<span class="user-timeline-posttitle">Add Post</span>
		
		<div class="user-timeline-postbtn-wrap">
		  <span id="show-modal" @click="showModal = true" class="user-timeline-postbtn">
		    <i class="fa fa-sticky-note"></i> What's on your mind?</span>
		</div>

		<modal v-if="showModal" @close="showModal = false">
		  <div slot="input">
		  	<div class="modal-post_input">

	        <form method="POST" action="{{ action('WallController@timeline', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}">
	          {{ csrf_field() }}

	          <div class="tabcontentuser">
						  <input type='radio' name='postcard_entered' value="white" id='postcard1' class='radiobtn' checked="checked"/>
						  <label class="postcardlabel" for='postcard1' id="postcardbtn1"></label>

						  <input type='radio' name='postcard_entered' value="postcard-2" id='postcard2' class='radiobtn'/>
						  <label class="postcardlabel" for='postcard2' id="postcardbtn2"></label>

						  <input type='radio' name='postcard_entered' value="postcard-3" id='postcard3' class='radiobtn'/>
						  <label class="postcardlabel" for='postcard3' id="postcardbtn3"></label>

						  <input type='radio' name='postcard_entered' value="postcard-4" id='postcard4' class='radiobtn'/>
						  <label class="postcardlabel" for='postcard4' id="postcardbtn4"></label>

						  <input type='radio' name='postcard_entered' value="postcard-5" id='postcard5' class='radiobtn'/>
						  <label class="postcardlabel" for='postcard5' id="postcardbtn5"></label>

						  <input type='radio' name='postcard_entered' value="postcard-6" id='postcard6' class='radiobtn'/>
						  <label class="postcardlabel" for='postcard6' id="postcardbtn6"></label>

						  <textarea name="post" id="post_entered" class="colorbackground" Placeholder="What's on your mind"></textarea>

							<div class="dropdown2">
				        <span class="dropbtn2 fa fa-smile-o"></span>
				        <div id="m10" class="dropdown2-content arrow_post_emoji">
				        	<span class="emobtn emoji-outer emoji-sizer">
		                <label for='radiofunny' class="emoji-inner"></label>
		                <input type='radio' name='_entered' value="" id='radiofunny' class='moodradiobtn'/> 
		              </span>
				        </div>
				      </div>

						</div>

	          <div class="select-wrap row">
	            <div class="select-misc-btn">

	            	<div class="user_hover_wrapper">
					        <div class="element">
									  <i class="btn fa fa-camera"></i>
									  <input type="file" name="" id="">
									</div>
						      <div id="user_hover_show">
						        Create Gallery
						      </div>
						    </div>

						    <div class="user_hover_wrapper">
					        <div class="element">
									  <i class="btn fa fa-video"></i>
									  <input type="file" name="" id="">
									</div>
						      <div id="user_hover_show">
						        Upload Video
						      </div>
						    </div>
	            	
	            	
						    <div class="user_hover_wrapper">
					        <div class="element">
								  	<a href="" class="fa fa-pencil-square"></a>
									</div>
						      <div id="user_hover_show">
						        Write Story
						      </div>
						    </div>
								
	            </div>
	            <button type="submit" class="post-button"><i class="fa fa-sticky-note"></i> Post</button>
	          </div>  
	        </form>
	      </div>
		  </div>
		  <div slot="sticky"></div>
		</modal>
	</div>