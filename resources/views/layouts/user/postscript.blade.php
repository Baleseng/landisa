<script type="text/javascript">
  $(document).ready(function(){
    $('#toggle-contacts-btn').click( function(e) {  
      e.preventDefault(); 
      // stops link from making page jump to the top
      e.stopPropagation(); 
      // when you click the button, it stops the page from seeing it as clicking the body too
      $('#chat-contacts').toggle(); 
    });
    $('#chat-contacts').click( function(e) {   
      e.stopPropagation(); 
      // when you click within the content area, it stops the page from seeing it as clicking the body too 
    });
    // $('body').click( function() { 
    //   $('#chat-content').hide(); 
    // }); 
  });
</script>



	<script>
		function changeProfile() {
			$('#file').click();
		}

		$('#file').change(function () {
			if ($(this).val() != '') {
				upload(this);
			}
		});

		function upload(img) {
			var form_data = new FormData();
			form_data.append('file', img.files[0]);
			form_data.append('_token', '{{csrf_token()}}');
			form_data.append('', '{{ method_field("PATCH") }}');
			$('#loading').css('display', 'block');
			$.ajax({
				url: "{{ action('WallController@upload_cover', Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}",
				data: form_data,
				type: 'POST',
				contentType: false,
				processData: false,
				success: function (data) {
					if (data.fail) {
	  				$('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
	  				alert(data.errors['file']);
					} else {
	  				$('#file_name').val(data);
	  				$('#preview_image').attr('src', '{{asset('images/profile/users')}}/' + data);
					}
					$('#loading').css('display', 'none');
				},
				error: function (xhr, status, error) {
					alert(xhr.responseText);
					$('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
				}
			});
		}

		function removeFile() {
			if ($('#file_name').val() != '')
			if (confirm('Are you sure want to remove profile picture?')) {
				$('#loading').css('display', 'block');
				var form_data = new FormData();
				form_data.append('_method', 'DELETE');
				form_data.append('_token', '{{csrf_token()}}');
				$.ajax({
	  			url: "wall/ajax-remove-image/" + $('#file_name').val(),
	  			data: form_data,
	  			type: 'POST',
	  			contentType: false,
	  			processData: false,
	  			success: function (data) {
	      		$('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
	      		$('#file_name').val('');
	      		$('#loading').css('display', 'none');
	  			},
	  			error: function (xhr, status, error) {
	      		alert(xhr.responseText);
	  			}
				});
			}
		}
	</script>

	<script src="https://cms.mqoqowa.africa/js/fixdiv-wall.js"></script>
	<script src="https://cms.mqoqowa.africa/js/fixdiv-post.js"></script>

	<!-- template for the modal component -->
	<script type="text/x-template" id="modal-template">
	  <transition name="modal">
	    <div class="modal-mask">
	      <div class="modal-wrapper">
	        <div class="modal-container">

	          <div class="modal-header">
	            <slot name="header">
	              <span class="modal-default-button" @click="$emit('close')">
	                <i class="fa fa-window-close"></i>
	              </span>
	            </slot>
	          </div>

	          <div class="modal-form-input">
	            <slot name="input"></slot>
	          </div>

	          <div class="model-form-sticky">
	            <slot name="sticky"></slot>
	          </div>

	          <div class="modal-form-textarea">
	            <slot name="textarea"></slot>
	          </div>

	           <div class="modal-form-button">
	            <slot name="button"></slot>
	          </div>

	        </div>
	      </div>
	    </div>
	  </transition>
	</script>

 