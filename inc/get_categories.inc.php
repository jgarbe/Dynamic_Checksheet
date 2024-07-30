<?php
function get_categories($Checksheetname){
  // Connect to the database 
require_once('connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
//$ItemAdd=Array();
$rowitems = array();
    $sqlcat ="SELECT DISTINCT Category.category_id,Category.category_name FROM Category
		INNER JOIN ".$Checksheetname."
		WHERE ".$Checksheetname.".category_id = Category.category_id";
			$resultcat = mysqli_query($dbc, $sqlcat) or die ("can't get the Category selection1.");  
//////See the Categories./////////////////////////////////////////////
while ($rowcat=mysqli_fetch_array($resultcat)) {
	
	
	
			$sqlsub="SELECT DISTINCT Subcategory.subcategory_id,Subcategory.subcategory_name
			 FROM Subcategory
			  INNER JOIN ".$Checksheetname."
				WHERE ".$Checksheetname.".subcategory_id = Subcategory.subcategory_id
				AND ".$Checksheetname.".category_id = '".$rowcat['category_id']."' ";
			$resultsub = mysqli_query($dbc, $sqlsub) or die ("can't get the Checksheet selection2."); 
		while ($rowsub=mysqli_fetch_array($resultsub)) {
			//$subcategory=$rowsub[subcategory_id];
			//$subcategory_name=$rowsub[subcategory_name];
	

					$sqlitem = "SELECT 
					".$Checksheetname.".id,
					".$Checksheetname.".req,
					How_Many.hm_name,
					Items.item_id,
					Items.item_name
					FROM Items 
					INNER JOIN ".$Checksheetname."
					ON ".$Checksheetname.".item_id = Items.item_id
					 AND ".$rowcat['category_id']." = ".$Checksheetname.".category_id 
					 AND ".$rowsub['subcategory_id']." = ".$Checksheetname.".subcategory_id
					INNER JOIN How_Many
					ON How_Many.hm_value_id = ".$Checksheetname.".hm_value_id ";
			$resultitem = mysqli_query($dbc, $sqlitem) or die ("can't get the Checksheet selection3."); 
		while ($rowitem = mysqli_fetch_array($resultitem)) {
			//$id = $rowitem['id'];
			//$item_id = $rowitem['item_id'];
			//$item_name=$rowitem['item_name'];
			//$hm_name=$rowitem['hm_name'];
			//$req=$rowitem['req'];
	//$rowitems[]= array($id,$item_id,$item_name,$hm_name,$req);
				//$array_arround=array($rowitem['id'],$rowitem['item_id'],$rowitem['item_name'],$rowitem['hm_name'],$rowitem['req']);
		$rowitems[]=array($rowitem['id'],$rowitem['item_id'],$rowitem['item_name'],$rowitem['hm_name'],$rowitem['req']);
							}
	
							$subcats[]=array($rowsub['subcategory_id'],$rowsub['subcategory_name'],$rowitems);
							unset($rowitems);
	//print_r($subcats);
		}
		
	
			$category[$Checksheetname][]=array($rowcat['category_id'],$rowcat['category_name'],$subcats);
			//$category=$rowcat[category_id];
			//$category_name=$rowcat[category_name];
			//$subcats="";  //empty $subcats
			unset($subcats);
 			}
			
			return $category;
			
  mysqli_close($dbc);
			}
?>
