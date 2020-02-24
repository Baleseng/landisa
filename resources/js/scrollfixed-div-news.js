
$(window).scroll(function(){
	var sticky = $('.sticky-div-news'),
	scroll = $(window).scrollTop();
  if (scroll >= 620) sticky.addClass('fixed');
  else  sticky.removeClass('fixed');
});

