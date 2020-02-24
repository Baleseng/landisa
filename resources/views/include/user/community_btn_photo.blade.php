
<div id="idphoto" class="modalsignup">
  <div class="modalsignupcontent">
    <span onclick="document.getElementById('idphoto').style.display='none'" class="modalclosesignup">&times;</span>
    <div class="signupcontainer">
	    <h3>Share a Photo</h3>
	    <form method="POST" enctype="multipart/form-data">
	      <input type="hidden" name="activeuser" value="" class="inputtext"/>
	      <input type="hidden" name="email" value="" class="inputtext"/>
	      <textarea name="textpost" Placeholder="What is on your mind today?" class=""></textarea>
	      <input type="file" name="image" id="image"/>
	      <img class="crop" name="image" id="image" style="display:none" /> 
	      <button type="submit" name="upload_image" value="Save" onclick="document.getElementById('idphoto').style.display='none'">Save</button>
	    </form>
    </div>
  </div>
</div>