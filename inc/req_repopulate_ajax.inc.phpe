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
                     $requery = "SELECT req_header.category_id,
                     req_header.subcategory_id,
                     req_header.item_id,
                     req_header.hm_value_id,
                     req_header.result 
                     FROM req_header WHERE req_header.ch_id = '".$ch_id."' ";
                     
                    if (($reqitems = $dbc1->query($requery)) == TRUE) {
                      while ($rowb = $reqitems->fetch_array()) {
                                            $dblval[0]=$rowb['hm_value_id'];
                                            $dblval[1]=$rowb['category_id'].":".$rowb['subcategory_id'].":".$rowb['item_id'];
                                            $dblval[2]=$rowb['result'];
                          $reqrepopar[]=$dblval;
        }
    }else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
$reqitems->free();
                $dbc1->close();
                 $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}

                     $rrequery = "SELECT requisition.category_id,
                     requisition.subcategory_id,
                     requisition.item_id,
                     requisition.hm_value_id,
                     requisition.result FROM requisition WHERE requisition.ch_id = '".$ch_id."' ";
                     
                    if (($rreqitems = $dbc1->query($rrequery)) == TRUE) {
                      while ($rrowb = $rreqitems->fetch_array()) {
                                            $dblval[0]=$rrowb['hm_value_id'];
                                            $dblval[1]=$rrowb['category_id'].":".$rrowb['subcategory_id'].":".$rrowb['item_id'];
                                            $dblval[2]=$rrowb['result'];
                          $reqrepopar[]=$dblval;
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                        $rreqitems->free();
                $dbc1->close();
                         $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
                        /////////
                                            $footerquery = "SELECT 
                                            req_footer.category_id,
                                            req_footer.subcategory_id, 
                                            req_footer.item_id,
                                             req_footer.hm_value_id, 
                                            Comment_._comment AS comment 
                                            FROM req_footer
                                         INNER JOIN Comment_ ON Comment_.comment_id = req_footer.result
                                         WHERE req_footer.ch_id = '".$ch_id."' ";
                     
                    if (($footeritems = $dbc1->query($footerquery)) == TRUE) {
                      while ($rrowcom = $footeritems->fetch_array()) {
                            $dblval[0]=$rrowcom['hm_value_id'];
                            $dblval[1]=$rrowcom['category_id'].":".$rrowcom['subcategory_id'].":".$rrowcom['item_id'];
                            $dblval[2]=$rrowcom['comment'];
                          $reqrepopar[]=$dblval;
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
                       
                        //$rreqitems->free();
                        $footeritems->free();

                $dbc1->close();

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//return $reqrepopar;
 echo json_encode($reqrepopar);
 //               foreach($reqrepopar as $repopname=>$repopval) {
 //   $reparr=explode("_",$repopname);
 //   if($cat_id == $reparr[0]) {    print("<br />".$cat_id."<br />\n");}
 //   }


?>
