<?php
// Written by Jim Garbe
//**************************************************************************************//
//	setvartabs()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: Create the form tabs by the Categories 				//
//											//
//**************************************************************************************//

function setvartabs($CH) {
//print_r2($CH);

 print("<script>\n");

	$tabber=1;		print("var tabs = [");
foreach($CH as $no) {
foreach($no as $casc_id) {
		$Checksheetno=$casc_id[0];
		$Cats=$casc_id[5];
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
	foreach($Cats as $Checkrow)	{	
		if ($tabber == 1){	print("'tab$tabber'");}
			else {	print(",'tab$tabber'");}
				$tabber=$tabber+1;
}

	 } }
print("];\n");


	$abber=1;		print("var as = [");
	foreach($CH as $no) {
	foreach($no as $casc_id) {
		$Checksheetno=$casc_id[0];
		$Cats=$casc_id[5];
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
	foreach($Cats as $Checkrow)	{
			if ($abber == 1){	print("'a$abber'");}
			else {	print(",'a$abber'");}
				$abber=$abber+1;
}	}
}
print("];");

?>

function showTab( tab,a ){
// first make sure all the tabs are hidden
var i;
for(i=0; i < tabs.length; i++){
var obj = document.getElementById(tabs[i]);
var objA = document.getElementById(as[i]);
obj.style.display = "none";
objA.style.color = "<? echo A_COLOR ?>";
objA.style.backgroundImage="url(<?php echo BG_TAB ?>)";
}

// show the tab we're interested in
var obj = document.getElementById(tab);
var objA = document.getElementById(a);
obj.style.display = "block";
objA.style.color = "<? echo AP_COLOR ?>";
objA.style.backgroundImage="url(<?php echo BG_VTAB ?>)";
}

</script>

</div>
<?php

//print_r2($CH);

}
//******************************************************//
//	 Ending function setvartabs()			//
//******************************************************//

?>
