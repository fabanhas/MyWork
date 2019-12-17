$(document).ready(function() {
  $('.hamb-icon').click(() => {
    $('.hamb-icon').toggleClass('active')
    $('.header_rp').toggleClass('active')
    $('html').toggleClass('overlay-fixed')
  })

  $('.reservas').appendTo('.menu-menu-footer-container .menu')
  $('.trip-advisor').parent().appendTo('.menu-menu-footer-container .menu')
})