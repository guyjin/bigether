<?php
	require 'libs/facebook/src/facebook.php';
	
	// Create our Application instance (replace this with your appId and secret).
	$facebook = new Facebook(array(
	  'appId'  => '193756577372518',
	  'secret' => 'd13b8b7700fc658a8b777d5234c6198c',
	));
	
	// Get User ID
	$user = $facebook->getUser();
	echo $user.'<br />';
	echo $facebook->getLoginStatusUrl();
?>