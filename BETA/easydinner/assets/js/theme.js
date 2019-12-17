$( document ).ready(function() {
    $('.cardapio-slider').slick({
        slidesToShow: 3,
        slidestoScroll: 1,
        arrows: true,
        dots: true,
        prevArrow: '<div class="slick-prev slick-arrow"><img class="img-fluid" src="https://assets.betalabs.net/production/easydinner/images/stores/1/left.png" width="60px"></div>',
        nextArrow: '<div class="slick-next slick-arrow"><img class="img-fluid" src="https://assets.betalabs.net/production/easydinner/images/stores/1/right.png" width="60px"></div>',
        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                  arrows: false
              }
            }
          ]
    })
    $('.hamb-icon').on('click', function(){
      $(this).toggleClass('open');
      $('header.mobile').toggleClass('open');
      $('body').toggleClass('open');
    })
    if($(window).width() < 768){
      $('.planos-slider').slick({
        slidesToShow: 1,
        slidestoScroll: 1,
        dots: true,
        infinite: false,
        arrows: false
    })
    }
});