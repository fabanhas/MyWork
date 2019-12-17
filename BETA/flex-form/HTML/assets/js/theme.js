$( document ).ready(function() {
    if($(window).width() <= 766){
        $('.menu__categorias').appendTo('.filtros-mobile');
    }
    $('.menu-btn').on('click', function(){
        $('#content').toggleClass('open');
        $('#mobile-menu').toggleClass('open');
        $('body').toggleClass('open');
    });
    $('#content.open').on('click', function(){
        $('body').removeClass('open');
        $(this).removeClass('open');
        $('#mobile-menu').removeClass('open');
    });
    $('.menu__categorias h2').on('click', function(){
        $(this).toggleClass('open');
        $(this).next('.collapse-div').toggleClass('open');
    });
    $('.slider-product').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
    })
    $('.slider-home').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true
    })
});
window.addEventListener('load', AOS.refresh);