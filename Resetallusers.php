<?php
   require_once('inc/startsession.php');

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  $Title="Reset All Users' Passwords";
  require_once('inc/appvars.php');
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
   // echo ' <a href="signup.php">Sign Up</a>';
  }

?>
</div>


<?php

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
if (isset($_POST['reset'])&& !empty($_POST['confirm']) && !empty($_POST['prepend'])) {

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Grab the data from the _user database.
	echo"<table style=color:white;>";
  // Retrieve the user data from MySQL
  $chquery = "SELECT  user_id,username  FROM _user WHERE user_id != 1";
  $chdata = mysqli_query($dbc, $chquery); 
	while($chuser=mysqli_fetch_array($chdata)){
		$chuser_id=$chuser['user_id'];
		$chusername=$chuser['username'];
		$prepchusername=$_POST['prepend'].$chusername;
	print("<tr><td>$chuser_id</td><td>$chusername</td><td>$prepchusername</td></tr>");
	$query2 = "UPDATE _user SET password = SHA('$prepchusername')" .
            " WHERE user_id = '" . $chuser['user_id'] . "'";
	$chdata2= mysqli_query($dbc,$query2);
	}
	?>
	</table>
 <div align="center"><a href=Resetallusers.php>BACK</a></div> 

  <?php
} elseif (isset($_POST['reset2'])&& empty($_POST['confirm']) && !empty($_POST['prepend']))  {
		
 ?> <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php	
        echo '<center><p class="error" style=font-size:1.4em>Warning:<br>';
        echo 'Resetting all passwords will not allow anyone access until they are given the new password. </p>';
        echo 'Please confirm that you want to reset all passwords. </p></center>';		?>
    <center>  <label for="confirm">Confirm:</label>
      <input type="checkbox" id="confirm" name="confirm" value="1" /><br />	<br>
      <label for="prepend">Prepend:</label>
      <input type="text" id="prepend" name="prepend" value="<?php if (!empty($_POST['prepend'])) echo $_POST['prepend']; ?>" /></center><br>
<div align="center"><input type="submit" value="OK" name="reset" /></div>
  </form> <div align="center"><a href=Resetallusers.php>BACK</a></div> 

  <?php
}
	elseif (isset($_POST['reset2']) && empty($_POST['prepend']))  {
			
        echo '<center><p class="error">You should prepend your reset passwords.<br> (example-- 123 = 123password or XXX = XXXpassword ). </p></center>';	?> 
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">



      <label for="prepend">New Prepend:</label>
      <input type="text" id="prepend" name="prepend" value="<?php if (!empty($_POST['prepend'])) echo $_POST['prepend']; ?>" />




    <div align="center"><input type="submit" value="Try Again" name="reset2" /></div>
  </form>
	<div align="center"><a href=Resetallusers.php>BACK</a></div> 

  <?php
} else {
?>

  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


<h2>To Reset ALL Passwords</h2>			
<p>The new passwords will reset to a "prepend" and the username. <br> (example-- 123 = 123username or XXX = XXXusername ). </p>
      <label for="prepend">New Prepend:</label>
      <input type="text" id="prepend" name="prepend" value="<?php if (!empty($_POST['prepend'])) echo $_POST['prepend']; ?>" />

    <center><input type="submit" value="Reset" name="reset2" /></center>
  </form>












<?php


}


}

?>
<div class="push"></div>
</div>
</body>
</html>
