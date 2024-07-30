<?php
require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
	include('inc/appvars.php');  // Set the Variables	
    $Title="Checksheet";
 include('inc/title.php');
//	require_once('css/theme.php');  // Set the Theme Variables
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once('inc/maintmerge.inc.php');
	require_once('inc/delayscript.inc.php'); // bring in the delay script.
  // Connect to the username database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name,  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);
  mysqli_close($dbc);




//	print("<meta http-equiv=\"content-style-type\" content=\"text/css\">");
//	print("<link rel=\"stylesheet\" href=\"".THEME."\">\n");

//print ("<div class=\"header\">");	

// require_once('inc/logo.php');  // Set the LOGO
// logo(LOGO);
//print ("<img src=".LOGO." width=150 height=150 border=0  align=right>");




  if (isset($_SESSION['username'])) {  //****************//If logged in

	  // Generate the navigation menu

		print("\n");
	    echo ' <a href="viewprofile.php">View Profile</a><br>';
		print("\n");
	    echo ' <a href="editprofile.php">Edit Profile</a><br>';
		print("\n");
	    print("<a href='".HOME."'>Home</a><br />");
		print("\n");
	    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br>';
		print("\n");

echo"<br />".$_POST['checksheet']."<br />\n";
print("<script src=\"".HOME."/js/jquery.validate.min.js\"></script>\n");

print("<script>\n");
print("$(document).ready(function()\n");
print("  { \n");
print(" $.ajaxSetup({ cache: false});     \n");
print("  $(\"select\").change(function(){ \n");
//print("alert(this.value);\n");
print(" var garr = (this.value).split(\":\");\n");
print(" var valNum = garr[2]; \n");
print(" var numericRegex = /^\d+(?:\.\d\d?)?$/; \n");  //numeric only
print("            if (!valNum.match(numericRegex)) { \n");  //if it is not a numeric type
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//print("alert(garr[8] + \" Quasi Moto \" + garr[1]);\n");
print("     if  (garr[2] == 'na') { \n");   // If it is an NA type
print("     if ( garr[8] == 'NULL'){  \n");
print("               $(this).css('backgroundColor','red'); \n");
print("            } \n");
print("     if (garr[8] < 2){  \n");
print("               $(this).css('backgroundColor','yellow'); \n");
print("            } \n");
print("     if ((garr[8] == '2') || (garr[8] == 'N/A')){  \n");
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");
print("            } \n");
print("     if  ((garr[2] == 'personnel')  || (garr[2] == 'refill')) { \n");   // if it is a personnel type
print("     if ( garr[8] == 'NULL'){  \n");
print("               $(this).css('backgroundColor','red'); \n");
print("            } \n");
print(" else   { \n"); 
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");
print("            } \n");
print("            } \n");
print(" else   { \n");     // If it is a numeric type
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//print("alert(garr[7] + \" \" + garr[1]);\n");
print("                 if ( garr[8]  <  valNum ) { \n");
print("               $(this).css('backgroundColor','yellow'); \n");
print("            } \n");
print("            else  { \n");
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");
print("            } \n");
print("    //----------------------------------------------------------------------- \n");
 print("   // Send a http request with AJAX http://api.jquery.com/jQuery.ajax/ \n");
 print("   //----------------------------------------------------------------------- \n");
 print("   $.ajax({                                    \n");  
 //print("    type: \"POST\", \n");  
 print("     url: 'inc/select_ajax.inc.php',                  //the script to call to get data       \n");    
 print("     data: \"p_id=\" + (this.value),   //you can insert url argumnets here to pass to select_ajax.inc.php \n");
 print("                                      //for example \"id=5&parent=6\" \n");
 print("     dataType: 'json',                //data format       \n");
  print("    success: function(data)          //on recieve of reply \n");
  print("    { \n");
print("       var checkshin = data[0];              //Main Checksheet name\n");
 print("       var id = data[1];           //id\n");
 print("       var event_id = data[2];           //event_id\n");
 print("       var item_id = data[3];           //item_id \n");
 print("       var result = data[4];           //result \n");
 print("       var hm_value_id = data[5];           //hm_value_id \n");
 print("       var category_id = data[6];           //category_id \n");
 print("       var subcategory_id = data[7];           //subcategory_id \n"); 
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print("     }); \n");
 print("   }); \n");
 print("   }); \n");
print("</script>\n");

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
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////





/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Moving along
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
if ((isset($_POST['Update']))&& (!isset($_POST['Submit']))) {  //************// If the form has been submitted for Update.

/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Break a seal
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
/*
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (isset($_POST[sealdel]) && isset($_POST[checksealdel]) ) {
$sealdel = $_POST[sealdel];
$checksealdel = checksheetnotochecksheet_id($_POST[checksealdel]);
$setsealsql = "UPDATE Checksheets SET sealed = NULL, Signature = NULL WHERE id = '$checksealdel' ";
	mysqli_query($dbc,$setsealsql) or die("can't sqldelseal");
mysqli_close($dbc);
}
*/
//////////////////////////////////////////////////////////////////////////////////////////////////
//   End of Break the seal script
//
///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
// 
//
///////////////////////////////////////////////////////////////////////////////////////////////////
$file = CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".txt";
$CH = unserialize(implode('',file($file)));
//print_r2($CH);
$file = CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt";
$REQ = unserialize(implode('',file($file)));
//print_r2($REQ);



//////////////////////////////////////////////////////  Now, show the text buttons.
?>
<br>
<INPUT TYPE="button" value="View Printable Checksheet!" onClick="window.open('tmp/<?echo $_POST['checksheet']?>print.html')">
<INPUT TYPE="button" value="View Requesition Order!" onClick="window.open('tmp/<?echo $_POST['checksheet']?>order.html')">	
<?php

	print ("</div>\n");
//print_r($CHqset);
			print("<ul>\n");
 $required="";  //set the required item counter
//	// The breakdown of all of array formed.
	foreach($REQ as $reqd) {
			$casc_id=$reqd[0];
			$Item_id=$reqd[1];
			$Itemname=$reqd[2];
			//print($reqd[0]);
//foreach($no as $casc_ID=>$casc_id) {
//		$Checksheetno=$casc_id[0];
//		$qset=$casc_id[4];
//		$Cats=$casc_id[5];
//	require_once('inc/getrequired.inc.php'); // bring in the required data
//		$requiring=getrequired($Checksheetno,$casc_ID,$q_set,$Cats);    //send through the function to confirm the required fields.line 1549
//print_r2($reqd);
$variable=$_POST[$casc_id][$Item_id];
				 if  ($variable == '')  // if the variable is still empty and it is required
					
	 			 	{
			print( "<li style=position:left><b><font color = ".RCH_COLOR.">Please fill the ".$Itemname."				field.*</font></b></li>\n");
					$required=$required+1;   // add another required field to the count
						//echo "$required";

}
//$required=$required+$requiring;  //Add the sum of all checksheets.
}
//}
			print("</ul>\n");
/////////////////////////////////////////////////////  Prepare the text pages.
	require_once('inc/order.inc.php'); // 
				ClearOrder();
//print_r2($CH);
	require_once('inc/setvartabs.inc.php'); // bring in the delay script.
setvartabs($CH);	//get the tabs ready from the $CH array.
delaybody();		//post delayscript() script.
$ID=checksheetnotochecksheet_id($_POST['checksheet']);
?>			<INPUT TYPE="button" value="Append Maintenance" onClick="window.open('Maintenance.php?checksheet=<?echo $ID?>')">
<FORM  NAME="update" ID="Main" ACTION="<?php echo $PHP_SELF;?>" METHOD="POST" >
	<br>
	 <center><INPUT TYPE="submit"  NAME="Update"  ID="Main" VALUE="Update" />	
	
<?php
if ($required <=  0) { ?>
 <INPUT TYPE="submit"  NAME="Submit"  ID="Main" VALUE="Submit" />	
<?php  } //if all of the requirements are met.
  ?> </center>
<div class=page>
	<input type='hidden' name='checksheet' value='<?php echo $_POST['checksheet'] ?>' />
<?php
	print("\n<input type=\"hidden\" name=\"CHqset[".$casc_ID."]\" value=\"".$q_set."\">\n");
	require_once('inc/getcat.inc.php'); // bring in the delay script.
getcat($CH); //Place the Tabs prepaired from the setvartabs function
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//Now place the stuff under the tabs.
$cattab=1;
foreach($CH as $no) { 
foreach($no as $casc_ID=>$casc_id) {
		$Checksheetno=$casc_id[0];
		$sealable = $casc_id[1];//print("Sealable: ".$sealable."<br>\n");
		$sealed = $casc_id[2];// print("Sealed: ".$sealed."<br>\n");
		$Signature = _user_idtoname($casc_id[3]);
		$q_set = $casc_id[4];
		$Cats=$casc_id[5];
	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {
		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
			//print_r2($Catarray);
				$cat_id=$catarray_id;
			if ($cattab == 1) { //if it's the first tab--visible
				print("<div id='tab$cattab' class='tabContent'  style='display:block'><br>\n");
			}
			else { //if it's not the first tab--hidden
				print("</div>\n<div id='tab$cattab' class='tabContent'><br>\n");
			}
			$cattab=$cattab+1;
	//	}}
		//print_r2($Catarray);
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		The Update Seal Deal
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
/*
$sqlsealed = "SELECT * from Checksheets WHERE id = '".$casc_id."'";
		$resultsealable = mysqli_query($dbc, $sqlsealed) or die ("can't get the sealable set.");  
		//////Getting the sealed list/////////////////////////////////////////////
		while ($rowsealable=mysqli_fetch_array($resultsealable)) {


			$sealed = $rowsealable[sealed];
			$sealable = $rowsealable[sealable];
			$Signature = $rowsealable[Signature];
 if ($sealable == 1 ) { 
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		If Apply Seal Form Requested
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

if ($casc_id == $checksealdel ){ print("The Seal has been broken."); //if the seal was just broken,...
// The Checksheet needs to be the defaulted checksheet, since it will be displayed first time.

	require_once('inc/category_select.inc.php'); // bring in the functions.

		?><INPUT TYPE="button" value="Apply a Seal" onClick="window.open('sealbox.php?checksheet=<?php echo $Checksheetno ?>')">
			<?php
	
	   $sqlcatsub2 ="SELECT DISTINCT $Checksheetno.category_id, $Checksheetno.subcategory_id FROM $Checksheetno WHERE $cat = $Checksheetno.category_id";
			$resultcatsub2 = mysqli_query($dbc, $sqlcatsub2) or die ("can't get the CatSub2 selection.");
		//////Getting the CatSub selections./////////////////////////////////////////////
		while ($rowcatsub2=mysqli_fetch_array($resultcatsub2)) {
			$sub=$rowcatsub2[subcategory_id];
			category_select($casc_id,$cat,$sub,$q_set);
}

}  elseif ($sealed != NULL || $sealed != 0) { print ("<p>".$Checksheetno." was sealed by "._user_idtoname($Signature)." with seal number $sealed. </p>");
?>
<center>
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

<?php
	print("\n<input type=\"hidden\" name=\"CHqset[".$casc_id."]\" value=\"".$q_set."\">\n");
?>
		 <input type=hidden value="<? echo $Checksheetno; ?>" name="checksealdel" />
		 <input type=hidden value="1" name="Update" />

</form></center> <?
$Checksheet = $Checksheetno."_Sealed";
print("\n<table width=\"100%\" padding=\"8px\" border=\"3px\">\n");
	print("<TR><td class=\"hlist\" colspan=\"9\">Perishable Items</td></TR>");
	
	print("<tr><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">Expiration Date</td><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">Expiration Date</td><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">Expiration Date</td></tr>\n");
	
	$cols=0;
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT $Checksheet.*,Items.perishable,$Checksheetno.hm_value_id FROM $Checksheet,Items,$Checksheetno WHERE Items.item_id = $Checksheet.item_id AND Items.perishable = '1' AND $Checksheetno.item_id = $Checksheet.item_id ORDER BY item_id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row[id];		
				$item_id = $row[item_id];	
				$expdate = $row[date];
				$hm_value_id = $row[hm_value_id];
				if($hm_value_id == 26){$hm_value_id=2;}
			//print ("<br>$id");
			//print ("<br>$item_id");
			//print ("<br>$expdate");
	echo "<INPUT TYPE=HIDDEN  name=".$casc_id."[".$item_id."] value=".$hm_value_id." >";
$cols=$cols+1;
if  ($cols==1) {print("<tr>\n<!--cols=1-->\n");}
if ($item_id) {

					$EXP=mysql_dt_day_query($row[2]);
	if($EXP >= $nextmonth ){	$bgcolor="plist"; } else {$bgcolor="wplist";}
				$expdate = date("m-Y",$EXP);
		print("<td class=\"b".$bgcolor."\" colspan=\"2\">".ItemidtoName($item_id)."</td>\n<td class=\"".$bgcolor."\">$expdate</td>\n"); } else { print("<td colspan=9>blah!</td>");}



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
          <td class=\"hlist\" colspan=\"9\">Non-Perishable Items</td>
        </TR>");
	print("<tr><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td></tr>\n");
	
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
	
	echo "<INPUT TYPE=HIDDEN  name=".$casc_id."[".$item_id."] value=".$hm_value_id." >";
$cols=$cols+1;
if  ($cols==1) {print("<tr>\n<!--cols=1-->\n");}



if ($item_id) {
		print("<td class=\"bnplist\" colspan=\"2\">".ItemidtoName($item_id)."</td>\n<td class=\"nplist\">$hm_value_id</td>\n\n");
		} else { print("<td colspan=3>blah!</td>");}
if ($cols==3) {print("</tr>\n<!--cols=2-->\n"); $cols=0;}

} //End item list
	
if  ($cols==1) {print("<td></td>\n<td></td>\n</tr>\n<!--cols=1-->\n");}


print("</table>\n");


 } else {  //if not sealed
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
	<INPUT TYPE="button" value="Apply a Seal" onClick="window.open('sealbox.php?checksheet=<?php echo $Checksheetno ?>')">
			<?php

















	   $sqlcatsub2 ="SELECT DISTINCT $Checksheetno.category_id, $Checksheetno.subcategory_id FROM $Checksheetno WHERE $cat = $Checksheetno.category_id";
			$resultcatsub2 = mysqli_query($dbc, $sqlcatsub2) or die ("can't get the CatSub2 selection.");  
		//////Getting the CatSub selections./////////////////////////////////////////////
		while ($rowcatsub2=mysqli_fetch_array($resultcatsub2)) {
			$sub=$rowcatsub2[subcategory_id];
	require_once('inc/categorypost_select.inc.php'); 
			categorypost_select($casc_id,$cat,$sub,$q_set);  
				
				}


}
} else 
{  //if not sealable
*/

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////
	//require_once('inc/categorypost_select.inc.php'); 
//	foreach($Cats as $Checkrow)	{
//	foreach($Checkrow as $catarray_id =>  $catname) {
//		$CATEGORY=$catname[0];
//		$Catarray=$catname[1];
	foreach($Catarray as $Subcatrow)	{
	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
		$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
			echo"\n\n<table  width=100%>\n\t<tr>\n";
   echo "\n<div class=sh>\n$SUBCATEGORY\n</div>\n\t</tr>\n";
		PrintO("$CATEGORY $SUBCATEGORY");
$clms = 0;
	foreach($Itemsarray as $Itemstuff)	{
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
		$HowMany=$Itemstuff[2];
		$variable=$_POST[$casc_ID][$Item_id];
	require_once('inc/variablepostvalsort.inc.php'); 
			if ($clms >= $SUBCATCOLS) {echo "</tr><tr>";$clms = 1;
				//////////////////Send it to the variablepostvalsort function above.
		      variablepostvalsort ($casc_ID,$CATEGORY, $Item_id,$Itemname,$HowMany,$variable,$q_set);}
			else {
				//////////////////Send it to the variablepostvalsort function above.
		      variablepostvalsort ($casc_ID,$CATEGORY, $Item_id,$Itemname,$HowMany,$variable,$q_set);
$clms=$clms+1;}
     }
			print("\t</tr>\n</table>\n");	
		}}
		}}
} // End of displaying checksheets that aren't sealed


//}  // End of query all checksheets for sealability

	//} // end of category tab content
  //mysqli_close($dbc);

	print("\n<input type=\"hidden\" name=\"CHqset[".$casc_ID."]\" value=\"".$q_set."\">\n");
//End of "It has not had a seal broken."
 } 



 
print ("</div>");

?>
 <center>
<INPUT TYPE="SUBMIT"  NAME="Update"  ID="Main" VALUE="Update">

	<?php
if ($required <=  0) { ?>
 <INPUT TYPE="submit"  NAME="Submit"  ID="Main" VALUE="Submit" />	
<?php  } //if all of the requirements are met.
  ?>
</center>
 </FORM>
<?php




print ("<div style=clear:all;>");




foreach($CH as $no) {
foreach($no as $casc_ID=>$casc_id) {

	smaintmerge($casc_ID,$q_set);  //Merge the Maintenance data to the Requisition and Checksheet order.
}
}


echo"</div>";

}
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Moving along Submit
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
		elseif (isset($_POST['Submit'])){	//The Submit button is checked.	



















$CHqset=$_POST['CHqset'];

//print_r2($CHqset);
	require_once('inc/delayscript.inc.php'); // bring in the functions.

delaybody();		//post delayscript() script.
delayscript();   //preceding the delaybody() script.
//////////////////////////////////////////////////////  Now, show the text buttons.

?>
				<br>	
				<INPUT TYPE="button" value="View Printable Checksheet!" onClick="window.open('tmp/<?echo $_POST['checksheet']?>print.html')">
					 <INPUT TYPE="button" value="View Requesition Order!" onClick="window.open('tmp/<?echo $_POST['checksheet']?>order.html')">	
					
				<?php



$file = CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".txt";
$CH = unserialize(implode('',file($file)));
//print_r2($CH);	

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//	// The breakdown of all of array formed.

	require_once('inc/order.inc.php'); // bring in the functions.
			 ClearOrder();  // Ready the Viewable Requisition Order
		//	print("<div><H3>$_POST['checksheet']</div><br>"); 
	foreach($CH as $no) {
		foreach($no as $casc_ID=>$casc_id){
		$Checksheetno=$casc_id[0];
		//$sealable=$casc_id[1];
		//$sealed=$casc_id[2];
		//$Signature=$casc_id[3];
		$qset=$casc_id[4];
		print("$qset<BR>\n");
		$Cats=$casc_id[5];
		print("$Checksheetno<BR>\n");
		//print_r2($Cats);

	//$Checksheetno=checksheet_idtochecksheetname($casc_id);
		$update_event="UPDATE ".$Checksheetno."_events SET submitted = '1', date = NOW() WHERE id = ".$qset." AND  (merged = '0' || merged IS NULL)";
		 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				mysqli_query($dbc,$update_event) or die("can't submit full event");
				 mysqli_close($dbc);
		$update_event2="UPDATE ".$Checksheetno."_events SET submitted = '1', date = NOW() WHERE merger = ".$qset."";
		 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				mysqli_query($dbc,$update_event2) or die("can't submit full event2");
				 mysqli_close($dbc);
				
								?>


				<br>
	
				</div>
				<div>

				<?
				

	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {
		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
		//print("$CATEGORY<BR>\n");
		//print_r2($catname[1]);
		
	PrintO("<center><b>$CATEGORY</b></center>");
	foreach($Catarray as $Subcatrow)	{
	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
		$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
		//print("$SUBCATEGORY<BR>\n");
		//print("$SUBCATCOLS<BR>\n");
		//print_r2($Itemsarray);
					echo"\n\t</tr>\n</table>\n";
			echo "<table  width=100%>\n";
			echo "\n\t<tr>\n";
   echo "<div class=sh>$SUBCATEGORY</div>\n";
			   echo "\t</tr>\n";
	echo "\t<tr>\n";
		
		
		$clms = 0;
	foreach($Itemsarray as $Itemstuff)	{
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
		$HowMany=$Itemstuff[2];
		//print_r2($Itemstuff);
		//print("$Itemname<BR>\n");
		//print("$HowMany<BR>\n");
		//print("$Item_id<BR>\n");
		
			$variable=$_POST[$casc_ID][$Item_id];
			require_once('inc/variablepostsort.inc.php'); // bring in the functions.	
			if ($clms >= $SUBCATCOLS) {  // if cols number is reached by clms
				echo "\n\t</tr>\n\t<tr>\n";
					$clms = 0; //reset to 1
				variablepostsort ($Item_id,$Itemname,$HowMany,$variable);//line632

				$clms=$clms+1;}
			else {
				variablepostsort   ($Item_id,$Itemname,$HowMany,$variable); //line632
 $clms=$clms+1;
}
		
		
		
		
		
      }
		}}
		}}
		}}

			print ("\n\t</tr>\n</table>");
//
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////







	
/*
	require_once('inc/order.inc.php'); // bring in the functions.
			 ClearOrder();  // Ready the Viewable Requisition Order
//print_r2($CHqset);
foreach($CHqset as $casc_id => $q_set){
		echo $casc_id."\n";
		echo $q_set."\n";
	$Checksheetno=checksheet_idtochecksheetname($casc_id);
		$update_event="UPDATE ".$Checksheetno."_events SET submitted = 1, date = NOW() WHERE $q_set = id";
		 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				mysqli_query($dbc,$update_event) or die("can't submit full event");
				 mysqli_close($dbc);

//CategoryOrder($Checksheetno);


	
				?>


				<br>
	
				</div>
				<div>

				<?




	require_once('inc/getcatsubpost.inc.php'); // bring in the functions.
				getcatsubpost ($casc_id);  //line 1192
				
				echo"</div>";
				 
				echo"<div>";
	smaintmerge($casc_id,$q_set);  //Merge the Maintenance data to the Requisition and Checksheet order.
				
				echo"</div>";

}
*/
foreach($CH as $no) {
foreach($no as $casc_ID=>$casc_id) {

	smaintmerge($casc_ID,$q_set);  //Merge the Maintenance data to the Requisition and Checksheet order.
}
}
	require_once('inc/rsschsh.inc.php'); // bring in the functions.
CloseRSSOrder();
///////////////////////////////////////////////////////////////////////////////////////////////
//
//                        Mail the Stuff
//
//
////////////////////////////////////////////////////////////////////////////////////////////////
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
  $mail_rec_query = "SELECT email_address  FROM _user WHERE mailrec = '1'";
  $email_addresses = mysqli_query($dbc, $mail_rec_query);
  while ($rowemail=mysqli_fetch_array($email_addresses)) {
        $to=$rowemail['email_address'];
//print($to);


//define the subject of the email
$subject = $_POST['checksheet'].' Supply Requisition';
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: ".$_POST['checksheet']."@sresqtronics.org\r\nReply-To: webmin@resqtronics.org";
//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
$headers .="Message-ID: <". time() .rand(). "@".$_SERVER['SERVER_NAME'].">". "\r\n";
$headers .="Return-Path: webmin@resqtronics.org\r\n";
//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/plain; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit


--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/html; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

<?
//////////////////////////Mail Message Here
include("tmp/".$_POST['checksheet']."order.html");
/////////////////////////


?>

--PHP-alt-<?php echo $random_hash; ?>--
<?
//copy current buffer contents into $message variable and delete current output buffer
$message = wordwrap(ob_get_clean(),70);
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent to $to<br>" : "Mail to $to failed<br>";


      }
  mysqli_close($dbc);
///////////////////////////////////////////////////////////////////////////////////////////////
//
//                        Ending Mail the Stuff
//
//
////////////////////////////////////////////////////////////////////////////////////////////////
?>  				<center>Thank You. Your Checksheet has been submitted.</center></body> <?php
}//end of submitting 'else' part of page
else {












/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
//   You first open the page and you're presented with a checksheet
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////
$Checksheetno = $_POST['checksheet'];  //declare the menu checksheet name.

/////////////////////////////////////////////////////  Prepare the text pages.
	require_once('inc/order.inc.php'); // 
				ClearOrder($_POST['checksheet']);
$ID=checksheetnotochecksheet_id($Checksheetno);	
	  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
		   $mainTS ="SELECT T_update FROM ".$Checksheetno." ORDER BY T_update DESC LIMIT 1 ";   //Get the latest T_update from the Timestamp field of the Checksheet.
			$resultmainTS = mysqli_query($dbc, $mainTS) or die ("Aitn"); 							
					while ($rowmainTS=mysqli_fetch_array($resultmainTS)) {
		$Timestamp=$rowmainTS['T_update'];       }
		
				if (!file_exists(CACHE_DIR.$_POST['checksheet'])) { 
			 mkdir(CACHE_DIR.$_POST['checksheet'], 0777) ;
			}
			
if (file_exists(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".".$Timestamp.".txt")) {  //If there is a current cached Checksheet
	$file = CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".".$Timestamp.".txt";
$CHcached = unserialize(implode('',file($file)));

foreach($CHcached as $no) {       //The "array" AS the "order of checksheet  no."
	foreach($no as $casc_id) {     //The "order of checksheet  no." AS "The checksheet_id" array.
	$Checksheetno=$casc_id[0];   //The "Checksheet Name"
		$sealable=$casc_id[1];       //If the checksheet is sealable
		$sealed=$casc_id[2];			// If the checksheet is sealed
		$Signature=$casc_id[3];		// If it IS sealed -- who sealed it				
		$Cats=$casc_id[4];
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
			$Checksheet_events_table=$Checksheetno."_events"; //if the checksheet is the primary checksheet, don't put anything in the merged and merger columns.
		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),'NULL','NULL')"; //get event id for data insert
		mysqli_query($dbc,$querystartid);
		$q_set = mysqli_insert_id($dbc);
			//print("This is the $q_set");	
$CH=array("0"=>array($ID=>array('0'=>$Checksheetno,'1'=>$sealable,'2'=>$sealed,'3'=>$Signature,'4'=>$q_set))); //Start the array of checksheets that will include categories. Main Chacksheet First"0".
	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {
		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
		//print("$CATEGORY<BR>\n");
		//print_r2($catname[1]);
		$CH[count($CH)-1][$ID][5][]=array($catarray_id=>array('0'=>$CATEGORY));  //Add Merged Categories
	foreach($Catarray as $Subcatrow)	{
	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
		$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
		//print("$SUBCATEGORY<BR>\n");
		//print("$SUBCATCOLS<BR>\n");
		//print_r2($Itemsarray);
		$CH[count($CH)-1][$ID][5][count($CH[count($CH)-1][$ID][5])-1][$catarray_id][1][]=array($subcatarray_id=>array($SUBCATEGORY,$SUBCATCOLS));  //Add Merged Subcategories
	foreach($Itemsarray as $Itemstuff)	{
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
	$HowMany=$Itemstuff[2];
		$perishable=$Itemstuff[3];
	$req=$Itemstuff[4];
		//print_r2($Itemstuff);
		//print("$Itemname<BR>\n");
	//print("$HowMany<BR>\n");
		//print("$Item_id<BR>\n");
$CH[count($CH)-1][$ID][5][count($CH[count($CH)-1][$ID][5])-1][$catarray_id][1][count($CH[count($CH)-1][$ID][5][count($CH[count($CH)-1][$ID][5])-1][$catarray_id][1])-1][$subcatarray_id][2][]=array($Item_id,$Itemname,$HowMany,$perishable,$req);  //Add Merged Subcategories

if ($req == 1) { $REQ[]=array($ID,$Item_id,$Itemname,$HowMany,$perishable,$req); }
     }
	}}
		}}
	}}
}  else {		//If there is not a cached checksheet create one along with the new form


			



	   $mainch ="SELECT *  FROM Checksheets WHERE id = ".$ID."";   //First get all of the First  Main Checksheet
			$resultmain = mysqli_query($dbc, $mainch); 							
					while ($rowmain=mysqli_fetch_array($resultmain)) {
				$id=$rowmain['id'];		
				$Checksheetno=$rowmain['ChecksheetName'];		
				$sealable=$rowmain['sealable'];		
				$sealed=$rowmain['sealed'];		
				$Signature=$rowmain['Signature'];
	$Checksheet_events_table=$Checksheetno."_events"; //if the checksheet is the primary checksheet, don't put anything in the merged and merger columns.
		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),'NULL','NULL')"; //get event id for data insert
		mysqli_query($dbc,$querystartid);
		$q_set = mysqli_insert_id($dbc);
			//print("This is the $q_set");	
$CH=array("0"=>array($ID=>array('0'=>$rowmain['ChecksheetName'],'1'=>$rowmain['sealable'],'2'=>$rowmain['sealed'],'3'=>$rowmain['Signature'],'4'=>$q_set))); //Start the array of checksheets that will include categories. Main Chacksheet First"0".

$CacheCH=array("0"=>array($ID=>array('0'=>$rowmain['ChecksheetName'],'1'=>$rowmain['sealable'],'2'=>$rowmain['sealed'],'3'=>$rowmain['Signature']))); //Create another cachable array of checksheets that will include categories. Main Chacksheet First"0".

 $sqltab ="SELECT DISTINCT $Checksheetno.category_id,Category.* FROM $Checksheetno,Category WHERE $Checksheetno.category_id = Category.category_id";
	$resulttab = mysqli_query($dbc, $sqltab) or die ("can't get the setvartabs selection.");  //Second, Get the Categories in those Checksheets.
		while ($rowtab=mysqli_fetch_array($resulttab)) {
			$cat_id=$rowtab['category_id'];
			$cat_name=$rowtab['category_name'];

		$CH[count($CH)-1][$id][5][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories

		$CacheCH[count($CacheCH)-1][$id][4][]=array($cat_id=>array('0'=>$cat_name));  //Cachable Merged Categories


 $sqlcatsub2 ="SELECT DISTINCT $Checksheetno.subcategory_id, Subcategory.* FROM $Checksheetno,Subcategory WHERE $cat_id = $Checksheetno.category_id AND $Checksheetno.subcategory_id = Subcategory.subcategory_id ";
	$resultcatsub2 = mysqli_query($dbc, $sqlcatsub2) or die ("can't get the CatSub2 selection.");  //Third, Get the Subcategories in those Categories.
			//////Getting the CatSub selections./////////////////////////////////////////////
			while ($rowcatsub2=mysqli_fetch_array($resultcatsub2)) {
				$sub=$rowcatsub2['subcategory_id'];
				$sub_name=$rowcatsub2['subcategory_name'];
				$cols=$rowcatsub2['cols'];

		
		$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1][]=array($sub=>array($sub_name,$cols));  //Add Merged Subcategories
		
		$CacheCH[count($CacheCH)-1][$id][4][count($CacheCH[count($CacheCH)-1][$id][4])-1][$cat_id][1][]=array($sub=>array($sub_name,$cols));  //Add Merged Subcategories

//////// Start the Items fields from the category and place them under the header.  Start a count to create columns specified in the Subcategory field.///////////////////////////
	//print("$cat_id\n<br>");
	$sql2items= "SELECT $Checksheetno.*,Items.* FROM $Checksheetno,Items WHERE  $cat_id = $Checksheetno.category_id AND $sub = $Checksheetno.subcategory_id AND Items.item_id = $Checksheetno.item_id";
		$result2items = mysqli_query($dbc, $sql2items) or die ("can't get the Items selection");
//		$resultitems = mysqli_query($dbc, $sqlitems);

  while ($rowitems=mysqli_fetch_array($result2items)) { 
			$cols=colcount($rowitems['subcategory_id']);
			$CHid=$rowitems['item_id'];
			$itemname=$rowitems['item_name'];
			$hm = hmidtoname($rowitems['hm_value_id']);
			$perishable=$rowitems['perishable'];
			$req=$rowitems['req'];


$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1][count($CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

$CacheCH[count($CacheCH)-1][$id][4][count($CacheCH[count($CacheCH)-1][$id][4])-1][$cat_id][1][count($CacheCH[count($CacheCH)-1][$id][4][count($CacheCH[count($CacheCH)-1][$id][4])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

if ($req == 1) { $REQ[]=array($ID,$CHid,$Itemname,$hm,$perishable,$req); }
}
	}
}		
$chk_cache = serialize($CacheCH);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".".$Timestamp.".txt","w");//CACHE THE cascading checksheet list into the cache file, <CACHE_DIR.$Checksheetno.$Timestamp".txt">
fputs($fp, $chk_cache);
fclose($fp);
//print_r2($CacheCH);
	}
}












	   $cascch ="SELECT *  FROM Checksheets WHERE merged = ".$ID."";   //Now,  get all of the merged Checksheets
			$resultcasc = mysqli_query($dbc, $cascch); 
	if($resultcasc){
		while ($rowcasc=mysqli_fetch_array($resultcasc)) {
				$id=$rowcasc['id'];
				$Rid=$rowcasc['id'];
				$Checksheetno=$rowcasc['ChecksheetName'];
				$sealable=$rowcasc['sealable'];
				$sealed=$rowcasc['sealed'];
				$Signature=$rowcasc['Signature'];
	$Checksheet_events_table=$Checksheetno."_events";
	
			   $CascTS ="SELECT T_update FROM ".$Checksheetno." ORDER BY T_update DESC LIMIT 1 ";   //Get the latest T_update from the Timestamp field of the Checksheet.
			$resultmainTS = mysqli_query($dbc, $mainTS) or die ("Aitn"); 							
					while ($rowmainTS=mysqli_fetch_array($resultmainTS)) {
		$Timestamp=$rowmainTS['T_update'];       }
		
		
		
		
	if (file_exists(CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".".$Timestamp.".txt")) {  //If there is a current cached Checksheet
	$file = CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".".$Timestamp.".txt";
$CHcached = unserialize(implode('',file($file)));




	foreach($CHcached  as $casc_id) {     //The "order of checksheet  no." AS "The checksheet_id" array.
	$Checksheetno=$casc_id[0];   //The "Checksheet Name"
		$sealable=$casc_id[1];       //If the checksheet is sealable
		$sealed=$casc_id[2];			// If the checksheet is sealed
		$Signature=$casc_id[3];		// If it IS sealed -- who sealed it				
		$Cats=$casc_id[4];
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
			$Checksheet_events_table=$Checksheetno."_events"; //if the checksheet is the primary checksheet, don't put anything in the merged and merger columns.
		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),'$ID','$q_set')"; //get event id for data insert
		mysqli_query($dbc,$querystartid);
		$EV_set = mysqli_insert_id($dbc);
			//print("This is the $q_set");	
$CH[]=array($id=>array('0'=>$Checksheetno,'1'=>$sealable,'2'=>$sealed,'3'=>$Signature,'4'=>$EV_set)); //Start the array of checksheets that will include categories. Main Chacksheet First"0".
	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {
		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
		//print("$CATEGORY<BR>\n");
		//print_r2($catname[1]);
		$CH[count($CH)-1][$id][5][]=array($catarray_id=>array('0'=>$CATEGORY));  //Add Merged Categories
	foreach($Catarray as $Subcatrow)	{
	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
		$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
		//print("$SUBCATEGORY<BR>\n");
		//print("$SUBCATCOLS<BR>\n");
		//print_r2($Itemsarray);
		$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$catarray_id][1][]=array($subcatarray_id=>array($SUBCATEGORY,$SUBCATCOLS));  //Add Merged Subcategories
	foreach($Itemsarray as $Itemstuff)	{
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
	$HowMany=$Itemstuff[2];
		$perishable=$Itemstuff[3];
	$req=$Itemstuff[4];
		//print_r2($Itemstuff);
		//print("$Itemname<BR>\n");
	//print("$HowMany<BR>\n");
		//print("$Item_id<BR>\n");
$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$catarray_id][1][count($CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$catarray_id][1])-1][$subcatarray_id][2][]=array($Item_id,$Itemname,$HowMany,$perishable,$req);  //Add Merged Subcategories
    
	if ($req == 1) { $REQ[]=array($Rid,$Item_id,$Itemname,$HowMany,$perishable,$req); }
	}
	}}
		}}
	}










} else { 

		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),".$ID.",".$q_set.")"; //get event id for data insert
		mysqli_query($dbc,$querystartid);
		$EV_set = mysqli_insert_id($dbc);

		$CH[] = array($rowcasc['id']=>array('0'=>$rowcasc['ChecksheetName'],'1'=>$rowcasc['sealable'],'2'=>$rowcasc['sealed'],'3'=>$rowcasc['Signature'],'4'=>$EV_set));  //Add Merged Checksheets 

		$CHcache= array($rowcasc['id']=>array('0'=>$rowcasc['ChecksheetName'],'1'=>$rowcasc['sealable'],'2'=>$rowcasc['sealed'],'3'=>$rowcasc['Signature']));  //Add Merged Checksheets 



 $sqltab ="SELECT DISTINCT $Checksheetno.category_id,Category.* FROM $Checksheetno,Category WHERE $Checksheetno.category_id = Category.category_id";
	$resulttab = mysqli_query($dbc, $sqltab) or die ("can't get the setvartabs selection.");  //Second, Get the Categories in those Checksheets.
		while ($rowtab=mysqli_fetch_array($resulttab)) {
			$cat_id=$rowtab[category_id];
			$cat_name=$rowtab[category_name];

		$CH[count($CH)-1][$id][5][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories

$CHcache[$id][4][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories



 $sqlcatsub2 ="SELECT DISTINCT $Checksheetno.subcategory_id, Subcategory.* FROM $Checksheetno,Subcategory WHERE $cat_id = $Checksheetno.category_id AND $Checksheetno.subcategory_id = Subcategory.subcategory_id ";
	$resultcatsub2 = mysqli_query($dbc, $sqlcatsub2) or die ("can't get the CatSub2 selection.");  //Third, Get the Subcategories in those Categories.
			//////Getting the CatSub selections./////////////////////////////////////////////
			while ($rowcatsub2=mysqli_fetch_array($resultcatsub2)) {
				$sub=$rowcatsub2[subcategory_id];
				$sub_name=$rowcatsub2[subcategory_name];
				$cols=$rowcatsub2[cols];
		
		$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1][]=array($sub=>array($sub_name,$cols));  //Add Merged Subcategories
		$CHcache[$id][4][count($CHcache[$id][4])-1][$cat_id][1][]=array($sub=>array($sub_name,$cols));  //Add Merged Subcategories

//////// Start the Items fields from the category and place them under the header.  Start a count to create columns specified in the Subcategory field.///////////////////////////
	//print("$cat_id\n<br>");
	$sql2items= "SELECT $Checksheetno.*,Items.* FROM $Checksheetno,Items WHERE  $cat_id = $Checksheetno.category_id AND $sub = $Checksheetno.subcategory_id AND Items.item_id = $Checksheetno.item_id";
		$result2items = mysqli_query($dbc, $sql2items) or die ("can't get the Items selection");
//		$resultitems = mysqli_query($dbc, $sqlitems);

  while ($rowitems=mysqli_fetch_array($result2items)) { 
			$cols=colcount($rowitems[subcategory_id]);
			$CHid=$rowitems[item_id];
			$itemname=$rowitems[item_name];
			$hm = hmidtoname($rowitems[hm_value_id]);
			$perishable=$rowitems[perishable];
			$req=$rowitems[req];


$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1][count($CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

$CHcache[$id][4][count($CHcache[$id][4])-1][$cat_id][1][count($CHcache[$id][4][count($CHcache[$id][4])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

if ($req == 1) { $REQ[]=array($Rid,$CHid,$Itemname,$hm,$perishable,$req); }
}



	}

}

$chk_cache = serialize($CHcache);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".".$Timestamp.".txt","w");//CACHE THE cascading checksheet list into the cache file, <CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.$Timestamp".txt">
fputs($fp, $chk_cache);
fclose($fp);


}
}
//print_r2($CHcache);


}
$chk_cache = serialize($CH);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".txt","w");//CACHE THE cascading checksheet list into the cache file, <CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".txt">
fputs($fp, $chk_cache);
fclose($fp);
//print_r2($CH);
if(file_exists(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt")) {
	unlink(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt"); }
$chk_cache = serialize($REQ);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt","w");//CACHE THE required data for quicker verification.
fwrite($fp, $chk_cache);
fclose($fp);


    require_once('inc/validate.inc.php'); // bring in the requirement validation of form


	require_once('inc/setvartabs.inc.php'); // bring in the setvartabs.inc.php.
setvartabs($CH);	//get the tabs ready from the $CH array. 
delaybody();		//post delayscript() script.

//print ("Line 968 \n"); print_r2($CH); 

//print_r2($CacheCH);
//print_r2($CHcache);

//print_r2($CHcached);
//foreach($REQ as $ritems => $rname) {
 //   print_r2($rname);
   //    print("".$rname[2]."");
     // foreach($rname as $reqname) {
       //   print("$reqname[2]"); }
 //   }
//print_r2($REQ);
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//	// The breakdown of all of array formed.
//	foreach($CH as $no) {       //The "array" AS the "order of checksheet  no."
//	foreach($no as $casc_id) {     //The "order of checksheet  no." AS "The checksheet_id" array.
//		$Checksheetno=$casc_id[0];   //The "Checksheet Name"
//		//$sealable=$casc_id[1];       //If the checksheet is sealable
//		//$sealed=$casc_id[2];			// If the checksheet is sealed
//		//$Signature=$casc_id[3];		// If it IS sealed -- who sealed it
//		//$qset=$casc_id[5];				
//		$Cats=$casc_id[4];
//		//print("$Checksheetno<BR>\n");
//		//print_r2($Cats);
//	foreach($Cats as $Checkrow)	{
//	foreach($Checkrow as $catarray_id =>  $catname) {
//		$CATEGORY=$catname[0];
//		$Catarray=$catname[1];
//		//print("$CATEGORY<BR>\n");
//		//print_r2($catname[1]);
//	foreach($Catarray as $Subcatrow)	{
//	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
//		$SUBCATEGORY=$subcatname[0];
//		$SUBCATCOLS=$subcatname[1];
//		$Itemsarray=$subcatname[2];
//		//print("$SUBCATEGORY<BR>\n");
//		//print("$SUBCATCOLS<BR>\n");
//		//print_r2($Itemsarray);
//	foreach($Itemsarray as $Itemstuff)	{
//		$Item_id=$Itemstuff[0];
//		$Itemname=$Itemstuff[1];
//		$HowMany=$Itemstuff[2];
//		$perishable=$Itemstuff[3];
//		$req=$Itemstuff[4];
//		//print_r2($Itemstuff);
//		//print("$Itemname<BR>\n");
//		//print("$HowMany<BR>\n");
//		//print("$Item_id<BR>\n");
//      }
//		}}
//		}}
//		}}
//
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
		<INPUT TYPE="button" value="Append Maintenance" onClick="window.open('Maintenance.php?checksheet=<?echo $ID?>')">
<INPUT TYPE="button" value="View Printable Checksheet!" onClick="window.open('tmp/<?echo $_POST['checksheet']?>print.html')">
<INPUT TYPE="button" value="View Requesition Order!" onClick="window.open('tmp/<?echo $_POST['checksheet']?>order.html')">
<FORM  ID="Main" name="mainCheckSheet" ACTION="<?php echo  $_SERVER['PHP_SELF'];?>" METHOD="POST" onSubmit="return checkForm(this);">
 <center><INPUT TYPE="submit"  NAME="Update"  ID="Main" VALUE="Update" >
<div class=page>

	<input type='hidden' name='checksheet' value='<?php echo $_POST['checksheet'] ?>' />

<?

	require_once('inc/getcat.inc.php'); // bring in the functions.
	//require_once('inc/category_select.inc.php'); // bring in the functions.
getcat($CH); //Place the Tabs prepaired from the setvartabs function
//Now place the stuff under the tabs.
$cattab=1;  // start the count

foreach($CH as $no) {
foreach($no as $casc_ID=>$casc_id) {
		$Checksheetno=$casc_id[0];
		$sealable = $casc_id[1];//print("Sealable: ".$sealable."<br>\n");
		$sealed = $casc_id[2];// print("Sealed: ".$sealed."<br>\n");
		$Signature = _user_idtoname($casc_id[3]);
		$q_set = $casc_id[4];
		$Cats=$casc_id[5];
//		print("Over the $casc_ID<br>");
//print("The casc_ID is $casc_ID<BR>\n");
//		//print_r2($Cats);

	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {

		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
			//print_r2($Catarray);
				$cat_id=$catarray_id;
			if ($cattab == 1) { //if it's the first tab--visible
				print("<div id='tab$cattab' class='tabContent'  style='display:block'><br>\n");
			}
			else { //if it's not the first tab--hidden
				print("</div><div id='tab$cattab' class='tabContent'><br>\n");
			}

			$cattab=$cattab+1;


		//print("$CATEGORY<BR>\n");
		//print_r2($catname[1]);


/*
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		The Seal Deal
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

 if ($sealable == 1 ) {


		//print("Line 853"); print_r2($Cats);
	if ($sealed != NULL || $sealed != 0) { // If it's sealable and sealed...

	include('inc/sealable.inc.php');  // Sealable
		//print("This is the casc_ID: ".$casc_ID."<br>");

						 } else {// If it's sealable but not sealed... 

					//print("Checksheetno. : ".$Checksheetno."\n");
			
			?>
			<br><INPUT TYPE="button" value="Apply a Seal" onClick="window.open('sealbox.php?checksheet=<?php echo $Checksheetno ?>')">
			<?php
			
			//print_r2($Catarray);
			include("inc/category_select2.inc.php");
			//category_select($Catarray,$casc_ID,$catarray_id,$q_set);

			include("inc/SealBoxArray.inc.php");
			//print_r2($casc_id);
			//}
			//print("Checksheetno. : ".$Checksheetno."\n");
}
 } 
////////////////////////////////////////////////////////////////////////////////////////////
//     End of "If Sealable?"
//












////////////////////////////////////////////////////////////////////////////////////////////
 else {   // Not Sealable

			include("inc/category_select2.inc.php");
			//category_select($Catarray,$casc_ID,$catarray_id,$q_set);
}
*/

			include("inc/category_select2.inc.php");
			//category_select($Catarray,$casc_ID,$catarray_id,$q_set);





} //End of foreach $Checksheetno
	 }}   // End of For each Category
	} // End of for each $CH

  mysqli_close($dbc);

	print("\n<input type=\"hidden\" name=\"CHqset[".$casc_ID."]\" value=\"".$q_set."\">\n");







?>
 <center><INPUT TYPE="submit"  NAME="Update"  ID="Main" VALUE="Update" >

 </FORM>
<?php


 
//print ("Line 930 \n"); print_r2($CH); 
print ("</div>");
print ("<div style=clear:all;>");

foreach($CH as $no) {
foreach($no as $casc_ID=>$casc_id) {

	smaintmerge($casc_ID,$q_set);  //Merge the Maintenance data to the Requisition and Checksheet order.
}
}
echo"</div>";
 } 
//print_r2($REQ);
//print_r2($Chqset);
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//    End of First Checksheet
//
/////////////////////////////////////////////////////////////////////////////////////////////////////
} else {   //  If you're not logged in 

	  // Generate the navigation menu
    echo ' <a href="login.php">Log In</a><br />';
    echo ' <a href="signup.php">Sign Up</a>';
 } 

?>

</div>



 <? require("inc/footer.inc");  ?>
</body>

</html>

