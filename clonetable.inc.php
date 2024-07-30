<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
      $Title="Clone Checksheet";
  require_once('inc/title.php');
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

if (!empty($_POST['UnitClone']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && ((empty($_POST['Newtable'])) || (empty($_POST['placement'])) || (empty($_POST['origname'])))) {
	print("Please go back and fill in all fields.");
	}

elseif (!empty($_POST['UnitClone']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && (!empty($_POST['Newtable'])) && (!empty($_POST['placement'])) && (!empty($_POST['origname']))) {
	$ID=$_POST['placement'];
	$Oname=$_POST['origname'];
	$Newtable=$_POST['Newtable'];
	$Checksheetname=$Newtable."_checksheet";
	$Checksheetevents=$Newtable."_events";
	$commentsname=$Newtable."_comments";
	$Sealedname=$Newtable."_Sealed";
	$sealed=$_POST['sealed'];
$query= "CREATE TABLE IF NOT EXISTS ".$database.".".$Newtable."( id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, item_id INT(11) NOT NULL, category_id INT(11) NOT NULL, subcategory_id INT(11) NOT NULL, hm_value_id INT(11) NOT NULL, req TINYINT(1) NOT NULL) SELECT * FROM ".$database.".".$_POST['origname'];

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
mysqli_query($dbc, $query) or die( "Unable to clone table:". mysqli_error());
echo "".$Newtable." created.<br>";
$query2="INSERT INTO Checksheets(id,ChecksheetName,sealable) VALUES ('$ID','$Newtable','$sealed')";
mysqli_query($dbc,$query2) or die( "Unable to insert into menu table:". mysqli_error()); 
echo "$Newtable Menu Item created.<br>";
$query3="CREATE TABLE IF NOT EXISTS ".$Checksheetevents."(id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,`date` datetime NOT NULL default '0000-00-00 00:00:00',`submitted` TINYINT,`merged` INT,`merger` INT)"; // create the recieving end table
mysqli_query($dbc,$query3) or die( "Unable to create checksheet events table:". mysqli_error()); 
echo "$Newtable Checksheet Database created.<br>";

$query4="CREATE TABLE IF NOT EXISTS ".$commentsname."(id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,`comment` varchar(200))"; // create the recieving comment table
mysqli_query($dbc,$query4) or die( "Unable to create checksheet comment table:". mysqli_error()); 
echo "$Newtable Checksheet comments table created.<br>";

$query5="CREATE TABLE IF NOT EXISTS ".$Checksheetname."(id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,`event_id` int(11),`item_id` int(11), result varchar(11), hm_value_id varchar(11), category_id INT(11) NOT NULL, subcategory_id INT(11) NOT NULL)"; // create the recieving comment table
mysqli_query($dbc,$query5) or die( "Unable to create checksheet recieved items table:". mysqli_error()); 
echo "$Newtable Checksheet table created.<br>";

//$query6="CREATE TABLE IF NOT EXISTS ".DB_NAME.".".$Sealedname."(id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,`item_id` int(11),`date` datetime NOT NULL default '0000-00-00 00:00:00')"; // create the recieving comment table
//mysqli_query($dbc,$query6) or die( "Unable to create Sealed checksheet items table:". mysqli_error()); 
//echo "$Sealedname Checksheet table created.<br>";



	mysqli_close($dbc); 
print ("<center><a href=clonetable.inc.php>Back</a></center>\n");
print ("<center><a href='".HOME."'>HOME</a></center>\n");

} elseif (empty($_POST['UnitClone']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) {
?>
<form name="UnitClone" ID="Clone" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Checksheet Cloning</legend>
<fieldset>
<?php
print("<center><H3>To create a new checksheet with an existing set of items, choose an existing checksheet in the first field and create a new name in the second and third fields.</H3></center>\n");
print("<label>Pick an existing checksheet.....</label>\n");
$name=Checksheets;	
$itemoptions="";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name order by id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_chosen_id=$row[0];
				$OName = $row[1];
			
			$itemoptions .="<OPTION VALUE=\"$OName\">".$item_chosen_id."--".$OName."</OPTION>\n";
}

	mysqli_close($dbc); 
print("<SELECT NAME=origname >\n");
?>
<OPTION VALUE="">Choose </OPTION>
<?=$itemoptions?>
</SELECT> <br><hr><br>
<label>(Number--Name)</label>
<input type=text NAME=placement size = 2></input>
<label>--</label>
<input type=text NAME=Newtable size = 10></input><label>:  These need to be different than anything that already exists.</label><br>
<label>Is the New Checksheet Sealable?</label><INPUT type="checkbox" name="sealed" value="1">

 <center><INPUT TYPE="submit"  NAME="UnitClone"  ID="Clone" VALUE="Submit" >
</fieldset>
</form>

<?php


print("<label>Existing Checksheets</label>");

$name=Checksheets;	// Name of the menu table
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name WHERE (merged IS NULL || merged = '0') order by id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {

				$item_id=$row[0];
				$OName = $row[1];
	echo"<table border=1>";
	echo"<tr><th  colspan=\"4\" style=padding:10px>".$item_id."--".$OName."</th></tr>";
	echo"<tr><td style=padding:10px>Menu Number</td><td style=padding:10px>Name</td><td style=padding:10px>Subcategory of</td><td style=padding:10px>Sealable</td</tr>";
				
			$sql2="SELECT * FROM $name WHERE merged = '".$item_id."' order by id asc";
	$result2=mysqli_query($dbc, $sql2);
		while ($row2 = mysqli_fetch_array($result2, MYSQL_NUM)) {



				$item_id=$row2[0];
				$OName = $row2[1];
				$merged_with = $row2[2];	
				$Sealable = $row2[3];
				if ($Sealable == 1) 	{ $printcheck="&#x2713;";}
				else {$printcheck = '';}
				if ($row2[2] != 0){
	echo"<tr><td style=padding:10px align=right>$item_id</td><td style=padding:10px>".$OName."</td><td style=padding:10px>".reciper($merged_with,$name)."</td><td style=\"padding:10px; text-align:center\">".$printcheck."</td></tr>"; }
else {echo"<tr><td align=right style=padding:10px>$item_id</td><td style=padding:10px>       ".$OName."</td><td style=padding:10px>       .</td><td style=\"padding:10px;text-align:center\">".$printcheck."</td></tr>";}
				$Sealable = $row[3];
				if ($Sealable == 1) {
						}    }  
echo"</table>";
}
  mysqli_close($dbc);


}
?>

<div class="push"></div>
</div>
</body>
</html>
