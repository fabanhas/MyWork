var mySwiper = new Swiper('#swiper-banner-destaque', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    touchRatio: 0
});

var mySwiper = new Swiper('#swiper-banner-destaque-mob', {
    // slidesPerView: 'auto',
    slidesPerView: 1.3,
    centeredSlides: true,
    spaceBetween: 15,
    pagination: {
        el: '.swiper-pagination',
    },
});

$('.nav-conteudo .ctd-prog').on('click', function () {
    if (!$('.conteudo-grade.ctd-1').hasClass('ativo'))
        $('.conteudo-grade.ctd-1').addClass('ativo');
    $('.conteudo-grade.ctd-2').removeClass('ativo');

    if (!$('.nav-conteudo .ctd-prog').hasClass('ativo'))
        $('.nav-conteudo .ctd-prog').addClass('ativo');
    $('.nav-conteudo .ctd-grade').removeClass('ativo');
});

$('.nav-conteudo .ctd-grade').on('click', function () {
    if (!$('.conteudo-grade.ctd-2').hasClass('ativo'))
        $('.conteudo-grade.ctd-2').addClass('ativo');
    $('.conteudo-grade.ctd-1').removeClass('ativo');

    if (!$('.nav-conteudo .ctd-grade').hasClass('ativo'))
        $('.nav-conteudo .ctd-grade').addClass('ativo');
    $('.nav-conteudo .ctd-prog').removeClass('ativo');
});