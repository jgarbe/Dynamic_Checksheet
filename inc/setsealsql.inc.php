<?php 
// Written by Jim Garbe
		function setsealsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub) {
		
//print("<br>casc-id=$casc_id");	
//print("<br>value=$value");	
//print("<br>sitem=$sitem");	
//print("<br>name=$name");	
//print("<br>variable=$variable");	
//print("<br>q_set=$q_set");	
//print("<br>cat=$cat");	
//print("<br>sub=$sub");

 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	$checkshin=checksheet_idtochecksheetname($casc_id)."_checksheet";
	print("$checkshin");
			$set_query="INSERT INTO ".$checkshin."(id, event_id, item_id, result, hm_value_id,category_id,subcategory_id) VALUES(NULL,'".$q_set."', '".$sitem."', '".$variable."', '".$value."','".$cat."','".$sub."')";
				mysqli_query($dbc,$set_query) or die("can't sqlset"); mysqli_close($dbc);
	 //$CHqset[$casc_id]=array($q_set=>array($sitem=>array($name,$value,$variable)));

	//return $CHqset[$casc_id][$q_set][$sitem]=array($name,$value,$variable);
	//return $CHqset;
	//print_r($CHqset);
}
 ?>

