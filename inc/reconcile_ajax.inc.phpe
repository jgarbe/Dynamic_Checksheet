<?php
function testreq ($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option) {
//print("\n<br />testing\n<br />");
require_once('connectvars.php');
 $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                     $requery = "SELECT * FROM requisition WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                    if ($dbc1->query($requery) == TRUE) {
                $deletesql="DELETE FROM requisition WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                 if ($dbc1->query($deletesql) == TRUE) {
        }
    }else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                $dbc1->close();
    } 


?>
