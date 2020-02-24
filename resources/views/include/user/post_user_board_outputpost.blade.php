
<div class="postcontainer" id="postoutput">
  <div class="post">

    <div class="post_user_profile_dropdown">
      

      <div class="post_user_profile">
        <div class="post_user_profile_image">
          <img class="fa fa-user" src="{{ URL::asset('images/users/'.Auth::user()->avator) }}" /> 
        </div>
        <div class="post_user_profile_heading">  
          <a href="{{ url('user/timeline?'. Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
          <span>Posted: {{ $p->created_at->diffForHumans() }}</span>
        </div>  
      </div>
      
      <div class="dropdown2">
        <span class="dropbtn2 fa fa-ellipsis-h"></span>
        <div id="m6" class="dropdown2-content arrow_post_config">
          <ul>
            <li>
              <div class="show-share-btn">
                <i class="fa fa-pencil-square-o"></i>
                <span><b>Edit this post</b> Make changes to this post on my timeline</span>
              </div>
            </li>

            <li>
              <div class="show-share-btn">
                <i class="fa fa-trash-o"></i>
                <span><b>Remove this post</b> Completely delete the post</span>
              </div>
            </li>

            <li>
              <div class="show-share-btn">
                <i class="fa fa-eye-slash"></i>
                <span><b>Hide this post</b> I don't want to see this post on my timeline</span>
              </div>
            </li>

            <li>
              <div class="show-share-btn">
                <i class="fa fa-flag-o"></i>
                <span><b>Report this post</b> This post is offensive or don't trust poster</span>
              </div>
            </li>

            <li>
              <div class="show-share-btn">
                <i class="fa fa-chain-broken"></i>
                <span><b>Unfollow</b>Stop seeing posts from this user</span>
              </div>
            </li>

            <li>
              <div class="show-share-btn">
                <i class="fa fa-cogs"></i>
                <span><b>Improve my timeline posts</b>Configure posts for my timeline</span>
              </div>
            </li>
          </ul>
        </div>  
      </div>
    </div>

    <div class="post_user_share_article_wrap" id="{{ $p->postcard }}">  
      <div class="post_user_share_article_col_{{ $p->postwrapper }}">
        @include('include.post_user_board_outputpost_'.$p->postwrapper)
      </div>
    </div> 
    
    <div class="post_user_social_btn_wrap">
      <div class="post_user_social_btn">

        <div class="post_user_social_mood">
          <div class="post_user_social_moodbtn"><i class="fa fa-smile-o"></i> <b>Mood</b></div>
          <div class="post_user_social_moodcontent">
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

        <div class="post_user_social_comment">
          <div class="post_user_social_commentbtn" id="showCommentBtn"><i class="fa fa-external-link-alt"></i> <b>Message</b></div>
        </div>
        
        <div class="post_user_social_share">
          <div class="post_user_social_sharebtn"><i class="fa fa-share-square-o"></i> <b>Share</b></div>
          <div class="post_user_social_sharecontent">
            <a href="#"><i class="fa fa-user-friends"></i>Share with a Friend</a>
            <a href="#"><i class="fa fa-group"></i>Share with a Group</a>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>


