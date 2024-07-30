<?php

// Written by Jim Garbe
//**************************************************************************************//
//	datadrop()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: Creata a dropdown menu containg arhchived checksheets			//
//											//
//  RETURNS: string of html containing the drop down menu				//
//											//
//**************************************************************************************//	
function data_drop () {

print("<FORM name='Ochoice' ID='Ochoice' ACTION='archived_chsh.php' METHOD='POST' >");
?>
<select name='selcache'  ONCHANGE="location ='archived_chsh.php?checksheet=' + this.options[this.selectedIndex].value;" ><option value=>Archived Checksheets</option>
<?php

	$event_date_array = array();
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Checksheets ORDER BY id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$ChName = $row[1];
				$ChEvent = $row[1]."_events";
				$ChCh = $row[1]."_checksheet";
			$Ch_id=$row[0];	
			//print("\n<p>".$ChEvent."</p><p>".$ChCh."</p>");
	$sql2 = "SELECT ".$ChEvent.".* FROM ".$ChEvent." WHERE  ".$ChEvent.".submitted = '1' ";
	$result2 = mysqli_query($dbc, $sql2);
		 while($eventrow = mysqli_fetch_array($result2)) {
			$event_id = $eventrow['id'];
			$event_date = $eventrow['date'];
			//print("\n<p>".$event_id."</p><p>".$event_date."</p>");

		//get the series item_id =4
	$series = event_query('4',$ChCh,$event_id);
		//get the station, item_id = 6
	$event_date_array[$event_date][1]=  reciper(event_query('6',$ChCh,$event_id),Station);
		//get the Call Sign, item_id = 	7				
	$event_date_array[$event_date][0] = reciper(event_query('7',$ChCh,$event_id),CallSign);
	$event_date_array[$event_date][2]=$series;
	$event_date_array[$event_date][3]=$ChName;
	$event_date_array[$event_date][4]=$event_id;
	}


//option values are added by looping through the array 
}

 
		krsort($event_date_array);
		print_r($event_date_array);
		foreach($event_date_array as $array_date => $val) {
			$cs=$val[0];
			$st=$val[1];
			$se=$val[2];
			$nm=$val[3];
			$ed=$val[4];

		$thendate = date("M d H:i:s", now_dt_to_human($array_date));
 	
print("\n<option value=".$nm."&event_id=".$ed.">  ".$nm." | ".$cs." | ".$st."| ".$thendate."</option>");
		 
						}
echo "</select>";

print("</FORM>");
}// Closing of list box
//******************************************************//
//	 Ending function data_drop()			//
//******************************************************//



?>
