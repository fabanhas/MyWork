$( document ).ready(function() {
  // menu mobile
  $('.hamb-icon').on('click', function(){
    $(this).toggleClass('open');
    $('#mobile-menu').toggleClass('open');
    $('body').toggleClass('open');
  });
  $('#mobile-menu ul li').on('click', function(){
    $('body').removeClass('open');
    $('#mobile-menu').removeClass('open');
    $('.hamb-icon').removeClass('open');
  });
  $('.slider-ant').slick({
    slidesToShow: 3,
    slideToScroll:1,
    prevArrow: '<div class="slick-prev slick-arrow"><img class="img-fluid" src="assets/img/left.svg" width="60px"></div>',
    nextArrow: '<div class="slick-next slick-arrow"><img class="img-fluid" src="assets/img/right.svg" width="60px"></div>',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false
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