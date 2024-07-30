	<?php

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
	     require_once('inc/appvars.php');
	     require_once('inc/connectvars.php');
	     require_once('inc/functions.php.inc');
	print("<link>".HOME."index.php</link>\n"); 
	
	print("<description>Checksheet Reports</description>\n");
print("<language>en-us</language>\n");
if (empty($_POST['BMonth'])) {
	$BMonth=date ("m");
	}
if (empty($_POST['BYear'])) {
	$BYear=date ("Y");
	}
if (empty($_POST['BDay'])) {
	$BDay=date ("d");
	}

if (empty($_POST['EMonth'])) {
	$EMonth=date ("m");
	}
if (empty($_POST['EYear'])) {
	$EYear=date ("Y");
	}
if (empty($_POST['EDay'])) {
	$EDay=date ("d");
	}
//echo " $BDay, $BMonth, $BYear ------$EDay, $EMonth, $EYear ";
//$ffilled = ffill($Month,$Year);
//Calculate the viewed Month.
$Begdate=mktime(0,0,0,$BMonth,$BDay,$BYear);
$Enddate=mktime(23,59,59,$EMonth,$EDay,$EYear);

$Timestamp=mktime (0,0,0,$Month,1,$Year);
$MonthName=date("F",$Timestamp);
print("<table>");
print ("<tr>\n<td colspan=5 style=padding-top:1em;font-size:1.25em;color:white;border-bottom-style:dotted;border-top-style:solid;> ".date('M, d Y H:i:s',$Begdate)."--------  ".date('M, d Y H:i:s',$Enddate)."</td>\n</tr>\n");
print ("<tr>\n<td style=border-bottom-style:dotted;>Checksheet</td>\n<td style=border-bottom-style:dotted;>Call Sign</td>\n<td style=border-bottom-style:dotted;>Station</td>\n<td style=border-bottom-style:dotted;>Date</td>\n<td style=border-bottom-style:dotted;>View</td>\n</tr>\n");
	$event_date_array = array();
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Checksheets ORDER BY id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$ChName = $row[1];		//The Name of each Checksheet
				$ChEvent = $row[1]."_events";  	//the events in each Checksheet Table
				$ChCh = $row[1]."_checksheet";  //Each Checksheet Name
				$Ch_id=$row[0];			//Each Checksheet id
			//print("\n<p>".$ChEvent."</p><p>".$ChCh."</p>");
	$sql2 = "SELECT ".$ChEvent.".* FROM ".$ChEvent." WHERE (UNIX_TIMESTAMP(".$ChEvent.".date) BETWEEN ".$Begdate." AND ".$Enddate.") AND ".$ChEvent.".submitted = '1'";
	$result2 = mysqli_query($dbc, $sql2);
		 while($eventrow = mysqli_fetch_array($result2)) {
			$event_id = $eventrow['id'];
			$event_date = $eventrow['date'];
			//print("\n<p>".$event_id."</p><p>".$event_date."</p>");

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
		//print_r($event_date_array);
		foreach($event_date_array as $array_date => $val) {
			$cs=$val[0];
			$st=$val[1];
			$se=$val[2];
			$nm=$val[3];
			$ed=$val[4];

		$thendate = date("M d H:i:s", now_dt_to_human($array_date));

print("\n<tr>\n<td style=border-right-style:solid;border-bottom-style:dotted;>  ".$nm." </td>\n<td style=border-right-style:solid;border-bottom-style:dotted;>".$cs." </td>\n<td style=border-right-style:solid;border-bottom-style:dotted;>".$st."</td>\n<td style=border-right-style:solid;border-bottom-style:dotted;> ".$thendate."</td>\n<td style=border-bottom-style:dotted;><INPUT TYPE=radio name=xmlchecksheet value=".$nm."-".$ed." /></td>\n</tr>\n");
		print("\t<title>".$nm." | ".$cs." | ".$st."</title>\n");
		print("\t<iframe src=\"".HOME .$nm."order.html\" width=\"220px\" height=\"40px\"></iframe>\n");
}



	
	
	
	
	
	
	?>
</body>
</html>
