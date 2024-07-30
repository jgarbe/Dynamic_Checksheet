<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Build Checksheet";
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
   // echo ' <a href="signup.php">Sign Up</a>';
  } 
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
print("</div>");
////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
if (!empty($_POST['UnitBuild']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && (!empty($_POST['placement']) ) && (!empty($_POST['Newtable']) )) {

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$ID=mysqli_escape_string($dbc,$_POST['placement']);
	$Newtable=mysqli_escape_string($dbc,$_POST['Newtable']);
	$merged=mysqli_escape_string($dbc,$_POST['merged']);
	$Checksheetevents=$Newtable."_events";
	$Checksheetname=$Newtable."_checksheet";
	//$commentsname=$Newtable."_comments";
	//$Sealedname=$Newtable."_Sealed";
	$sealed=mysqli_escape_string($dbc,$_POST['sealed']);
    $published=mysqli_escape_string($dbc,$_POST['published']);
    $veh=mysqli_escape_string($dbc,$_POST['veh']);
    
	 $querytch="SELECT * FROM ".$Newtable."";
		if (!($tch=mysqli_query($dbc, $querytch))) {
$query= "CREATE TABLE IF NOT EXISTS ".DB_NAME.".".$Newtable."( id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, item_id INT(11) NOT NULL, category_id INT(11) NOT NULL, subcategory_id INT(11) NOT NULL, hm_value_id INT(11) NOT NULL, req TINYINT(1) NOT NULL)";
mysqli_query($dbc, $query) or die( "Unable to create table:". mysqli_error()); 
echo "".$Newtable." created.<br>";

$query2="INSERT INTO Checksheets(id,ChecksheetName,merged,sealable,published,veh) VALUES ('".$ID."','".$Newtable."','".$merged."','".$sealed."','".$published."','".$veh."')";
mysqli_query($dbc,$query2) or die( "Unable to insert into menu table:". mysqli_error()); 
echo "".$Newtable." Menu Item created.<br>";

$query3="CREATE TABLE IF NOT EXISTS ".DB_NAME.".".$Checksheetevents."(id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,`date` datetime NOT NULL default '0000-00-00 00:00:00', `submitted` INT,`merged` INT,`merger` INT)"; // create the recieving end table
mysqli_query($dbc,$query3) or die( "Unable to create checksheet events table:". mysqli_error()); 
echo "".$Newtable." Checksheet Events Database created.<br>";



$query5="CREATE TABLE IF NOT EXISTS ".DB_NAME.".".$Checksheetname."(id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,`event_id` int(11),`item_id` int(11),result varchar(11),hm_value_id varchar(11), category_id INT(11) , subcategory_id INT(11) )"; // create the recieving comment table
mysqli_query($dbc,$query5) or die( "Unable to create checksheet recieved items table:". mysqli_error()); 
echo "".$Newtable." Checksheet table created.<br>";



  mysqli_close($dbc);

?>






<form name="editchecksheet"  ACTION="checksheet_edit.php" METHOD="post" >
<input type="hidden" name="Checksheetname" value="<?php echo"".$Newtable.""; ?>" > </input>
 <center><INPUT TYPE="submit"  NAME="editchecksheet"  ID="editchecksheet" VALUE="Now, edit the Checksheet" >

</form>
<?php
	} else {
	echo " The table name already exists. Try another name";}

print ("<center><a href=catcheck.php>Back</a></center>\n");
print ("<center><a href='".HOME."'>HOME</a></center>\n");

} elseif (!empty($_POST['UnitBuild']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) && ((empty($_POST['placement']) ) || (empty($_POST['Newtable']) )) ) {

?>
<form name="UnitBuild" ID="Build" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Checksheet Building</legend>
<fieldset>
<?php
print("<center><H3>To create a new Checksheet, create a new name.</H3></center>");
print("<label>Existing Checksheets</label>");
	echo"<ul>";
$name=Checksheets;	// Name of the menu table
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name." order by id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_id=$row[0];
				$OName = $row[1];
				$merged_with = $row[2];
	echo"<li>".$item_id."--".$OName."--".reciper($merged_with,$name)."";
}
echo"</ul>";

  mysqli_close($dbc);
print("<center><H3>Try again. Please fill these fields, below.</H3></center>");
?>
<hr>

<br>
<label>(Menu Number--Name--Merged into)</label>
<input type=text NAME=placement size = 4>
<label>--</label>
<input type=text NAME=Newtable size = 22><label>:  These need to be different than anything that already exists.</label><br>


 <center><INPUT TYPE="submit"  NAME="UnitBuild"  ID="Build" VALUE="Submit" >
</fieldset>
</form>

<?php

}elseif (empty($_POST['UnitBuild']) && isset($_SESSION['username']) && ($_SESSION['status'] == 1) ) {



?>
<form name="UnitBuild" ID="Build" ACTION="<?php echo $PHP_SELF;?>" METHOD="post" >
<legend>Checksheet Building</legend>
<fieldset>
<?php
print("<center><H3>To create a new Checksheet, create a new name.</H3></center>");

?>
<br><hr><br>
<table border=1><tr><TD style=padding:10px align=right>Menu No.</TD><td style=padding:10px align=right>Name</td><td style=padding:10px align=right>Merged Into (Optional)</td><td style=padding:10px align=right>Sealable (Optional)</td><td style=padding:10px align=right>Published</td><td style=padding:10px align=right>Is it a Vehicle?</td></tr>
<tr>
<td style=padding:10px align=right><input type=text NAME=placement size = 2></td>
<td style=padding:10px align=right><input type=text NAME=Newtable size = 22></td>
<td style=padding:10px align=right><?php

$itemoptions="";
$name=Checksheets;	// Name of the menu table
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name." order by id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			$item_chosen_id=$row[0];
				$OName = $row[1];
				$merged_with = $row[2];
				if ($row[2] != 0){
			$itemoptions .="<OPTION VALUE=\"".$item_chosen_id."\">".$OName." of ".reciper($merged_with,$name)."</OPTION>\n"; } else {
			$itemoptions .="<OPTION VALUE=\"".$item_chosen_id."\">".$OName."</OPTION>\n";}
}
echo"<SELECT NAME=merged >";
?>
<OPTION VALUE="">Choose </OPTION>
<?=$itemoptions?>
</SELECT> 
</td>
		<TD align="center">
<input type="checkbox" name="sealed" value="1">
		</TD>
		<TD align="center">
<input type="checkbox" name="published" value="1">
		</TD>
		<TD align="center">
<input type="checkbox" name="veh" value="1">
		</TD>
</tr>
<tr><td colspan="6"> <center><INPUT TYPE="submit"  NAME="UnitBuild"  ID="Build" VALUE="Submit" ></center></td></tr>
</table>
</fieldset>
</form>

<?php
print("<label>Existing Checksheets</label>");

$name=Checksheets;	// Name of the menu table
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name." WHERE (merged IS NULL || merged = '0') order by id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {

				$item_id=$row[0];
				$OName = $row[1]; 
                if($row[7] == '1'){ $Opublished = "published";
        } else {$Opublished = "hidden";}
	echo"<table border=1>";
	echo"<tr><th  colspan=\"6\" style=padding:10px>".$item_id."--".$OName."";
    print("--".$Opublished."--");
    print("</th></tr>");
			
			$sql2="SELECT * FROM ".$name." WHERE merged = '".$item_id."' order by id asc";
	$result2=mysqli_query($dbc, $sql2);
    if($row2 = mysqli_fetch_array($result2, MYSQL_NUM)) {
        	echo"<tr><td style=padding:10px>Merged No.</td><td style=padding:10px>Name</td><td style=padding:10px>Subcategory of</td><td style=padding:10px>Sealable</td><td style=padding:10px>Published</td><td style=padding:10px>Vehicle</td></tr>";
	
		while ($row2 = mysqli_fetch_array($result2, MYSQL_NUM)) {



				$item_id=$row2[0];
				$OName = $row2[1];
				$merged_with = $row2[2];	
				$Sealable = $row2[3];
				$Sealable == 1?$printcheck="&#x2713":$printcheck = '';
            	$published = $row2[7];
				$published == 1?$pprintcheck="&#x2713":$pprintcheck = '';
				$veh = $row2[8];
				$veh == 1? $pprintcheck2="&#x2713":$pprintcheck2 = '';
				if ($row2[2] != 0){
	echo"<tr><td style=padding:10px align=right>".$item_id."</td><td style=padding:10px>".$OName."</td><td style=padding:10px>".reciper($merged_with,$name)."</td><td style=\"padding:10px; text-align:center\">".$printcheck."</td><td style=\"padding:10px;text-align:center\">".$pprintcheck."</td><td style=\"padding:10px;text-align:center\">".$pprintcheck2."</td></tr>"; }
	
	
else {
	
	echo"<tr><td align=right style=padding:10px>".$item_id."</td><td style=padding:10px>       ".$OName."</td><td style=padding:10px>       .</td><td style=\"padding:10px;text-align:center\">".$printcheck."</td><td style=\"padding:10px;text-align:center\">".$pprintcheck."</td><td style=\"padding:10px;text-align:center\">".$pprintcheck2."</td></tr>";}
   }  
echo"</table>";
} }
  mysqli_close($dbc);
}
?>
<div class="push"></div>
</div>
</body>
</html>

