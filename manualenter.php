<?php
require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
	require_once('inc/appvars.php');  // Set the Variables	
	require_once('css/plaintheme.php');  // Set the Theme Variables
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	//require_once("inc/maintmerge.inc.php");
  $Title="ManualEnter";
  require_once('inc/title.php');
  // Connect to the username database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name,  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);
  mysqli_close($dbc);

	print("<meta http-equiv=\"content-style-type\" content=\"text/css\">");
	print("<link rel=\"stylesheet\" href=\"".THEME."\">");






 if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 2)) {  //****************//If logged in

	  // Generate the navigation menu

	    echo ' <a href="viewprofile.php">View Profile</a><br />';
	    echo ' <a href="editprofile.php">Edit Profile</a><br />';
	    echo ' <a href="index.php">Home</a><br />';
	    echo ' <a href="manualenter.php">Back</a><br />';
	    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br />';
		if ($_SESSION['status'] == 1) {    //If Administrator Priviledges

			}


print("</div>");
///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//   End of Header.
//
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['checksheet']) && empty( $_POST['event_id'])) {
$Checksheetno = $_POST['checksheet'];  //declare the truck.

$yesterday=date("Y-m-d", time()-86400);
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$del ="DELETE ".$Checksheetno."_events.*, ".$Checksheetno."_checksheet.* FROM ".$Checksheetno."_checksheet, ".$Checksheetno."_events WHERE ".$Checksheetno."_events.id = ".$Checksheetno."_checksheet.event_id AND ".$Checksheetno."_events.submitted IS NULL AND ".$Checksheetno."_events.date BETWEEN '2009/1/1' AND '$yesterday'";


 //mysqli_query($dbc, $del);

?><div class="page">	
<FORM name="CHChoice" ID="Unitno" ACTION="<?php echo $PHP_SELF;?>" METHOD="POST" >

<?
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $query = "SELECT * FROM ".$Checksheetno."_events WHERE submitted = 1 ORDER BY date DESC";
  $data = mysqli_query($dbc, $query);
  echo "<table border=1>";
 
  while ($row = mysqli_fetch_array($data)) { 
		$chsh_id = $row['id'];
		$chshdate = strftime("%a %d %b %H:%M:%S %Y ", strtotime($row['date']))."<br/>";
	print ("<tr><td>$chshdate</td>");



print ("<td style='padding:5;'><INPUT TYPE=radio NAME=event_id value=$chsh_id>Select!");
print("</td></tr>");
}
print ("</table>");

print ("<input type='hidden' name='checksheet' value=".$_POST['checksheet'].">");
print("<td>");
print ("<SELECT NAME=NDay>\n");
	print("<OPTION VALUE=''>Choose a Day</OPTION>\n");
for($day=1; $day <=31; $day++) {
	print ("<OPTION VALUE=".$day.">".$day."</OPTION>\n");
}

print("</SELECT>\n");

////////////////////////////////////////////////////////////////////////////
//  End of Day of Month Selection
///////////////////////////////////////////////////////////////////////////


print ("<SELECT NAME=NMonth>
	<OPTION VALUE=''>Choose a Month</OPTION>\n
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

print ("<SELECT	NAME=NYear>
	<OPTION VALUE=''>Choose a Year</OPTION>\n
	<OPTION VALUE=2010>2010</OPTION>\n
	<OPTION VALUE=2011>2011</OPTION>\n
	<OPTION VALUE=2012>2012</OPTION>\n
	<OPTION VALUE=2013>2013</OPTION>\n
	<OPTION VALUE=2014>2014</OPTION>\n
	

</SELECT>\n");
print ("</td>");

echo"<Center><INPUT TYPE=Submit NAME=submit value=Change class=gobutton></center>";
echo"</form>";


?></div>	<? 


////////////////////////////////////////////////////////////////////////////////////////////////////
//
//    End of Checksheet List
//
/////////////////////////////////////////////////////////////////////////////////////////////////////


}








if (isset($_POST['event_id']) && isset($_POST['checksheet'])) {
//elseif (isset($_POST['event_id']) && isset($_POST['checksheet'])) {
		$Mnth= $_POST['NMonth'];
		$Day=$_POST['NDay'];
		$Yr=$_POST['NYear'];
	print("<br>$Mnth-");
	print("$Day-");
	print("$Yr-");
	if (!empty($Mnth) && !empty($Day) && !empty($Yr)) {
		$Newdate = mktime(11,59,59,$Mnth,$Day,$Yr);
		$updateddatemysql=date('Y-m-d H:i:s',$Newdate);
echo"<br>$_POST[checksheet]";
//echo"<br>$_POST[event_id]";
//print ("<br>$Newdate");




///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//   Variables.
//
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
$Checksheetno = $_POST['checksheet'];  //declare the truck.
// print ("$Checksheetno");
$CHid=checksheetnotochecksheet_id($Checksheetno);

$event_id=$_POST['event_id'];
// print("<br>Event=".$event_id."<br>");
// print("<br>CHid=".$CHid."<br>");
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$ACH=array($Checksheetno=>$event_id); //primary Checksheet
		$count =1;
$mergCH_query="SELECT * from Checksheets ";
	$mergCHdata = mysqli_query($dbc, $mergCH_query);
	while ($mergCHrow=mysqli_fetch_array($mergCHdata)) {
			$allCHNames=$mergCHrow['ChecksheetName'];
			//print("$count --$allCHNames<br>\n");
				$count = $count+1;
		$mergede_query="SELECT * FROM ".$allCHNames."_events WHERE  merged = '".$CHid."' AND merger = '".$event_id."' ";
	$mergeddata = mysqli_query($dbc, $mergede_query);
	if ($mergeddata) {
	$mergedrow=mysqli_fetch_array($mergeddata, MYSQLI_ASSOC);
			if ($mergedrow['id'] ) {
		$ACH[$allCHNames]=$mergedrow['id']; }
						}else { mysqli_error($dbc);}	
							} 




//print_r2($ACH);

foreach ($ACH as $Checksheetno => $event_id) {
		$Checksheete = $Checksheetno."_events";
//print("<br>$Checksheete--");
//print("$event_id");

$updatesql="UPDATE $Checksheete SET date = '".$updateddatemysql."' WHERE id = '".$event_id."'";
		mysqli_query($dbc, $updatesql) or die("Update failed");

}




} else {print("Please go back and complete the date.");}
mysqli_close($dbc);

    echo ' <br><a href="manualenter.php">Begin Again</a><br />';

?>	
<FORM name="CHChoice" ID="Unitno" ACTION="<?php echo $PHP_SELF;?>" METHOD="POST" >

<?
print ("<input type='hidden' name='checksheet' value=".$_POST['checksheet'].">");
echo"<INPUT TYPE=Submit NAME=submit value=\"Repeat ".$_POST['checksheet']."\" class=gobutton>";
echo"</form>";
} else { 
///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//   Initial Opening of Page
//
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////


?>
 <script type="text/javascript">


function vldFrm_Checksheet(){



                  
	var result = true;
	var msg="";
	
	if (document.UnitChoice.checksheet.value=="") {
			msg+="Please Choose a Checksheet.\n";
			result = false;
			}


	if(msg==""){
	return result;
	}{
	alert(msg)
	return result;
	}

}
</script>
<FORM name="UnitChoice" ID="Unitno" ACTION="<?php echo $PHP_SELF;?>" METHOD="POST" >

<? 
	$sitem='checksheet';
	$name=Checksheets;
	echo"	<center><table><tr>\n";
	echo"	<td><div class=l >$name</div><div class=r>\n";
	

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM $name WHERE published = '1' AND (merged = '0' || merged IS NULL) order by id asc";
	$result=mysqli_query($dbc, $sql);
	$itemoptions="";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[1];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
}

echo"<SELECT NAME='$sitem'>";

?>
<OPTION VALUE="">Choose <?$sitem ?>
<?=$itemoptions?>
</SELECT> 
</div></td></tr></table></center>
<?
?>
 <center><INPUT TYPE="submit"  NAME="Unit"  ID="Unitno" VALUE="NEXT" onClick="return vldFrm_Checksheet();" >
	</center>
</FORM>
<?
  mysqli_close($dbc);

  //  echo ' <center><a href="where.php">Query Between Dates</a></center><br />';
}

 }   else  {
echo "<h3>Please Log in. </h3>";

}

?>
<div class="push"></div>
</div>
