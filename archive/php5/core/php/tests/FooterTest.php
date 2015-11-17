<?php
require_once('/apache2/htdocs/php5/core/php/Footer.class.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$var =  new Footer('Footer_main.inc');
$Date = date("n_j_Y_gisa");
$ReportFile = "Test".$Date.".CSV";
$fh = fopen($ReportFile, 'w') or die("Can't open file");
$Columns = $var->footerCode()."\n";
fputs($fh, $Columns);
?>
