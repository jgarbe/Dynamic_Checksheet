 <?php     

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get the requisition and put it back into the form
$reqrepopar=array();
require_once('connectvars.php');
 $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}

$ch_id=mysqli_escape_string($dbc1,$_GET['ch_id']);




                     $requery1 = "SELECT req_header.category_id,
                     req_header.subcategory_id,
                     req_header.item_id,
                     req_header.hm_value_id,
                     Series.series
                     FROM req_header 
                     INNER JOIN Items ON Items.item_id = req_header.item_id
                     INNER JOIN Series ON Series.id = req_header.result
                     WHERE req_header.ch_id = '".$ch_id."'
                     AND req_header.hm_value_id = 'refill'
                     AND  Items.item_name = 'Series'";
                     
                    if (($reqitems1 = $dbc1->query($requery1)) == TRUE) {
                      while ($rowb1 = $reqitems1->fetch_array()) {
                    $dblval[0]=$rowb1['hm_value_id'];
                    $dblval[1]=$rowb1['category_id'].":".$rowb1['subcategory_id'].":".$rowb1['item_id'];
                    $dblval[2]=$rowb1['series'];
                          $reqrepopar[]=$dblval;
        }
    }else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
$reqitems1->free();
                     $requery2 = "SELECT req_header.category_id,
                     req_header.subcategory_id,
                     req_header.item_id,
                     req_header.hm_value_id,
                     Station.Station
                     FROM req_header 
                     INNER JOIN Items ON Items.item_id = req_header.item_id
                     INNER JOIN Station ON Station.id = req_header.result
                     WHERE req_header.ch_id = '".$ch_id."'
                     AND req_header.hm_value_id = 'refill'
                     AND  Items.item_name = 'Station'";
                     
                    if (($reqitems2 = $dbc1->query($requery2)) == TRUE) {
                      while ($rowb2 = $reqitems2->fetch_array()) {
                                    $dblval[0]=$rowb2['hm_value_id'];
                                    $dblval[1]=$rowb2['category_id'].":".$rowb2['subcategory_id'].":".$rowb2['item_id'];
                                    $dblval[2]=$rowb2['Station'];
                          $reqrepopar[]=$dblval;
        }
    }else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
$reqitems2->free();
                     $requery3 = "SELECT req_header.category_id,
                     req_header.subcategory_id,
                     req_header.item_id,
                     req_header.hm_value_id,
                     CallSign.callsign
                     FROM req_header 
                     INNER JOIN Items ON Items.item_id = req_header.item_id
                     INNER JOIN CallSign ON CallSign.id = req_header.result
                     WHERE req_header.ch_id = '".$ch_id."' 
                     AND req_header.hm_value_id = 'refill'
                     AND  Items.item_name = 'CallSign'";
                     
                    if (($reqitems3 = $dbc1->query($requery3)) == TRUE) {
                      while ($rowb3 = $reqitems3->fetch_array()) {
                                    $dblval[0]=$rowb3['hm_value_id'];
                                    $dblval[1]=$rowb3['category_id'].":".$rowb3['subcategory_id'].":".$rowb3['item_id'];
                                    $dblval[2]=$rowb3['callsign'];
                          $reqrepopar[]=$dblval;
        }
    }else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
$reqitems3->free();
				         
                $dbc1->close();

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//return $reqrepopar;
 echo json_encode($reqrepopar);     
                                  ?>
