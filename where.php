<?php
   require_once('inc/startsession.php');

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
    $Title="Query Record by Date";
  require_once('inc/title.php');

 require("inc/functions.php.inc");

  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username'])) {
	
    print("<INPUT TYPE=\"button\" value=\"Go Back\"  onClick=\"location.href='Arch_menu.php'\">\n");

	
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
	?>



<form name="where" ID="where" ACTION="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="post" >
<table width=100% style="background-color:black;color:yellow;text-align:center;">
<?php

  require_once('inc/connectvars.php');

  require_once('inc/functions.php.inc');

print("<tr><th colspan=2> Choose between Dates</th></tr>");

print("<tr><td> Beginning Date </td><td>Ending Date</td></tr>");

print("<tr><td>");
//////////////////////////////////////////////////////////////////////////
// Day of Month Selection
////////////////////////////////////////////////////////////////////////
print ("<SELECT NAME=BDay>\n
	<OPTION VALUE=''>Today</OPTION>\n	");
for($day=1; $day <=31; $day++) {
	print ("<OPTION VALUE=".$day.">".$day."</OPTION>\n");
}

print("</SELECT>\n");

////////////////////////////////////////////////////////////////////////////
//  End of Day of Month Selection
///////////////////////////////////////////////////////////////////////////


print ("<SELECT NAME=BMonth>
	<OPTION VALUE=''>This Month</OPTION>\n
	<OPTION VALUE=01>January</OPTION>\n
	<OPTION VALUE=02>February</OPTION>\n
	<OPTION VALUE=03>March</OPTION>\n
	<OPTION VALUE=04>April</OPTION>\n
	<OPTION VALUE=05>May</OPTION>\n
	<OPTION VALUE=06>June</OPTION>\n
	<OPTION VALUE=07>July</OPTION>\n
	<OPTION VALUE=08>August</OPTION>\n
	<OPTION VALUE=09>September</OPTION>\n
	<OPTION VALUE=10>October</OPTION>\n
	<OPTION VALUE=11>November</OPTION>\n
	<OPTION VALUE=12>December</OPTION>\n
</SELECT>\n");

print ("<SELECT	NAME=BYear>
	<OPTION VALUE=''>This Year</OPTION>\n
	<OPTION VALUE=2009>2009</OPTION>\n
	<OPTION VALUE=2010>2010</OPTION>\n
	<OPTION VALUE=2011>2011</OPTION>\n
	<OPTION VALUE=2012>2012</OPTION>\n
	<OPTION VALUE=2013>2013</OPTION>\n
	<OPTION VALUE=2014>2014</OPTION>\n
	

</SELECT>\n");
print ("</td><td>");

//////////////////////////////////////////////////////////////////////////
// Day of Month Selection
////////////////////////////////////////////////////////////////////////
print ("<SELECT NAME=EDay>\n
	<OPTION VALUE=''>Today</OPTION>\n	");
for($day=1; $day <=31; $day++) {
	print ("<OPTION VALUE=".$day.">".$day."</OPTION>\n");
}

print("</SELECT>\n");

////////////////////////////////////////////////////////////////////////////
//  End of Day of Month Selection
///////////////////////////////////////////////////////////////////////////


print ("<SELECT NAME=EMonth>
	<OPTION VALUE=''>This Month</OPTION>\n
	<OPTION VALUE=01>January</OPTION>\n
	<OPTION VALUE=02>February</OPTION>\n
	<OPTION VALUE=03>March</OPTION>\n
	<OPTION VALUE=04>April</OPTION>\n
	<OPTION VALUE=05>May</OPTION>\n
	<OPTION VALUE=06>June</OPTION>\n
	<OPTION VALUE=07>July</OPTION>\n
	<OPTION VALUE=08>August</OPTION>\n
	<OPTION VALUE=09>September</OPTION>\n
	<OPTION VALUE=10>October</OPTION>\n
	<OPTION VALUE=11>November</OPTION>\n
	<OPTION VALUE=12>December</OPTION>\n
</SELECT>\n");

print ("<SELECT	NAME=EYear>
	<OPTION VALUE=''>This Year</OPTION>\n
	<OPTION VALUE=2009>2009</OPTION>\n
	<OPTION VALUE=2010>2010</OPTION>\n
	<OPTION VALUE=2011>2011</OPTION>\n
	<OPTION VALUE=2012>2012</OPTION>\n
	<OPTION VALUE=2013>2013</OPTION>\n
	<OPTION VALUE=2014>2014</OPTION>\n
	

</SELECT>\n");
print("</td></tr>");
print("<tr><td colspan=2>");
print(" <center><INPUT TYPE='submit'  NAME='where'  ID='where' VALUE='Submit' ></center>");
print("</FORM>");
print("</td></tr>");
?>

</table>

<?php if (isset($_POST['where'])) { ?>
<form name="whereviewer" ID="whereviewer" ACTION='archived_chsh.php' METHOD="get" >
<?php

print("<table width=100% style=text-align:center;background-color:blue;color:yellow;>\n");
//Where was the truck?
if (isset($_POST['where'])) {
   $BDay=$_POST['BDay'];
   $BMonth=$_POST['BMonth'];
    $BYear=$_POST['BYear'];
   $EDay=$_POST['EDay'];
   $EMonth=$_POST['EMonth'];
    $EYear=$_POST['EYear'];

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

$Timestamp=mktime (0,0,0,NULL,1,NULL);
$MonthName=date("F",$Timestamp);

print ("<tr>\n<td colspan=5 style=padding-top:1em;font-size:1.25em;color:white;border-bottom-style:dotted;border-top-style:solid;> ".date('M, d Y H:i:s',$Begdate)."--------  ".date('M, d Y H:i:s',$Enddate)."</td>\n</tr>\n");
print ("<tr>\n<td style=border-bottom-style:dotted;>Checksheet</td>\n<td style=border-bottom-style:dotted;>Call Sign</td>\n<td style=border-bottom-style:dotted;>Station</td>\n<td style=border-bottom-style:dotted;>Date</td>\n<td style=border-bottom-style:dotted;>View</td>\n</tr>\n");
	$event_date_array = array();
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Checksheets WHERE (merged IS NULL || merged = '0') ORDER BY id";
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
	$event_date_array[$ChName][$event_date][1]=  reciper(event_query('6',$ChCh,$event_id),'Station');
		//get the Call Sign, item_id = 	7				
	$event_date_array[$ChName][$event_date][0] = reciper(event_query('7',$ChCh,$event_id),'CallSign');
	$event_date_array[$ChName][$event_date][2]=$series;
	$event_date_array[$ChName][$event_date][3]=$ChName;
	$event_date_array[$ChName][$event_date][4]=$event_id;
	}




/* Option values are added by looping through the array */
 }
		krsort($event_date_array);
		//print_r($event_date_array);
foreach($event_date_array as $ChName){
		foreach($ChName as $array_date => $val) {
			$cs=$val[0];
			$st=$val[1];
			$se=$val[2];
			$nm=$val[3];
			$ed=$val[4];

		$thendate = date("M d H:i:s", now_dt_to_human($array_date));

print("\n<tr>\n<td style=border-right-style:solid;border-bottom-style:dotted;>  ".$nm." </td>\n<td style=border-right-style:solid;border-bottom-style:dotted;>".$cs." </td>\n<td style=border-right-style:solid;border-bottom-style:dotted;>".$st."</td>\n<td style=border-right-style:solid;border-bottom-style:dotted;> ".$thendate."</td>\n<td style=border-bottom-style:dotted;><INPUT TYPE=radio name=xmlchecksheet value=".$nm."-".$ed." /></td>\n</tr>\n");
}
}
}

print("<tr>\n<td colspan=5>");
print(" <center>\n\t<INPUT TYPE='submit'  NAME='whereviewer'  ID='whereviewer' VALUE='Submit' >\n</center>\n");
print("</FORM>\n");
print("</td>\n</tr>\n");
print("</table>");
} // end of if submitted
}
?>
