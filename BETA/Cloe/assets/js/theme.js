$( document ).ready(function() {
    $('.submenu').on('click', function(){
        $(this).find('.submenu-ul').toggleClass('open');
        $('#overlay').toggleClass('open');
    });
    $('.hamb-icon').on('click', function(){
      $(this).toggleClass('open');
      $('.menu').toggleClass('open');
    });
    $('.banner').slick({
        slidesToShow: 1,
        slidesToScroll:1,
        dots: true,
        arrows: true,
        // prevArrow: '<div class="slick-prev slick-arrow"><img class="img-fluid" src="assets/img/left.svg" width="60px"></div>',
        // nextArrow: '<div class="slick-next slick-arrow"><img class="img-fluid" src="assets/img/right.svg" width="60px"></div>',
        responsive: [
          {
            breakpoint: 768,
            settings: {
                arrows: false
            }
          }
        ]
      });

      $('.slider-vitrine').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        dots: true,
        arrows: true,
        // prevArrow: '<div class="slick-prev slick-arrow"><img class="img-fluid" src="assets/img/left.svg" width="60px"></div>',
        // nextArrow: '<div class="slick-next slick-arrow"><img class="img-fluid" src="assets/img/right.svg" width="60px"></div>',
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
                arrows: false
            }
          }
        ]
      });
      $('.slider-relacionado').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        // prevArrow: '<div class="slick-prev slick-arrow"><img class="img-fluid" src="assets/img/left.svg" width="60px"></div>',
        // nextArrow: '<div class="slick-next slick-arrow"><img class="img-fluid" src="assets/img/right.svg" width="60px"></div>',
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
                arrows: false
            }
          }
        ]
      });
      if($(window).width() < 768){
        $('.row-cats').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
          // prevArrow: '<div class="slick-prev slick-arrow"><img class="img-fluid" src="assets/img/left.svg" width="60px"></div>',
          // nextArrow: '<div class="slick-next slick-arrow"><img class="img-fluid" src="assets/img/right.svg" width="60px"></div>'
        });
      }
});