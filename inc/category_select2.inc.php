<?php
//**************************************************************************************//
//											//
//  Place the Items in the Category and Subcategory that is selected.			//
//											//
//**************************************************************************************//

//print("<br/><span style='color:yellow;'>DBG LINE 8 category_select2.inc.php <br/>This unit is not sealed yet.<br/> Checksheet: ".$_POST['checksheet']."<br/>casc_ID:".$casc_ID."<br/>qset:".$q_set."<br/>catarray_id:".$catarray_id."<br/>sealed:".$row_seal['sealed']."<br/>Sealable:".$sealable."</span>\n");print("<br/>CATEGORIES ARRAY");//print_r2($CATEGORY);print_r2($Catarray);
// Written by Jim Garbe

 if ($sealable == 1 ) {				// The checksheet is sealable
//print("<br/><span style='color:yellow;'>DBG LINE 12 category_select2.inc.php The unit is sealable</span>\n");
//print("<br/><span style='color:yellow;'>DBG LINE 13 category_select2.inc.php</span>\n");
	 // See if the Checksheet is sealed
		require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}



//print("<br/><span style='color:yellow;'>DBG LINE 22 category_select2.inc.php</span>\n");

					$Seal_Chequery="SELECT sealed, Signature FROM Checksheets WHERE id = ".$casc_ID."";
					$SealC=$dbc1->query($Seal_Chequery);
					//if ($SealC->num_rows >=1 )	{	
	//print("<br/><span style='color:yellow;'>DBG LINE 30 category_select2.inc.php  sealed:".$row_seal['sealed']."</span>\n");					
					 while($row_seal = $SealC->fetch_array()){
						 
	//print("<br/><span style='color:yellow;'>DBG LINE 30 category_select2.inc.php  sealed:".$row_seal['sealed']."</span>\n");
						 
						 
						 
						 
						 if($row_seal['sealed'] === null) {    // The unit is open
						  /*
						   * 
						   * 
						   * 
						   *     The unit is sealable unit is open 
						   *  
						   */
				require_once('validate_seal_unit.inc.php');
//print("<br/><span style='color:yellow;'>DBG LINE 43 category_select2.inc.php <br/>This unit is not sealed yet.<br/> Checksheet: ".$_POST['checksheet']."<br/>casc_ID:".$casc_ID."<br/>qset:".$q_set."<br/>catarray_id:".$catarray_id."<br/>sealed:".$row_seal['sealed']."</span>\n");print("<br/>CATEGORIES ARRAY");print_r2($Catarray);
//print_r2($CATEGORY);

		//print("<br/>CATEGORIES ARRAY");print_r2($Catarray);
		validate_seal_unit($_POST['checksheet'],$casc_ID,$q_set,$CATEGORY,$Catarray,$catarray_id);
		
		print(" <center><INPUT TYPE=\"button\"  NAME=\"button".$casc_ID."\"  ID=\"button".$casc_ID."\" VALUE=\"Seal&#9658&#9668Checksheet\"> </center> \n");  // the toggle button

		/*
		 * 
		 * 
		 * bring in the hidden div with the sealable form
		 * 
		 * 
		 * 
		 */

				print("<div name=\"n".$casc_ID."hidden\" id=\"d".$casc_ID."hidden\" class=\"toggle\"><BR>\n");
include('separate_perishables.inc.php');
//require_once('separate_perishables.inc.php');
		//separate_perishables($CATEGORY,$casc_ID,$Catarray);
print("</div>\n");
		
		

						 
	/*
	 * 
	 * 
	 * 
	 *  // Show the unsealed box
	 * 
	 * 
	 * 
	 */	
	 		 			print("<div name=\"n".$casc_ID."\" id=\"d".$casc_ID."\" class=\"open\"><BR>\n");  

				//print("<br/><span style='color:yellow;'>DBG LINE 77 category_select2.inc.php <br/>casc_ID:".$casc_ID." \n");
			print("\n");			
	 	foreach($Catarray as $Subcatrow)	{  
		
		
		//print("categoryselect2.inc.php line 82.\n");print_r2($Subcatrow);



	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
		$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
		//print("$SUBCATEGORY<BR>\n");
		//print("$SUBCATCOLS<BR>\n");
		//print("$subcatarray_id<BR>\n");
		//print_r2($Itemsarray);
////////////// Starting the Table and labeling the header.			
			echo"<table  width=\"100%\"><tr>\n";   // Begin the Table and the first table row
  print ("<div class=sh>".$SUBCATEGORY."</div></tr>\n");     // The first Sub-header with $SUBCATEGORY
$clms = 0;
	foreach($Itemsarray as $Itemstuff)	{	
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
		$HowMany=$Itemstuff[2];
		$Perishable=$Itemstuff[3];
		//print_r2($Itemstuff);
		//print("$Itemname<BR>\n");
		//print("$HowMany<BR>\n");
		//print("$Item_id<BR>\n");
	require_once('variablesort2.inc.php'); // bring in the functions.
			if ($clms >= $SUBCATCOLS) {echo "</tr><tr>";$clms = 0;
				variablesort ($_POST['checksheet'],$casc_ID,$HowMany,$Item_id,$Itemname,$q_set,$catarray_id,$subcatarray_id);
			}else {
				//////////////////Send it to the variable sort function above.
				variablesort ($_POST['checksheet'],$casc_ID,$HowMany,$Item_id,$Itemname,$q_set,$catarray_id,$subcatarray_id);
   } $clms=$clms+1;
}

			print("</tr></table>");	  //End the Table
			

}}			
		
print("</div>\n");			 
						} else {   
						/*
						 * 
						 * 
						 * 	
							  // The Unit is sealed
						 * 
						 * 
						 * 
						 */	
		
		 			print("<div name=\"s".$casc_ID."\" id=\"s".$casc_ID."\" class=\"open\"><BR>\n");  
							require_once('show_sealedlist.inc.php');
								show_sealedlist($casc_ID);
						
	/*
	 * 
	 * 
	 * 
	 *  // Show the sealed box
	 * 
	 * 
	 * 
	 */				
						 
						 
print("</div>\n");	
															}   //End of if unit is sealed
					 
						 
																}   //End of row_seal 	
																
			$SealC->close();	
			$dbc1->close();
//}   //End of SealC	query
/*
 * 
 * 
 * 
 * 
 * End of "If Sealable"
 * 
 * 
 * 
 * 
 * 
 * 
 */	
	 				
	 				
	 				} else {	 				
	 				
/*
 * 
 * 
 * 
 * 
 * 	The box is not sealable-- go through the regular checksheet
 * 
 * 
 * 
 * 
 * 
 */

	foreach($Catarray as $Subcatrow)	{  
		//print("category_select2.inc.php line 274.\n");print_r2($Subcatrow);
foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
		$SUBCATEGORY=$subcatname[0];
		 $SUBCATCOLS=$subcatname[1];
		 $Itemsarray=$subcatname[2];
		//print("$SUBCATEGORY<BR>\n");
		//print("$SUBCATCOLS<BR>\n");
		//print("$subcatarray_id<BR>\n");
		//print_r2($Itemsarray);
////////////// Starting the Table and labeling the header.			
			echo"<table  width=\"100%\"><tr>\n";   // Begin the Table and the first table row
  print ("<div class=sh>".$SUBCATEGORY."</div></tr>\n");     // The first Sub-header with $SUBCATEGORY
$clms = 0;
	foreach($Itemsarray as $Itemstuff)	{	
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
		$HowMany=$Itemstuff[2];
		$Perishable=$Itemstuff[3];
		//print_r2($Itemstuff);
		//print("$Itemname<BR>\n");
		//print("$HowMany<BR>\n");
		//print("$Item_id<BR>\n");

	require_once('variablesort2.inc.php'); // bring in the functions.
			if ($clms >= $SUBCATCOLS) {echo "</tr><tr>";$clms = 0;
				variablesort ($_POST['checksheet'],$casc_ID,$HowMany,$Item_id,$Itemname,$q_set,$catarray_id,$subcatarray_id);
			}else {
				//////////////////Send it to the variable sort function above.
				variablesort ($_POST['checksheet'],$casc_ID,$HowMany,$Item_id,$Itemname,$q_set,$catarray_id,$subcatarray_id);
   } $clms=$clms+1;
}

			print("</tr></table>");	  //End the Table

}}

		print("</div>\n");

}
//******************************************************//
//	 Ending included category_select()		//
//******************************************************//

?>
