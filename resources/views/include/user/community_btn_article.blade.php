
<div id="idarticle" class="modalsignup">
  <div class="modalsignupcontent">
    <span onclick="document.getElementById('idarticle').style.display='none'" class="modalclosesignup">&times;</span>
    <div class="signupcontainer">
    	<h3>Share your Story</h3>
    	<form method="POST" enctype="multipart/form-data">

        <input type="text" name="title" Placeholder="Article Heading" value="" class=""/>
        <input type="file" name="image" id="image"/>
        <img class="crop" name="image" id="image" style="display:none" /> 

        <textarea name="article" Placeholder="Share with us" class=""></textarea>

	      <button type="submit" name="postarticle" value="Save">Save</button>
    	</form>
    </div>
  </div>
</div>