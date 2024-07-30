<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Viewing Created Items";
  require_once('inc/title.php');
 require_once("inc/functions.php.inc");


  require_once('inc/connectvars.php');
  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {

	

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
?>
</div>
<?php


print("<div class='scrollTableContainer'>");
print(" <center><INPUT TYPE=\"button\" VALUE=\"Back to Item Creation.\" onclick= \"location = 'create_items.php';\" > \n");
print ("\"&#x2713;\"=Expiration Date on Item");
print("<table class=dataTable style=color:white; cellspacing=0>");
	print("\t<thead>\n");
	
	print("\t<tr>\n");
	print("\t\t<th  bgcolor='#662A03' colspan='6'>\n");
	
	print("\t\t\tItems\n");
	print("\t\t</th>\n");
	
	print("\t</tr>\n");
	print("\t</thead>\n");
/////////////////////////////////////////////////////////////////
	print("\t<tbody>\n");
	print("\t<tr>\n");
$name=Items;	// Name of the menu table
$tr=0;
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name ORDER BY item_name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_id=$row[0];
				$ItemName = $row[1];
				$Perishable = $row[2];
				if ($Perishable == 1) 	{ $printcheck="&#x2713;";}
				else {$printcheck = '';}
	//print("\t\t<td align=right style='border-color:#433C33;border-left-style:dotted;border-bottom-style:dotted;'>$CatName</td>\n");
	//print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>$SubName</td>\n");
	//print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>$ParName</td>\n");
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>$ItemName</td>\n");
	print("<td align=center style='border-color:#433C33;border-right-style:dotted;border-bottom-style:dotted;'>".$printcheck."</td>\n");
	$tr++;
	if ($tr==3) {
		print("\t</tr>\n\t<tr>\n");
		$tr=0;}
}

	print("\t</tr>");
	print("\t</tbody>\n");
print("</table>");
print("</div>");
  mysqli_close($dbc);



}   
  else {
    echo ' <a href="login.php">Log In As An Administrator(' . $_SESSION['username'] . ').</a><br />';
    //echo ' <a href="signup.php">Sign Up</a>';
  }


?>

 <center><INPUT TYPE="button" VALUE="Back to Item Creation." onclick= "location = 'create_items.php';" >
<div class="push"></div>
</div>
 <? require("inc/footer.inc");  ?>
</body>
</html>
