$("#section").change(function() {
  if ($(this).data('options') === undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the section*/
    $(this).data('options', $('#subsection option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[name=' + id + ']');
  $('#subsection').html(options);
});