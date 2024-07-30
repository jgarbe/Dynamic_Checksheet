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
//             $option = 'NULL';
 //           }
//print("<script>\n");
//print("window.alert(\"".$option."\");\n");
//print("</script>\n");
//require_once('functions.php.inc');
//require_once('order.inc.php');

require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
//if (mysqli_connect_errno()) {
//  exit('Connect failed: '. mysqli_connect_error());
//}////////////////////////////////////////////////////////

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
  
$nvalue = $dbc1->real_escape_string($nvalue);
                     $requery = "SELECT * FROM requisition WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                 if($checknumrows = $dbc1->query($requery) ){ 
                 $row_cnt = $checknumrows->num_rows;
                 if($row_cnt > 0) {
$upreq_query="UPDATE requisition SET result = '".$nvalue."' WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                $q2 = $dbc1->query($upreq_query); 
                } else {
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  
$nvalue = $dbc1->real_escape_string($nvalue);
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
  
$nvalue = $dbc1->real_escape_string($nvalue);
                     $requery = "SELECT * FROM req_header WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                 if($checknumrows = $dbc1->query($requery) ){ 
                 $row_cnt = $checknumrows->num_rows;
                 if($row_cnt > 0) {
$upreq_query="UPDATE req_header SET result = '".$nvalue."' WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                $q2 = $dbc1->query($upreq_query); 
                } else {
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  
$nvalue = $dbc1->real_escape_string($nvalue);
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
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

	$sql = "SELECT * FROM Checksheets  WHERE  id = '".$casc_id."'";
	$resultc = mysqli_query($dbc0, $sql);
 while($rowc = mysqli_fetch_array($resultc)) { 
	$checkshin =  $rowc['ChecksheetName']."_checksheet";
}

                mysqli_close( $dbc0);


switch($value){
    	case "miles":  ////////if it's mileage type,...
        if($name == 'Mileage' && ($option == 'NULL' || $option == "")) {
                testheader($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
                }
            elseif ($name == 'Mileage' && $option >= 0){
               // print("Test Updatereq ".$option."\n");
            updatereqheader($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
            }
        if($name == 'Service Due' && ($option == 'NULL' || $option == "")) {
                testheader($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
                }
            elseif ($name == 'Service Due' && $option >= 0){
               // print("Test Updatereq ".$option."\n");
            updatereqheader($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
        }
        
                                    $M = array();
                                    require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                                 $requery = "SELECT  req_header.result, Items.item_name AS i_name, Category.category_name AS c_name FROM req_header
                                        INNER JOIN Category ON Category.category_id = req_header.category_id
                                         INNER JOIN Items ON Items.item_id = req_header.item_id WHERE req_header.ch_id = '".$Checksheetno."' AND req_header.hm_value_id = 'miles'";
                     
                    if (($reqitems = $dbc1->query($requery)) == TRUE) {
                      while ($rowb = $reqitems->fetch_array()) {
                                    if($rowb['i_name']=='Mileage') { $M[0] = $rowb['result'];}
                                    if($rowb['i_name']=='Service Due') { $M[1] = $rowb['result'];}
        }

}
               $reqitems->close();
                $dbc1->close();
                                            if(  empty($M[0] ) ){$M[0] = "NULL";}
                                             if(  empty($M[1] ) ){$M[1] = "NULL";}
                                               if(  empty($M[2] ) ){$M[2] = "NULL";}
                                                     if (($M[0] != 'NULL' ) && ($M[1] != 'NULL' )) {
                                                     if($M[0] <$M[1] ) { 
                                                     $sD = $M[1] - $M[0];
                                                     $M[2] = "Service due in ".$sD." miles";
                                                     } else {
                                                        $mS =  $M[0] - $M[1];
                                                     $M[2] = "".$mS." miles overdue for sevice";
                                                             }         
                               } 
 echo json_encode($M); 
    
              break;
     case "open":  ////////if it's a 2 digit count type with N/A potential,...
			if ( ($option=='0') || ($option=='NULL')) {    
                //print("N/A Test".$option."\n");   
       testreq($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option);
           } else {
                //print("N/A Update ".$option."\n");
           updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
                } 
			
        break;     case "O2":  ////////if it's a 2 digit count type with N/A potential,...
			if ( ($option=='0') || ($option=='NULL')) {    
                //print("N/A Test".$option."\n");   
       testreq($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option);
           } else {
                //print("N/A Update ".$option."\n");
           updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option);
                } 
			
        break;
 /*       
        case "irrg":   ///////////If it's irrigation solution....
        			if ($option=='2000'){ 
                   testreq($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option);
            } else {
                $noption = 2000 - $option;
                   updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $noption);
                   }
        break;
        case "tire":////////////////The tire tread option....
        			if (($option=='New') || ($option=='Good')){ 
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
        */
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
  
$option = $dbc1->real_escape_string($option);
			$update_query="UPDATE ".$checkshin." SET result = '".$option."' WHERE event_id = '".$event_id."'AND item_id = '".$sitem."'";
			mysqli_query($dbc1,$update_query);  

                $dbc1->close();
   

?>
