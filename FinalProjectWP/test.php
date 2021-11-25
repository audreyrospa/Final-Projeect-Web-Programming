<?php 
	date_default_timezone_set('Asia/Jakarta');
	$date1 = "2019-11-05";
	$date2 = date("Y-m-d", strtotime('+1 days'));
	$date1 = strtotime($date1);
	$date2 = strtotime($date2);
	$sec = $date2 - $date1;
	$day = $sec / 86400;
	if ($date2 > $date1) {
		echo "$date2";
	}
 ?>	