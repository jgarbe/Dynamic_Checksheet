<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  $Title="Maintenance Report Page";
  require_once('inc/title.php');
require_once('inc/functions.php.inc');
  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');
  // Generate the navigation menu
  if (isset($_SESSION['username'])) {
	

	
  }
  else {
    echo ' <a href="login.php">Log In</a><br />';
    //echo ' <a href="signup.php">Sign Up</a>';
  }

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
			msg+="Please Choose an Item to Report.\n";
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
<FORM name="UnitChoice" ID="Unitno" ACTION="Maintenance.php" METHOD="POST" >

<?php 
	$sitem='checksheet';
	$name='Checksheets';
	echo"	<center><table><tr>\n";
	echo"	<td><div class=l >Maintenance Report</div><div class=r>\n";
	

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM ".$name." WHERE veh = '1' order by id asc";
	$result=mysqli_query($dbc, $sql);
	$itemoptions="";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[0];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
}

echo"<SELECT NAME='".$sitem."'>";

?>
<OPTION VALUE="">Choose <?php$sitem ?>
<?=$itemoptions?>
</SELECT> 
</div></td></OPTION></tr></table></center>

 <center><INPUT TYPE="submit"  NAME="Unit"  ID="Unitno" VALUE="NEXT" onClick="return vldFrm_Checksheet();" >
	</center>
</FORM>
<?php 
  mysqli_close($dbc);
  
  
  }   else  {
echo "<h3>Please Log in. </h3>";

}

?>
<div class="push"></div>
</div>
</body>
</html>
