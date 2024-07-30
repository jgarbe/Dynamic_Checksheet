<?php
function q_set($Checksheetno, $merged, $merger){
	
				
	
//print("<br/>DBG q_setoo.inc.php.inc.php Line6<br/>\n");
	require_once('inc/connectvars.php');
					$dbc1 =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  
if (mysqli_connect_errno()) {  printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}    // finished checking for errors while connecting

//print("<br/>DBG q_setoo.inc.php.inc.php Line13<br/>\n");
//print("This is working so far<br />\n");
				$Checksheet_events_table=$Checksheetno."_events";	
					// get the last event by id
		$submit_check="SELECT * FROM ".$Checksheet_events_table." WHERE submitted IS NULL ORDER BY id DESC LIMIT 1";  
	$result_q_set=$dbc1->query($submit_check);
	
//print("<br/>DBG q_setoo.inc.php.inc.php Line21<br/>\n");
						if ($result_q_set->num_rows >=1 )	{	
				while($row = $result_q_set->fetch_array()){
					return $row['id'];
							}								
	print("<br/>DBG q_setoo.inc.php.inc.php Line26<br/>\n");
	$result_q_set->close();
					} else  {
						
//print("<br/>DBG q_setoo.inc.php.inc.php Line30<br/>\n");
		//$querystartid="INSERT INTO ".$Checksheet_events_table."  VALUES(NULL,NOW(),0,".$merged.",".$merger.")"; //get event id for data insert
		
		$querystartid="INSERT INTO ".$Checksheet_events_table."(id,date,merged,merger)  VALUES(NULL,NOW(),'".$merged."','".$merger."')"; //get event id for data insert
		if($result_q=$dbc1->query($querystartid)){
                                    $q_set = $dbc1->insert_id;
			return $q_set;	
			
//print("<br/>DBG q_setoo.inc.php.inc.php Line34<br/>\n");
						}
						
					
				}								
	mysqli_close($dbc1);
	
//print("<br/>DBG q_setoo.inc.php.inc.php Line641<br/>\n");
	}
			?>

			
