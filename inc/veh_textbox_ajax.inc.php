<?php 
$p_id=$_GET['p_id'];
////////////////////////////////////////////////////////
$tselarr=explode(":",$p_id);
$table=$tselarr[0];
$column=$tselarr[1];
$item_id=$tselarr[2];
$value=$tselarr[3];
// print("alert(data); \n"); // test



require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection


                
			$update_query="UPDATE ".$table." SET ".$column." = '".$value."' WHERE  veh_id = '".$item_id."'";
			
						
			mysqli_query($dbc0,$update_query);  

               mysqli_close($dbc0);
   

?>
