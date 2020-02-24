
$(window).scroll(function(){
	var sticky = $('.sticky-div-post'),
	scroll = $(window).scrollTop();
  if (scroll >= 215) sticky.addClass('fixed');
  else  sticky.removeClass('fixed');
});

