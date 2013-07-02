(function( $ ){
	$.fn.scrunchy = function() {
		this.each(function(){
			if($(this).hasClass('more')){
				$(this).children('p').first().append('<span class="moretrigger">&#8594; read more</span>');
				height = $(this).children('.morecopy').height();
				$(this).children('.morecopy').hide().css({height: height});
			} else {
				dd = $(this).children('dd');
				$(dd).each(function(){
					$(this).prepend("<span class='pointer'></span>");
					height = $(this).height();
					$(this).attr('rel',height);
					$(this).hide().css({height: height});
				})
				dt = $(this).children('dt');
				dt.addClass('scrunchyLink');
				dt.click(function(){
					$(this).next().slideToggle('slow',function(){
						$(this).prev().toggleClass('active');
					});

				});
			}
		})

		$('.moretrigger').click(function(){
			$(this).parent().parent().children('.morecopy').slideToggle('slow',function(){
			});
		})

	}
})( jQuery );
