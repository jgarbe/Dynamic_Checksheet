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

function showTab( evt,chName ){
// first make sure all the tabs are hidden
var i, chName, tabContent;
tabContent = document.getElementsByClassName("tabContent");
for(i=0; i < tabContent.length; i++){
tabContent[i].style.display = "none";
}

tab = document.getElementsByClassName("tab");
for(i=0; i < tab.length; i++){
tab[i].className = tab[i].className.replace(" active", "");
}
  document.getElementById(chName).style.display = "block";
  evt.currentTarget.className += " active";
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
