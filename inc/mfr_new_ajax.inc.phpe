<?php

require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
$newinsert="INSERT INTO mfr(mfr_id, mfr_name, mfr_address, mfr_city, mfr_state,zip) VALUES(0,'', '', '', '','')";

                    mysqli_query($dbc0,$newinsert);
					$item_id=mysqli_insert_id($dbc0);

?>
