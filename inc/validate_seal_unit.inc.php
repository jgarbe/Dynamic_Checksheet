<?php

function validate_seal_unit($Checksheetno,$casc_ID,$q_set,$CATEGORY,$Catarray,$catarray_id) {
	//print("<br/><span style='color:yellow;'>DBG LINE 4 validate_seal_unit.inc.php <br/>This unit is not sealed yet.<br/> Checksheet: ".$_POST['checksheet']."<br/>casc_ID:".$casc_ID."<br/>qset:".$q_set."<br/>catarray_id:".$catarray_id."<br/>sealed:".$row_seal['sealed']."</span>\n");print("<br/>CATEGORIES ARRAY");print_r2($Catarray);

print("<script>\n");

print("$(document).ready(function() {\n");    // inside 6


print("	$('[id=\"button".$casc_ID."\"]').click(function() {    \n");	 // inside 5
//print("alert('".$CATEGORY."');\n");
print("var isValid".$CATEGORY." = true; \n");

	foreach($Catarray as $Subcatrow)	{    //inside 4
		
			foreach($Subcatrow as $subcatarray_id =>  $subcatname) {    //inside 3
				
						$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
	foreach($Itemsarray as $Itemstuff)	{  //go through the array of items   //inside 2
		$Item_id=$Itemstuff[0];
		$Itemname=addslashes($Itemstuff[1]);
		$HowMany=$Itemstuff[2];
		$perishable=$Itemstuff[3];
		$req=$Itemstuff[4];


switch($HowMany){      //inside 1

	case "cb":

			


		print(" var V".$catarray_id."_".$subcatarray_id."_".$Item_id."  = $('[name=\"".$catarray_id.":".$subcatarray_id .":".$Item_id."\"]').val(); \n ");
		//print("alert(V".$catarray_id."_".$subcatarray_id."_".$Item_id."); \n");
		
			print(" var verif_".$Item_id." = (V".$catarray_id."_".$subcatarray_id."_".$Item_id.").split(\":\");\n");
			print(" var verif_Nam".$Item_id." = verif_".$Item_id."[4]; \n");
			print(" var verif_Num".$Item_id." = verif_".$Item_id."[8]; \n");
			//print("if ($('[id=\"".$Checksheetno.":".$casc_ID.":".$HowMany.":".$Item_id.":".$Itemname.":".$q_set.":".$catarray_id.":".$subcatarray_id."\"]').is(':checked')) {\n ");
			print("if ($('[name=\"".$catarray_id.":".$subcatarray_id .":".$Item_id."\"]').is(':checked')) {\n ");
		//print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id.");\n");
		//print("alert(verif_Num".$Item_id.");\n");
			print(" } else {\n");
			print("alert(verif_Nam".$Item_id." + \" must be checked or you can not seal the unit.\"); \n");
		
			print("isValid".$CATEGORY." = false; \n");
			print("}\n");
	break;  
	
	case (ctype_digit($HowMany)):   ////////if it's a digit count type,...
				print(" var V".$catarray_id."_".$subcatarray_id."_".$Item_id."  = $(\"[id='".$catarray_id.":".$subcatarray_id.":".$Item_id."']\").val(); \n ");
			print(" var verif_".$Item_id." = (V".$catarray_id."_".$subcatarray_id."_".$Item_id.").split(\":\");\n");
			print(" var verif_Nam".$Item_id." = verif_".$Item_id."[4]; \n");
			print(" var verif_Num".$Item_id." = verif_".$Item_id."[8]; \n");
			//	print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id."); \n");
			print("if (parseInt(verif_Num".$Item_id.") == ".$HowMany.") { \n");
				//print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id."); \n");
			print("  } else { \n");
			//print("  \n");
			print("alert(\"The \" + verif_Nam".$Item_id." + \" should have ".$HowMany.", but it only has \" + verif_Num".$Item_id." + \".\");\n");
			
			print("isValid".$CATEGORY." = false; \n");
			print(" } \n");
	break;
	
	case "na":
				print(" var V".$catarray_id."_".$subcatarray_id."_".$Item_id."  = $(\"[id='".$catarray_id.":".$subcatarray_id.":".$Item_id."']\").val(); \n ");
			print(" var verif_".$Item_id." = (V".$catarray_id."_".$subcatarray_id."_".$Item_id.").split(\":\");\n");
			print(" var verif_Nam".$Item_id." = verif_".$Item_id."[4]; \n");
			print(" var verif_Num".$Item_id." = verif_".$Item_id."[8]; \n");
			//	print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id."); \n");
			print("if (parseInt(verif_Num".$Item_id.") == 2) { \n");
				//print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id."); \n");
			print("  } else { \n");
			//print("  \n");
			print("alert(\"The \" + verif_Nam".$Item_id." + \" should have 2, but it only has \" + verif_Num".$Item_id." + \".\");\n");
			print("isValid".$CATEGORY." = false; \n");
			print(" } \n");
		
			break;
/*			
	case "irrg":
						print(" var V".$catarray_id."_".$subcatarray_id."_".$Item_id."  = $(\"[id='".$catarray_id.":".$subcatarray_id.":".$Item_id."']\").val(); \n ");
			print(" var verif_".$Item_id." = (V".$catarray_id."_".$subcatarray_id."_".$Item_id.").split(\":\");\n");
			print(" var verif_Nam".$Item_id." = verif_".$Item_id."[4]; \n");
			print(" var verif_Num".$Item_id." = verif_".$Item_id."[8]; \n");
			//	print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id."); \n");
			print("if (parseInt(verif_Num".$Item_id.") == 2000) { \n");
				//print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id."); \n");
			print("  } else { \n");
			//print("  \n");
			print("alert(\"The \" + verif_Nam".$Item_id." + \" should have 2000cc, but it only has \" + verif_Num".$Item_id." + \".\");\n");
			print("isValid".$CATEGORY." = false; \n");
			print(" } \n");
		
	break;
*/
	case "refill": /////////If it's a reciprocal table value, ...
			print(" var V".$catarray_id."_".$subcatarray_id."_".$Item_id."  = $(\"[id='".$catarray_id.":".$subcatarray_id.":".$Item_id."']\").val(); \n ");
			print(" var verif_".$Item_id." = (V".$catarray_id."_".$subcatarray_id."_".$Item_id.").split(\":\");\n");
			print(" var verif_Nam".$Item_id." = verif_".$Item_id."[4]; \n");
			print(" var verif_Num".$Item_id." = verif_".$Item_id."[8]; \n");
			//	print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id."); \n");
			print("if (verif_Num".$Item_id." === '') { \n");
				//print("alert(verif_Nam".$Item_id." + \" \" + verif_Num".$Item_id."); \n");
			print("  } else { \n");
			//print("  \n");
			print("alert(\"The \" + verif_Nam".$Item_id." + \" needs to be filled .\");\n");
			print("isValid".$CATEGORY." = false; \n");
			print(" } \n");
	break;
	

	
	}	// End 1  // Switch
	
}    // End 2
}    //End 3
}    // End 4

print(" if (isValid".$CATEGORY." ==  true) { \n");

print("$('div[id=\"d".$casc_ID."\"]').slideToggle(1000); \n");
print("if($('div[id=\"d".$casc_ID."hidden\"]').hasClass(\"toggle\")) {  \n"); 
print("$('div[id=\"d".$casc_ID."hidden\"]').slideToggle(1000); \n"); 

print(" }  \n");

print(" }\n");
print("});  \n");  //End Click      //End 5

print("}); \n");   //End Function    // end 6

print("\n");


print("</script>\n");  
}
?>
