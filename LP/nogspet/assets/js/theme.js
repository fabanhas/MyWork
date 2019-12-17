$(document).ready(function(){
    $.ajax({
        url: 'https://api.instagram.com/v1/users/self/media/recent/?access_token=8442648374.c67f3c6.1ba5c3e7fe2549b289dc45ea25144539&count=4',
        success: function(data) {
          var photos = data.data;
          var html = "";
          for(var i = 0; i < photos.length; i++) {
            html += "<div class='col-xl-3 col-6'><a target='_blank' href='"+photos[i].link+"' title='"+photos[i].caption.text+"'><img class='img-fluid' src='"+photos[i].images.standard_resolution.url+"'></a></div>";
          }
          $('#insta').html(html);
        }
    });
    $('.slider-products').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      // fade: true,
      // speed: 2000,
      // cssEase: 'linear',
      prevArrow: '<div class="slick-prev slick-arrow"><i class="fas fa-angle-left"></i></div>',
      nextArrow: '<div class="slick-next slick-arrow"><i class="fas fa-angle-right"></i></div>',
    });
    var jan = $(window);
      if(jan.width() > 750){
        $(window).scroll(function(){
          var sticky = $('#navbar'),
          scroll = $(window).scrollTop();

        if (scroll >= 100) {
          sticky.addClass('fixed');
          $('body').css('padding-top', '100px');
        }
        else {
          sticky.removeClass('fixed');
          $('body').css('padding-top', '0px');
        }
        });
      }
      // Select all links with hashes
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