<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Merge Editing";
  require_once('inc/title.php');
?>



<?php
 require_once("inc/functions.php.inc");
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {


  }
  else {
    echo ' <a href="login.php">Log In As An Administrator(' . $_SESSION['username'] . ').</a><br />';
   //echo ' <a href="signup.php">Sign Up</a>';
  } 
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
print("</div>");


////////////////////////////////////////////////
///////////////////////////////////////////////
////////////////////////////////////////////////
///////////////////////////////////////////////
//////////////////////////////////////////////



	if (!empty($_POST['Checksheetname']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
$Checksheetname=($_POST['Checksheetname']);
	 print("<div><center><h1>$Checksheetname</h1></center></div>"); // Header Checksheet Name

	if(isset($_POST['changed_merger'])){ 
		$c_m= $_POST['changed_merger'];
		if($c_m == REMOVE) { 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sqlrmmerg="UPDATE Checksheets SET merged = '0' WHERE ChecksheetName = '".$Checksheetname."'";

				mysqli_query($dbc,$sqlrmmerg) or die("can't sqlremove"); mysqli_close($dbc);
		print("<center><h2 style=color:red;>$Checksheetname has been removed from the merge.</h2></center>");
}    else {
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sqlrmmerg="UPDATE Checksheets SET merged = '".$c_m."' WHERE ChecksheetName = '".$Checksheetname."'";

				mysqli_query($dbc,$sqlrmmerg) or die("can't sqlchange"); mysqli_close($dbc);
		print("<center><h2 style=color:red;>$Checksheetname has been merged into ".checksheet_idtochecksheetname($c_m)."</h2></center>");
}

}





  // Connect to the database 
//////////////////////////////////////////////////////////////////////////////////////////////
// Test for Primary Checksheet Status.
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $sqlprim ="SELECT ChecksheetName FROM Checksheets WHERE '".checksheetnotochecksheet_id($Checksheetname)."' = merged";
			$resultprim = mysqli_query($dbc, $sqlprim) or die ("can't get the Merged selection.");  
$Primary = Array();
while ($rowprim=mysqli_fetch_array($resultprim)) {
	$Primary[] = $rowprim['ChecksheetName'];
}
	if ($Primary) {	
print("<div style=\"background-color:#214845;text-align:center;\">");
print("$Checksheetname is a \"Primary\" checksheet and cannot be merged into another checksheet.<br>\n Merged into $Checksheetname are:<ul>\n");
//print_r($Primary);
?>
<form name="editchecksheet" ID="edit_merged" ACTION="<?php echo $PHP_SELF; ?>" METHOD="post" >
<?php
$navradio="";
foreach ($Primary as $mergednames) { 
$navradio = $navradio+1;
print("<li>edit <INPUT TYPE=\"radio\" name=\"Checksheetname\" value=\"$mergednames\" id=\"navradio".$navradio."\">\n\t<label for=\"navradio".$navradio."\">$mergednames</label>\n<br>\n
</li>");
 
} print("\n</ul>\n<input type=\"submit\" value=\"Go To that Checksheet\" ></form>");
print ("</div>");
 } else {
/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
// Find out if the Checksheet is merged or not
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $sqlmerg ="SELECT DISTINCT merged FROM Checksheets WHERE '".$Checksheetname."' = Checksheets.ChecksheetName";
			$resultmerg = mysqli_query($dbc, $sqlmerg) or die ("can't get the Merged selection.");  
while ($rowmerg=mysqli_fetch_array($resultmerg)) {//Check for merge
	if ($rowmerg['merged']) {// If this Checksheet is part of another Checksheet.
	
	$mergel = checksheet_idtochecksheetname($rowmerg['merged']);
	$merged = checksheet_idtochecksheetname($rowmerg['merged'])."/";

print("<div style=\"background-color:#214845;text-align:center;\">");
print("$Checksheetname is merged into the Checksheet, $mergel.");
print("</div>"); }
else {

print("<div style=\"background-color:#214845;text-align:center;\">");
print("$Checksheetname is not currently merged into another Checksheet.");
print("</div>");}
}
//////////////////////////////////////////////////////////////////////////////////////////
//
//  	Form to change Secondary merge
//
//
/////////////////////////////////////////////////////////////////////////////////////////

print("<div style=\"background-color:#214845;text-align:center;\">");
?>
<center>
<form name="change_merge" ID="change_merge" ACTION="<?php echo $PHP_SELF; ?>" METHOD="post" >
<table width="50%">
<TH width="100%" colspan="2" style="background-color:blue;">To change the "merge".</TH>
<TR>
<TD>
<?php

print("$Checksheetname");



?>
</TD>
<td>

<?php 
$itemoptions="";
$itemoptions .="<OPTION VALUE=\"\">Choose</OPTION>\n";
$itemoptions .="<OPTION VALUE=\"REMOVE\">SEPARATE</OPTION>\n";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sqlsel="SELECT * FROM Checksheets WHERE (merged = '0' || merged IS NULL) AND ChecksheetName NOT IN (SELECT ChecksheetName FROM Checksheets WHERE ChecksheetName = '".$Checksheetname."' )";
	$resultsel=mysqli_query($dbc, $sqlsel);
		while ($rowsel = mysqli_fetch_array($resultsel, MYSQL_NUM)) {
				$item_chosen_id=$rowsel[0];
				$OName = $rowsel[1];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$item_chosen_id."--".$OName."</OPTION>\n";
}

echo"<SELECT NAME=changed_merger >";
?>
Choose 
<?=$itemoptions?>
</SELECT> <br>

</td>
</TR>
<tr><td colspan="2" style="background-color:blue;"> <center><INPUT TYPE="submit"  NAME="change_merge"  ID="change_merge" VALUE="Submit" ></td></tr>
</table>

<input type="hidden" name="Checksheetname" value="<?php echo"$Checksheetname"; ?>" > </input>

</form>
</center>
<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//
//  	End of form to change Secondary merge
//	//Beginning of form to edit Checksheet.
//	
/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
print("</div>");
}
}
elseif (empty($_POST['Checksheetname']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) {
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		You first open the page.
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<form name="editchecksheet" ID="editchecksheet" ACTION="<?php echo $PHP_SELF; ?>" METHOD="post" >
<legend>Merge Editing</legend>
<fieldset>
<?php
print("<center><H3>Choose a Checksheet which you would like to edit.</H3></center>");
print("<label>Pick an existing checksheet</label>");
$name='Checksheets';	
$itemoptions="";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name order by id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_chosen_id=$row[0];
				$OName = $row[1];
			
			$itemoptions .="<OPTION VALUE=\"$OName\">".$item_chosen_id."--".$OName."</OPTION>\n";
}

echo"<SELECT NAME=Checksheetname >";
?>
Choose 
<?=$itemoptions?>
</SELECT> <br>



 <center><INPUT TYPE="submit"  NAME="editchecksheet"  ID="editchecksheet" VALUE="Submit" >
</center></fieldset>
</form>

<?php

}

mysqli_close($dbc);
?>






