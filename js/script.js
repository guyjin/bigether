/* Author: 
	Ben Vaughan
*/
jQuery(document).ready(function() {
	var a = $('nav a').length;
	$("nav a").each(function (i) {
	    // store the item around for use in the 'timeout' function
	    var $item = $(this); 
	    // execute this function sometime later:
	    setTimeout(function() { 
	      $item.animate({"marginTop": 0}, 1500,'easeOutQuint');
	    }, 100*i);
	    // each element should animate half a second after the last one.
	  });
	
});
























