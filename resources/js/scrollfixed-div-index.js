
$(window).scroll(function(){
	var sticky = $('.sticky-div-index'),
	scroll = $(window).scrollTop();
  if (scroll >= 2500) sticky.addClass('fixed');
  else  sticky.removeClass('fixed');
});

