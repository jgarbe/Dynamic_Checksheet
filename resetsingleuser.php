<?php
   require_once('inc/startsession.php');

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  
  require_once('inc/appvars.php');
  $Title="Reset Single User's Password";
  require_once('inc/title.php');

/////////////////////////////////
//Bring in functions of "chkclass.php"
/////////////////////////////////
 require_once("inc/functions.php.inc");
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
	

	
  }
  else {
    echo ' <a href="login.php">Log In As An Administrator(' . $_SESSION['username'] . ').</a><br />';
    //echo ' <a href="signup.php">Sign Up</a>';
  }

?>
</div>


<?php

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
if (isset($_POST['reset']) && !empty($_POST['prepend']) && !empty($_POST['user_id']) ) {

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	echo"<table>";
		$chuser_id=$_POST['user_id'];
		$prepchusername=$_POST['prepend'];
	print("<tr><td>$chuser_id</td><td>"._user_idtoname($chuser_id)."</td><td>$prepchusername</td></tr>");
	$query2 = "UPDATE _user SET password = SHA('".$_POST['prepend']."')" .
            " WHERE user_id = '" . $_POST['user_id'] . "'";
		mysqli_query($dbc, $query2) or die("Update failed");
	
	?>
	</table>
 <div align="center"><a href=resetsingleuser.php>BACK</a></div> 

  <?php

	$_POST['reset'] = "";
} 
	elseif (isset($_POST['reset']) && (empty($_POST['prepend']) || empty($_POST['user_id']) ))  {
			
        echo '<center><p class="error">You should prepend your reset password AND choose a user.<br> (example-- 123 = 123password or XXX = XXXpassword ). </p></center>';	?> 
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">



      <label for="prepend">New Password:</label>
      <input type="text" id="prepend" name="prepend" value="<?php if (!empty($_POST['prepend'])) echo $_POST['prepend']; ?>" />




    <div align="center"><input type="submit" value="Try Again" name="reset" /></div>
  </form>
	<div align="center"><a href=resetsingleuser.php>BACK</a></div> 

  <?php
} else {
?>

<form name="Status" ID="Status" ACTION="<?php echo $PHP_SELF;?>" METHOD="POST" >

<fieldset><legend>Single User Password Reset</legend>
<?php
print("<center><H3>Choose a user to have password reset.</H3></center>");
print("<label>Choose a user to have password reset.</label>");
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

echo"<SELECT NAME='user_id' >";
?>
<OPTION VALUE="">Choose </OPTION>
<?=$itemoptions?>
</SELECT> <br>
		
<p>Please set a new password for the user. </p>
      <label for="prepend">New Password:</label>
      <input type="text" id="prepend" name="prepend" value="<?php if (!empty($_POST['prepend'])) echo $_POST['prepend']; ?>" />

    <center><input type="submit" value="OK" name="reset" /></center>
  </form>

<?php


}

}


?>
</html>
