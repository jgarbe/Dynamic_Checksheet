<?php
// Written by Jim Garbe
function split_perishable_items($casc_id,$pchoice) {

$Checksheetno = checksheet_idtochecksheetname($casc_id);
$Checksheet = $Checksheetno."_Sealed";
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Beginning of Add Perishable Input into database
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////


//print_r2($pchoice);
	ksort($pchoice);
	print_r2($pchoice);
$cols=0;
	foreach($pchoice as $id => $NK) {
		$number = $NK[1];
		$Iname = $NK[0];
		$Perishable = $NK[2];

		if ($number=20) {$number = 1;}
//print("perishable= ".$pid."");
//print("HM=".$hmitems."");
if(isset($number)) {

if($Perishable == 1) {
	for($n=1; $n <= $number; $n++) {
	       $query = "INSERT INTO ".$Checksheet."(id,item_id,date) VALUES ('0','$id',CURDATE()) ";        
        mysqli_query($dbc, $query);

			}
} else {
       $query = "INSERT INTO ".$Checksheet."(id,item_id) VALUES ('0','$id') ";        
        mysqli_query($dbc, $query);	

}

			} else { $err=$err+1;}   

 mysqli_close($dbc);}

	if ($err) { print("There is\\are still ".$err." items to categorize." );}

}

?>
