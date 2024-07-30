<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Creating a Category";
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

if (!empty($_POST['Category_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && (!empty($_POST['NewCat']) )) {

	$NewCat=$_POST['NewCat'];
	$merged=$_POST['merged'];
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

$query="INSERT INTO Category VALUES ('','$NewCat')";
mysqli_query($dbc,$query) or die( "Unable to insert into Category:". mysqli_error()); 
echo "$NewCat created.<br>";
	
  mysqli_close($dbc);

?>


<?php

print ("<center><a href='".HOME."'>HOME</a></center>\n");

print ("<center><a href=create_cat.php>Create Another Category</a></center>\n");
} elseif (!empty($_POST['Category_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && ((empty($_POST['NewCat']) )  )) {

?>
<form name="Category_create" ID="Catcreate" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Category Creation</legend>
<fieldset>
<?php
print("<center><H3>To create a new Category, create a new name. </H3></center>");
print("<center><H3><font style=color:red;>Try again. Please fill these fields, below.</font></H3></center>");
?>
<table><TR><TH colspan="1" align="center" valign="top" bgcolor="darkCyan">New Category Name</TH></tr>
<tr><TD align="center">  This "Category_Name" needs to be different than anything that already exists (up to 32 characters.  The "Category Name" must be a single word.  Connecting words with an underscore, "_", is acceptible.)</TD></tr>
<tr><TD align="center">
<input type=text NAME=NewCat size = 32></TD>
</TR></table>
 <center><INPUT TYPE="submit"  NAME="Category_create"  ID="Catcreate" VALUE="Submit" >
</fieldset>
</form>

<?php

}elseif (empty($_POST['Category_create']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) {

?>
<form name="Category_create" ID="Catcreate" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Creating a Category</legend>
<fieldset>
<?php
print("<center><H3>To create a new Category, create a new name.</H3></center>");

?>
<table>
	<TR>
		<TH colspan="1" align="center" valign="top" bgcolor="darkCyan">New Category Name</TH>
	</tr>
	<tr>
		<TD align="center">
			   This "Category_Name" needs to be different than anything that already exists (up to 32 characters.  The "Category Name" must be a single word.  Connecting words with an underscore, "_", is acceptible.)
		</TD>
	</tr>
	<tr>
		<TD align="center">
			<input type=text NAME=NewCat size = 32>
		</TD>
	</TR>
</table>
 <center><INPUT TYPE="submit"  NAME="Category_create"  ID="Catcreate" VALUE="Submit" >
</fieldset>
</form>

<?php

}
	echo"<table width='100%' style=color:gray;>";	print("\t<tr>\n");
	print("\t\t<th bgcolor='#662A03' colspan='6'>\n");
	
	print("\t\t\tExisting Categories\n");
	print("\t\t</th>\n");
	print("\t</tr>\n");
	
	print("\t<tr>\n");
	print("\t\t<th bgcolor='#662A03'>\n");
	
	print("\t\t\tCategory Name\n");
	print("\t\t</th>\n");
	print("\t\t<th  bgcolor='#662A03'>\n");
	
	print("\t\t\tCategory Name\n");
	print("\t\t</th>\n");
	print("\t\t<th  bgcolor='#662A03'>\n");
	
	print("\t\t\tCategory Name\n");
	print("\t\t</th>\n");
	print("\t</tr>\n");
	print("\t<tr>\n");
$name=Category;	// Name of the menu table
$tr=0;
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name order by category_id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_id=$row[0];
				$OName = $row[1];
	print("\t\t<td align=right style='border-color:#433C33;border-left-style:dotted;border-bottom-style:dotted;'>$OName</td>\n");
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
