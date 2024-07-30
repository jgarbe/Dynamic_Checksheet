<?php
		//function separate_perishables($CATEGORY,$casc_ID,$Catarray){
		 //print("<ul>\n");   // test list of items line one of three
	require_once('functions.php.inc'); // bring in the functions.
		require_once('show_sealedlist.inc.php');
		require_once('edit_sealedlist.inc.php');
		require_once('count_sealedlist.inc.php');
		require_once('count_nonperish_sealedlist.inc.php');
		//error_reporting(E_ALL);
	$sep_perishables=array();
	$sep_nonperishables=array();
	//$sep_perishables[$casc_ID]=array();
	//$sep_nonperishables[$casc_ID]=array();
	//print("<br/><span style='color:yellow;'>DBG LINE 13 separate_perishables.inc.php <br/>casc_ID:".$casc_ID."<br/></span>\n");print("<br/>CATEGORIES ARRAY");print_r2($Catarray);
foreach($Catarray as $Subcatrow){    //inside 4
		
	foreach($Subcatrow as $subcatarray_id => $subcatname) {    //inside 3
		$SUBCATEGORY=$subcatname[0];
		 $SUBCATCOLS=$subcatname[1];
		 $Itemsarray=$subcatname[2];
		foreach($Itemsarray as $Itemstuff)	{  //go through the array of items   //inside 2
			$Item_id=$Itemstuff[0];
			$Itemname=addslashes($Itemstuff[1]);
				switch($Itemstuff[2]){
					case "cb":
					$Howmanyp='1';
					break;
					case (ctype_digit($Itemstuff[2])):
					$Howmanyp = $Itemstuff[2];
					break;
					case "na": 
					$Howmanyp = '2';
					break;
					}
		$perishable=$Itemstuff[3];
		$req=$Itemstuff[4];
		
		if($perishable==1){
			$sep_perishables[$casc_ID][]=array($Item_id,$Itemname,$Howmanyp);
			}	else {	
			$sep_nonperishables[$casc_ID][]=array($Item_id,$Itemname,$Howmanyp);
			}
		
		
			//print("<li>".$Itemname."</li> \n");   //test list of items line 2 of 3
												}  // End Inside 2
									//print_r2($Itemsarray);
								} // End Inside 3
							}  // End Inside 4
						//print("</ul> \n");	// test list of items line 3 of 3
					//print_r2($sep_perishables[$casc_ID]);
					//require_once('connectvars.php');
					//print("<h2>Perishables</h2>\n");
					//	print("<ul>\n");
foreach($sep_perishables[$casc_ID] as $I_Perishable){
	count_sealedlist($casc_ID,$I_Perishable[0],$I_Perishable[1],$I_Perishable[2]);
	//	 print("<li>".$I_Perishable[0].", ".$I_Perishable[1].",".$I_Perishable[2]."</li>   <br /> \n");	
	}
//	print("</ul>\n");
//print("<h2>Non-Perishables</h2>\n");
//	print("<ul>\n");
foreach($sep_nonperishables[$casc_ID] as $I_NonPerishable){
	 count_nonperish_sealedlist($casc_ID,$I_NonPerishable[0],$I_NonPerishable[1],$I_NonPerishable[2]);
	//print("<li>".$I_NonPerishable[0].", ".$I_NonPerishable[1].",".$I_NonPerishable[2]."</li>   <br /> \n");	
	}

//	print("</ul>\n");
	if(empty($row_seal['sealed'])) {    // The unit is open
	edit_sealedlist($casc_ID,$CATEGORY);
	}  else {
	show_sealedlist($casc_ID);
	}
//}  //End functin separate_perishables();
?>
