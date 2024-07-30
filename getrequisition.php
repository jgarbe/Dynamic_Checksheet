<?php
$Checksheetno = $_GET['ch'];
echo "<ul>";
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

                     $requery = "SELECT * FROM requisition WHERE ch_id = '".$Checksheetno."' ";
                     
                    if ($reqitems = $dbc1->query($requery) == TRUE) {
                        while ($row = $reqitems->fetch_object()) {
                            print(" <li>\n");
                            print("".$row['result']."".$row['item_id']." -  From ".$row['category_id']." .\n");
                            print(" </li>\n");
                        }
                        $reqitems->close();
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                $dbc1->close();




echo "</ul>";
?>