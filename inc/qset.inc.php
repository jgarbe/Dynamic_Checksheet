<?php
function q_set($Checksheetno, $merged, $merger){
	
				
	
	require_once('connectvars.php');
					$dbc1 =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
 if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
					
				$Checksheet_events_table=$Checksheetno."_events";	
					
				$submit_check="SELECT * FROM ".$Checksheet_events_table." ORDER BY id DESC LIMIT 1";
		$result_q_set=mysqli_query($dbc1,$submit_check); 
				while($result_id = mysqli_fetch_array($result_q_set)){
				if($result_id['submitted'] == ''){
			
					return $result_id['id'];
					}
					else {
						
    mysqli_free_result($result_q_set);
		 $querystartid="INSERT INTO ".$Checksheet_events_table."(id,date,merged,merger)  VALUES ('',Now(),'".$merged."','".$merger."')"; //get event id for data insert
		if($result_q=mysqli_query($dbc1,$querystartid)){
		$q_set = mysqli_insert_id($dbc1);
			print("This is the $q_set");
			return $q_set;
						
					} else { print("error");
					}	
					}	
				
			
		

    mysqli_free_result($result_q_set);
	}
	

	mysqli_close($dbc1);
	}
			?>
