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





$(document).ready(function ($) {
    $('#responsive-menu-button').sidr({
      name: 'sidr-main',
      source: '#navigation'
    });
});





