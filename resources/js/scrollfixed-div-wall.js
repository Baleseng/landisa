
$(window).scroll(function(){
	var sticky = $('.sticky-div-wall'),
	scroll = $(window).scrollTop();
  if (scroll >= 610) sticky.addClass('fixed');
  else  sticky.removeClass('fixed');
});

