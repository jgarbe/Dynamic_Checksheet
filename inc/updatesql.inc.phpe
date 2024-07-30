<?php
// Written by Jim Garbe
		function updatesql($casc_id,$item_id,$name,$value,$variable,$q_set) {
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	$checkshin=checksheet_idtochecksheetname($casc_id)."_checksheet";
	//print("$checkshin");
			$update_query="UPDATE $checkshin SET result = '$variable' WHERE $q_set = event_id AND item_id = $item_id";
				mysqli_query($dbc,$update_query) or die("can't sqlset1"); mysqli_close($dbc); }


?>
