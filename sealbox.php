<?php
  // require_once('inc/startsession.php');
	require_once('inc/appvars.php');  // Set the Variables	
	require_once('css/theme.php');  // Set the Theme Variables
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	//require_once("inc/maintmerge.inc.php");
  // Connect to the username database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name,  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);
  mysqli_close($dbc);

	print("<meta http-equiv=\"content-style-type\" content=\"text/css\">");
	print("<link rel=\"stylesheet\" href=\"".THEME."\">");
		?>

<div class="header">

	<?php

require_once('inc/logo.php');  // Set the LOGO
logo(LOGO);





  if (isset($_SESSION['username'])) {  //****************//If logged in

	  // Generate the navigation menu

	    echo ' <a href="viewprofile.php">View Profile</a><br />';
	    echo ' <a href="editprofile.php">Edit Profile</a><br />';
	    echo ' <a href="index.php">Home</a><br />';
	    echo ' <a href="Archives.php">Back</a><br />';
	    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br />';
		if ($_SESSION['status'] == 1) {    //If Administrator Priviledges

			}




if(isset($_GET['checksheet'])) {
	$_POST['checksheet'] = trim($_GET['checksheet']); }
echo"<br>$_POST[checksheet]";
	
				?>
</div>	



<?php   
$Checksheetno = $_POST[checksheet];
$casc_id = checksheetnotochecksheet_id($_POST[checksheet]);
$Checksheet = $Checksheetno."_Sealed";
$nextmonth = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y"));
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Sealing the Box
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
  // Connect to the username database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(isset($_POST['seal'])&& isset($_POST['sealing'])) { 
$sig=usernametouser_id($_SESSION['username']);
$seal = $_POST['seal'];
$setsealsql = "UPDATE Checksheets SET sealed = '".$seal."', Signature = '".$sig."' WHERE id = '".$casc_id."' ";
	mysqli_query($dbc,$setsealsql) or die("can't sqlsetseal");
mysqli_close($dbc);
}



/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Break the seal
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (isset($_POST[sealdel])) {
$sealdel = $_POST[sealdel];
$setsealsql = "UPDATE Checksheets SET sealed = NULL, Signature = NULL WHERE id = '".checksheetnotochecksheet_id($Checksheetno)."' ";
	mysqli_query($dbc,$setsealsql) or die("can't sqldelseal");
mysqli_close($dbc);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Show the sealed box
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$sqlsealed = "SELECT * from Checksheets WHERE ChecksheetName = '".$Checksheetno."'";
		$resultsealable = mysqli_query($dbc, $sqlsealed) or die ("can't get the sealable set.");  
		//////Getting the sealed list/////////////////////////////////////////////
		while ($rowsealable=mysqli_fetch_array($resultsealable)) {


			$sealed = $rowsealable[sealed];
			$Signature = $rowsealable[Signature];

	if ($sealed != NULL || $sealed != 0) { print ("<p>".$Checksheetno." was sealed by "._user_idtoname($Signature)." with seal number $sealed. </p>"); 
		?> <center>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<table width="95%">
  <thead align="center" valign="center" bgcolor="blue">
    <tr>
      <th>Break the Seal</th>
    </tr>
  </thead>
  <tbody>


    <tr>
      <td class="hlist"><input type="submit" value="Break" name="sealdel" /></td>
    </tr>
  </tbody>
</table>
		 <input type=hidden value="<? echo $Checksheetno; ?>" name="checksheet" />
</form></center> 
<?

print("\n<table width=\"100%\" padding=\"8px\" border=\"3px\">\n");
	print("<TR><td class=\"hlist\" colspan=\"8\">Perishable Items</td></TR>");
	
	print("<tr><td class=\"hlist\">Item</td><td class=\"hlist\">Expiration Date</td><td class=\"hlist\">Item</td><td class=\"hlist\">Expiration Date</td><td class=\"hlist\">Item</td><td class=\"hlist\">Expiration Date</td></tr>\n");
	
	$cols=0;
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT $Checksheet.*,Items.perishable FROM $Checksheet,Items WHERE Items.item_id = $Checksheet.item_id AND Items.perishable = '1' ORDER BY item_id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row[id];		
				$item_id = $row[item_id];	
				$expdate = $row[date];
			//print ("<br>$id");
			//print ("<br>$item_id");
			//print ("<br>$expdate");
$cols=$cols+1;
if  ($cols==1) {print("<tr>\n<!--cols=1-->\n");}
if ($item_id) {

					$EXP=mysql_dt_day_query($row[2]);
	if($EXP >= $nextmonth ){	$bgcolor="plist"; } else {$bgcolor="wplist";}
				$expdate = date("m-Y",$EXP);
		print("<td class=\"b".$bgcolor."\">".ItemidtoName($item_id)."</td>\n<td class=\"".$bgcolor."\">$expdate</td>\n"); } else { print("<td colspan=6>blah!</td>");}



if ($cols==3) {print("</tr>\n<!--cols=2-->\n"); $cols=0;}

} //End item list
	
if  ($cols==1) {print("<td></td>\n<td></td>\n</tr>\n<!--cols=1-->\n");}


/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		List of Non-Perishable Items in the Sealed Box if seal broken.
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////



	print("<TR>
          <td class=\"hlist\" colspan=\"8\">Non-Perishable Items</td>
        </TR>");
	print("<tr><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td></tr>\n");
	
	$cols=0;
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT $Checksheet.*,Items.perishable,$Checksheetno.hm_value_id FROM $Checksheetno,$Checksheet,Items WHERE Items.item_id = $Checksheet.item_id AND $Checksheet.item_id = $Checksheetno.item_id AND (Items.perishable IS NULL || Items.perishable ='0')  ORDER BY item_id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row[id];		
				$item_id = $row[item_id];	
				$hm_value_id = $row[hm_value_id];
				if($hm_value_id==20) {$hm_value_id=1;}
$cols=$cols+1;
if  ($cols==1) {print("<tr>\n<!--cols=1-->\n");}



if ($item_id) {
		print("<td class=\"bnplist\" colspan=\"2\">".ItemidtoName($item_id)."</td>\n<td class=\"nplist\">$hm_value_id</td>\n\n");
		} else { print("<td colspan=3>blah!</td>");}
if ($cols==2) {print("</tr>\n<!--cols=2-->\n"); $cols=0;}

} //End item list
	
if  ($cols==1) {print("<td></td>\n<td></td>\n</tr>\n<!--cols=1-->\n");}


print("</table>\n");



} //End if the box was sealed with seal no.
else {  // Beginning of Open Box  


/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Beginning of Update Items to Database 
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['newupdates'])&&(isset($_POST['newexpdate']))) {  // If there are updates
	$newexpdate=$_POST['newexpdate'];
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	foreach ($newexpdate as $pitem_id=>$update_date)
		{ 

	
    		$yr=strval(substr($update_date,2,2));
    		$mo=strval(substr($update_date,0,2));
		$expdatee1=mktime(0,0,0,$mo,1,$yr);
		$updateddatemysql=date('Y-m-d H:i:s',$expdatee1);		
       $query = "UPDATE ".$Checksheet." SET date = '".$updateddatemysql."' WHERE id = '".$pitem_id."'";        
        mysqli_query($dbc, $query) or die("The Query didn't update the date");



}mysqli_close($dbc);
}  // End of Updating Items

/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Beginning of Remove Items from database
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['remove_items'])&&(isset($_POST['itemdelete']))) {  // If some items need to be removed.
	$itemdelete=$_POST['itemdelete'];
	foreach ($itemdelete as $remove_id) { 
//print("$remove_id\n<br>\n");
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql="DELETE FROM ".$Checksheet." WHERE id = '".$remove_id."'";
	$result = mysqli_query($dbc, $sql) or die(" No way that's happening");


}  mysqli_close($dbc);

}  // End of if remove items
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Beginning of Update Items List 
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['remove_items'])&&(isset($_POST['itemupdate']))) {
	$itemupdate=$_POST['itemupdate'];
?> 
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php

		 echo "<input type=hidden value=\"".$Checksheetno."\" name=checksheet />\n";
print("$update_id\n<br>\n");
	print("<center><table width=\"80%\">\n");
	print("<tr>\n<td  colspan=\"3\" class=\"hupdlist\">Expiration Updates</td></tr>");
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	foreach ($itemupdate as $update_id)
		{ 

//print("$update_id");



	$sql = "SELECT * FROM $Checksheet WHERE id = $update_id ORDER BY id";
	$result = mysqli_query($dbc, $sql) or die ("The \$update_id\ thing doesn't work");
		while ($row = mysqli_fetch_array($result)) {
				$Item_id = $row[id];		
				$pitem_id = $row[item_id];
				//print("$pitem_id");	
				//$npitem_id = $row[2];	
				$name=ItemidtoName($pitem_id);
				//print("$name");
					$EXP=mysql_dt_day_query($row[2]);
				$expdate = date("m-Y",$EXP);

	print("<tr>\n");
	print("<td class=\"updlist\">".$name."</td>\n<td class=\"updlist\">$expdate</td>\n<td class=\"updlist\"><label for=\"newexpdate\">New Expiration Date (MMYY):</label>
      <input type=\"text\" size=\"4\" id=\"newexpdate\" name=\"newexpdate[$Item_id]\" /></td>");
	print("</tr>\n");


} //End item list








} 
mysqli_close($dbc);

	print("<tr>\n<td  colspan=\"3\" class=\"hupdlist\">\n<center><input type=\"submit\" value=\"Update\" name=\"newupdates\" /></center>\n</td>\n</tr>\n");
	print("</table></center>");

print("</form>");


}

$Checksheet = $Checksheetno."_Sealed";
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Split Stuff into database
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
include_once("inc/item_select.inc.php");
		//print ("$Checksheet");
	$pchoice=item_select($Checksheetno,$Checksheet);

//print_r2($pchoice);
	ksort($pchoice);
$cols=0;
	foreach($pchoice as $id => $NK) {
		$number = $NK[1];
		$Iname = $NK[0];
		$Perishable = $NK[2];

		if ($number=20) {$number = 1;}
		if ($number=26) {$number = 2;}

if($Perishable == 1) {
	for($n=1; $n <= $number; $n++) { 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	       $query = "INSERT INTO ".$Checksheet."(id,item_id,date) VALUES ('0','$id',CURDATE()) ";        
        mysqli_query($dbc, $query);
mysqli_close($dbc);
			}
} else {
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
       $query = "INSERT INTO ".$Checksheet."(id,item_id) VALUES ('0','$id') ";        
        mysqli_query($dbc, $query);	
	mysqli_close($dbc);

}


}
 //mysqli_close($dbc);


/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Seal the Box Form
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
?> <center>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<table width="95%">
  <thead align="center" valign="center" bgcolor="blue">
    <tr>
      <th>Apply the Seal</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td class="wplist">      Seal Number
      <input type="text" size="12"  name="seal" />
</td>
    </tr>
    <tr>
      <td class="hlist"><input type="submit" value="Sign" name="sealing" /></td>
    </tr>
  </tbody>
</table>

		 <input type=hidden value="<? echo $Checksheetno; ?>" name="checksheet" />

</form></center> <?php

/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		List of Perishable Items in the Sealed Box if seal broken.
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

?> 
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
print("\n<table width=\"100%\" padding=\"10px\" border=\"3px\">\n");
	print("<TR><td class=\"hlist\" colspan=\"8\">Perishable Items</td></TR>");
	
	print("<tr><td class=\"hlist\">Item</td><td class=\"hlist\">Expiration Date</td><td class=\"hlist\">Update
</td><td class=\"hlist\">Remove</td><td class=\"hlist\">Item</td><td class=\"hlist\">Expiration Date</td><td class=\"hlist\">Update</td><td class=\"hlist\">Remove</td></tr>\n");
	
	$cols=0;
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT $Checksheet.*,Items.perishable FROM $Checksheet,Items WHERE Items.item_id = $Checksheet.item_id AND Items.perishable = '1' ORDER BY item_id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row[id];		
				$item_id = $row[item_id];	
				$expdate = $row[date];
				if($hm_value_id == 26){$hm_value_id=2;}
			//print ("<br>$id");
			//print ("<br>$item_id");
			//print ("<br>$expdate");
$cols=$cols+1;
if  ($cols==1) {print("<tr>\n<!--cols=1-->\n");}
if ($item_id) {

					$EXP=mysql_dt_day_query($row[2]);
	if($EXP >= $nextmonth ){	$bgcolor="plist"; } else {$bgcolor="wplist";}
				$expdate = date("m-Y",$EXP);
		print("<td class=\"b".$bgcolor."\">".ItemidtoName($item_id)."</td>\n<td class=\"".$bgcolor."\">$expdate</td>\n<td class=\"".$bgcolor."\"><input type=checkbox  value=$id name=itemupdate[] />\n\n</td>\n<td class=\"".$bgcolor."\"><input type=checkbox  value=$id name=itemdelete[] />\n\n</td>\n"); } else { print("<td colspan=4>blah!</td>");}



if ($cols==2) {print("</tr>\n<!--cols=2-->\n"); $cols=0;}

} //End item list
	
if  ($cols==1) {print("<td></td>\n<td></td>\n</tr>\n<!--cols=1-->\n");}


/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		List of Non-Perishable Items in the Sealed Box if seal broken.
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////



	print("<TR>
          <td class=\"hlist\" colspan=\"8\">Non-Perishable Items</td>
        </TR>");
	print("<tr><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td><td class=\"hlist\">Remove</td><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td><td class=\"hlist\">Remove</td></tr>\n");
	
	$cols=0;
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT $Checksheet.*,Items.perishable,$Checksheetno.hm_value_id FROM $Checksheetno,$Checksheet,Items WHERE Items.item_id = $Checksheet.item_id AND $Checksheet.item_id = $Checksheetno.item_id AND (Items.perishable IS NULL || Items.perishable ='0')  ORDER BY id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row[id];		
				$item_id = $row[item_id];	
				$hm_value_id = $row[hm_value_id];
				if($hm_value_id==20) {$hm_value_id=1;}
$cols=$cols+1;
if  ($cols==1) {print("<tr>\n<!--cols=1-->\n");}



if ($item_id) {
		print("<td class=\"bnplist\" colspan=\"2\">".ItemidtoName($item_id)."</td>\n<td class=\"nplist\">$hm_value_id</td>\n<td class=\"nplist\"><input type=checkbox  value=$id name=itemdelete[] />\n</td>\n");
		} else { print("<td colspan=3>blah!</td>");}
if ($cols==2) {print("</tr>\n<!--cols=2-->\n"); $cols=0;}

} //End item list
	
if  ($cols==1) {print("<td></td>\n<td></td>\n</tr>\n<!--cols=1-->\n");}

		 echo "<input type=hidden value=\"".$Checksheetno."\" name=checksheet />\n";
	print("<tr><td class=\"hlist\" colspan=\"8\"><input type=\"submit\" value=\"GO\" name=\"remove_items\" /></td></tr>\n");
print("</table>\n");
print ("</form>");
  mysqli_close($dbc);



}  // End of Opened Unit
} //End if Sealable
} //End if logged in
?>