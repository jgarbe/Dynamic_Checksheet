<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
    $Title="Checksheet Editing";
  require_once('inc/title.php');
 require_once("inc/functions.php.inc");
  require_once('inc/connectvars.php');
print("<script type=\"text/javascript\" src=\"http://code.jquery.com/ui/1.11.2/jquery-ui.min.js\"></script>\n");
print("  <!-- jQuery call to the accordion() method. --> \n");
 print("   <script>  \n");
 print("       	$(document).ready(function() {\n");
 print("   			$(\"#accordion\").accordion(\n");
 print("   				{ \n");
 print("   					event: \"dblclick\",\n");
 print("   					collapsible: true,\n");
 print("   					active: false \n");
 print("   				});\n");
 print("   	    });\n");
 print("   	</script>\n");
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
?>
</div>
		 
<?php
	if (!empty($_POST['Checksheetname']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
$Checksheetname=($_POST['Checksheetname']);
	 print("<div><center><h1>".$Checksheetname."</h1></center></div>"); // Header Checksheet Name
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
/****************************************
 * 
 * 
 * Adding an Item to the Checksheet
 * 
 * ****************************************/
if(!empty($_POST['ItemAdd'])) {
$Itemadding=$_POST['ItemAdd'];
	foreach($Itemadding as $item_id=>$Itemputting) {
		$reqput=$Itemputting[r];
		$subcategoryput=$Itemputting[s];
		$howmanyput=$Itemputting[h];
		$categoryput=$Itemputting[c];
	print("".$item_id."");
	print("".$reqput."");
	print("".$subcategoryput."");
	print("".$howmanyput."");
	print("".$categoryput."");
		//print_r($Itemputting);
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$set_query="INSERT INTO ".$Checksheetname."(id, item_id, category_id, subcategory_id, hm_value_id,req) VALUES(0,'".$item_id."', '".$categoryput."', '".$subcategoryput."', '".$howmanyput."','".$reqput."')";
				mysqli_query($dbc,$set_query) or die("can't sqlset"); mysqli_close($dbc);
print("The Item, ".ItemidtoName($item_id)." has been successfully added.");		
}   }


/************************************************
 * 
 * 
 * End Adding an item to the checksheet
 * 
 * 
 * **********************************************/
//////////////////////////////////////////////////////////////////////////////
/*************************************************
 * 
 * 
 * 
 * If Eliminating an entire category
 * 
 * 
 * 
 * 
 * ****************************************************/



  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
			if (!empty($_POST['catdelete']) ) { //if eliminating a category
				//print_r($_POST['catdelete']);
		foreach ($_POST['catdelete'] as $Elim_cat_id) {
			$delquery="DELETE FROM ".$Checksheetname." WHERE '".$Elim_cat_id."' = ".$Checksheetname.".category_id";
			mysqli_query($dbc, $delquery) or die('Error in editing database');
			print("The Category, ".catidtoname($Elim_cat_id)." has been effectively deleted.");
			}
}

/*****************************************************
 * 
 * End if Eliminating a Category
 * 
 * 
 * *****************************************************/
 /*************************************************
 * 
 * 
 * 
 * If Eliminating an entire Subcategory
 * 
 * 
 * 
 * 
 * ****************************************************/
			if (!empty($_POST['subcatdelete']) ) { // if eliminating a subcategory.
		foreach ($_POST['subcatdelete'] as $Elim_subcat_id) {
			$pk=explode(":",$Elim_subcat_id);
			$category_id=$pk[0]; 
			$subcategory_id=$pk[1];
			$delquery="DELETE  FROM ".$Checksheetname." WHERE ".$Checksheetname.".category_id = ".$category_id." AND ".$subcategory_id." = ".$Checksheetname.".subcategory_id";
			mysqli_query($dbc,$delquery) or die('Error in editing row in database'); }
}	
/*************************************************
 * 
 * 
 * 
 * End If Eliminating an entire Subcategory
 * 
 * 
 * 
 * 
 * ****************************************************/
/*************************************************
 * 
 * 
 * 
 * If Eliminating an Item
 * 
 * 
 * 
 * 
 * ****************************************************/
			if (!empty($_POST['subcatitemdelete']) ) { // if eliminating an Item.
		foreach ($_POST['subcatitemdelete'] as $Elim_item_id) {
			$delquery="DELETE  FROM ".$Checksheetname." WHERE ".$Elim_item_id." = ".$Checksheetname.".id";
			mysqli_query($dbc,$delquery) or die('Error in editing row in database'); }
}
/*************************************************
 * 
 * 
 * 
 *End If Eliminating an Item
 * 
 * 
 * 
 * 
 * ****************************************************/
//////////////////////////////////////////////////////////////////////////////


/****************************************
 * 
 * 
 * If this checksheet is merged intoa nother Checksheet- test
 * 
 * 
 * *****************************************/
    $sqlmerg ="SELECT DISTINCT merged FROM Checksheets WHERE '".$Checksheetname."' = Checksheets.ChecksheetName";
			$resultmerg = mysqli_query($dbc, $sqlmerg) or die ("can't get the Merged selection.");  
while ($rowmerg=mysqli_fetch_array($resultmerg)) {//Check for merge
	if ($rowmerg['merged']) {// If this Checksheet is part of another Checksheet.
	
	$mergel = checksheet_idtochecksheetname($rowmerg['merged']);
	$merged = checksheet_idtochecksheetname($rowmerg['merged'])."/";

print("<div style=\"background-color:#214845;text-align:center;\">");
print("".$Checksheetname." is merged into the Checksheet, ".$mergel.".");
print("</div>"); }
else {

print("<div style=\"background-color:#214845;text-align:center;\">");
print("".$Checksheetname." is not currently merged into another Checksheet.");
print("</div>");}
}



/****************************************
 * 
 * 
 * ENd If this checksheet is merged intoa nother Checksheet- test
 * 
 * 
 * *****************************************/




print("<div>");

echo"<br><hr><br><div><h2>Categories, Subcategories, and Items of ".$merged."".$Checksheetname."</h2></div>";

?>





<form name="update_editing" ID="update_editing" ACTION="Ch_Edit_Catcher.php" METHOD="post" >
<table>
<TR><td style="text-align:center;"><label>Category</label></TD>
<td style="text-align:center;"><label>Subcategy</label></td>
<td style="text-align:center;"><label>Items</label></TD>
</TR>
<?php

/////////////////////////////////////////////////
///////////////////////////////////////////////////


  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
//$ItemAdd=Array();
    $sqlcat ="SELECT DISTINCT ".$Checksheetname.".category_id,Category.* FROM ".$Checksheetname.",Category WHERE ".$Checksheetname.".category_id = Category.category_id";
			$resultcat = mysqli_query($dbc, $sqlcat) or die ("can't get the Checksheet selection1.");  
//////See the Categories./////////////////////////////////////////////
while ($rowcat=mysqli_fetch_array($resultcat)) {
			$category=$rowcat['category_id'];
			$category_name=$rowcat['category_name'];



?>
<tr bgcolor="#000273">
<td><h3><?php echo"".$category_name.""; ?></h3></td>
<?php
echo"<td ><label>Remove Entire Category</label><input type=\"checkbox\"  value=\"".$category."\" name=\"catdelete[]\" />";
?>
 </TD>
<td></td>
<TD>

</TD>
</TR>

<?php
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////	
//print("  Category: ". $category." <br />\n");
//print("  Checksheet Name: ". $Checksheetname." <br />\n");
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sqlsub="SELECT DISTINCT ".$Checksheetname.".subcategory_id,Subcategory.* FROM ".$Checksheetname.",Subcategory WHERE ".$Checksheetname.".subcategory_id = Subcategory.subcategory_id AND ".$Checksheetname.".category_id = '".$category."' ";
			$resultsub = mysqli_query($dbc, $sqlsub) or die ("can't get the Checksheet selection2."); 
		while ($rowsub=mysqli_fetch_array($resultsub)) {
			$subcategory=$rowsub['subcategory_id'];
			$subcategory_name=$rowsub['subcategory_name'];

print("<td></td>  \n");
print("<td style=\"border-bottom-style:dotted;border-top-style:solid;border-color:gray;\"> \n");
print(" <h5>".$subcategory_name."</h5></td>  \n");

echo"<td style=\"border-bottom-style:dotted;border-top-style:solid;border-color:gray;\"><label>Remove Subcategory</label><input type=\"checkbox\"  value=\"".$category.":".$subcategory."\" name=\"subcatdelete[]\" />";
?>
</TD>
<TD style="border-top-style:solid;border-color:gray;"></TD>
</TR>
<?php

////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
	
		$sqlitem = "SELECT DISTINCT * FROM ".$Checksheetname.",Items WHERE ".$Checksheetname.".item_id = Items.item_id AND ".$category." = ".$Checksheetname.".category_id AND ".$subcategory." = ".$Checksheetname.".subcategory_id";
			$resultitem = mysqli_query($dbc, $sqlitem) or die ("can't get the Checksheet selection3."); 
		while ($rowitem = mysqli_fetch_array($resultitem)) {
			$id = $rowitem['id'];
			$item = $rowitem['item_id'];
			$item_name=$rowitem['item_name'];
?>

<td></td>
<td></td>
<td style=border-bottom-style:dotted;border-color:gray;><h5><?php echo"".$item_name.""; ?></h5></td>
<?php
echo"<td style=border-bottom-style:dotted;border-color:gray;><label>Remove Item</label><input type=checkbox  value=".$id." name=subcatitemdelete[] />";
?>
</TD>
</TR>
<?php
}
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
print("<tr>\t\n<td></td>\t\n<td></td>\t\n<td style=border-bottom-style:dotted;border-color:gray;>\n");

print("</td>\t\n<td style=border-bottom-style:dotted;border-color:gray;>\n");
$itemoptions="";
			$itemoptions .="<OPTION VALUE=\"\">Add Item Here</OPTION>\n";
    $sqlnegcat3 ="SELECT DISTINCT * FROM Items  WHERE Items.item_id NOT IN (SELECT ".$Checksheetname.".item_id FROM ".$Checksheetname.") ORDER BY item_name";
			$resultnegcat3 = mysqli_query($dbc,$sqlnegcat3) or die ("can't get the Checksheet negcat3 selection.");
	while ($rownegcat3=mysqli_fetch_array($resultnegcat3)) {
			$newitem_id=$rownegcat3['item_id'];
			$newitem_name=$rownegcat3['item_name'];
					//echo"$newcategory_name<br>";

			$itemoptions .="<OPTION VALUE=\"".$newitem_id."\">".$newitem_name."</OPTION>\n";
}
echo"<SELECT NAME=ItemAdd[".$category."][".$subcategory."][i] >\n";
?>

<?=$itemoptions?>
</SELECT> <br>
<?php
///////////////////////////////////////////////////////////////////////////////
//
//
//
////////////////////////////////////////////////////////////////////////////////
print("</td>\t\n<td style=border-bottom-style:dotted;border-color:gray;>\n");
$itemoptions="";
			$itemoptions .="<OPTION VALUE=\"\">Type</OPTION>\n";
    $sqlhm ="SELECT DISTINCT * FROM How_Many";
			$resulthm = mysqli_query($dbc,$sqlhm) or die ("can't get the Checksheet hm selection.");
	while ($rowhm=mysqli_fetch_array($resulthm)) {
			$newhm_id=$rowhm['hm_value_id'];
			$newhm_name=$rowhm['hm_name'];
					//echo"$newcategory_name<br>";

			$itemoptions .="<OPTION VALUE=\"".$newhm_id."\">".$newhm_name."</OPTION>\n";
}
echo"<SELECT NAME=ItemAdd[".$category."][".$subcategory."][h] >\n";
?>

<?=$itemoptions?>
</SELECT> <br>
<?php
print("</td>\n</tr>");
}}
?>
<tr><TD colspan="4" style="padding:1em;">
<input type="hidden" name="Checksheetname" value="<?php echo"".$Checksheetname.""; ?>" > </input>
<?php
 echo"<center><INPUT TYPE='submit'  NAME='update_editing'  ID='update_editing' VALUE='Submit' ></center>";
echo"</form></TD></tr></table>";







print("</div>");

/////////////////////////////////////////////////////////////////
//
//
//
//
//
//
//
  // Beginning of Add Item Form 
//
/////////////////////////////////////////////////////////////////



print("<div><hr><hr>");
?>
<form name="update_additem" ID="update_additem" ACTION="Ch_Edit_Catcher.php" METHOD="post" >

	<table width="100%"><TH width="100%" colspan="4" align="center" valign="bottom" bgcolor="#6C3701">
Create another Category and Subcategory with Item</TH>
<TR style=background-color:#4B3A29>
<TD style="text-align:center;">Add Item</TD>
<td style="text-align:center;">Of Category</td>
<td style="text-align:center;">Of Subcategory</td>
<td style="text-align:center;">Type of Checksheet Item</td>
</TR>


<tr bgcolor="#6C3701">
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<td style="padding:0.5em;text-align:center;">
<?php
//echo"<label>Select Item</label>";
$itemoptions="";
			$itemoptions .="<OPTION VALUE=\"\">Choose</OPTION>\n";
    $sqlnegcat3 ="SELECT DISTINCT * FROM Items  WHERE Items.item_id NOT IN (SELECT ".$Checksheetname.".item_id FROM ".$Checksheetname.") ORDER BY item_name";
			$resultnegcat3 = mysqli_query($dbc,$sqlnegcat3) or die ("can't get the Checksheet negcat3 selection.");
	while ($rownegcat3=mysqli_fetch_array($resultnegcat3)) {
			$newitem_id=$rownegcat3['item_id'];
			$newitem_name=$rownegcat3['item_name'];
					//echo"$newcategory_name<br>";

			$itemoptions .="<OPTION VALUE=\"".$newitem_id."\">".$newitem_name."</OPTION>\n";
}

echo"<SELECT NAME=IAdd >\n";
?>

<?=$itemoptions?>
</SELECT> <br>

</td><!--
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<TD style="padding:0.5em;text-align:center;">
<?php

//echo"<label>Select Category</label>";
$itemoptions="";
			$itemoptions .="<OPTION VALUE=\"\">Choose</OPTION>\n";
    $sqlnegcat1 ="SELECT DISTINCT * FROM Category ORDER BY category_name ASC"; //  WHERE Category.category_id NOT IN (SELECT $Checksheetname.category_id FROM $Checksheetname)";
			$resultnegcat1 = mysqli_query($dbc,$sqlnegcat1) or die ("can't get the Checksheet negcat1 selection.");
	while ($rownegcat1=mysqli_fetch_array($resultnegcat1)) {
			$newcategory_id=$rownegcat1['category_id'];
			$newcategory_name=$rownegcat1['category_name'];
					//echo"$newcategory_name<br>";

			$itemoptions .="<OPTION VALUE=\"".$newcategory_id."\">".$newcategory_name."</OPTION>\n";
}

echo"<SELECT NAME=CategoryAdd >\n";
?>

<?=$itemoptions?>
</SELECT> <br>
</TD><!--
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<td style="padding:0.5em;text-align:center;">
<?php
//echo"<label>Select subcategory</label>";
$itemoptions="";
			$itemoptions .="<OPTION VALUE=\"\">Choose</OPTION>\n";
    $sqlnegcat2 ="SELECT DISTINCT * FROM Subcategory  WHERE Subcategory.subcategory_id ORDER BY subcategory_name ASC"; // NOT IN (SELECT $Checksheetname.subcategory_id FROM $Checksheetname)";
			$resultnegcat2 = mysqli_query($dbc,$sqlnegcat2) or die ("can't get the Checksheet negcat2 selection.");
	while ($rownegcat2=mysqli_fetch_array($resultnegcat2)) {
			$newsubcategory_id=$rownegcat2['subcategory_id'];
			$newsubcategory_name=$rownegcat2['subcategory_name'];
					//echo"$newcategory_name<br>";

			$itemoptions .="<OPTION VALUE=\"".$newsubcategory_id."\">".$newsubcategory_name."</OPTION>\n";
}

echo"<SELECT NAME=SubcategoryAdd >\n";
?>

<?=$itemoptions?>
</SELECT> <br>
</td><!--
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<td style="padding:0.5em;text-align:center;">
<?php
//echo"<label>Select How Many</label>";
$itemoptions="";
			$itemoptions .="<OPTION VALUE=\"\">Choose</OPTION>\n";
    $sqlnegcat4 ="SELECT DISTINCT * FROM How_Many  WHERE How_Many.hm_value_id ORDER BY hm_name ASC"; // NOT IN (SELECT $Checksheetname.subcategory_id FROM $Checksheetname)";
			$resultnegcat4 = mysqli_query($dbc,$sqlnegcat4) or die ("can't get the Checksheet negcat4 selection.");
	while ($rownegcat4=mysqli_fetch_array($resultnegcat4)) {
			$newhm_id=$rownegcat4['hm_value_id'];
			$newhm_name=$rownegcat4['hm_name'];
					//echo"$newcategory_name<br>";

			$itemoptions .="<OPTION VALUE=\"".$newhm_id."\">".$newhm_name."</OPTION>\n";
}

echo"<SELECT NAME=HMAdd >\n";
?>

<?=$itemoptions?>
</SELECT> <br>
</td><!--
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</tr>
<?php



?>

<input type="hidden" name="Checksheetname" value="<?php echo"".$Checksheetname.""; ?>" > </input>
<?php
 echo"<tr><td colspan=4 style=background-color:#4B3A29><center><INPUT TYPE='submit'  NAME='update_additem'  ID='update_additem' VALUE='Submit' ></center></td></tr>";

print("</TR></table>");
echo"</form>";
print("</div>");

}
elseif (empty($_POST['Checksheetname']) && isset($_POST['removech']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) {
	
	print ("<center><h3><a href='checksheet_edit.php'>Back</a></h3></center>\n");

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

    if(is_array($_POST['ConfirmMRemove']))  {
			//print_r2($_POST['ConfirmMRemove']);
      foreach($_POST["ConfirmMRemove"] as $CHMid => $RMID){
       // echo "The Removed Item $CHMid => $RMID \n <br />"; 
						$removequery="DELETE  FROM ".$CHMid." WHERE '".$RMID."' = ".$CHMid.".id";
			mysqli_query($dbc,$removequery) ;
			print("Successfully removed the item from ".$CHMid.".<br />");
	
      }
    


}
mysqli_close($dbc);

}
elseif (empty($_POST['Checksheetname']) && !empty($_POST['removeitemchecksheets']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) {
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		Backend to change multiple checksheets.
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////	

?>
<form name="removech" ID="removech" ACTION="<?php echo $PHP_SELF; ?>" METHOD="post" >
<?php
		$Item_id=$_POST['Item_id'];
	print("".$Item_id."");
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$multichitemsql="SELECT Checksheets.ChecksheetName FROM Checksheets";
	$resultmch=mysqli_query($dbc, $multichitemsql);
	while ($aresultmch=mysqli_fetch_array($resultmch)) {
		$CHlist[]=$aresultmch['ChecksheetName'];
			
	}
	print("<table><tr><td style=border-bottom-style:dotted;border-color:gray;padding:0.5em;text-align:center;>Checksheet</td><td style=border-bottom-style:dotted;border-color:gray;padding:0.5em;text-align:center;>Category</td><td style=border-bottom-style:dotted;border-color:gray;padding:0.5em;text-align:center;>Subcategory</td><td style=border-bottom-style:dotted;border-color:gray;padding:0.5em;text-align:center;>How Many</td><td style=border-bottom-style:dotted;border-color:gray;padding:0.5em;text-align:center;>Required</td><td style=border-bottom-style:dotted;border-color:gray;padding:0.5em;text-align:center;>Confirm</td></tr>");
//	print_r2($CHlist); 
	foreach($CHlist as $CHNAME){
			$ElimCHItemsql="SELECT  C1.id, Cat1.category_name, S1.subcategory_name, HM1.hm_name, C1.req FROM ".$CHNAME." as C1 , Subcategory as S1, Category as Cat1, How_Many as HM1 WHERE C1.category_id =  Cat1.category_id AND C1.subcategory_id = S1.subcategory_id AND C1.hm_value_id = HM1.hm_value_id AND  ".$Item_id." = C1.item_id";
			
			
			
			
	$resultmEch=mysqli_query($dbc, $ElimCHItemsql);
			while ($aresultEmch=mysqli_fetch_array($resultmEch)) {
				$ID=$aresultEmch['id'];
				print("<tr  bgcolor=\"#000273\"><td style=border-bottom-style:dotted;border-color:gray;padding:0.5em;text-align:center;> ".$CHNAME."</td>");
				print("<td style=border-bottom-style:dotted;border-color:gray;;padding:0.5em;text-align:center;> " .$aresultEmch['category_name']."</td>");
				print("<td style=border-bottom-style:dotted;border-color:gray;;padding:0.5em;text-align:center;> " .$aresultEmch['subcategory_name']."</td>");
				print("<td style=border-bottom-style:dotted;border-color:gray;;padding:0.5em;text-align:center;> " .$aresultEmch['hm_name']."</td>");
				print("<td style=border-bottom-style:dotted;border-color:gray;;padding:0.5em;text-align:center;> " .$aresultEmch['req']."</td>");
				print("<td style=border-bottom-style:dotted;border-color:gray;;padding:0.5em;text-align:center;><input type=\"checkbox\" name=\"ConfirmMRemove[".$CHNAME."]\" value=\"".$ID."\">Select for Removal</td></tr>");
	}
		}
	print("</table>");
	mysqli_close($dbc);
	
	?>
	<center><INPUT TYPE="submit"  NAME="removech"  ID="removech" VALUE="Submit" >
</center>
</form>
<?php
	}
elseif (empty($_POST['Checksheetname']) && empty($_POST['removeitemchecksheets']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) {
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
<fieldset>
<legend>Single Checksheet Editing</legend>
<?php
print("<center><H3>Choose a Checksheet which you would like to edit.</H3></center>");

$name=Checksheets;	
			$itemoptions ="<OPTION VALUE=\"\">Choose a Checksheet</OPTION>\n";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name order by id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_chosen_id=$row[0];
				$OName = $row[1];
			
			$itemoptions .="<OPTION VALUE=\"".$OName."\">".$item_chosen_id."--".$OName."</OPTION>\n";
}

echo"<SELECT NAME=Checksheetname >";
?>
Choose 
<?=$itemoptions?>
</SELECT> <br>



 <center><INPUT TYPE="submit"  NAME="editchecksheet"  ID="editchecksheet" VALUE="Submit" >
</center></fieldset>
</form>



<?php mysqli_close($dbc);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
print("<br />");
print("<center><h3><hr></h3></center>");
?>
<form name="removeitemchecksheets" ID="removeitemchecksheets" ACTION="<?php echo $PHP_SELF; ?>" METHOD="post" >
<fieldset>
<legend>Remove an Item from Multiple Checksheets</legend>
<?php
print("<center><H3>Choose an Item.</H3></center>");
$name=Items;	
			$itemoptions ="<OPTION VALUE=\"\">Choose an Item</OPTION>\n";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name." order by item_name asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_chosen_id=$row[0];
				$OName = $row[1];
			
			$itemoptions .="<OPTION VALUE=\"".$item_chosen_id."\">".$item_chosen_id."--".$OName."</OPTION>\n";
}

echo"<SELECT NAME=Item_id >";
?>
Choose 
<?=$itemoptions?>
</SELECT> <br>



 <center><INPUT TYPE="submit"  NAME="removeitemchecksheets"  ID="removeitemchecksheets" VALUE="Submit" >
</center></fieldset>
</form>
<?php
}

mysqli_close($dbc);
?>
<div class="push"></div>
</div>
 <?php require("inc/footer.inc");  ?>
</body>
</html>
