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
                     $requery = "SELECT category_id,
                     subcategory_id,
                     item_id,
                     hm_value_id,
                     result 
                     FROM req_header WHERE req_header.ch_id = '".$_POST[checksheet]."' ";
                     
                    if (($reqitems = $dbc1->query($requery)) == TRUE) {
                      while ($rowb = $reqitems->fetch_array()) {
                          $repokey=$rowb['category_id'].":".$rowb['subcategory_id'].":".$rowb['item_id'];
                          $reqrepopar[$repokey][0]=$rowb['hm_value_id'];
                          $reqrepopar[$repokey][1]=$rowb['result'];
        }
    }else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
$reqitems->free();

                     $rrequery = "SELECT category_id,
                     subcategory_id,
                     item_id,
                     hm_value_id,
                     result FROM requisition WHERE requisition.ch_id = '".$_POST[checksheet]."' ";
                     
                    if (($rreqitems = $dbc1->query($rrequery)) == TRUE) {
                      while ($rrowb = $rreqitems->fetch_array()) {
                          $rrepokey=$rrowb['category_id'].":".$rrowb['subcategory_id'].":".$rrowb['item_id'];
                          $reqrepopar[$rrepokey][0]=$rrowb['hm_value_id'];
                          $reqrepopar[$rrepokey][1]=$rrowb['result'];
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                        $rreqitems->free();
                        /////////
                                            $footerquery = "SELECT 
                                            req_footer.category_id,
                                            req_footer.subcategory_id,
                                            req_footer.result, 
                                            req_footer.item_id,
                                             req_footer.hm_value_id, 
                                            Comment_._comment AS comment 
                                            FROM req_footer
                                         INNER JOIN Comment_ ON Comment_.comment_id = req_footer.result
                                         WHERE req_footer.ch_id = '".$_POST[checksheet]."' ";
                     
                    if (($footeritems = $dbc1->query($footerquery)) == TRUE) {
                      while ($rrowcom = $footeritems->fetch_array()) {
                          
                          $rrepokey=$rrowcom['category_id'].":".$rrowcom['subcategory_id'].":".$rrowcom['item_id'];
                          
                          $reqrepopar[$rrepokey][0]=$rrowcom['hm_value_id'];
                          $reqrepopar[$rrepokey][1]=$rrowcom['comment'];
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
    
echo "</p>";                    
                        $rreqitems->free();
                        $footeritems->free();

                $dbc1->close();

/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
print_r2($reqrepopar);
 //               foreach($reqrepopar as $repopname=>$repopval) {
 //   $reparr=explode("_",$repopname);
 //   if($cat_id == $reparr[0]) {    print("<br />".$cat_id."<br />\n");}
 //   }


?>