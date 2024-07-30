<?php
function get_status(){
  require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}


	           	$status_query="SELECT *  FROM user_status 
										   ORDER BY status DESC";
	 $status_array=mysqli_query($dbc1,$status_query);
	 while ($status_arr = mysqli_fetch_array($status_array)) {
	 $status_all_array[$status_arr[status_id]]=$status_arr['status'];
        }
        
			return $status_all_array;
					mysqli_close( $dbc1);

}

?>
