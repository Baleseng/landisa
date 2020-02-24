  $('ul input[type="checkbox"]').on('click', function () {
    var title = $(this).closest('ul').find('input[type="checkbox"]').val(),
    title = $(this).val() + "";
    var check = $( "input:checked" ).length;
    if ($(this).is(':checked')) {
      var html = '<li><input class="checkboxinput" name="section' + check + '" value=' + title + ' ></li>';
      $('.added').append(html);
      $(".hida").hide();
    } else {
      $('li').remove();
      $('.checkboxinput(value="' + title + '")').remove();
    }
  });

  function reload() {
    location.reload(true);
  }