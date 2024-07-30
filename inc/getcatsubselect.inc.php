<?php 
//**************************************************************************************//
//											//
//  Get the category and all of the Subcategories 					//
//											//
//**************************************************************************************//
 
function getcatsubselect($Checksheetno,$cattab, $q_set){ //from main.php --initial page line 143

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
   $sqlcatsub ="SELECT DISTINCT $Checksheetno.category FROM $Checksheetno";
			$resultcatsub = mysqli_query($dbc, $sqlcatsub) or die ("can't get the CatSub1 selection.");  
		//////Getting the CatSub selections./////////////////////////////////////////////
		while ($rowcatsub=mysqli_fetch_array($resultcatsub)) {
			$cat=$rowcatsub['category'];
						if ($cattab == 1) {
				print("<div id='tab$cattab' class='tabContent'  style='display:block'>");
			}
			else {
				print("</div><div id='tab$cattab' class='tabContent'>");
			}
			$cattab=$cattab+1;
	   $sqlcatsub2 ="SELECT DISTINCT $Checksheetno.category, $Checksheetno.subcategory FROM $Checksheetno WHERE $cat = $Checksheetno.category";
			$resultcatsub2 = mysqli_query($dbc, $sqlcatsub2) or die ("can't get the CatSub2 selection.");  
		//////Getting the CatSub selections./////////////////////////////////////////////
		while ($rowcatsub2=mysqli_fetch_array($resultcatsub2)) {
			$sub=$rowcatsub2['subcategory'];
			category_select($casc_id,$cat,$sub,$q_set);
				
				}	}
  mysqli_close($dbc); 	}
	
//******************************************************//
//	 Ending function getcatsubselect()		//
//******************************************************//

?>
