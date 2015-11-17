<!doctype html>
<html lang="en" class="no-js">
    <head>
        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
	Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <meta charset="utf-8">
        <title>[title]</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!--  Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS : implied media="all" -->
        <link href="/core/css/style.css,scrunchy.css" rel="stylesheet" type="text/css" media="screen" />

        <!-- Uncomment if you are specifically targeting less enabled mobile browsers
	<link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

        <?php
        include_once('Content.class.php');
        include_once('Header.class.php');
        include_once("Nav.class.php");
        include_once('Footer.class.php');

        include_once BASEPATH . COREPHP . 'helpers/BannerLoader.class.php';
        ?>
    </head>

    <body id='[id]' class='[browserAgent] [class]'>
        <div  class="containers" id="main">
            <?php $h = new Header('[header]', '[pageTitle]', '[pageSubTitle]'); ?>

            <div id="content" class="clearfix">
                <div id="fade" class="containers"></div>
                <?php $c = new Content('[content]'); ?>
                <?php $f = new Footer('[footer]'); ?>
            </div>

        </div>

        <!-- Javascript at the bottom for fast page loading -->
        <

        <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="/core/js/libs/jquery-1.5.0.js"%3E%3C/script%3E'))</script>

        <!-- Load scripts specific to the site/page -->
        <!-- scripts concatenated and minified via ant build script-->

        <script src="/core/js/plugins.js,scrunchy.jquery.js,script.js"></script>

        <!-- End custom code. -->



        <!--[if lte IE 8]>
            <link href="/core/css/ie.css" rel="stylesheet" type="text/css" media="screen" />
            <script src="/core/js/css3-mediaqueries.js,ie.js"></script>
        <![endif]-->

        <!-- end concatenated and minified scripts-->

        <!-- end profiling code -->

        <!-- asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
             change the UA-XXXXX-X to be your site's ID -->
        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            try {
                var pageTracker = _gat._getTracker("UA-3263486-6");
                pageTracker._trackPageview();
            } catch(err) {}
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.tracklink').click(function(){
                    var u = $(this).attr("href");
                    pageTracker._trackPageview(u)
                })
            });
        </script>

    </body>
</html>