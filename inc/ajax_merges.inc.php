<?php
$dig = $_GET['merge'];
$sc = explode(":",$dig);
  require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$togg= mysqli_escape_string($dbc1,$sc[0]); // ch
//$ch_name= mysqli_escape_string($dbc1,$sc[1]); // primary_ch

// {	$squery = "UPDATE Checksheets SET merged = NULL WHERE '".$togg."' = id";} 
  //print ("$togg   $ch_name");
    	$squery = "UPDATE Checksheets SET merged = '".$sc[1]."' WHERE id='".$togg."'";

//print("New shift inserted.<br />\n");

$q3 = mysqli_query($dbc1,$squery );
//  print( "<br /><p>Created shift.</p><br />");

	   mysqli_close($dbc1);

    
    
    
    
    
    

?>
