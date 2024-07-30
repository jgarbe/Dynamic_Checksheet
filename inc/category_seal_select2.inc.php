<?php
		print("<div name=\"".$CATEGORY."\" id=\"".$CATEGORY."\"><BR>\n");
		//print_r2($catname[1]);
		print(" <center><INPUT TYPE=\"button\"  NAME=\"".$CATEGORY."_button\"  ID=\"".$CATEGORY."_button\" VALUE=\"Seal\"   onClick=\"checkSealable();\"> </center> \n");
			print("\n");
			
			//print("This is the Category_req, ".$Category_req."<br />\n");
	require_once('inc/variablesealsort2.inc.php'); // bring in the functions.
	
	
		require_once('validate_seal_unit.inc.php');
validate_seal_unit($_POST['checksheet'],$casc_ID,$q_set,$CATEGORY,$Catarray,$catarray_id);
	foreach($Catarray as $Subcatrow)	{
		
			foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
				
						$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
		//print("$SUBCATEGORY<BR>\n");
		//print("$SUBCATCOLS<BR>\n");
		//print("$subcatarray_id<BR>\n");
		// print("category_seal_select.inc.php DBG Line21 Itemsarray\n");	print_r2($Itemsarray);
	
////////////// Starting the Table and labeling the header.			
			echo"<table  border =1 width=100% cols=2><tr>\n";   // Begin the Table and the first table row
   echo "<th colspan=\"2\"><div class=sh>$SUBCATEGORY</div></th></tr>\n";     // The first Sub-header with $SUBCATEGORY
$clms = 0;			// Set the number of columns to begin, 0
		print("<tr>\n");
		//print_r2($Itemsarray);
	foreach($Itemsarray as $Itemstuff)	{  //go through the array of items
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
		$HowMany=$Itemstuff[2];
		$perishable=$Itemstuff[3];
		$req=$Itemstuff[4];
		
	
		
		
if($clms == 2) { $clms = 0; print("</tr><tr>\n"); } // Set the number of columns back to 0
//print("<td>\n");
////////////////////////////////////
		if($perishable == 1){    //If it is a perishable item
//print_r2($Itemstuff);
variablesealsort ($_POST['checksheet'],$casc_ID,$HowMany,$Item_id,$Itemname,$q_set,$catarray_id,$subcatarray_id);
//print("$Itemname\n");
//		//print("$HowMany<BR>\n");
//		//print("$Item_id<BR>\n");
    
} //end of if perishable

/////////////////////////////////////
if($perishable == "" || $perishable == 0 ) {   // If it is a non-perishable item
	//require_once('inc/variablesealsort2.inc.php'); // bring in the functions.
//print("$HowMany\n");

//print("$Itemname\n");

variablesealsort ($_POST['checksheet'],$casc_ID,$HowMany,$Item_id,$Itemname,$q_set,$catarray_id,$subcatarray_id);

} //Endo if not perishable
/////////////////////////////////////////



//print("</td>\n");
print("\n");
$clms++;
}
			print("</tr>");
			print("</table>");	  //End the Table

		}
	
		
	}   // Ending the $Catarray
	print("</div><br />\n");
/*
 * 
 * 
 *     End showing the open box
 * 
 * 
 * 
 */
		



?>
