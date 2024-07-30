<?php
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}

                     $rrequery = "DELETE requisition.result,
                      Items.item_name AS i_name,
                       Category.category_name AS c_name
                       FROM requisition
                       INNER JOIN Category ON Category.category_id = requisition.category_id
                       INNER JOIN Items ON Items.item_id = requisition.item_id
                        WHERE requisition.ch_id = '".$Checksheetno."' ";
                     
                    if (($rreqitems = $dbc1->query($rrequery)) == TRUE) {
                      while ($rrowb = $rreqitems->fetch_array()) {
                       
                            print("".$rrowb['result']."</td><td> ".$rrowb['i_name']." </td><td>  From ".$rrowb['c_name']." .\n");
                           
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                        $rreqitems->free();
                $dbc1->close();
echo "</table>";

?>
