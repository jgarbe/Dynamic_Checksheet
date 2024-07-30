<?php
//print("Check");
$seal=$_GET['seal'];



require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connectionif (mysqli_connect_errno()) {
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

$upexp_query="UPDATE Checksheets SET sealed = NULL, Signature = NULL WHERE  id = '".$seal."'";
                if($dbc1->query($upexp_query)==TRUE) { 
					
                    }
                
                 
                $dbc1->close();

                
    
?>
