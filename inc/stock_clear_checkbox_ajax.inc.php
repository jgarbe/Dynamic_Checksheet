<?php 
$p_id=$_GET['p_id'];
////////////////////////////////////////////////////////





require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

                
			$update_query="UPDATE Items SET perishable = '1' WHERE  item_id = '".$p_id."'";
			mysqli_query($dbc0,$update_query);  


    





               mysqli_close($dbc0);
   

?>
