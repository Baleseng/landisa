
<div id="idvideo" class="modalsignup">
  <div class="modalsignupcontent">
    <span onclick="document.getElementById('idvideo').style.display='none'" class="modalclosesignup">&times;</span>
    <div class="signupcontainer">
    <h3>Share a Video</h3>
    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="activeuser" value="" class="inputtext"/>
      <input type="hidden" name="email" value="" class="inputtext"/>
      <textarea name="textpost" Placeholder="What is on your mind today?" class=""></textarea>
      <input type="file" name="fileToUpload"/>          
      <label>Or past an embedded youtube video</label>
      <input type="text" name="" Placeholder="eg. https://www.youtube.com/embed/57hP8tfRkgs">
      <button type="submit" name="upload_video" value="Save">Add</button>
    </form>
    </div>
  </div>
</div>