<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  $Title="Archive Menu";
  require_once('inc/title.php');
 require("inc/functions.php.inc");

  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username'])) {

			

	
  }
  else {
   // echo ' <a href="login.php">Log In</a><br />';
   // echo ' <a href="signup.php">Sign Up</a>';
  }
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);



print("</div>\n");


print("<div style=\"text-align:center;\">\n");
    if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {
		print("<ul>\n");
    		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Today's Report\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='dailyreqreport.php'\"></li>\n");
   // echo '<ul><li> <a href="archdropdown.php">Query 10 Latest by Checksheet Drop Down Box, Descending (Takes a While to Load)</a><br /></li>';
    		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Query by Date\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='where.php'\"></li>\n");
    		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Query by Checksheet\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='Archives.php'\"></li>\n");
    		print("</ul>\n");
print("</div>\n");
}
?>
<div class="push"></div>
</div>


</body>
</html>
