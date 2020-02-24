$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});
var resize = $('#upload-demo').croppie({
  enableExif: true,
  enableOrientation: true,
  viewport: { 
    width: 820,
    height: 420,
    type: 'rectangle'
  },
  boundary: {
    width: 870,
    height: 470,
  }
});

$('#image').on('change', function () { 
  var reader = new FileReader();
  reader.onload = function (e) {
    resize.croppie('bind',{
      url: e.target.result
    }).then(function(){
      console.log('jQuery bind complete');
    });
  }
  reader.readAsDataURL(this.files[0]);
});

$('.addedit-submitbtn').on('click', function (ev) {
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    $.ajax({
      url: "{{ action('NewsController@add', $news->id) }}",
      type: "POST",
      data: {"image":img},
      success: function (data) {
        html = '<img src="' + img + '" />';
        $("#preview-crop-image").html(html);
      }
    });
  });
});