<?php



		
require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
       
$user_id = mysqli_escape_string($dbc1, $_GET['user_id']);

		$userdelinquery = "DELETE FROM _user  WHERE user_id = '".$user_id."' LIMIT 1";

						
mysqli_query($dbc1,$userdelinquery);

mysqli_close($dbc1);
