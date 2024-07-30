<?php
   require_once('inc/startsession.php');

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  $Title="Seal the Box";
  require_once('inc/title.php');
 require("inc/functions.php.inc");

  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username'])) {
	
    echo ' <a href="viewprofile.php">View Profile</a><br />';
    echo ' <a href="editprofile.php">Edit Profile</a><br />';
	    echo ' <a href="index.php">Home</a><br />';
    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br>';
		if ($_SESSION['status'] == 1) {
	    echo ' <a href="index.php">HOME</a>';
			}

	
  }
  else {
    echo ' <a href="login.php">Log In</a><br />';
    echo ' <a href="signup.php">Sign Up</a>';
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


    if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {
?>
 <script type="text/javascript">


function vldFrm_Checksheet(){



                  
	var result = true;
	var msg="";
	
	if (document.UnitChoice.checksheet.value=="") {
			msg+="Please Choose a Checksheet.\n";
			result = false;
			}


	if(msg==""){
	return result;
	}{
	alert(msg)
	return result;
	}

}
</script>
<FORM name="ChChoice" ID="CHno" ACTION="sealbox.php" METHOD="POST" >
<? 
	$sitem='checksheet';
	$name=Checksheets;
	echo"	<center><table><tr>\n";
	echo"	<td><div class=l >$name</div><div class=r>\n";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM $name WHERE sealable = '1' order by id asc";
	$result=mysqli_query($dbc, $sql);
	$itemoptions="";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[1];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
}
echo"<SELECT NAME='$sitem'>";
?>
<OPTION VALUE="">Choose <?$sitem ?>
<?=$itemoptions?>
</SELECT> 
</div></td></tr></table></center>
<?
?>
 <center><INPUT TYPE="submit"  NAME="ChChoice"  ID="CHno" VALUE="NEXT" onClick="return vldFrm_Checksheet();" >
	</center>
</FORM>
<?
  mysqli_close($dbc); }   else  {
echo "<h3>Please Log in. </h3>";

}

?>
<div class="push"></div>
</div>
</body>
</html>
