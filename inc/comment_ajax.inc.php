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
////////////////////////////////////////////////////////

require_once('connectvars.php');
  $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
	$sql = "SELECT ChecksheetName FROM Checksheets  WHERE  id = '".$casc_id."'";
	$resultc = mysqli_query($dbc0, $sql);
 while($rowc = mysqli_fetch_array($resultc)) { 
	$checkshin =  $rowc['ChecksheetName']."_checksheet";
} mysqli_close($dbc0);


function testreq ($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option,$checkshin) {
//print("\n<br />testing\n<br />");

require_once('connectvars.php');
 $dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
 if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
                     $requery = "SELECT * FROM req_footer WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                    $rreqitems = mysqli_query($dbc0,$requery);
                      while ($rrowb = mysqli_fetch_array($rreqitems)) { 
                                                 $deletesql="DELETE FROM req_footer WHERE result = '".$rrowb['result']."' ";
                $delfooter=mysqli_query($dbc0,$deletesql);
                                     $deletesql2="DELETE FROM Comment_ WHERE comment_id = '".$rrowb['result']."' "; 
                                $delfooter2=mysqli_query($dbc0,$deletesql2);
}
mysqli_free_result($rreqitems );

			$update_query="UPDATE ".$checkshin." SET result = NULL WHERE event_id = '".$event_id."'AND item_id = '".$sitem."'";
			mysqli_query($dbc0,$update_query); 
                mysqli_close($dbc0);
    } 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function updatereq ($Checksheetno, $casc_id, $value, $sitem,$name, $event_id, $cat, $sub, $nvalue,$checkshin) {
    $fog=array();
$row_cnt = 0;
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  
                     $requery = "SELECT * FROM req_footer WHERE ch_id = '".$Checksheetno."' AND item_id = '".$sitem."' AND category_id = '".$cat."' AND subcategory_id = '".$sub."'";
                $checknumrows = $dbc1->query($requery);
                      while ($rowb = $checknumrows->fetch_array()) {
                          $fog[]=$rowb['result'];
                          $row_cnt++;
                         //print("<br />".$rowb['result']."<br />\n");
                     }
                     if($row_cnt >= 1){
                         foreach($fog as $frog){
                             
$nvalue = $dbc1->real_escape_string($nvalue);
                     $upreq_query="UPDATE Comment_  SET  _comment = '".$nvalue."' WHERE comment_id = '".$frog."' ";
                $q2 = $dbc1->query($upreq_query); 
                				$update_query="UPDATE ".$checkshin." SET result = '".$frog."' WHERE event_id = '".$event_id."'AND item_id = '".$sitem."'";
                				
                $q3 = $dbc1->query($update_query);
}
            } else {

require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
            
$nvalue = mysqli_escape_string($dbc1,$nvalue);
                			$set_rquery="INSERT INTO Comment_ (comment_id,_comment) VALUES (0,'".$nvalue."')";
               mysqli_query($dbc1,$set_rquery);
                                    $insid = mysqli_insert_id($dbc1);
                              
                    $commentinsert="INSERT INTO req_footer(id, ch_id, item_id, result, hm_value_id,category_id,subcategory_id) VALUES(0,'".$Checksheetno."', '".$sitem."', '".$insid."', '".$value."','".$cat."','".$sub."')";
                    mysqli_query($dbc1,$commentinsert);
						

				$update_query="UPDATE ".$checkshin." SET result = '".$insid."' WHERE event_id = '".$event_id."'AND item_id = '".$sitem."'";
			mysqli_query($dbc1,$update_query); 
			mysqli_close($dbc1);
          
}


                
                
                $checknumrows->free();


}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


			if ( ($option=='') || ($option=='NULL')) {    // Emptied the text box
              //  print("N/A Test".$option."\n");   
         //  print("<br /><br /><br />Sending to the function.");
       testreq($Checksheetno, $casc_id, $value, $sitem, $name, $event_id, $cat, $sub, $option,$checkshin);
           } else {
             //   print("N/A Update ".$option."\n");
         // print("<br /><br /><br />Sending to the function.");
        updatereq($Checksheetno, $casc_id,$value, $sitem,$name, $event_id, $cat, $sub, $option,$checkshin);
                } 
			


        
        ?>
