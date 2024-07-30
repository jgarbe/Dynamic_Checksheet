<?php
   require_once('inc/startsession.php');
  $Title="Activate User";
  require_once('inc/title.php');

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////

/////////////////////////////////
//Bring in functions of "chkclass.php"
/////////////////////////////////
// require_once("inc/functions.php.inc");
  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {

	
  }
  else {
    echo ' <a href="login.php">Log In As An Administrator(' . $_SESSION['username'] . ').</a><br />';
    echo ' <a href="signup.php">Sign Up</a>';
  }
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
?>
</div>

<?php 

if (!empty($_POST['Status']) ) {
// Make sure there is at least one Administrator.
	$admins=0;
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $status2 = mysqli_escape_string($dbc,$_POST['Status']);
	$ID=mysqli_escape_string($dbc,$_POST['user_id']);
	$stat=mysqli_escape_string($dbc,$_POST['stat']);
$query = "SELECT status,user_id from _user WHERE _user.status = 1";
		$result = mysqli_query($dbc, $query) or die ("can't get the query selection");
	 while($row = mysqli_fetch_array($result)) {
		$admin_id=$row['user_id'];
		$admins=$admins+1;
		}

	//echo"$admins";
	if (($admins <=1 ) && ($admin_id == $ID))
 { 
	echo"<p class=error>There must be at least one Administrator.</p>"; } else {
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query="Update _user SET status = ".$stat." WHERE _user.user_id = `".$ID."`  LIMIT 1";
mysqli_query($dbc, $query) or die( "Unable to change status:". mysqli_error()); 
echo "<label>User Status Changed.<br></label>";
}
	mysqli_close($dbc); 
	print("<div align=\"center\"><INPUT TYPE=\"button\" value=\"Back\"    class=\"daButt\" onClick=\"location.href='activateuser.php'\"></div>\n"); 
	?> <div align="center"><a href=activateuser.php>BACK</a></div><?php 
} 
  elseif (isset($_POST['chpassword'])) {

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Grab the data from the POST
    $nuser = mysqli_real_escape_string($dbc, trim($_POST['nuser']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $stat = mysqli_real_escape_string($dbc, trim($_POST['stat']));
    $mail_rec = mysqli_real_escape_string($dbc, trim($_POST['mail_rec']));
    $email_address = mysqli_real_escape_string($dbc, trim($_POST['email_address']));
	$error = false;

    // Update the profile data in the database
  		  if (!$error) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page


      if (!empty($nuser) && !empty($password) && !empty($email_address) ) {		  // first see if there is already this username
		  print("".$nuser."");
			//$querycheck = "SELECT * FROM _user WHERE username = ".$nuser."";
        $querycheck = "SELECT username FROM _user WHERE username = '".$nuser."'";
        //$result2 = mysqli_query($dbc1, $querycheck);
				$result2=mysqli_query($dbc, $querycheck);

        if (mysqli_num_rows($result2)>=1) {
					print("There is already a user, named \"".$nuser."\"\n");
				} else {
          $query = "INSERT INTO _user VALUES ('','$nuser',SHA('$password'),NOW(),'','','$stat','$mail_rec','$email_address') ";        
        mysqli_query($dbc, $query);
        
        
        
        echo '<p>The New User, '.$nuser.' was successfully updated.</p>';
				} 
	
}
        mysqli_close($dbc);
        	print("<div align=\"center\"><INPUT TYPE=\"button\" value=\"Back\"    class=\"daButt\" onClick=\"location.href='activateuser.php'\"></div>\n"); 
	?> <div align="center"><a href=activateuser.php>BACK</a></div>   <?php
        exit();
		} else {
			
        echo '<p class="error">There was an error in the new user data. </p>';	}

	?> <div align="center"><a href=activateuser.php>BACK</a></div> 

  <?php
}
else {
?>







  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
    
 <fieldset>    <legend>Add User</legend>
	<table style="align:center">
<tr> <td>
      <label for="nuser">username:</label><br />
      <input type="text" id="nuser" name="nuser" />
</td>
<td>      <label for="password">Password:</label><br />
      <input type="text" id="password" name="password" />
</td>
<td>      <label for="email_address">E-mail Address: (up to 50 characters)</label><br />
      <input type="text" id="email_address" name="email_address" />
</td>
<td>      <label for="rec">Requisition Reciever</label><br />
      <input type="checkbox" id="rec" name="mail_rec" />
</td>

<td style="padding:30px">


<ul>

<LI> Administrator= full access</LI>
<li>Active=user access</li>
<li>Deactivated=no access</LI>

<li>

<?php
$itemoptions="";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql="SELECT * FROM user_status order by status_id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$status_id=$row[0];
				$Status = $row[1];
			
			$itemoptions .="<OPTION VALUE=\"$status_id\">$Status</OPTION>";
}

echo"<SELECT NAME=stat >";
?>
<OPTION VALUE="">Choose </OPTION>
<?=$itemoptions?>
</SELECT>
</li></ul></td>
</tr>

</table> <br><hr>
    <center><input type="submit" value="Add User" name="chpassword" /></center><br>
<?php
	mysqli_close($dbc); 
?>
    </fieldset>
  </form>









<form name="Status" ID="Status" ACTION="<?php echo $PHP_SELF;?>" METHOD="POST" >

<fieldset><legend>Personnel Status</legend>
<?php
print("<center><H3>Choose a user to activate or deactivate.  You can't delete them or they may dissappear from a prior records.</H3></center>");
print("<label>Choose Personnel to change status.</label>");
$name=_user;	
$itemoptions="";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql="SELECT * FROM $name WHERE user_id != 1 order by username asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_chosen_id=$row[0];
				$OName = $row[1];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">$OName</OPTION>";
}

echo"<SELECT NAME=user_id >";
?>
<OPTION VALUE="">Choose </OPTION>
<?=$itemoptions?>
</SELECT> <br><hr><br>	
<h3>Change the status:</h3>
<ul>
<LI> Administrator= full access</LI>
<li>Active=user access</li>
<li>Deactivated=no access</LI>
</ul>
<?php
$itemoptions="";
	$sql="SELECT * FROM user_status order by status_id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$status_id=$row[0];
				$Status = $row[1];
			
			$itemoptions .="<OPTION VALUE=\"$status_id\">$Status";
}

echo"<SELECT NAME=stat >";
?>
<OPTION VALUE="">Choose <? ?>
<?=$itemoptions?>
</SELECT> <br><hr><br>
<?php
	mysqli_close($dbc); 
?>

 <center><INPUT TYPE="submit"  NAME="Status"  ID="Status" VALUE="Update Status" >
</fieldset>
</form>
<?php

}
?>
<div class="push"></div>
</div>
</body>
</html>
