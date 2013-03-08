jQuery(document).ready(function ($) {
	$(window).resize(function () {
        checkSize();
    });

    $('.header-container a.local').on('click', function(){
        $('body * ').fadeOut(500);
        return false;
    })

    checkSize();

    $('body .header-container, #bg').fadeIn(1500);
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






