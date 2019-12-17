$( document ).ready(function() {
  $(".images").lightGallery(); 
      $(".slider-plantas").lightGallery(); 
    $('.slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<div class="slick-prev slick-arrow"><img class="img-fluid" src="http://robertzwirn.com.br/assets/img/left.png"></div>',
        nextArrow: '<div class="slick-next slick-arrow"><img class="img-fluid" src="http://robertzwirn.com.br/assets/img/right.png"></div>',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            }
          ]
    });
    if($(window).width() <= 750){
        $('.images').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            prevArrow: '<div class="slick-prev slick-arrow"><img class="img-fluid" src="http://robertzwirn.com.br/assets/img/left.png"></div>',
            nextArrow: '<div class="slick-next slick-arrow"><img class="img-fluid" src="http://robertzwirn.com.br/assets/img/right.png"></div>',
        })
    }
    $act = $('a.nav-item');
	$act.addClass('off');
	$(".off").click(function () {
		$act.removeClass('active');
		$('.slider').slick('slickGoTo', 0);
		$('.slider').slick('refresh');
    });
    window.addEventListener('load', AOS.refresh);
});