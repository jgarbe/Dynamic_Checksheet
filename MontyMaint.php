<?php
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
	require_once('inc/appvars.php');  // Set the Variables	
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once("inc/maintmerge.inc.php");
  // Connect to the username database 
print ("<table border=1px>");
print ("<tr>");
		print ("\t\t<th>");
			print ("\t\t\tChecksheet");
		print ("\t\t</th>");

		print ("\t\t<th>");
			print ("\t\t\tOdometer");
		print ("\t\t</th>");

		print ("\t\t<th>");
			print ("\t\t\tService Due");
		print ("\t\t</th>");

		print ("\t\t<th>");
			print ("\t\t\tDifference");
		print ("\t\t</th>");

		print ("\t\t<th>");
			print ("\t\t\tUnresolved Maintenance Notes");
		print ("\t\t</th>");


print ("</tr>");
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$cquery="SELECT * FROM Checksheets WHERE (merged IS NULL || merged = '0') AND  published ='1'";
  $cdata = mysqli_query($dbc, $cquery);
 	while ($c_row=mysqli_fetch_array($cdata)) {
	print ("<tr>");
	$CS=$c_row['ChecksheetName'];
	print("<td>".$CS."</td>"); 
	$query="SELECT ".$CS."_events.*, ".$CS."_checksheet.result FROM ".$CS."_checksheet,".$CS."_events WHERE ".$CS."_events.id =  ".$CS."_checksheet.event_id AND ".$CS."_checksheet.item_id = 1 AND UNIX_TIMESTAMP(".$CS."_events.date) >=".(time()-86400)." LIMIT 1"; 
  $data = mysqli_query($dbc, $query);
if ($row=mysqli_fetch_array($data)) {
	$miles=$row['result'];
print("<td>".$row['result']."</td>");
} else {
print("<td>-</td>");
}//end query for odometer

	$query2="SELECT ".$CS."_events.*, ".$CS."_checksheet.result FROM ".$CS."_checksheet,".$CS."_events WHERE ".$CS."_events.id =  ".$CS."_checksheet.event_id AND ".$CS."_checksheet.item_id = 2 AND UNIX_TIMESTAMP(".$CS."_events.date) >='".(time()-86400)."'"; 
  $data2 = mysqli_query($dbc, $query2);
if ($row2=mysqli_fetch_array($data2)) {
	$service=$row2['result'];
print("<td>".$row2['result']."</td>");

}else {
print("<td>-</td>");
} //end query for service miles
if (!empty($service)&& !empty($miles)){
if ($service <= $miles){ 
	$ODmileage=$miles-$service;
	print("\t<td>".$ODmileage." Overdue</td>");
$service=NULL;
$miles=NULL;
} else {

	$Smileage=$service-$miles;
	print("\t<td>".$Smileage." Until Next Service Due</td>");
$service=NULL;
$miles=NULL;
}
} else {
 print("<td>-</td>");
}// end finding difference between service and odometer
	


print("<td><ol>");
$query3="SELECT Comment_.*,Maintenance.*  FROM Comment_,Maintenance WHERE Maintenance.comments_id = Comment_.comment_id AND Maintenance.resolved = 0 AND Maintenance.checksheet_id = '".checksheetnotochecksheet_id($CS)."'"; 
  $data3 = mysqli_query($dbc, $query3);
while ($row3=mysqli_fetch_array($data3)) {
	
	$maint_note=$row3['_comment'];
print("<li>".$maint_note."</li>");

}
print("</ol></td>");

print("</tr>");
}

print ("</table>");

  mysqli_close($dbc);

?>
