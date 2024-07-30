<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Creating Items";
  require_once('inc/title.php');
?>



<?php
 require_once("inc/functions.php.inc");
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {
	

	
  }
  else {
    echo ' <a href="login.php">Log In As An Administrator(' . $_SESSION['username'] . ').</a><br />';
    //echo ' <a href="signup.php">Sign Up</a>';
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (!empty($_POST['Item_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1)) { //if logged in, and form submitted

	if (!empty($_POST['NewItem'])  ) {

	$NewItem=$_POST['NewItem'];
	$PerishableItem=$_POST['PerishableItem'];
  // Connect to the database 
	print("$PerishableItem");
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

$query="INSERT INTO Items VALUES ('0','$NewItem','$PerishableItem','','','','','')";
mysqli_query($dbc,$query) or die( "Unable to insert into Items:". mysqli_error()); 
echo "".$NewItem." created.<br>";
	
  mysqli_close($dbc);

?>


<?php

print ("<center><a href='".HOME."'>HOME</a></center>\n");

print ("<center><a href=create_items.php>Create Another Item</a></center>\n");
} elseif (!empty($_POST['Item_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && (empty($_POST['NewItem'])  )) {

?>
<form name="Item_create" ID="Itemcreate" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Item Creation</legend>
<fieldset>
<?php
print("<center><H3><font style=color:red;>Try again. Please fill these fields, below.</font></H3></center>");
?>
<?php
print("<center><H3>To create a new Item, fill out the form.</H3></center>");

?>
<table>
	<TR>
		<TH colspan="1" align="center" valign="top" bgcolor="darkCyan">What is the Item Name?</TH>
		<TH colspan="1" align="center" valign="top" bgcolor="darkCyan">Does the Item have an Expiration Date?</TH>
	</tr>
	<tr>

		<TD align="center" valign="middle">		
			What is the Item Name?
		</TD>	
	<TD align="center" valign="middle">		
			Is it Perishable?
		</TD>

	</tr>
	<tr>


		<TD align="center">
<input type="text" name="NewItem" size="32">
		</TD>
		<TD align="center">
<input type="checkbox" name="PerishableItem" value="1">
		</TD>
	</TR>
</table>
 <center><INPUT TYPE="submit"  NAME="Item_create"  ID="Itemcreate" VALUE="Submit" >
</fieldset>
</form>

<?php
}
} elseif (empty($_POST['Item_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) { // logged in

?>
<form name="Item_create" ID="Itemcreate" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Creating an Item</legend>
<fieldset>
<?php
print("<center><H3>To create a new Item, fill out the form.</H3></center>");

?>
<table>
	<TR>
		<TH colspan="1" align="center" valign="top" bgcolor="darkCyan">What is the Item Name?</TH>
		<TH colspan="1" align="center" valign="top" bgcolor="darkCyan">Does the Item have an Expiration Date?</TH>
	</tr>
	<tr>
		<TD align="center" valign="middle">		
			What is the Item Name?
		</TD>
	<TD align="center" valign="middle">		
			Is it Perishable?
		</TD>
	</tr>
	<tr>
		<TD align="center">
<input type="text" name="NewItem" size="32">
		</TD>
		<TD align="center">
<input type="checkbox" name="PerishableItem" value="1">
		</TD>
	</TR>
</table>
 <center><INPUT TYPE="submit"  NAME="Item_create"  ID="Itemcreate" VALUE="Submit" >
</fieldset>
</form>

<?php

}


?>
 <center><INPUT TYPE="button" VALUE="View Items Already Created." onclick= "location = 'created_items.php';" >
<div class="push"></div>
</div>
 <? require("inc/footer.inc");  ?>
</body>
</html>
