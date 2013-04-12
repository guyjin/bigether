var checkSize = function () {
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();

    if (windowWidth > windowHeight) {
        $('body').css({minHeight: windowHeight, minWidth: windowWidth});
    } else if (windowHeight > windowWidth) {
        $('body').css({minWidth: windowWidth, minHeight: windowHeight});
    }
};


var menuslide = function () {
    $('#navigation a').each(function (i) {
        // store the item around for use in the 'timeout' function
        var $item = $(this);
        // execute this function sometime later:
        setTimeout(function () {
            $item.animate({'marginTop': 0}, 400, 'linear');
        }, 50 * i);
        // each element should animate half a second after the last one.
    });
};

var toggleDrawer = function(){
    if($('.main-container').css('right') === '-25%'){
        $('.main-container').animate({'right': '0%'}, 1200, 'easeOutQuad');
    } else {
        $('.main-container').animate({'right': '-25%'}, 400, 'easeOutQuad');
    }
};

var drawer = function(target) {
    $(target).show();
    toggleDrawer();
};





jQuery(document).ready(function ($) {
	$(window).resize(function () {
        checkSize();
    });

    checkSize();

    menuslide();


    $('#responsive-menu-button').sidr({
      name: 'sidr-main',
      source: '#navigation'
    });
});





