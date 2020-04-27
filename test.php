<?php
	$days = array(
	    1 => 'Monday',
	    2 => 'Tuesday',
	    3 => 'Wednesday',
	    4 => 'Thursday',
	    5 => 'Friday',
	    6 => 'Saturday',
	    7 => 'Sunday'
	);
	$num = date('l');
	echo array_search ($num, $days);
?>