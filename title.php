<?php
// <!--Written by Jim Garbe-->

require_once('inc/appvars.php');
print("<head>\n");
print("<title> ".$Title."</title>\n");
//require_once(THEME);
require_once('css/plaintheme.php');
print("<link rel=\"stylesheet\" href=\"".THEME_CSS."\">\n");
print("<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\" media=\"screen\"> \n");

 print("<link href=\"http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css\" type=\"text/css\" rel=\"stylesheet\">\n");

// print("   <link href=\"styles.css\" type=\"text/css\" rel=\"stylesheet\">\n");

 //print("<script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script> \n");
 print("  <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.1.min.js\"></script>\n");





print("</head>\n");
print("<br />\n");

print ("<div class=\"header\">");
print ("<img src=\"".LOGO."\" width=\"150\" height=\"150\" border=\"0\"  align=\"right\">\n");
  // Generate the navigation menu
  if (isset($_SESSION['username'])) {
include('inc/user_menu.inc.php');
		if ($_SESSION['status'] < 2) {
	   // print("<a href=\"index.php\">HOME</a>\n");
			}

	
  }
  else {
     if( $Title != 'Login') {
 print("<a href=\"login.php\">Log In</a><br />\n");
//print("<a href=\"signup.php\">Sign Up</a>\n");
}
}
  // Connect to the database 
require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
      if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {
          print(" ".$_SESSION['username']."\n");
  }   else  {
echo "<h3>Please Log in. </h3>";

}

print("</div>\n");
?>



