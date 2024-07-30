<?php

require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
$newinsert="INSERT INTO veh(veh_id, veh_fleet_name, vinNo, make, model, _year, _class, state_lic_no, engine) VALUES(0,'', '', '', '','','','','')";

                    mysqli_query($dbc0,$newinsert);
					$item_id=mysqli_insert_id($dbc0);

?>

