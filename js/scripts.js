$(function(){
	$('.mobileNav').on('click', function(){
		$('.menu').slideToggle();
	});
	$(window).scroll(function() {
	  if ($(document).scrollTop() > 50) {
	    $('header').addClass('sticky');
	  } else {
	    $('header').removeClass('sticky');
	  }
	  if ($(document).scrollTop() > 50 && $(document).width() > 768) {
	    $('header').addClass('shrink');
	  } else {
	    $('header').removeClass('shrink');
	  }
	});
});