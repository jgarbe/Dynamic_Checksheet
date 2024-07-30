<?php
//mail_req_ajax.inc.php   
//by Jim Garbe/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function userrecip($ordervalue,$table) {
require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
		$sql = "SELECT ".$table.".* FROM ".$table."  WHERE  ".$table.".user_id = '".$ordervalue."'"; 
                        if (($recip = $dbc1->query($sql)) == TRUE) {
                      while ($rowrecipr = $recip->fetch_array(MYSQLI_NUM)) {
                             return   $rowrecipr[1];

		}
}else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
                        $recip->free();
                $dbc1->close();
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function mailthestuff($Checksheetno,$newto) {
//function mailthestuff($Checksheetno) {
//require_once('inc/connectvars.php');
//require_once('inc/appvars.php');
require_once('connectvars.php');
require_once('appvars.php');




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	

///////////////////////////////////////////////////////////////////////////////////////////////
//
//                        Mail the Stuff
//
//
////////////////////////////////////////////////////////////////////////////////////////////////

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL

  // Uncomment this and line 275 for regular version.
  $mail_rec_query = "SELECT email_address  FROM _user WHERE mailrec = '1'";
  $email_addresses = mysqli_query($dbc, $mail_rec_query);
  while ($rowemail=mysqli_fetch_array($email_addresses)) {
        $ta=$rowemail['email_address'];
	$newto==""?$to=$ta:$to=$newto;
//print($to);
//define the subject of the email
$subject = $Checksheetno.' Supply Requisition';
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));
//define the headers we want passed. Note that they are separated with \r\n
//$headers = "From: ".$Checksheetno."@".MAIL_SERVER."\r\nReply-To: jimgarbe@".MAIL_SERVER."";
$headers = "From: ".$Checksheetno."@dynamic-checksheet.com \r\n Reply-To: jimgarbe@gmail.com";
//  HTML Mime type
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//    add boundary string and mime type specification
//$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
$headers .="Message-ID: <". time() .rand(). "@".$_SERVER['SERVER_NAME'].">". "\r\n";
//$headers .="Return-Path: webmin@".MAIL_SERVER."\r\n";
$headers .="Return-Path: jimgarbe@gmail.com\r\n";
//define the body of the message.
ob_start(); //Turn on output buffering
/*?>
--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/plain; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit


<?php
*/
//////////////////////////Mail Message Here
//include("getrequisition.php?ch=".$Checksheetno."");
/////////////////////////
//print("<br />".$Checksheetno." <br />\n");
/*
?>

--PHP-alt-<?php echo $random_hash; ?>--
<?
*/









require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
 
                                    $M = array();
print(" <h3 align=\"center\">".$Checksheetno." Requisition Order </h3>      \n");
echo "<center><table>";
                     $requery = "SELECT req_header.hm_value_id, req_header.result, Items.item_name AS i_name, Category.category_name AS c_name FROM req_header
                                        INNER JOIN Category ON Category.category_id = req_header.category_id
                                         INNER JOIN Items ON Items.item_id = req_header.item_id WHERE req_header.ch_id = '".$Checksheetno."' ORDER BY Items.item_id";
                     
                    if (($reqitems = $dbc1->query($requery)) == TRUE) {
                      while ($rowb = $reqitems->fetch_array()) {

                          if ($rowb['hm_value_id'] == 'refill') {
                                       // print("".$rowb['result']." ".$rowb['i_name']."\n");
                           print(" <tr><td>\n");
                            print("".$rowb['i_name']."</td><td> ".reciper($rowb['result'],$rowb['i_name'])."\n");
                           print(" </td> </tr>\n");
                          }
                          if ($rowb['hm_value_id'] == 'personnel') {
                                       // print("".$rowb['result']." ".$rowb['i_name']."\n");
                           print(" <tr><td>\n");
                            print("".$rowb['i_name']."</td><td> ".userrecip($rowb['result'],'_user')."\n");
                           print(" </td> </tr>\n");
                      }
                      
                          if ($rowb['hm_value_id'] == 'miles') {
                                    if($rowb['i_name']=='Mileage') { $M[0] = $rowb['result'];}
                                    if($rowb['i_name']=='Service Due') { $M[1] = $rowb['result'];}
                           print(" <tr><td>\n");
                          // print("Test ".$M[0]."\n<br />");
                            print("".$rowb['i_name']."</td><td> ".$rowb['result']."\n");
                           print(" </td> </tr>\n");

                  }
                   }
                    
                        }                        else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                  
                                                 if (!empty($M[0]) && !empty($M[1])) {
                                                     if($M[0] <$M[1] ) { 
                                                     $M[3] = $M[1] - $M[0];
                               print("<tr><td colspan=\"2\">Due for service in ".$M[3] ." miles.</td></tr>\n");
                                                            
                                                         } else {
                                                             
                                                     $M[3] = $M[0] - $M[1];
                               print("<tr><td colspan=\"2\">*****".$M[3] ." miles overdue for service.****</td></tr>\n");
                                                             }
                                                     
                               } 
                        $reqitems->free();
                $dbc1->close();
echo "</table></center>";







  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
echo "<table>";
                     $rrequery = "SELECT requisition.result, Items.item_name AS i_name, Category.category_name AS c_name FROM requisition
                                        INNER JOIN Category ON Category.category_id = requisition.category_id
                                         INNER JOIN Items ON Items.item_id = requisition.item_id WHERE requisition.ch_id = '".$Checksheetno."' ";
                     
                    if (($rreqitems = $dbc1->query($rrequery)) == TRUE) {
                      while ($rrowb = $rreqitems->fetch_array()) {
                            print(" <tr><td>\n");
                            print("".$rrowb['result']."</td><td> ".$rrowb['i_name']." </td><td>  From ".$rrowb['c_name']." .\n");
                            print(" </td> </tr>\n");
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                        $rreqitems->free();
                $dbc1->close();
echo "</table>";
/////////////////////////////////////////////////////////////////////////////////////////////////
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
echo "<p>";
                     $footerquery = "SELECT req_footer.result, Comment_._comment AS comment, Items.item_name AS i_name, Category.category_name AS c_name FROM req_footer
                                        INNER JOIN Category ON Category.category_id = req_footer.category_id
                                         INNER JOIN Items ON Items.item_id = req_footer.item_id
                                         INNER JOIN Comment_ ON Comment_.comment_id = req_footer.result WHERE req_footer.ch_id = '".$Checksheetno."' ";
                     
                    if (($footeritems = $dbc1->query($footerquery)) == TRUE) {
                      while ($rrowcom = $footeritems->fetch_array()) {
                            print(" <strong>Comments </strong><br/>".$rrowcom['comment']." <br />\n");
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
    
echo "</p>";                    
                        $footeritems->free();
                $dbc1->close();
                
                  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
                  // Retrieve the Maintenance data from MySQL where the maintenance is not "resolved".
  $querymaint = "SELECT Comment_._comment AS cm, DATE_FORMAT(Maintenance.date , '%M %d %Y' ) AS dt, _user.username AS un FROM  Maintenance
                            INNER JOIN _user ON _user.user_id = Maintenance.user_id
                            INNER JOIN Checksheets ON Checksheets.id = Maintenance.checksheet_id 
                            INNER JOIN Comment_ ON Comment_.comment_id = Maintenance.comments_id
                            WHERE Checksheets.ChecksheetName = '".$Checksheetno."' AND resolved = 0 ORDER BY date DESC";
                            print("<strong>Maintenance:</strong>\n");
                                if (($maintitems = $dbc1->query($querymaint)) == TRUE) {
                      while ($rrowmaint = $maintitems->fetch_array()) {
                            print(" <br/>".$rrowmaint['dt']." --".$rrowmaint['cm'].",\t".$rrowmaint['un']." <br />\n");
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
}     
$maintitems->free();
                $dbc1->close();

















//copy current buffer contents into $message variable and delete current output buffer
$message = wordwrap(ob_get_clean(),70);
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent to ".$to."<br>" : "Mail to ".$to." failed<br>";


      }
  mysqli_close($dbc);
  
///////////////////////////////////////////////////////////////////////////////////////////////
//
//                        Ending Mail the Stuff
//
//
////////////////////////////////////////////////////////////////////////////////////////////////
}
?> 



























