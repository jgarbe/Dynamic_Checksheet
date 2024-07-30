<?php
   require_once('inc/startsession.php');

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  $Title="Inventory Page";
  require_once('inc/title.php');
 require("inc/functions.php.inc");

  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');
 require("inc/datadrop.inc.php");

  // Generate the navigation menu
  if (isset($_SESSION['username'])) {
	
    echo ' <a href="viewprofile.php">View Profile</a><br />';
    echo ' <a href="editprofile.php">Edit Profile</a><br />';
    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br>'; 
   echo ' <a href="Arch_menu.php">BACK</a><br />';

	    echo ' <a href="index.php">HOME</a>';
			

	
  }
  else {
    echo ' <a href="login.php">Log In</a><br />';
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


    if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {

		echo"<br><center>";	
	data_drop();
	echo"<br></center>";





}
?>
<div class="push"></div>
</div>


</body>
</html>
