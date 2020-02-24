
@extends('layouts.auth')

@section('title', 'Personalisation')

@section('content')


	<section class="demo">
	  <div class="wrapper">
		
			<form method="POST">
	    {{ method_field('PATCH') }}
	    {{ csrf_field() }}
	    <div class="user-upload-img-wrap">
		    <div class="user-upload-img" id="image">
		      <img id="preview_image" class="fa fa-user" src="{{ URL::asset('images/users/'.Auth::user()->avator) }}"/>
		      <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw user-upload-loader"></i>

		      <div class="user-upload-img-overlay">
		        <a href="javascript:changeProfile()" class="fa fa-cloud-upload-alt"></a>
		        <a href="javascript:removeFile()" class="fa fa-trash"></a>    
		      </div>
		      
		      <input type="hidden" value="{{  Auth::user()->coverimg }}" name="coverimg"/>

		      <input type="file" id="file" style="display: none"/>
			    <input type="hidden" id="file_name" name="avator"/> 
		    </div>

		    <div class="submi-btn">
		      <button type="submit" class="submitbtn"><i class="fa fa-save"></i> Save</button>
		      <a class="cancelbtn" href="{{ url('wall') }}"><i class="fa fa-times"></i> Cancel</a>
		    </div>
	    </form>

		</div>
	</section>


  
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
		$('#loading').css('display', 'block');
		$.ajax({
			url: "{{ action('WallController@upload_profile', Auth::user()->id) }}",
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

@endsection
