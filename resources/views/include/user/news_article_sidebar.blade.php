<!-- RIGHT SIDEBAR SECTION -->
  <div class="article-sidebar sticky-div-news">
  	<div class="article-results-container">
			<div id="modal" class="article-results-wrap">
		    
		    <div class="article-results-btn">
		    	<span id="show-modal" @click="showModal = true" class="result-btn">
		    		<i class="fa fa-pencil-square"></i> <b>0</b>
		    	</span>
		    </div>
		    <modal v-if="showModal" @close="showModal = false">
			    <div slot="input">
			      <div class="post_input">
			        <form method="POST" action="{{ action('WallController@timeline', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}">
			          {{ csrf_field() }}
			          <textarea name="post" class="maxarticle" Placeholder="What's on your mind" rows="5"></textarea>
			          <span onclick="show('emoji-content')" class="emoji-btn fa fa-smile-o"></span>
			          <div id="emoji-content">  
			            <div class="alert-container-top row">
			              <div class="alert-catergory">This article makes me...</div>
			              <span onclick="hide('emoji-content')" class="alert-close-button fa fa-times"></span>
			            </div>
			            <div class="alert-container-mid row"> 
			              <span class="emobtn emoji-outer emoji-sizer"">
			                <label for='radiofunny' class="emoji-inner"></label>
			                <input type='radio' name='_entered' value="" id='radiofunny' class='moodradiobtn'/> 
			              </span>
			            </div>
			          </div>
			          <input type="hidden" value="{{ $id->id }}" name="news_id"/>
			          <input type="hidden" value="{{ $id->section }}" name="section"/>
			          <input type="hidden" value="{{ $id->article_img }}" name="article_img"/>
			          <input type="hidden" value="{{ $id->title }}" name="title"/>
			          <input type="hidden" value="red" name="status"/> 
			          <input type="hidden" value="article" name="postwrapper"/> 
			          <input type="hidden" value="{{ $id->section }}" name="postsection"/> 
			          <div class="select-wrap row">
			            <div class="select-misc-btn"></div>
			            <button type="submit" class="post-button"><i class="fa fa-pencil-square"></i> Post</button>
			          </div>  
			        </form>
			      </div>
			    </div>
			    <div slot="sticky">
			      <div class="post_col">
			        <div class="post_col_img">
			          <img src="https://cms.mqoqowa.africa/images/articles/{{$id->article_img}}">
			        </div>
			        <div class="post_col_title">
			          <i class="fa fa-{{ $id->section }}"></i>
			          <h3>{{ $id->title }}</h3>  
			          <span>{{ $id->section }}</span>
			        </div>
			      </div>
			    </div>
			  </modal>

		    <div class="article-results-btn">
		    	<span class="result-btn"><i class="fa fa-meh"></i> <b>0</b></span>
		    	<div class="dropmoodcontent">  
		        <span class="bounce_button">
		          <label for='radiolike' class="fa fa-thumbs-up"></label>
		          <input type='radio' name='mood_entered' value='<i class="fa fa-thumbs-up"></i>' id='radiolike' class='moodradiobtn'/>
		        </span>
		        <span class="bounce_button">
		          <label for='radiolove' class="fa fa-heart"></label>
		          <input type='radio' name='mood_entered' value='<i class="fa fa-heart"></i>' id='radiolove' class='moodradiobtn'/>
		        </span>
		        <span class="bounce_button">
		          <label for='radiofunny' class="fa fa-laugh-beam"></label>
		          <input type='radio' name='mood_entered' value='<i class="fa fa-laugh-beam"></i>' id='radiofunny' class='moodradiobtn'/> 
		        </span>
		        <span class="bounce_button">
		          <label for='radiosad' class="fa fa-sad-tear"></label>
		          <input type='radio' name='mood_entered' value='<i class="fa fa-sad-tear"></i>' id='radiosad' class='moodradiobtn'/>
		        </span>
		        <span class="bounce_button">
		          <label for='radioshocked' class="fa fa-meh"></label>
		          <input type='radio' name='mood_entered' value='<i class="fa fa-meh"></i>' id='radioshocked' class='moodradiobtn'/>
		        </span>
		        <span class="bounce_button">
		          <label for='radioangry' class="fa fa-angry"></label>
		          <input type='radio' name='mood_entered' value='<i class="fa fa-angry"></i>' id='radioangry' class='moodradiobtn'/>
		        </span>  
			    </div>
		    </div>
		   
			  <div class="article-results-btn">
		    	<span class="result-btn"><i class="fa fa-eye"></i> <b> {{ views($id)->unique()->count() }} </b></span>
		    </div>
		    
		    <div class="article-results-btn">
		    	<span class="result-btn"><i class="fa fa-comment"></i> <b>0</b></span>
		    </div>

		    <div class="article-results-btn">
		    	<a href='mailto:?&subject=&body=' class="result-btn"><i class="fa fa-envelope"></i> <b>0</b></a>
		    </div>

		    <div class="article-results-btn">
		    	<a href="#" class="result-btn"><i class="fa fa-download"></i> <b>0</b></a>
		    </div>

		  </div>
		</div>

    <div class="related-article-container">
    	<h4>Related Articles</h4>
    	<div class="related-article-wrap">
    	@foreach ($related->where('status', '=', 'publish')->take(3) as $articles)
    		<div class="related-article-row">

		    	<div class="content-sub-article-img">
				    <a href="@include('include.user.articles_hyperlink')">
				    	<img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}"/>
				    </a>
				  </div>
				  <div class="content-sub-article-heading">	    
				    <a class="content-article-heading" href="@include('include.user.articles_hyperlink')">{{ $articles->title }}</a>  
				  </div>
				  <div class="content-sub-article-status row">
				     <ul>
				      <li><i class="fa fa-eye"></i> <b> {{ views($articles)->unique()->count() }} </b></li>
				      <li><i class="fa fa-comment"></i> <b>0</b></li>
				      <li><i class="fa fa-share"></i> <b>0</b></li>
				    </ul>
				    <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
				  </div>
			  
			  </div>
    	@endforeach
    	</div>
    </div>

  </div>
  


  