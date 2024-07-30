<?php
//**************************************************************************************//
//											//
//  Get the category and all of the Subcategories and Items in them 			//
//											//
//**************************************************************************************//
 // Written by Jim Garbe
function getcatsubpost($casc_id){

	$Checksheetno=checksheet_idtochecksheetname($casc_id);
echo "\n\n\n\n\n\n";

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
   $sqlcatsub ="SELECT DISTINCT $Checksheetno.category_id,$Checksheetno.subcategory_id FROM $Checksheetno";
			$resultcatsub = mysqli_query($dbc, $sqlcatsub) or die ("can't get the CatSubv selection.");  

		
//////Getting the CatSub selections./////////////////////////////////////////////
while ($rowcatsub=mysqli_fetch_array($resultcatsub)) {
			$categoryno=$rowcatsub['category_id'];
			$subcategoryno=$rowcatsub['subcategory_id'];

    $sqlcategory ="SELECT DISTINCT Category.category_id,Category.category_name FROM Category WHERE Category.category_id = '$categoryno'";
			$resultcategory = mysqli_query($dbc, $sqlcategory) or die ("can't get the Category selection.");  

		
//////Create the Category selections./////////////////////////////////////////////
while ($rowcategory=mysqli_fetch_array($resultcategory)) {
			$category_id=$rowcategory['category_id'];
			$categorylabel=$rowcategory['category_name'];
$sqlsh ="SELECT DISTINCT Subcategory.*,Category.* FROM Subcategory,Category WHERE  Category.category_name = '$categorylabel' AND Subcategory.subcategory_id = '$subcategoryno' ORDER BY subcategory_id ASC";
			
	//CategoryOrder ($categorylabel);
		if ($categorylabel!=$catbeen) {
	PrintO("<center><b>$categorylabel</b></center>");
	$catbeen=$categorylabel;		}
	
//////Create the Subcategory headers/////////////////////////////////////////////
$resultsh = mysqli_query($dbc, $sqlsh) or die ("can't get the Subcategory.subcategory_id selection");
while ($rowsh=mysqli_fetch_array($resultsh)) {
			$subheader=$rowsh['subcategory_name'];////////////// Starting the Table and labeling the header.			
			echo"\n\t</tr>\n</table>\n";
			echo "<table  width=100%>\n";
			echo "\n\t<tr>\n";
   echo "<div class=sh>$subheader</div>\n";
			   echo "\t</tr>\n";
	echo "\t<tr>\n";
	//PrintO("<center><b>$subheader</b></center>");
//////// Start the Items fields from the category.

//	$sql= "SELECT DISTINCT Items.*,How_Many.*,Subcategory.*,Category.* FROM How_Many,Items,Subcategory,Category WHERE How_Many.hm_value_id = Items.hm_value_id AND Category.category_id = Items.category_id AND Category.category_name = '$categorylabel' AND Subcategory.subcategory_id = Items.subcategory_id AND Subcategory.subcategory_name = '$subheader'";
//			$result = mysqli_query($dbc, $sql) or die ("can't get the Items selection");
//	$clms = 0;         

//while ($row=mysqli_fetch_array($result)) { 
//			$cols=$row[cols];
//			$item_id=$row[item_id];
//			$variable=$_POST[$item_id];
//			$item_name=$row[item_name];
//			$hm_name=$row[hm_name];
//			$req=$row[req];		
//				$_SESSION[$item_id] = $variable;
	$sql= "SELECT ".$Checksheetno.".* FROM ".$Checksheetno." WHERE  ".$Checksheetno.".category_id  = '".$category_id."' AND ".$Checksheetno.".subcategory_id  = '".$subcategoryno."'";
		$result = mysqli_query($dbc, $sql) or die ("can't get the Items selection");

$clms = 0;
         while ($row=mysqli_fetch_array($result)) { 
			$cols=colcount($row['subcategory_id']);
			$item_id=$row['item_id'];
			$id=$row['id'];
			$variable=$_POST[$casc_id][$item_id];
			$item_name=ItemidtoName($row['item_id']);
			$hm = hmidtoname($row['hm_value_id']);
	require_once('inc/variablepostsort.inc.php'); // bring in the functions.	
			if ($clms >= $cols) {  // if cols number is reached by clms
				echo "\n\t</tr>\n\t<tr>\n";
					$clms = 0; //reset to 1
				variablepostsort ($item_id,$item_name,$hm,$variable);//line632

				$clms=$clms+1;}
			else {
				variablepostsort   ($item_id,$item_name,$hm,$variable); //line632
 $clms=$clms+1;
}
				
		 } 
				
		 }  //Ending Item Fetch
			} //Ending Subcategory fetch
				}  //Ending Category Selection		
		

			print ("\n\t</tr>\n</table>");
			//print_r($_SESSION);
			//print("Line 1521");
  mysqli_close($dbc);
	}
//******************************************************//
//	 Ending function getcatsubpost()		//
//******************************************************//

?>
