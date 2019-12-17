

var mySwiper = new Swiper('#swiper-banner-home', {
    direction: 'horizontal',
    loop: true,
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    touchRatio: 0
});

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

var mySwiper = new Swiper('#swiper-depoimentos', {
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
var mySwiper = new Swiper('#swiper-depoimentos-mob', {
    // slidesPerView: 'auto',
    slidesPerView: 1.5,
    centeredSlides: true,
    spaceBetween: 15,
    pagination: {
        el: '.swiper-pagination',
    },
});