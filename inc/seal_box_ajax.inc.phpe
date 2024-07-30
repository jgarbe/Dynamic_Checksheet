<?php
//print("Check");
$seal=$_GET['seal'];
$sealarr=explode(":",$seal);
$sealno=$sealarr[0];
//print("The no.".$sealarr[1]."<br />\n");//test
$user_id=$sealarr[1];
$casc_ID=$sealarr[2];


require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connectionif (mysqli_connect_errno()) {
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

$upexp_query="UPDATE Checksheets SET sealed = '".$sealno."', Signature = '".$user_id."' WHERE  id = '".$casc_ID."'";
                if($dbc1->query($upexp_query)==TRUE) { 
					
                    }
                
                 
                $dbc1->close();
			
 //echo json_encode($tango);
                
    
?>
