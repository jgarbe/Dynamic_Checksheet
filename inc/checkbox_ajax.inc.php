<?php 
$p_id=$_GET['p_id'];
$tselarr=explode(":",$p_id);
//print_r2($tselarr);
$Checksheetno=$tselarr[0]; // Main Checksheet name
$casc_id = $tselarr[1]; // checksheet ID
$value = $tselarr[2];  // how many-- type
$sitem = $tselarr[3];  // The item id
$name = $tselarr[4];   // The Name of the item
$event_id = $tselarr[5];  // event_id
$cat = $tselarr[6]; //category
$sub = $tselarr[7];  // subcategory
$option = $tselarr[8]; //option 
//if (empty($option)){ 
//              $option = 'NULL';
//            }
//print("<script>\n");
//print("window.alert(\"".$name."\");\n");
//print("</script>\n");
//require_once('functions.php.inc');
//require_once('order.inc.php');

require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
//if (mysqli_connect_errno()) {
//  exit('Connect failed: '. mysqli_connect_error());
//}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function updatereq ($Checksheetno, $casc_id, $value, $sitem,$name, $event_id, $cat, $sub, $nvalue) {
    
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                     $requery = "SELECT * FROM requisition WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                 if($checknumrows = $dbc1->query($requery) ){ 
                 $row_cnt = $checknumrows->num_rows;
                 if($row_cnt > 0) {
$upreq_query="UPDATE requisition SET result = '".$nvalue."' WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                $q2 = $dbc1->query($upreq_query); 
                } else {
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                			$set_rquery="INSERT INTO requisition(id, ch_id, item_id, result, hm_value_id,category_id,subcategory_id) VALUES(0,'".$Checksheetno."', '".$sitem."', '".$nvalue."', '".$value."','".$cat."','".$sub."')";
                if($dbc1->query($set_rquery)==TRUE) {
                    }
                }
                $checknumrows->free();
                } 
                $dbc1->close();
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

	$sql = "SELECT ChecksheetName FROM Checksheets  WHERE  id = '".$casc_id."'";
	$resultc = mysqli_query($dbc0, $sql);
 while($rowc = mysqli_fetch_array($resultc)) { 
	$checkshin =  $rowc['ChecksheetName']."_checksheet";
}

                mysqli_close($dbc0);
                
                updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, 1);
                
require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
			$update_query="UPDATE ".$checkshin." SET result = NULL WHERE event_id = '".$event_id."'AND item_id = '".$sitem."'";
			mysqli_query($dbc0,$update_query);  

         $tsquery = "SELECT * FROM ".$checkshin." WHERE ".$event_id." = event_id AND item_id = ".$sitem."";
$result = mysqli_query($dbc0,$tsquery);
$row = mysqli_fetch_row($result);
 //echo json_encode($row);

//print("\t\t        <div class=r >   $option   </div>\n");
    





                mysqli_close($dbc0);
   

?>
