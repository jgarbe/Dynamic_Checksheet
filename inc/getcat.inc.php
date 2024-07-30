<?php

// Written by Jim Garbe
//**************************************************************************************//
//											//
//  Get the category and all of the Subcategories after Submit				//
//											//
//**************************************************************************************//
 





function getcat($CH){  //Get the Categories and Show the Tabs.
//print_r2($CH);
$tabcount=1;
print("<div class=tabs>\n");
foreach($CH as $no) { 
foreach($no as $casc_id) {
	//print("$casc_ID");
		$Checksheetno=$casc_id[0];
		$Cats=$casc_id[5];
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {

		print("<a id='a".$tabcount."' class=\"tab\" onclick='showTab(event,\"tab".$tabcount."\")'>".$catname[0]."</a>\n");			$tabcount=($tabcount+1);	}
				} }
				
	}		print("</div>");

}
?>
