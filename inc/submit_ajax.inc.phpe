<?php
//print("Check");
//print("<p>This is a test</p>\n");
$submissionarr=json_decode(urldecode($_GET['submission']));
//print_r($submissionarr);
//foreach ($submissionarr as $checksheets) {print("the Checksheet, ".$checksheets[0]."-- the q_set, ".$checksheets[1].". <br />\n");}

$terry= array();
foreach ($submissionarr as $checksheets) {
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connectionif (mysqli_connect_errno()) {
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

$upexp_query="UPDATE ".$checksheets[0]."_events SET date = NOW(), submitted = '1' WHERE  id = '".$checksheets[1]."'";
                if($dbc1->query($upexp_query)==TRUE) { 
					$terry[]=$checksheets[0];
					
                    } else {print("Tant work in"); }
                
                 
                $dbc1->close();
			
	  }      
    
 echo json_encode($terry); 
?>
