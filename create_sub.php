<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Creating a Subcategory";
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

if (!empty($_POST['Subcategory_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && (!empty($_POST['NewSub']) ) && (!empty($_POST['columns']) )) {

	$NewSub=$_POST['NewSub'];
	$columns=$_POST['columns'];
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

$query="INSERT INTO Subcategory VALUES ('','$NewSub','$columns')";
mysqli_query($dbc,$query) or die( "Unable to insert into subcategory:". mysqli_error()); 
echo "$NewSub created.<br>";
	
  mysqli_close($dbc);

?>


<?php

print ("<center><a href=index.php>HOME</a></center>\n");

print ("<center><a href=create_sub.php>Create Another Subcategory</a></center>\n");
} elseif (!empty($_POST['Subcategory_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && ((empty($_POST['NewSub']) ) || (empty($_POST['columns']) )) ) {

?>
<form name="Subcategory_create" ID="Subcreate" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Subcategory Creation</legend>
<fieldset>
<?php
print("<center><H3>To create a new Subcategory, create a new name and its number of columns.</H3></center>");
print("<center><H3><font style=color:red;>Try again. Please fill these fields, below.</font></H3></center>");
?>
<table><TR><TH colspan="1" align="center" valign="top" bgcolor="darkCyan">New Subcategory Name</TH><TH colspan="1" align="center" valign="top" bgcolor="darkCyan">Number of Columns</TH></tr>
<tr><TD align="center">  This "Subcategory  Name" needs to be different than anything that already exists (up to 32 characters.)</TD><td align="center">The number of columns should vary with how wide your form needs to neatly show each item.</td></tr>
<tr><TD align="center">
<input type=text NAME=NewSub size = 32></TD><TD align="center">
<input type=text NAME=columns size = 2></TD>
</TR></table>
 <center><INPUT TYPE="submit"  NAME="Subcategory_create"  ID="Subcreate" VALUE="Submit" >
</fieldset>
</form>

<?php

}elseif (empty($_POST['Subcategory_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) {

?>
<form name="Subcategory_create" ID="Subcreate" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Creating a Subcategory</legend>
<fieldset>
<?php
print("<center><H3>To create a new Subcategory, create a new name.</H3></center>");

?>
<table>
	<TR>
		<TH colspan="1" align="center" valign="top" bgcolor="darkCyan">New Subcategory Name</TH>
		<TH colspan="1" align="center" valign="top" bgcolor="darkCyan">Number of Columns</TH>
	</tr>
	<tr>
		<TD align="center">
			  This "Subcategory  Name" needs to be different than anything that already exists (up to 32 characters.)
		</TD>
		<TD align="center" valign="middle">		
			The number of columns should vary with how wide your form needs to neatly show each item.
		</TD>
	</tr>
	<tr>
		<TD align="center">
			<input type=text NAME=NewSub size = 32>
		</TD>
		<TD align="center">
			<input type=text NAME=columns size = 2>
		</TD>
	</TR>
</table>
 <center><INPUT TYPE="submit"  NAME="Subcategory_create"  ID="Subcreate" VALUE="Submit" >
</fieldset>
</form>

<?php

}
	echo"<table style=color:gray; width='100%'>";	print("\t<tr>\n");
	print("\t\t<th bgcolor='#662A03' colspan='6'>\n");
	
	print("\t\t\tExisting Subcategories\n");
	print("\t\t</th>\n");
	print("\t</tr>\n");
	
	print("\t<tr>\n");
	print("\t\t<th bgcolor='#662A03'>\n");
	
	print("\t\t\tSubcategory Name\n");
	print("\t\t</th>\n");
	print("\t\t<th  bgcolor='#662A03'>\n");
	
	print("\t\t\tColumns\n");
	print("\t\t</th>\n");
	print("\t\t<th  bgcolor='#662A03'>\n");
	
	print("\t\t\tSubcategory Name\n");
	print("\t\t</th>\n");
	print("\t\t<th  bgcolor='#662A03'>\n");
	
	print("\t\t\tColumns\n");
	print("\t\t</th>\n");
	print("\t\t<th  bgcolor='#662A03'>\n");
	
	print("\t\t\tSubcategory Name\n");
	print("\t\t</th>\n");
	print("\t\t<th  bgcolor='#662A03'>\n");
	
	print("\t\t\tColumns\n");
	print("\t\t</th>\n");
	print("\t<tr>\n");
$name=Subcategory;	// Name of the menu table
$tr=0;
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name order by subcategory_id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_id=$row[0];
				$OName = $row[1];
				$OCols = $row[2];
	print("\t\t<td align=right style='border-color:#433C33;border-left-style:dotted;border-bottom-style:dotted;'>$OName</td><td align=center style='border-color:#433C33;border-right-style:dotted;border-bottom-style:dotted;'>$OCols</td>\n");
	$tr++;
	if ($tr==3) {
		print("\t</tr>\n\t<tr>\n");
		$tr=0;}
}

	print("\t</tr>");
print("</table>");
  mysqli_close($dbc);

?>
<div class="push"></div>
</div>
 <? require("inc/footer.inc");  ?>
</body>
</html>
