$('#menu-mob').on('click', function () {
    if ($('#menu-mob-body').hasClass('show')) {
        $('#menu-mob-body').removeClass('show');
        $('body').removeClass('opened-menu');
    }else {
        $('#menu-mob-body').addClass('show');
        $('body').addClass('opened-menu');

    }
        
});