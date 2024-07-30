<?php
//$p = $_GET[p];
//$q= $_GET[q];
require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$user_id=mysqli_escape_string($dbc1,$_GET['p']);
$mailrec=mysqli_escape_string($dbc1,$_GET['q']);




		$user_status_update="UPDATE _user SET mailrec = '".$mailrec."' WHERE user_id = '".$user_id."' AND user_id != '1'";
					$q3 = mysqli_query($dbc1,$user_status_update);
						
		
mysqli_close($dbc1);				
?>
