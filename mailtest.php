<?php
///////////////////////////////////////////////////////////////////////////////////////////////
//
//                        Mail the Stuff
//
//
////////////////////////////////////////////////////////////////////////////////////////////////
	require_once('inc/connectvars.php');  // Set the username connection variables.
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
  $mail_rec_query = "SELECT email_address  FROM _user WHERE mailrec = '1'";
  $email_addresses = mysqli_query($dbc, $mail_rec_query);
  while ($rowemail=mysqli_fetch_array($email_addresses)) {
        $to=$rowemail['email_address'];
//print($to);


//define the subject of the email
$subject = 'Test Supply Requisition';
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: jgarbe@sullivancountyems.org\r\nReply-To: jgarbe@sullivancountyems.org";
//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
$headers .="Message-ID: <". time() .rand(). "@".$_SERVER['SERVER_NAME'].">". "\r\n";
$headers .="Return-Path: jgarbe@sullivancountyems.org\r\n";
//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/plain; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit


--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/html; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

<?
//////////////////////////Mail Message Here
include("tmp/Test.html");
/////////////////////////


?>

--PHP-alt-<?php echo $random_hash; ?>--
<?
//copy current buffer contents into $message variable and delete current output buffer
$message = wordwrap(ob_get_clean(),70);
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent to $to<br>" : "Mail to $to failed<br>";


      }
  mysqli_close($dbc);
///////////////////////////////////////////////////////////////////////////////////////////////
//
//                        Ending Mail the Stuff
//
//
////////////////////////////////////////////////////////////////////////////////////////////////
