<?php 
$p_id=$_GET['p_id'];
$tselarr=explode(":",$p_id);
//print_r2($tselarr);

//if (empty($option)){ 
//              $option = 'NULL';
//            }
//print("<script>\n");
//print("window.alert(\"".$option."\");\n");
//print("</script>\n");
//require_once('functions.php.inc');
//require_once('order.inc.php');

require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}////////////////////////////////////////////////////////
$Checksheetno=mysqli_escape_string($dbc1,$tselarr[0]); // Main Checksheet name
$casc_id = mysqli_escape_string($dbc1,$tselarr[1]); // checksheet ID
$value = mysqli_escape_string($dbc1,$tselarr[2]);  // how many-- type
$sitem = mysqli_escape_string($dbc1,$tselarr[3]);  // The item id
$name = mysqli_escape_string($dbc1,$tselarr[4]);   // The Name of the item
$event_id = mysqli_escape_string($dbc1,$tselarr[5]);  // event_id
$cat = mysqli_escape_string($dbc1,$tselarr[6]); //category
$sub = mysqli_escape_string($dbc1,$tselarr[7]);  // subcategory
$option = mysqli_escape_string($dbc1,$tselarr[8]); //option 
function testheader ($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option) {
//print("\n<br />testing\n<br />");
require_once('connectvars.php');
 $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                     $requery = "SELECT * FROM req_header WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                    if ($dbc1->query($requery) == TRUE) {
                $deletesql="DELETE FROM req_header WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                 if ($dbc1->query($deletesql) == TRUE) {
        }
    }else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                $dbc1->close();
    } 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
                $checknumrows->close();
                } 
                $dbc1->close();
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function updatereqheader($Checksheetno, $casc_id, $value, $sitem,$name, $event_id, $cat, $sub, $nvalue) {
    
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                     $requery = "SELECT * FROM req_header WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                 if($checknumrows = $dbc1->query($requery) ){ 
                 $row_cnt = $checknumrows->num_rows;
                 if($row_cnt > 0) {
$upreq_query="UPDATE req_header SET result = '".$nvalue."' WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                $q2 = $dbc1->query($upreq_query); 
                } else {
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                			$set_rquery="INSERT INTO req_header(id, ch_id, item_id, result, hm_value_id,category_id,subcategory_id) VALUES(0,'".$Checksheetno."', '".$sitem."', '".$nvalue."', '".$value."','".$cat."','".$sub."')";
                if($dbc1->query($set_rquery)==TRUE) {
                    }
                }
                $checknumrows->close();
                } 
                $dbc1->close();
    }
/////////////////////////////////////////////////////////


require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

	$sql = "SELECT * FROM Checksheets  WHERE  id = '".$casc_id."'";
	$resultc = mysqli_query($dbc1, $sql);
 while($rowc = mysqli_fetch_array($resultc)) { 
	$checkshin =  $rowc['ChecksheetName']."_checksheet";
}

                $dbc1->close();


switch($value){
    	case (ctype_digit($value)):  ////////if it's a digit count type,...
    			if ($option < $value) {  $nvalue = $value - $option;
                //print("Test ".$option."\n");
                updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $nvalue);
                }
            else {
               // print("Test Updatereq ".$option."\n");
            testreq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
                } 
              break;
        case "na":  ////////if it's a 2 digit count type with N/A potential,...
			if (($option=='2') || ($option=='N/A') || ($option=='NULL')) {    
                //print("N/A Test".$option."\n");   
       testreq($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option);
           } else {
                //print("N/A Update ".$option."\n");
				$nvalue = 2 - $option ;
           updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $nvalue);
                } 
			
        break;
        case "irrg":   ///////////If it's irrigation solution....
        			if ($option=='2000'){ 
                   testreq($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option);
            } else {
                $noption = 2000 - $option;
                   updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $noption);
                   }
        break;
        case "tire":////////////////The tire tread option....
        			if ($option=='New'){ 
                   testreq($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option);
            } else {
                   updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
                   }
                break;
        case "refill": ///////////////If it's a reciprocal table value, ...
        			if ($option=='NULL'){ 
                   testheader($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option);
            } else {
                   updatereqheader($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
                   }
        break;
        case "personnel": ///////////////If it's a reciprocal table value, ...
        			if ($option=='NULL'){ 
                   testheader($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option);
            } else {
                   updatereqheader($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
                   }
        break;
        
}


require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

	$sql = "SELECT * FROM Checksheets  WHERE  id = '".$casc_id."'";
	$resultc = mysqli_query($dbc1, $sql);
			$update_query="UPDATE ".$checkshin." SET result = '".$option."' WHERE event_id = '".$event_id."'AND item_id = '".$sitem."'";
			mysqli_query($dbc1,$update_query);  

         $tsquery = "SELECT * FROM ".$checkshin." WHERE ".$event_id." = event_id AND item_id = ".$sitem."";
$result = mysqli_query($dbc1,$tsquery);
$row = mysqli_fetch_row($result);
 echo json_encode($row);

//print("\t\t        <div class=r >   $option   </div>\n");
    





                $dbc1->close();
   

?>
