<?php include_once 'builder.php'?>
<html>
<head>
	<link href="builder.css" rel="stylesheet" type="text/css" media="all" />
	<link href="safari.css" rel="stylesheet" type="text/safari" media="all" />
</head>
<body>
<div id="key">
	<ul>
		<li>A = Forms</li>
		<li>B = Combinations</li>
		<li>C = Step-Defense</li>
		<li>D = Self-Defense</li>
		<li>E = Sparring</li>
	</ul>
</div>
<div id='calendar'>
<h1><?php
		$today = getDate();
		echo $today['month'];
	?></h1>
	<div id="dayTitles">
		<ul>
			<li>Sunday</li>
			<li>Monday</li>
			<li>Tuesday</li>
			<li>Wednesday</li>
			<li>Thursday</li>
			<li>Friday</li>
			<li>Saturday</li>
		</ul>
	</div>

	<?php
		writeDays();
	?>
	

</div>
</body>
</html>