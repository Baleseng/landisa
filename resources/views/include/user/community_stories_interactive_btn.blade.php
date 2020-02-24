  <div class="mailbtn">
    <a class="interactive-btn fa fa-envelope-o" href='mailto:?&subject=&body='></a>
  </div>
 


  <div class="loadbtn"><a class="interactive-btn fa fa-download" href="#"></a></div>



  <div class="moodbtn">
	  <a class="interactive-btn fa fa-smile-o"></a>
	  <div class="dropmoodcontent">
	    <div class="emobtncontainer">
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
	</div>



  <div class="sharebtn">
    <a id="show-modal" @click="showModal = true" class="interactive-btn fa fa-sticky-note"></a>
  </div>
  
  <modal v-if="showModal" @close="showModal = false">
    <div slot="input">
      <div class="share_article_input">
        <form method="POST" action="{{ url('/post') }}">
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

          <input type="hidden" value="{{ Auth::user()->name }}" name="name"/>
          <input type="hidden" value="{{ Auth::user()->surname }}" name="surname"/>
          <input type="hidden" value="{{ Auth::user()->email }}" name="email"/>
          <input type="hidden" value="{{ Auth::user()->avator }}" name="avator"/>
          <input type="hidden" value="{{ $stories->id }}" name="news_id"/>
          <input type="hidden" value="{{ $stories->section }}" name="section"/>
          <input type="hidden" value="{{ $stories->article_img }}" name="article_img"/>
          <input type="hidden" value="{{ $stories->title }}" name="title"/>
          <input type="hidden" value="red" name="status"/> 
          <input type="hidden" value="article" name="postwrapper"/> 
          <input type="hidden" value="{{ $stories->section }}" name="postsection"/> 
        
          <div class="select-wrap">
            <div class="select-misc-btn"></div>
            <button onclick="select()" aria-haspopup="true" aria-expanded="false" class="select-button">
              <i class="fa fa-globe"></i> Public <span class="fa fa-caret-down"></span>
            </button>
            <button type="submit" class="post-button"><i class="fa fa-pencil-square"></i> Post</button>
          </div>  
        </form>
      </div>
    </div>
    <div slot="sticky">
      <div class="share_article_col">
        <div class="share_article_col_img">
          <img src="https://news.triwink.africa/images/profile/{{$stories->avator}}">
        </div>
        <div class="share_article_col_title">
          <i class="fa fa-{{ $stories->section }}"></i>
          <h3>{{ $stories->title }}</h3>  
          <span>{{ $stories->section }}</span>
        </div>
      </div>
    </div>
  </modal>