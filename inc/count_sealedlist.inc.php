<?php
function 
  count_sealedlist($casc_ID,$I_Countable0,$I_Countable1,$I_Countable2) {

		require_once('connectvars.php');
							
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  /* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

    $sep_query = "SELECT item_id FROM sealedlist WHERE ch_id = '".$casc_ID."' AND item_id = '".$I_Countable0."'";
  if($sep_data = mysqli_query($dbc, $sep_query)) {
    $seprow_cnt = mysqli_num_rows($sep_data);
		if($seprow_cnt<$I_Countable2){
				for($brow_cnt=$seprow_cnt;$brow_cnt < $I_Countable2;$brow_cnt++) {
					$sep_insert="INSERT INTO sealedlist(id,ch_id,item_id,exp_date,hm_items) VALUES (NULL,'".mysqli_real_escape_string($dbc,$casc_ID)."','".mysqli_real_escape_string($dbc,$I_Countable0)."',NULL,NULL) ";
							mysqli_query($dbc, $sep_insert);
				} 
					}
				if($seprow_cnt>$I_Countable2){
				for($brow_cnt=$seprow_cnt;$brow_cnt > $I_Countable2;$brow_cnt--) {
					$sep_delete="DELETE FROM sealedlist WHERE ch_id= '".mysqli_real_escape_string($dbc,$casc_ID)."' AND item_id = '".mysqli_real_escape_string($dbc,$I_Countable0)."' LIMIT 1";
							mysqli_query($dbc, $sep_delete);
				}
					}
    
   //printf("Result set has %d rows.\n", $seprow_cnt);

        /* close result set */
    //mysqli_free_result($sep_data);
    //mysqli_free_result($seprow_cnt);
    //mysqli_free_result($sep_delete);
    //mysqli_free_result($sep_insert);
  }
  
/* close connection */
mysqli_close($dbc);
  
	
	

	
	
	
	
	
}
?>
