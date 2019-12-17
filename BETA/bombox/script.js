var link = $('a');
var url = window.location.pathname;
link.each(function(){
    if($(this).attr('href') === url){
        $(this).addClass('active');
    }
});


var $sideNav = $('#sidenav');
var $btnNav = $('#btn-open-sidenav');
var $btnCloseNav = $('#btn-close-sidenav');

$btnNav.on('click', openSidenav);

$btnCloseNav.on('click', closeSidenav);

$sideNav.find('a').each(function(){
  $(this).on('click', closeSidenav);
});

function openSidenav() {
  $sideNav.addClass('open');
}

function closeSidenav() {
  $sideNav.removeClass('open');
}

closeSidenav();


$('.btn-abrir-modal-categorias').each(function(){
	$(this).on('click', function(){
		$('#div-modal-categorias').removeClass('hide');
	});
});

$('#btn-close-modal-categorias').each(function(){
	$(this).on('click', function(){
		$('#div-modal-categorias').addClass('hide');
	});
});


$('.slider-dark').slick({
  dots: false,
  arrows: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplay: true
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplay: true
      }
    }
  ]
});

$('.slider-light').slick({
  dots: true,
  arrows: true,
  infinite: true,
  autoplay: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    }
  ]
});

$('.slick-prev').each(function(){
  $(this).html('');
  var img = $(document.createElement('img'));
  img.attr('src', 'img/arrow-left1.png');
	$(this).append(img);
});

$('.slick-next').each(function(){
  $(this).html('');
  var img = $(document.createElement('img'));
  img.attr('src', 'img/arrow-right1.png');
	$(this).append(img);
});