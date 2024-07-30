 <?php
 $t=$_GET["t"];
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

        $tquery = "TRUNCATE TABLE Timestamps ";
        	if($dbc1->query($tquery) == TRUE) {
            $tsquery = "INSERT INTO Timestamps VALUES ('1','0000-00-00 00:00:00'),('2','0000-00-00 00:00:00'),('3','0000-00-00 00:00:00')";
	if($dbc1->query($tsquery) == TRUE) {
print("Timer Ready  ".$t."");
    }
    else {
 echo 'Error: '. $dbc1->error.'<br />';
}
    }
    else {
 echo 'Error: '. $dbc1->error.'<br />';
}




                mysqli_close($dbc1); 
   
?>