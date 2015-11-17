<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>bigether:quotes</title>
	<style type="text/css" media="screen">
		body {
			background-color: #000;
			color: #fff;
			font-family: arial, sans-serif;
		}
		
		#cell {
			min-width: 20px;
			max-width: 50%;
			min-height: 30px;
			background: #000;
			position: relative;
			text-align: center;
		}

	</style>
	<script type="text/javascript" charset="utf-8" src="includes/js/jquery.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
		        jQuery.fn.centerScreen = function(loaded) {
		                var obj = this;
		                if(!loaded) {
		                        obj.css('top', $(window).height()/2-this.height()/2);
		                        obj.css('left', $(window).width()/2-this.width()/2);
		                        
									$(window).resize(function(){ 
										obj.centerScreen(!loaded); 
									});
		                } else {
		                		obj.stop();
		                   		obj.animate({ top: $(window).height()/2-this.height()/2, left: $(window).width()/2-this.width()/2}, 200, 'linear');
		                }
		        }
			$("#cell").centerScreen();

		});
	</script>
</head>

<body>
		<div id="cell">
				<p>
					<?php echo $theQuote ?>
				</p>
		</div>
</body>
</html>

