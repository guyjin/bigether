jQuery(document).ready(function ($) {
	$(window).resize(function () {
        checkSize();
    });

    $('.header-container a.local').on('click', function(){
        $('body * ').fadeOut(500);
        return false;
    })

    checkSize();

    $('body .header-container, #bg').fadeIn(1500,function(){
        menuslide();
    });
});

var checkSize = function () {
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();

    if (windowWidth > windowHeight) {
        $('#bg').css({minHeight: windowHeight, minWidth: windowWidth});
    } else if (windowHeight > windowWidth) {
        $('#bg').css({minWidth: windowWidth, minHeight: windowHeight});
    }
};


var menuslide = function () {
    $(".header-container a").each(function (i) {
        // store the item around for use in the 'timeout' function
        var $item = $(this);
        // execute this function sometime later:
        setTimeout(function () {
            $item.animate({"marginTop": 0}, 400, 'linear');
        }, 50 * i);
        // each element should animate half a second after the last one.
    });
};





