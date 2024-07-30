<?php
function get_users($order,$ud){
	
  require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

  //`user_id` int(11) NOT NULL AUTO_INCREMENT,
  //`username` varchar(32) DEFAULT NULL,
  //`password` varchar(40) DEFAULT NULL,
  //`join_date` datetime DEFAULT NULL,
  //`first_name` varchar(32) DEFAULT NULL,
  //`last_name` varchar(32) DEFAULT NULL,
  //`status` tinyint(2) DEFAULT NULL,
  //`event` int(11) DEFAULT NULL,
  //`email_address` varchar(50) DEFAULT NULL,
  //`rfid` varchar(64) NOT NULL,
  //`group_id` blob NOT NULL,



					 
					 
					 $users_query = "SELECT 	
						a.*,
						b.status AS stat_name
					   FROM _user a
					LEFT JOIN user_status b
						ON  a.status = b.status_id
					 ORDER BY ".$order."  ".$ud."";
					 

					 
					 



					  
	 $users_array=mysqli_query($dbc1,$users_query);
	 while ($users_arr = mysqli_fetch_array($users_array)) {
					

		
		 
	$users_f_array[] = array($users_arr['user_id'],$users_arr['username'],$users_arr['first_name'],$users_arr['last_name'],$users_arr['stat_name'],$users_arr['mailrec'],$users_arr['email_address']);
																
        }
        
			return $users_f_array;
					mysqli_close( $dbc1);

}
//print("test");
//$da = get_users('username');
//print_r($da);
?>
