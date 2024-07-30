<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
 require_once("inc/functions.php.inc");
  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');
    $Title="Checksheet Editing Catcher";
  require_once('inc/title.php');

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
	
    echo ' <a href="viewprofile.php">View Profile</a><br />';
    echo ' <a href="editprofile.php">Edit Profile</a><br />';
    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br />';
	print ("<a href=index.php>HOME</a>\n");

	
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
	if (!empty($_POST['Checksheetname']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {

$Checksheetname=($_POST['Checksheetname']);
	 print("<div><center><h1>$Checksheetname</h1></center></div>"); // Header Checksheet Name

//print($_POST['kp']);
$kp=$_POST['kp'];
//print_r2($_POST[$kp]);
if ($_POST['update_editing']) {
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
?>
<form name="update_editing" ID="update_editing" ACTION="checksheet_ajax_edit.php" METHOD="post" >
<?php
	
	print("<input type=hidden  value=$Checksheetname name=Checksheetname />");
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
			if (!empty($_POST['catdelete']) ) { 
				?>
				<fieldset>
				<legend>Confirm Category Deletion</legend>
				<?php	
				//if eliminating a category
		foreach ($_POST['catdelete'] as $Elim_cat_id) {
	print("<div style=\"color:red;font-size:2em;\">Are you sure you want to delete this Category?</div>\n");
		print("<div style=\"color:red;\">If you delete this Category, all of the following will be deleted: </div>");
    $sqlcat ="SELECT DISTINCT $Checksheetname.category_id, Category.* FROM $Checksheetname,Category WHERE $Checksheetname.category_id = Category.category_id AND $Checksheetname.category_id = $Elim_cat_id";
			$resultcat = mysqli_query($dbc, $sqlcat) or die ("can't get the Checksheet confirm selection1.");  
while ($rowcat=mysqli_fetch_array($resultcat)) {
			$category=$rowcat['category_id'];
			$category_name=$rowcat['category_name'];
print("<ul>$category_name");
		$sqlsub="SELECT DISTINCT $Checksheetname.subcategory_id, Subcategory.* FROM $Checksheetname,Subcategory WHERE $Checksheetname.subcategory_id = Subcategory.subcategory_id AND $category = $Checksheetname.category_id";
			$resultsub = mysqli_query($dbc, $sqlsub) or die ("can't get the Checksheet Confirmation selection2."); 
		while ($rowsub=mysqli_fetch_array($resultsub)) {
			$Checksheetcatsub_id=$rowsub['id'];
			$subcategory=$rowsub['subcategory_id'];
			$subcategory_name=$rowsub['subcategory_name'];				
print("<ul>$subcategory_name");
		$sqlitem = "SELECT DISTINCT $Checksheetname.item_id, Items.* FROM $Checksheetname,Items WHERE $Checksheetname.item_id = Items.item_id AND $category = $Checksheetname.category_id AND $subcategory = $Checksheetname.subcategory_id";
			$resultitem = mysqli_query($dbc, $sqlitem) or die ("can't get the Checksheet selection3."); 
		while ($rowitem = mysqli_fetch_array($resultitem)) {
			$Checksheetcatsubitem_id = $rowitem['id'];
			$item = $rowitem['item_id'];
			$item_name=$rowitem['item_name'];
print("<li style=\"font-size:0.8em;\">$item_name");


print("</li>\n");	}
print("</ul>\n");	} //End of the Subcateory Confirm List
print("</ul>\n");	} // <!--End of Category Confirm List-->
echo"<label>Confirm Deletion of Entire Category</label><input type=checkbox  value=$category name=catdelete[] />";
			?>
				</fieldset>
				<?php
} 

   }		
			if (!empty($_POST['subcatdelete']) ) { // if eliminating a subcategory.
			//print_r($_POST['subcatdelete']);
		foreach ($_POST['subcatdelete'] as $Elim_subcat_id) {
					$pk=explode(":",$Elim_subcat_id);
			$category_id=$pk[0]; 
			$subcategory_id=$pk[1];
				?>
				<fieldset>
				<legend>Confirm Subcategory Deletion</legend>
				<?php
	print("<div style=\"color:red;font-size:2em;\">Are you sure you want to delete this Subcategory?</div>\n");
		print("<div style=\"color:red;\">If you delete this Subcategory, all of the following will be deleted: </div>");

		$sqlsub="SELECT DISTINCT $Checksheetname.category_id,$Checksheetname.subcategory_id,Subcategory.* FROM $Checksheetname, Subcategory WHERE $Checksheetname.category_id = $category_id AND $subcategory_id = Subcategory.subcategory_id AND '".$subcategory_id."' = $Checksheetname.subcategory_id";
			$resultsub = mysqli_query($dbc, $sqlsub) or die ("can't get the Checksheet Confirmation selection2."); 
		while ($rowsub=mysqli_fetch_array($resultsub)) {
			$Checksheetcatsub_id=$rowsub['id'];
			$category_id=$rowsub['category_id'];
			$subcategory=$rowsub['subcategory_id'];
			$subcategory_name=$rowsub['subcategory_name'];				
print("<ul>$subcategory_name"); 
		$sqlitem = "SELECT $Checksheetname.*,Items.*,Category.*,Subcategory.* FROM $Checksheetname,Category, Subcategory, Items WHERE $Checksheetname.item_id = Items.item_id AND  $Checksheetname.subcategory_id = Subcategory.subcategory_id AND $Checksheetname.category_id = Category.category_id AND '".$subcategory_id."' = $Checksheetname.subcategory_id AND '".$category_id."' = $Checksheetname.category_id";
			$resultitem = mysqli_query($dbc, $sqlitem) or die ("can't get the Confirm Checksheet selection3."); 
		while ($rowitem = mysqli_fetch_array($resultitem)) {
			$Checksheetcatsubitem_id = $rowitem['id'];
			$item = $rowitem['item_id'];
			$item_name=$rowitem['item_name'];
print("<li style=\"font-size:0.8em;\">$item_name");
print("</li>\n");	}
print("</ul>\n"); 	} //End of the Subcateory Confirm List }

			
			print("<label>Confirm Subcategory Deletion</label>\n");
			print("<input type=\"checkbox\"  value=\"".$Elim_subcat_id."\"  name=\"subcatdelete[]\" />\n");
			print("</fieldset>\n");
} 
	}

			if (!empty($_POST['subcatitemdelete']) ) {  // if eliminating an Item.
				//print_r2($_POST['subcatitemdelete']);
				//print("<ul>");
		foreach ($_POST['subcatitemdelete'] as $Elim_item_id) {		$sqlitem = "SELECT DISTINCT * FROM $Checksheetname, Items  WHERE '".$Elim_item_id."' = $Checksheetname.id AND $Checksheetname.item_id = Items.item_id";
			$resultitem = mysqli_query($dbc, $sqlitem) or die ("can't get the Confirm Checksheet selection3."); 
		while ($rowitem = mysqli_fetch_array($resultitem)) {
			$id = $rowitem['id'];
			$item = $rowitem['item_id'];
			$item_name=$rowitem['item_name'];
print("<li style=\"font-size:0.8em;\"><label>Confirm ".$item_name." Deletion</label><input type=checkbox  value=$id name=subcatitemdelete[] />");

print("</li>\n");	} 
}	print("</ul>"); }



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  Adding Items
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////
		
			$ItemA=$_POST['ItemAdd'];
 			if (!empty($ItemA) ) {
		//print_r2 ($ItemA);
		foreach ($ItemA as $category_id=>$subcategory_id)  { // if Adding an Item.
			
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			foreach($subcategory_id as $subcategory_id=>$set){
					$Add_item_id = $set[i];
					$HM= $set[h];
			//print("Item_id ".$Add_item_id."<br>");
			//print("Category ".$category_id."<br>");
			//print("Subcategory ".$subcategory_id."<br>");
			if($Add_item_id) {

	print("<table border=\"1\" width=\"100%\"><tr style=\"background-color:blue;text-align:center;font-size:14pt;\"><td style=\"padding:10pt;\"><strong>Category</strong></td><td style=\"padding:10pt;\"><strong>Subcategory</strong></td><td style=\"padding:10pt;\"><strong>Item</strong></td><td style=\"padding:10pt;\"><strong>Type</strong></td><td style=\"padding:10pt;\"><strong>Required</strong></td></tr>");
			print("<tr>");
                    $sqladdcat ="SELECT DISTINCT * FROM Category  WHERE category_id = $category_id";
			$resultaddcat = mysqli_query($dbc, $sqladdcat) or die ("can't get the Checksheet sqladdcat selection.");
	while ($rowaddcat=mysqli_fetch_array($resultaddcat)) {
                                           $NEWCat=  $rowaddcat['category_name'];
                                           $NEWCat_id=  $rowaddcat['category_id'];
                print ("<td style=\"padding:15pt;\">$NEWCat</td>");
} 
                    $sqladdsubcat ="SELECT DISTINCT * FROM Subcategory  WHERE subcategory_id = $subcategory_id";
			$resultaddsubcat = mysqli_query($dbc, $sqladdsubcat) or die ("can't get the Checksheet sqladdsubcat selection.");
	while ($rowaddsubcat=mysqli_fetch_array($resultaddsubcat)) {
                                           $NEWSubCat=  $rowaddsubcat['subcategory_name'];
                                           $NEWSubCat_id=  $rowaddsubcat['subcategory_id'];
                print ("<td style=\"padding:15pt;\">$NEWSubCat</td>");
} 
                    $sqladditem ="SELECT DISTINCT * FROM Items  WHERE item_id = $Add_item_id";
			$resultadditem = mysqli_query($dbc, $sqladditem) or die ("can't get the Checksheet sqladditem selection.");
	while ($rowadditem=mysqli_fetch_array($resultadditem)) {
                                           $NEWItem=  $rowadditem['item_name'];
                                           $NEWItem_id=  $rowadditem['item_id'];
                print ("<td style=\"padding:15pt;\">$NEWItem</td>");
} 
                    $sqladdhm ="SELECT DISTINCT * FROM How_Many  WHERE hm_value_id = $HM";
			$resultaddhm = mysqli_query($dbc, $sqladdhm) or die ("can't get the Checksheet sqladdhm selection.");
	while ($rowaddhm=mysqli_fetch_array($resultaddhm)) {
                                           $NEWhm=  $rowaddhm['hm_name'];
                                           $NEWhm_id=  $rowaddhm['hm_value_id'];

                print ("<td style=\"padding:15pt;\">$NEWhm</td>");
	if (($NEWhm_id == '16') || ($NEWhm_id == '17') || ($NEWhm_id == '19') || ($NEWhm_id == '21') ||($NEWhm_id ==  '22') ||($NEWhm_id ==  '26' )|| ($NEWhm_id == '24') ) {  print ("<td><label>Do you want to set the \"Required\" parameter on this Item?</label>\t<Input type=hidden name=name=ItemAdd[".$NEWItem_id."][r] value=0>\n<input type=checkbox  value=1 name=ItemAdd[".$NEWItem_id."][r] checked /></td>"); 
						} else {print("<td></td>"); }

} 


	print("<input type=hidden  value=".$NEWCat_id." name=ItemAdd[".$NEWItem_id."][c] />");
	print("<input type=hidden  value=".$NEWSubCat_id." name=ItemAdd[".$NEWItem_id."][s] />");
	//print("<input type=hidden  value=".$NEWItem_id." name=ItemAdd[".$NEWItem_id."][i] />");
	print("<input type=hidden  value=".$NEWhm_id." name=ItemAdd[".$NEWItem_id."][h] />");







print("</tr>");
  }  }   }     print("</table>");       } 

 echo"<center><INPUT TYPE='submit'  NAME='update_editing'  ID='update_editing' VALUE='Continue' ></center>";
?>
</form>
<?php
 }   //end if Update via already listed items.

				if($_POST['update_additem']) {

	
				if($_POST['IAdd'] && $_POST['CategoryAdd'] && $_POST['SubcategoryAdd'] && $_POST['HMAdd'])  { 
?>
<form name="update_additem" ID="update_additem" ACTION="checksheet_edit.php" METHOD="post" >
<?php
	
	print("<input type=hidden  value=$Checksheetname name=Checksheetname />");
			print("You have requested to add new Item:\n<br><br><table><tr>".
			"<td><h3>".catidtoname($_POST['CategoryAdd'])."</h3>\n</td><td></td><td></td><td></td></tr>".
			"<tr><td></td><td><h4> ".subcatidtoname($_POST['SubcategoryAdd'])."</h4>\n</td><td></td><td></td></tr>".
			"<tr><td></td><td></td><td> ".ItemidtoName($_POST['IAdd'])."\n</td><td>".
			"  (".hmidtoname($_POST['HMAdd']).")\n</td></tr></table>");
			
		
	if (($_POST['HMAdd'] == '16') || ($_POST['HMAdd'] == '17') || ($_POST['HMAdd'] == '19') || ($_POST['HMAdd'] == '21') ||($_POST['HMAdd'] ==  '22') ||($_POST['HMAdd'] ==  '26' )|| ($_POST['HMAdd'] == '24') ) {  print ("<label>Do you want to set the \"Required\" parameter on this Item?</label>\t<Input type=hidden name=name=ItemAdd[".$_POST['IAdd']."][r] value=0>\n<input type=checkbox  value=1 name=ItemAdd[".$_POST['IAdd']."][r] checked />");  
						}

	print("<input type=hidden  value=".$_POST['CategoryAdd']." name=ItemAdd[".$_POST['IAdd']."][c] />");
	print("<input type=hidden  value=".$_POST['SubcategoryAdd']." name=ItemAdd[".$_POST['IAdd']."][s] />");
	//print("<input type=hidden  value=".$_POST['IAdd']." name=ItemAdd[][i] />");
	print("<input type=hidden  value=".$_POST['HMAdd']." name=ItemAdd[".$_POST['IAdd']."][h] />");
 echo"<center><INPUT TYPE='submit'  NAME='update_additem'  ID='update_additem' VALUE='Continue' ></center>";
print("</form>");
					} else {  print("Make Sure that ALL of the fields are filled when creating a new Item.");
}

}
// Select the Options. 
}
