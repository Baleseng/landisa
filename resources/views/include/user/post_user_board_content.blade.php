<!-- <button class="tablinkuser" onclick="openTabUser('postcard', this, '#d0dade')" id="defaultUserOpen"><span class="fa fa-pencil-square-o"></span>Postcard</button> -->

<a href="{{ url('community/add') }}" class="tablinkuser"><i class="fa fa-file-alt"></i> <b>Write Your Story</b></a>


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

  <textarea id="post_entered" class="colorbackground" placeholder="What's on your mind" maxlength="100"></textarea>

  <button class="post-button row" id="ajaxSubmit">
    <i class="fa fa-sticky-note"></i> <b>Sticky-note</b>
  </button>
  
</div> 
