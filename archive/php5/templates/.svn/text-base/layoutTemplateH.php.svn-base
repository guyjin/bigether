<!doctype html>
<html lang="en" class="no-js">
    <head>
        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
	Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=8"/>
        <meta charset="utf-8">
        <title>[title]</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!--  Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <!-- CSS : implied media="all" -->
        <link rel="stylesheet" href="/core/css/style.css?v=2">

        <!-- Uncomment if you are specifically targeting less enabled mobile browsers
	<link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

        <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
        <script src="/core/js/libs/modernizr-1.6.min.js"></script>
        <?php
        include_once('Content.class.php');
        include_once('Header.class.php');
        ?>
        </head>

        <body id="[bodyid]">

            <div class="container">
                <?php $h = new Header('[header]', '[pageTitle]', '[pageSubTitle]'); ?>
                <?php $c = new Content('[content]'); ?>
            </div> <!--! end of #container -->


            <!-- Javascript at the bottom for fast page loading -->

            <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
            <script>!window.jQuery && document.write(unescape('%3Cscript src="/core/js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>

            <!-- Load scripts specific to the site/page -->

            <!-- End custom code. -->

            <!-- scripts concatenated and minified via ant build script-->
            <script src="/core/js/plugins.js"></script>
            <script src="/core/js/script.js"></script>
            <!-- end concatenated and minified scripts-->

            <!--[if lt IE 7 ]>
              <script src="/core/js/libs/dd_belatedpng.js"></script>
              <script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
            <![endif]-->

            <!-- yui profiler and profileviewer - remove for production -->
            <script src="/core/js/profiling/yahoo-profiling.min.js"></script>
            <script src="/core/js/profiling/config.js"></script>
            <!-- end profiling code -->




            <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
                 change the UA-XXXXX-X to be your site's ID -->
            <script>
                var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
                (function(d, t) {
                    var g = d.createElement(t),
                    s = d.getElementsByTagName(t)[0];
                    g.async = true;
                    g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    s.parentNode.insertBefore(g, s);
                })(document, 'script');
            </script>

        </body>
        </html>