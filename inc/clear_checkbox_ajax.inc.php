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
//print("window.alert(\"".$option."\");\n");
//print("</script>\n");
//require_once('functions.php.inc');
//require_once('order.inc.php');

//require_once('connectvars.php');
//  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
//if (mysqli_connect_errno()) {
//  exit('Connect failed: '. mysqli_connect_error());
//}
////////////////////////////////////////////////////////

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


require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

	$sql = "SELECT ChecksheetName FROM Checksheets  WHERE  id = '".$casc_id."'";
	$resultc = mysqli_query($dbc0, $sql);
 while($rowc = mysqli_fetch_array($resultc)) { 
	$checkshin =  $rowc['ChecksheetName']."_checksheet";
}

              // mysqli_close($dbc0);
                testreq ($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);   // if it exists, delete it
                
			$update_query="UPDATE ".$checkshin." SET result = '".$option."' WHERE event_id = '".$event_id."'AND item_id = '".$sitem."'";
			mysqli_query($dbc0,$update_query);  

         $tsquery = "SELECT * FROM ".$checkshin." WHERE ".$event_id." = event_id AND item_id = ".$sitem."";
$result = mysqli_query($dbc0,$tsquery);
$row = mysqli_fetch_row($result);
 echo json_encode($row);

//print("\t\t        <div class=r >   $option   </div>\n");
    





               mysqli_close($dbc0);
   

?>
