<?php

require_once 'config.php';

require_once BASEPATH . COREPHP . 'Page.class.php';
require_once BASEPATH . COREPHP . 'WebPage.class.php';

$w = new WebPage('Home', 'AQM Acquisition Management', 'HNF', '', '', '', 'Acquisition Management Home', 'Acqusition Management', 'wo', 'navDefault', 'wo', 'designContent');
$w->displayPage();
?>