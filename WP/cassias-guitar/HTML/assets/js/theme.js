$(document).ready(function() {
	// Menu mobile
	$('.hamb-icon').on('click', function() {
		$(this).toggleClass('opened');
		$('#menu').toggleClass('open');
		$('body').toggleClass('open');
		if($(this).hasClass('opened')){
			$('.produzidas').hide();
		}else{
			$('.produzidas').show();
		}
	});
	$('.card-show').click(function(){
		$(this).toggleClass('active');
		var a = $(this).attr('data');
		$('div.anothers').each(function(){
			if($(this).hasClass(a)){
				if(!$(this).hasClass('open')) {
						$(this).addClass('open');
				}else{
					$(this).removeClass('open');
				}
			}else{
				$(this).removeClass('open');
			}
		});	
	});
	$('#modelos').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true
	});
	$('#acabamento').slick({
		slidesToShow: 5,
		slidesToScroll: 2,
		arrows: true,
		dots: true,
		infinite: false,
		responsive: [
			{
			  breakpoint: 1280,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
			  }
			}
		]
	});
	$('#produzidas').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		infinite: false,
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		]
	});

	$('#galeria').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		infinite: false,
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		]
	});


	$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 500, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

});