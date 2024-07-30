<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
	require_once('inc/appvars.php');  // Set the Variables	
    $Title="Archived Checksheet Viewer";
 include('inc/title.php');
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once("inc/maintmerge.inc.php");
  // Connect to the username database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);
  mysqli_close($dbc);

  if (isset($_SESSION['username'])) {  //****************//If logged in

	  // Generate the navigation menu


		if ($_SESSION['status'] == 1) {    //If Administrator Priviledges
			}
print("<div style=\"text-align:center;\"><h2>".$_POST['checksheet']."</h2></div>\n");

?></div>	<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//   End of Header.
//
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

$Checksheetno = $_POST['checksheet'];  //declare the truck.



?><div class="page">	<?php

echo "<FORM name=\"dateselect\" method=\"post\" action=\"archived_chsh.php\">";
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $query = "SELECT * FROM ".$Checksheetno."_events WHERE submitted = 1 ORDER BY date DESC";
  $data = mysqli_query($dbc, $query);
  echo "<table border=1>";
 
  while ($row = mysqli_fetch_array($data)) { 
		$chsh_id = $row['id'];
		$chshdate = strftime("%a     %b %d %Y    %H:%M:%S", strtotime($row['date']));

print("<tr><td padding=1>");
?>
<?php echo $chshdate ?></td><td><input type="submit" name="event_id" value="<?php echo $chsh_id ?>" class="gobutton">
<?php
print("</td></tr>");




}
print ("</table>");

print ("<input type='hidden' name='checksheet' value=".$_POST['checksheet'].">");

echo"</form>";


?></div>	<?php 


////////////////////////////////////////////////////////////////////////////////////////////////////
//
//    End 
//
/////////////////////////////////////////////////////////////////////////////////////////////////////
} else {   //  If you're not logged in 
		?><div class="header">	<?php 

require_once('inc/logo.php');  // Set the LOGO
logo(LOGO);
	  // Generate the navigation menu
    echo ' <a href="login.php">Log In</a><br />';
    echo ' <a href="signup.php">Sign Up</a>';
 } 

?>

</div>
<div class="push"></div>
</div>


 <?php require("inc/footer.inc");  ?>
</body>
</html>
