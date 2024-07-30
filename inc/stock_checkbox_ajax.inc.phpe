<?php 
$p_id=$_GET['p_id'];
////////////////////////////////////////////////////////


// print("alert(data); \n"); // test



require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

                
			$update_query="UPDATE Items SET perishable = NULL WHERE  item_id = '".$p_id."'";
			mysqli_query($dbc0,$update_query);  


    





               mysqli_close($dbc0);
   

?>
