 <?php
function commentrepopulate($Checksheetno) {
require_once('connectvars.php');
 $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
                     $footerquery = "SELECT  Comment_._comment AS comment  FROM req_footer
                                         INNER JOIN Items ON Items.item_id = req_footer.item_id
                                         INNER JOIN Comment_ ON Comment_.comment_id = req_footer.result
                                         WHERE req_footer.ch_id = '".$Checksheetno."' ";
                     
                    if (($footeritems = $dbc1->query($footerquery)) == TRUE) {
                      while ($rrowcom = $footeritems->fetch_array()) {
                            return $rrowcom['comment'];
                    }
                    
                        }
                       
                        $rreqitems->free();
                        $footeritems->free();
                $dbc1->close();
}
?>