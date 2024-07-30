<?php 
// Written by Jim Garbe
		function setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub) {
		
//print("<br>casc-id=$casc_id");	
//print("<br>value=$value");	
//print("<br>sitem=$sitem");	
//print("<br>name=$name");	
//print("<br>variable=$variable");	
//print("<br>q_set=$q_set");	
//print("<br>cat=$cat");	
//print("<br>sub=$sub");

	$checkshin=checksheet_idtochecksheetname($casc_id)."_checksheet";
					$dbc1 =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  
if (mysqli_connect_errno()) {  printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}    // finished checking for errors while connecting



					$check_query= "SELECT * FROM ".$checkshin." where item_id =".$sitem." AND category_id =".$cat." AND subcategory_id = ".$sub." AND event_id = ".$q_set." ";
					//if ($dbc1->query($check_query) == TRUE) {  //if the checksheet already had been started
					//do nothing
					                 if($checknumrows = $dbc1->query($check_query) ){ 
                 $row_cnt = $checknumrows->num_rows;
                 if($row_cnt > 0) {
					
					
					//print("This is saying that there is a checksheet started setsql.inc.php line26 \n");
					
					
} else {

 

	//print("$checkshin");
			$set_query="INSERT INTO ".$checkshin."(id, event_id, item_id, result, hm_value_id,category_id,subcategory_id) VALUES(0,'".$q_set."', '".$sitem."', '".$variable."', '".$value."','".$cat."','".$sub."')";
				//mysqli_query($dbc,$set_query) or die("can't sqlset");
				$dbc1->query($set_query);
				
				
	 //$CHqset[$casc_id]=array($q_set=>array($sitem=>array($name,$value,$variable)));

	//return $CHqset[$casc_id][$q_set][$sitem]=array($name,$value,$variable);
	//return $CHqset;
	//print_r($CHqset);
	
	
}
}
                $dbc1->close();
}






 ?>
