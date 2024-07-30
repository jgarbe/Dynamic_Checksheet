<?php

require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$dit = $_GET[dit];
	 $tset=explode("_",$dit);
	 
$user_id=mysqli_escape_string($dbc1,$tset[1]);
if($tset[0] == 'firstName'){ $col = 'first_name';}
if($tset[0] == 'lastName'){ $col = 'last_name';}
if($tset[0] == 'emailAddress'){ $col = 'email_address';}
$val=mysqli_escape_string($dbc1,$tset[2]);




		$user_update="UPDATE _user SET ".$col." = '".$val."' WHERE user_id = '".$user_id."' AND user_id != '1'";
					$q3 = mysqli_query($dbc1,$user_update);
						
		
mysqli_close($dbc1);				
?>
