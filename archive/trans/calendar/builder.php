<?php 
// 
// count how many weeks in the month have a specified day, such as Monday. 
// we know there will be 4 or 5, so no need to check for $weeks<4 or $weeks>5 
// 
// Initial formula doesn't work well, so I "reversed-engineered" to get the formula. 
// 0 - Sunday,...,6 - Saturday 
putenv("TZ=America/Denver");
$totalsuns = 0;
$totaldays = 0;
$builtdate = mktime(0,0,0,4,1,2008);
$thisdate = mktime(0,0,0,6,1,2008);

function getMonthStartLetter($endMonth){
	$year = 2009;
	$endMonth = $endMonth - 1;
	$totaldays = 0;
	$totalsuns = 0;
	
	for ($month = 1; $month <= $endMonth; $month++) 
	{ 
		$firstday = date("w", mktime(0, 0, 0, $month, 1, $year)); 
		$lastday = date("t", mktime(0, 0, 0, $month, 1, $year));
		$totaldays = $totaldays + $lastday; 
		//echo "First day of the month = $firstday,$firstdayname <BR> "; 

		for ($day_of_week = 0; $day_of_week <= 6; $day_of_week++) 
		{ 
			if ($firstday > $day_of_week) { 
				// means we need to jump to the second week to find the first $day_of_week 
				$d = (7 - ($firstday - $day_of_week)) + 1; 
			} elseif ($firstday < $day_of_week) { 
				// correct week, now move forward to specified day 
				$d = ($day_of_week - $firstday + 1); 
			} else {	 
				// my "reversed-engineered" formula 
				if ($lastday==28) // max of 4 occurences each in the month of February with 28 days 
				   $d = ($firstday + 4); 
				elseif ($firstday==4) 
				   $d = ($firstday - 2); 
				elseif ($firstday==5 ) 
				   $d = ($firstday - 3); 
				elseif ($firstday==6) 
				   $d = ($firstday - 4); 
				else 
				   $d = ($firstday - 1); 
				if ($lastday==29) // only 1 set of 5 occurences each in the month of February with 29 days 
				   $d -= 1; 
			} 

			$d += 28;	 // jump to the 5th week and see if the day exists 
			if ($d > $lastday) { 
				$weeks = 4; 
			} else { 
				$weeks = 5; 
			} 

		//if ($day_of_week==0) echo "Sun "; 
		//elseif ($day_of_week==1) echo "Mon "; 
		//elseif ($day_of_week==2) echo "Tue "; 
		//elseif ($day_of_week==3) echo "Wed "; 
		//elseif ($day_of_week==4) echo "Thu "; 
		//elseif ($day_of_week==5) echo "Fri "; 
		//else echo "Sat "; 

		//echo "occurences = $weeks <BR> "; 

		if($day_of_week==0){
			$totalsuns = $totalsuns + $weeks;
		}


		} // for $day_of_week loop 
//		$totalsuns = $totalsuns + $weeks;

		//echo "<br />" . $weeks;
		//echo "<br />" . $totalsuns;

	} // for $mth loop 

	//echo "<br />" . $totaldays . " total days";
	//echo "<br />" . $totalsuns . " sundays";
	$letter = (($totaldays - 2) - $totalsuns)%5;

	//echo "<br />" . $dayarray[$letter];
	//echo $dayarray[0];
	return $letter;
}



function writeDays(){
	$today = getDate();
	$month = $today['mon'];
	$day = $today['mday'];
	$year = $today['year'];
	//Here's the list of day types.
	$dayarray = array("A","B","C","D","E");
	//Number of days in the month
	$daycount = date('t', mktime(0,0,0,$month,1,$year));
	//today's day in the index of the week's days.
	$day_of_week = date('w', mktime(0,0,0,$month,1,$year));
	//Today's numeric date
	$todays_date = date('j', mktime(0,0,0,$month,$day,$year));
	//find what letter the first day of the month gets.
	$startDay = getMonthStartLetter($month);
	//Set what the numeric index of the first day of the month is.
	$monthStartsWith = 0 + $day_of_week - 1;
	//Draw blank days that pad the calendar for the first week of the month.
	for ($blankDaycount = 0; $blankDaycount <= $monthStartsWith; $blankDaycount++){
		echo "<div class='dateBlock blank day". $blankDaycount."'></div>";
	}
	
	//Draw divs for each day of the month.
	for ( $day_of_month = 1; $day_of_month <= $daycount; $day_of_month++){
		//Set basic classes for each day to display normally.
		$classes = "dateBlock day";
		//Set var for any special messages to show in a day.
		$message = "";
		
		//If the day is a Friday (5), set the message to show the sparring message.
		if($day_of_week == 5){
			$message = '5:30 sparring';
		}
		
		if($day_of_week != 0){
			if($todays_date == $day_of_month){
				$classes = $classes . $day_of_week . " today";	
			}
			else {	
				$classes = $classes . $day_of_week;
				
			}
			
			if($startDay < 0){
				$dayletter = '';
			} else {
				$dayletter = $dayarray[$startDay];
			}
			
			echo "<div class='" . $classes . "'><span class='dateNum'>" . $day_of_month .  "</span><span class='daytype'>" . $dayletter . "</span>" . "<span class='message'>" . $message . "</span></div>";
			$startDay++;
			if($startDay > 4){
				$startDay = 0;
			}
			
		} else {
			echo "<div class='dateBlock day0'></div>";
		}
		
				
		
		$day_of_week++;
		if($day_of_week > 6){
			$day_of_week = 0;
		}
	}
}


function writeDay(){
	$today = getDate();
	$month = $today['mon'];
	$day = $today['mday'];
	$year = $today['year'];
	//Here's the list of day types.
	$dayarray = array("A","B","C","D","E");
	//Number of days in the month
	$daycount = date('t', mktime(0,0,0,$month,1,$year));
	//today's day in the index of the week's days.
	$day_of_week = date('w', mktime(0,0,0,$month,1,$year));
	//Today's numeric date
	$todays_date = date('j', mktime(0,0,0,$month,$day,$year));
	//find what letter the first day of the month gets.
	$startDay = getMonthStartLetter($month);
	//Set what the numeric index of the first day of the month is.
	//$monthStartsWith = 0 + $day_of_week - 1;
		
	//Draw divs for each day of the month.
	for ( $day_of_month = 1; $day_of_month <= $daycount; $day_of_month++){
		//Set basic classes for each day to display normally.
		$classes = "dateBlock day";
		
		
		if($day_of_week != 0){
			if($todays_date == $day_of_month){
				$classes = $classes . $day_of_week . " today";
				echo $dayarray[$startDay];	
			}
			else {	
				$classes = $classes . $day_of_week;
				
			}
			
			//echo "<div class='" . $classes . "'><span class='dateNum'>" . $day_of_month .  "</span><span class='daytype'>" . $dayarray[$startDay] . "</span>" . "<span class='message'>" . $message . "</span></div>";
			$startDay++;
			if($startDay > 4){
				$startDay = 0;
			}
			
		} //else {
			//echo "<div class='dateBlock day0'></div>";
		//}
		
				
		
		$day_of_week++;
		if($day_of_week > 6){
			$day_of_week = 0;
		}
	}
}



?>