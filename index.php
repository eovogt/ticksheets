<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>TickSheets - Dynamic Simple Stock Performance Tracker</title>
<meta name="og:title" content="TickSheets">
<meta name="og:description" content="A google sheets type stock tracker where users can comment on specific ticker symbols and have these comments tracked and updated on a clean 1 page stock stacker which tracks the best performing and most interesting stocks of the previous 30 days and is updated dynamically.">
<meta name="keywords" content="Ticksheets, stock, stocks, nasdaq, tsx, spreadsheet, tracking, investment, ">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="1 days">
<meta name="author" content="root" >
</head>




<?php
	$now = getdate(time());
	$time = mktime(0,0,0, $now['mon'], 1, $now['year']);
	$date = getdate($time);
	$dayTotal = cal_days_in_month(0, $date['mon'], $date['year']);
	//Print the calendar header with the month name.
	print '<table><tr><td colspan="7"><strong>' . $date['month'] . '</strong></td></tr>';
	for ($i = 0; $i < 6; $i++) {
		print '<tr>';
		for ($j = 1; $j <= 7; $j++) {
			$dayNum = $j + $i*7 - $date['wday'];
			//Print a cell with the day number in it.  If it is today, highlight it.
			print '<td';
			if ($dayNum > 0 && $dayNum <= $dayTotal) {
				print ($dayNum == $now['mday']) ? ' style="background: #ccc;">' : '>';
				print $dayNum;
			}
			else {
				//Print a blank cell if no date falls on that day, but the row is unfinished.
				print '>';
			}
			print '</td>';
		}
		print '</tr>';
		if ($dayNum >= $dayTotal && $i != 6)
			break;
	}
	print '</table>';
?>

</html>

