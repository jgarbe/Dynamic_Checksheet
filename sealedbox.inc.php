<?php

echo"<br>".$_POST['checksheet']."";
	
  
$Checksheetno = $_POST['checksheet'];
$nextmonth = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y"));
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
if (isset($_POST['sealdel'])) {
$sealdel = $_POST['sealdel'];
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


			$sealed = $rowsealable['sealed'];
			$Signature = $rowsealable['Signature'];

	if ($sealed != NULL || $sealed != 0) { print ("<p>This part of the checksheet was sealed by "._user_idtoname($Signature)." with seal number ".$sealed.". </p>"); 
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
</form></center>  <?

} else {

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
$setsealsql = "UPDATE Checksheets SET sealed = '".$seal."', Signature = '".$sig."' WHERE id = '".checksheetnotochecksheet_id($Checksheetno)."' ";
	mysqli_query($dbc,$setsealsql) or die("can't sqlsetseal");
mysqli_close($dbc);
}
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

if(isset($_POST['newupdates'])&&(isset($_POST['newexpdate']))) {
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
}

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
if(isset($_POST['remove_items'])&&(isset($_POST['itemdelete']))) {
	$itemdelete=$_POST['itemdelete'];
	foreach ($itemdelete as $remove_id)
		{ 
//print("$remove_id\n<br>\n");
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql="DELETE FROM ".$Checksheet." WHERE id = '".$remove_id."'";
	$result = mysqli_query($dbc, $sql) or die(" No way that's happening");


}  mysqli_close($dbc);
}
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
				$Item_id = $row['id'];		
				$pitem_id = $row['item_id'];
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






/*
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql="UPDATE ".$Checksheet." set  expdate =  $newdate WHERE id = '".$update_id."'";
	$result = mysqli_query($dbc, $sql) or die(" No way that's happening");
*/

}  mysqli_close($dbc);

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
	$pchoice=item_select($Checksheetno,$Checksheet);

//print_r2($pchoice);
	ksort($pchoice);
$cols=0;
	foreach($pchoice as $id => $NK) {
		$number = $NK[1];
		$Iname = $NK[0];
		$Perishable = $NK[2];

		if ($number=20) {$number = 1;}
//print("perishable= ".$pid."");
//print("HM=".$hmitems."");
if(isset($number)) {

if($Perishable == 1) {
	for($n=1; $n <= $number; $n++) {
	       $query = "INSERT INTO ".$Checksheet."(id,item_id,date) VALUES ('0','$id',CURDATE()) ";        
        mysqli_query($dbc, $query);

			}
} else {
       $query = "INSERT INTO ".$Checksheet."(id,item_id) VALUES ('0','$id') ";        
        mysqli_query($dbc, $query);	

}

			} else { $err=$err+1;}   

 mysqli_close($dbc);}

	if ($err) { print("There is\\are still ".$err." items to categorize." );}

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
	$sql = "SELECT $Checksheet.*,Items.perishable FROM $Checksheet,Items WHERE Items.item_id = $Checksheet.item_id AND Items.perishable = '1' ORDER BY id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row['id'];		
				$item_id = $row['item_id'];	
				$expdate = $row['date'];
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
				$id = $row['id'];		
				$item_id = $row['item_id'];	
				$hm_value_id = $row['hm_value_id'];
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

/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Beginning of Add Perishable FORM
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////



?>
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
 <fieldset>    <legend>Split Perishable and Non-perishable Items</legend>






<!--
	<table style="align:center;width:100%;background-color:#042B78;border:solid 1px;">-->


<?
	//print("<tr><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">Perishable</td><td class=\"hlist\">Non-Perishable</td><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">Perishable</td><td class=\"hlist\">Non-Perishable</td></tr>\n");
////////////////////////////////////////////////////////
//print("$Checksheetno");
include_once("inc/item_select.inc.php");
	$pchoice=item_select($Checksheetno,$Checksheet);

//print_r2($pchoice);
	$itemoptions="";
	ksort($pchoice);
$cols=0;
	foreach($pchoice as $id => $NK) {
		$number = $NK[1];
		$Iname = $NK[0];
		$Perishable = $NK[2];
		//print("$number");
		//print("$Iname");
		//print("$Perishable");
			if ($Perishable == 1) { 
		 echo "<input type=hidden value=\"".$id."\" name=id[] />\n";
		 echo "<input type=hidden value=\"".$number.":1\" name=$id />\n"; }
			else {
		 echo "<input type=hidden value=\"".$id."\" name=id[] />\n";
		 echo "<input type=hidden value=\"".$number.":0\" name=$id />\n"; }

		 echo "<input type=hidden value=\"".$Checksheetno."\" name=checksheet />\n";
}   
?>
<!--<tr>
<td colspan="4">-->
    <center><input type="submit" value="Add Item/s" name="addperishables" /></center>
<!--</td>
</tr>
</table> -->

<?php

?>
    </fieldset>
  </form>



































<?

} }  ?>
