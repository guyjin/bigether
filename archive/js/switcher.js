// Function by Jukka Lähetkangas, used with permission

if (!($.browser.msie && $.browser.version < 7)){
	$(window).resize(fix);
	$(document).ready(fix);
}

function fix() {
	if ($(window).width() < ($('.lf-advanced').attr("media")).match("(.*:)[^0-9a-z]*([0-9]*)px")[2]) {
  		$('.lf-advanced').attr('disabled', 'true');
	} else {
		$('.lf-advanced').attr('disabled', '');
	}
}