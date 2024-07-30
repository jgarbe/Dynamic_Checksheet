 <?php     
$ch_id=$_GET['ch_id'];

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
// Get the requisition and put it back into the form
$reqrepopar=array();
require_once('connectvars.php');
 $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
                     $requery = "SELECT req_header.category_id,
                     req_header.subcategory_id,
                     req_header.item_id,
                     req_header.hm_value_id,
                     _user.username
                     FROM req_header 
                     INNER JOIN _user ON _user.user_id = req_header.result
                     WHERE req_header.ch_id = '".$ch_id."' ";
                     
                    if (($reqitems = $dbc1->query($requery)) == TRUE) {
                      while ($rowb = $reqitems->fetch_array()) {
                                            $dblval[0]=$rowb['hm_value_id'];
                                            $dblval[1]=$rowb['category_id'].":".$rowb['subcategory_id'].":".$rowb['item_id'];
                                            $dblval[2]=$rowb['username'];
                          $reqrepopar[]=$dblval;
        }
    }else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
$reqitems->free();
                             
                $dbc1->close();

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//return $reqrepopar;
 echo json_encode($reqrepopar);     
                                  ?>
