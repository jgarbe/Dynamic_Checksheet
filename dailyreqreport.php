<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
    $Title="Developer Inventory Page";
  require_once('inc/title.php');

 require("inc/functions.php.inc");

  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');
//print("<br/>DBG dailyreqreport.php Line15<br/>\n");
  // Generate the navigation menu
  if (isset($_SESSION['username'])) {

print("<INPUT TYPE=\"button\" value=\"Go Back\"  onClick=\"location.href='Arch_menu.php'\">\n");
	
//print("<br/>DBG dailyreqreport.php Line21<br/>\n");
  }
  else {
    echo ' <a href="login.php">Log In</a><br />';
    //echo ' <a href="signup.php">Sign Up</a>';
  }
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
?>
</div>

<?php


    if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {
		
//print("<br/>DBG dailyreqreport.php Line43<br/>\n");
	?>






<form name="whereviewer" ID="whereviewer" ACTION='archived_chsh.php' METHOD="get" >
<?php

print("<table width=100% style=text-align:center;background-color:blue;color:yellow;>\n");
//Where was the truck?

	$BMonth=date ("m");
	
	$BYear=date ("Y");
	
	$BDay=date ("d");
	

	$EMonth=date ("m");
	
	$EYear=date ("Y");
	
	$EDay=date ("d");

//Calculate the viewed Month.
$Begdate=mktime(0,0,0,$BMonth,$BDay,$BYear);
$Enddate=mktime(23,59,59,$EMonth,$EDay,$EYear);

//$Timestamp=mktime(0,0,0,$Month,1,$Year);
//$MonthName=date("F",$Timestamp);

print ("<tr>\n<td colspan=2 style=padding-top:1em;font-size:1.25em;color:white;border-bottom-style:dotted;border-top-style:solid;> ".date('M, d Y H:i:s',$Begdate)."--------  ".date('M, d Y H:i:s',$Enddate)."</td>\n</tr>\n");
//print ("<tr>\n<td style=border-bottom-style:dotted;>Checksheet</td>\n<td style=border-bottom-style:dotted;>Call Sign</td>\n<td style=border-bottom-style:dotted;>Station</td>\n<td style=border-bottom-style:dotted;>Date</td>\n<td style=border-bottom-style:dotted;>View</td>\n</tr>\n");
	$event_Ch_array = array();
  require_once('inc/connectvars.php');

//print("<br/>DBG dailyreqreport.php Line82<br/>\n");
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Checksheets WHERE (merged IS NULL || merged = '0') ORDER BY id";
	$result = mysqli_query($dbc, $sql) or die("This aint workin1!");
	
//print("<br/>DBG dailyreqreport.php Line87<br/>\n");
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$ChName = $row[1];		//The Name of each Checksheet
				$ChEvent = $row[1]."_events";  	//the events in each Checksheet Table
				$ChCh = $row[1]."_checksheet";  //Each Checksheet Name
				$Ch_id=$row[0];			//Each Checksheet id
				$Ch_merged=$row[2];			//Each Checksheet id
			//print("\n<p>".$ChEvent."</p><p>".$ChCh."</p>");
	$sql2 = "SELECT * FROM $ChEvent WHERE ".$ChEvent.".submitted = '1' AND (".$ChEvent.".merged IS NULL || ".$ChEvent.".merged = '0') AND (UNIX_TIMESTAMP(".$ChEvent.".date) BETWEEN ".$Begdate." AND ".$Enddate.")";
	$result2 = mysqli_query($dbc, $sql2) or die("This aint workin2! Under Construction");
		 while($eventrow = mysqli_fetch_array($result2)) {
			$event_id = $eventrow['id'];
			$event_date = $eventrow['date'];
			
//print("<br/>DBG dailyreqreport.php Line101<br/>\n");print("\n<p>".$event_id."</p><p>".$event_date."</p>");
			print("\n<p>".$ChEvent."</p><p>".$ChCh."</p><hr>");

		//get the series item_id =4
	//$series = event_query('4',$ChCh,$event_id);
		//get the station, item_id = 6
	$event_Ch_array[$ChCh][$event_id][1]=  reciper(event_query('6',$ChCh,$event_id),'Station');
		//get the Call Sign, item_id = 	7				
	$event_Ch_array[$ChCh][$event_id][0] = reciper(event_query('7',$ChCh,$event_id),'CallSign');
	$event_Ch_array[$ChCh][$event_id][2] = reciper(event_query('5',$ChCh,$event_id),'Series');
	$event_Ch_array[$ChCh][$event_id][3]=$ChName;
	$event_Ch_array[$ChCh][$event_id][4]=$event_id;
	$event_Ch_array[$ChCh][$event_id][5]=$event_date;
	$event_Ch_array[$ChCh][$event_id][6]=$Ch_merged;
	
//print("<br/>DBG dailyreqreport.php Line116<br/>\n");

		//print_r($event_Ch_array);
	}


		print_r2($event_Ch_array);

//print("<br/>DBG dailyreqreport.php Line119<br/>\n");
/* Option values are added by looping through the array */
return $event_Ch_array;
						
	mysqli_close($dbc);
 }

print("<br/>DBG dailyreqreport.php Line123<br/>\n");

		print_r2($event_Ch_array);
		//print("<br>");
		krsort($event_Ch_array);
		//print_r2($event_Ch_array);
		//print("<br>");
		foreach($event_Ch_array as $ChCh => $event_id) {
			foreach($event_id as $val) {
			$cs=$val[0];
			$st=$val[1];
			$se=$val[2];
			$nm=$val[3];
			$ed=$val[4];
			$ad=$val[5];
			$mg=$val[6];

		$thendate = date("M d H:i:s", now_dt_to_human($ad));

print("\n<tr>\n<td style=border-right-style:solid;border-top-style:solid;border-bottom-style:dotted;>  ".$nm."<br>".$cs."<br>".$st." <br>".$se." <br>".$thendate."");

//print("</td>\n\n<td style=border-right-style:solid;border-top-style:solid;border-bottom-style:dotted;>\n\t");
//if ($mg == 0 ) {
//print("<iframe src=\"tmp/".$nm."order.html\" width=\"50%\" ></iframe>\n"); 

//} else  { print ("".reciper($mg,"Checksheets")."     "); } 

print("</td>\n\n<td style=border-top-style:solid;border-bottom-style:dotted;>View<br><INPUT TYPE=radio name=xmlchecksheet value=".$nm."-".$ed." /></td>\n</tr>\n");

}
}
}

print("<tr>\n<td colspan=3>");
print(" <center>\n\t<INPUT TYPE='submit'  NAME='whereviewer'  ID='whereviewer' VALUE='Submit' >\n</center>\n");
print("</FORM>\n");
print("</td>\n</tr>\n");
print("</table>");

?>
