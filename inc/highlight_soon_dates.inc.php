<?php
function highlight_soon_date($compdate)  {

$current = mktime(0, 0, 0, date("m"), date("d"),   date("Y"));
$nextmonth = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y"));
$intwomonths= mktime(0, 0, 0, date("m")+2, date("d"),   date("Y"));
//$inthreemonths= mktime(0, 0, 0, date("m")+3, date("d"),   date("Y"));

if ($compdate<=$current) {
	return 1;
	}
if ($current<=$compdate && $compdate<=$nextmonth) {
	return 2;
	} elseif ($nextmonth<=$compdate  && $compdate<=$intwomonths) {
	return 3;
	}

}

?>
