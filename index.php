<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<?php
    if( $handle = opendir('img/backgrounds')) {
            while (false !== ($entry = readdir($handle))) {
                if($entry != '.' && $entry != '..')
                $imageDirList[] = $entry;
            }
            // Grab a random (sorta) index from the image array
            $imageIndex = rand(0, count($imageDirList)-1);

            $imageName = $imageDirList[$imageIndex];

        }

?>
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>bigether - est. 1970</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bg.css.php" type="text/css">

</head>
<body>
        <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper">

                <div id="mobile-header"><a href="#sidr-main" id="responsive-menu-button">Menu</a></div>
                <h1 class="title">bigether</h1>
                <div id="navigation">
                    <nav class="nav">
                        <ul>
                            <li><a href="#projects" ontouchstart="" class="local">projects</a></li>
                            <li><a href="http://quotes.bigether.com" target="_blank">quotes</a></li>
                            <li><a href="http://blog.bigether.com/" target="_blank">tumblr</a></li>
                           <!--  <li><a href="#work" class="local">work</a></li>
                            <li><a href="#geek" class="local">geek</a></li> -->
                            <li><a href="http://pinterest.com/guyjin/" target="_blank">pins</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <!-- <img src="img/backgrounds/<?php echo $imageName; ?>/normal.jpg" class="bg" alt="big ol' picture.  oooooo." /> -->
        </div>

        <div class="main-container">
            <div class="main wrapper">

                <article id='re' name='re'>
                    <section>
                        <p>
                            If you stop and think about it, the Internet's like a <a href="http://en.wikipedia.org/wiki/TARDIS" target="_blank">Tardis</a>.  It's so much bigger on the inside, almost like a <a href="http://en.wikipedia.org/wiki/Fractal" target="_blank">fractal</a>. You can zoom in and zoom in but there's always more detail and worlds within worlds.
                        </p>
                        <p>
                            Some <a href="http://en.wikipedia.org/wiki/Lensman_series" target="_blank">old scifi</a> used to talk about the space between the planets as being filled with <a href="http://en.wikipedia.org/wiki/Ralph_124C_41%2B" target="_blank">ether</a>. This then, is my world, my personal fractal to explore, my own unlimited ether to fill with anything and everything that comes to mind.
                        </p>
                        <p>
                            <strong>Welcome to bigether.</strong>
                        </p>
                    </section>

                </article>

            </div> <!-- #main -->
        </div> <!-- #main-container -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
        <script src="js/jquery.sidr.min.js"></script>
        <script src="js/main.js"></script>

        <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
