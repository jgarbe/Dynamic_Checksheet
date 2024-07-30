<?php header ('Content-Type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; 
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
?>

<rss version="2.0">
<channel>
	<title>Submitted Checksheets</title>
	<?php
	     require_once('inc/appvars.php');
	     require_once('inc/connectvars.php');
	     require_once('inc/functions.php.inc');
	print("<link>".HOME."index.php</link>\n"); 
	
	print("<description>Checksheet Reports</description>\n");
print("<language>en-us</language>\n");
	
	$event_date_array = array();  //create the array
	require_once('inc/connectvars.php');
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Checksheets ORDER BY id";
	$result = mysqli_query($dbc, $sql);
	while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
	$ChName = $row[1];
	$ChEvent = $row[1]."_events";
	$ChCh = $row[1]."_checksheet";
	$Ch_id=$row[0];	
	$sql2 = "SELECT ".$ChEvent.".* FROM ".$ChEvent."  WHERE submitted = 1 ORDER BY date DESC LIMIT 10";  // select the events from each checksheet
	$result2 = mysqli_query($dbc, $sql2);
	while($eventrow = mysqli_fetch_array($result2)) {
	$event_id = $eventrow['id'];
	$event_date = $eventrow['date'];
	//start loading with each loop into the array
	//get the series item_id =4
	$series = event_query('4',$ChCh,$event_id);
	//get the station, item_id = 6
	$event_date_array[$event_date][1]=  reciper(event_query('6',$ChCh,$event_id),'Station');
	//get the Call Sign, item_id = 	7				
	$event_date_array[$event_date][0] = reciper(event_query('7',$ChCh,$event_id),'CallSign');
	$event_date_array[$event_date][2]=$series;
	$event_date_array[$event_date][3]=$ChName;
	$event_date_array[$event_date][4]=$event_id;
	}
	
	
	
	
	/* Option values are added by looping through the array */
	}
	krsort($event_date_array);
	foreach($event_date_array as $array_date => $val) {
	$cs=$val[0];
	$st=$val[1];
	$se=$val[2];
	$nm=$val[3];
	$ed=$val[4];
	
	$thendate = date("D, d M Y H:i:s", now_dt_to_human($array_date));
	
	print("<item>\n");
		print("\t<title>".$nm." | ".$cs." | ".$st."</title>\n");
		
		print("\t<link>".HOME."archived_chsh.php?xmlchecksheet=".$nm."-".$ed."</link>\n");
		
		print("\t<pubDate>".$thendate." ".date('T')."</pubDate>\n");
		print("\t<description>".$nm." on ".$thendate."</description>\n");
		print("</item>\n\n");
}
	
	
	
	
	
	
	
	?>


</channel>

</rss>
