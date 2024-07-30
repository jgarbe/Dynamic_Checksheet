<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
    $Title="Configure";
  require_once('inc/title.php');
?>

<?php

/////////////////////////////////
//Bring in functions of "chkclass.php"
/////////////////////////////////
 require_once("inc/functions.php.inc");

//<!-- Access the database -->
 require_once("inc/configure.inc.php");


mysql_connect(localhost,$username,$password) or die ( "Unable to log into mysql");
mysql_select_db($database) or die( "Unable to select database"); 


  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
	
    echo ' <a href="viewprofile.php">View Profile</a><br />';
    echo ' <a href="editprofile.php">Edit Profile</a><br />';
    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';

	
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


    if (isset($_SESSION['user_id']) && ($_SESSION['status'] ==1)) {
	}
?>

</body>
</html>
