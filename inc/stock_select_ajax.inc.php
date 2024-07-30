<?php 
$p_id=$_GET['p_id'];
$tselarr=explode(":",$p_id);

$column=$tselarr[0];
$item_id=$tselarr[1];
$value=$tselarr[2];
// print("alert(data); \n"); // test
/*
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}////////////////////////////////////////////////////////
$column=mysqli_escape_string($dbc1,$tselarr[0]); // which column
$item_id = mysqli_escape_string($dbc1,$tselarr[1]); // which Item
$value = mysqli_escape_string($dbc1,$tselarr[2]);  // id--
* 
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

                
			$update_query="UPDATE Items SET ".$column." = '".$value."' WHERE  item_id = '".$item_id."'";
			mysqli_query($dbc0,$update_query);  


    





               mysqli_close($dbc0);

?>
