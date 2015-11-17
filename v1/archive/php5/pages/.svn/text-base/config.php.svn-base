<?php

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__));
}

if (!defined('BASEPATH')) {
    define('BASEPATH', dirname(dirname(__FILE__)));
}

if (!defined('CONTENTPATH')) {
    define('CONTENTPATH', '/content/');
}

if (!defined('COREPHP')) {
    define('COREPHP', '/core/php/');
}

if (!defined('COREJS')) {
    define('COREJS', '/core/js/');
}

if (!defined('CORECSS')) {
    define('CORECSS', '/core/css/');
}

if (!defined('COREIMG')) {
    define('COREIMG', '/core/images/');
}

if (!defined('PAGESPATH')) {
    define('PAGESPATH', '/pages/');
}

if (!defined('STATICPATH')) {
    define('STATICPATH', '/static/');
}

if (!defined('TEMPLATEPATH')) {
    define('TEMPLATEPATH', '/templates/');
}

if (!defined('THISURL')) {
    $pURL = curPageURL();
    define('THISURL', $pURL);
}

function curPageURL() {
    $pageURL = 'http://';
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

?>
