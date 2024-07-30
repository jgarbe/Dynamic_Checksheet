<?php
   require_once('inc/startsession.php');
  $Title="Merge Editing";
  require_once('inc/title.php');
?>



<?php
 require_once("inc/functions.php.inc");
  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
	
    echo ' <a href="viewprofile.php">View Profile</a><br />';
    echo ' <a href="editprofile.php">Edit Profile</a><br />';
    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br />';
	print ("<a href=index.php>HOME</a>\n");

	
print("Blah");
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
print("</div>");

//if($_SESSION['status'] == 1) {
//print("Blah");


//}



?>