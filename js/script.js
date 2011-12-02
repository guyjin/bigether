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
	
	//find all these letters and replace them with span & class combos
	$('nav *,h1,h2,h3,h4').replaceText(/e/gi,"<span class='typecrunch'>e<\/span>");
	$('nav *,h1,h2,h3,h4').replaceText(/r/gi,"<span class='heavy'>r<\/span>");
	$('nav *,h1,h2,h3,h4').replaceText(/s/gi,"<span class='rotatepos3 typespace jumped'>s<\/span>");
	$('nav *,h1,h2,h3,h4').replaceText(/h/gi,"<span class='rotateneg1 typespace'>h<\/span>");
	$('nav *,h1,h2,h3,h4').replaceText(/j/gi,"<span class='rotateneg1 typespace'>j<\/span>");
	$('nav *,h1,h2,h3,h4').replaceText(/m/gi,"<span class='typespace heavy'>m<\/span>");
});
























