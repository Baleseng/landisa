
  <div class="heading">
    <h4>Share your comment</h4>
    <span>We reserve editorial discretion to share comments. Read our comments policy for guidelines on contributions.</span>
  </div>
  <div class="commentsbox row"> 
    <div class="image">
      <img class="fa fa-user" src="{{ URL::asset('images/profile/users/'. Auth::user()->avator) }}"/>
    </div>
    <div class="commentinsertbtn">
    <span class="fa fa-smile-o" id="emoji-btn"></span>
    <div class="dropmoodcontent">
   
      <span class="emoji-comment-btn emoji-outer emoji-sizer"">
        <label for='radiofunny' class="emoji-inner"></label>
        <input type='radio' name='' value="" id='radiofunny' class='moodradiobtn'/> 
      </span>

    </div>
  </div>
  <textarea  Placeholder="Leave a comment" maxlength="150" name="comment_entered" v-model="commentBox"></textarea>
  <button @click.prevent="postComment"><i class="fa fa-comments"></i> Comment</button>
</div>

<div class="showpostcomments" v-for="comment in comments">
  <div class="outputpostcomment">  
    <div class="image">
      <img class="fa fa-user" src="{{ URL::asset('images/profile/users/'.Auth::user()->avator) }}"/>
    </div>
    <div class="output">   
      <div class="arrow_box">
        <a href="">@{{comment.user.name}}</a> 
        <p>@{{comment.comment}}</p>
      </div>
    </div>
    <div id="dropostbtn">
      <ul>
        <li><a href="" target="_parent" class="fa fa-caret-down"></a></li>
      </ul>
    </div>
    <span class="row">
      <a href=""><i class="fa fa-smile-o"></i> Mood</a>
      <a href=""><i class="fa fa-reply"></i> Reply</a>
      <a href=""><i class="fa fa-arrows-h"></i> Translate</a>
      <b> <i class="fa fa-clock-o"></i> 1hr</b>  
    </span>
  </div>

  <div class="showpostreplycomments">
    <div class="outputpostreplycomment">  
      <div class="image">
        <img class="fa fa-user" src="{{ URL::asset('images/profile/users/'.Auth::user()->avator) }}" />
      </div>
      <div class="output">
        <div class="arrow_box">
          <a href="">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a> 
          <p> 
             
          </p>
        </div>
      </div>
      <div id="dropostbtn">
        <ul>
          <li><a href="" target="_parent" class="fa fa-caret-down"></a></li>
        </ul>
      </div>
      <span class="row">
        <a href=""><i class="fa fa-smile-o"></i> Mood</a>
        <a href=""><i class="fa fa-reply"></i> Reply</a>
        <a href=""><i class="fa fa-arrows-h"></i> Translate</a>
        <b> <i class="fa fa-clock-o"></i> 1hr</b>  
      </span>
    </div>  
  </div>


