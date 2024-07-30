<?php 
$p_id=$_GET['p_id'];
////////////////////////////////////////////////////////
$tselarr=explode(":",$p_id);
$column=$tselarr[0];
$item_id=$tselarr[1];
$value=$tselarr[2];
// print("alert(data); \n"); // test



require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

                
			$update_query="UPDATE Items SET ".$column." = '".$value."' WHERE  item_id = '".$item_id."'";
			mysqli_query($dbc0,$update_query);  


    





               mysqli_close($dbc0);
   

?>
