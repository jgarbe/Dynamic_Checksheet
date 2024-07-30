<?php



		
require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
       
     
$nm= mysqli_escape_string($dbc1,$_GET[nm]); // group name

        $query = "SELECT username FROM _user WHERE username = '".$nm."'";
        $data = mysqli_query($dbc1, $query);

        if (mysqli_num_rows($data) == 1) {
			
		$row = mysqli_fetch_array($data);
			echo json_encode(array($row['username'])); }
						
mysqli_close($dbc1);
