<?php
require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////


  require_once('inc/appvars.php');
  $Title="Inventory Page";
 include('inc/title.php');

 require_once("inc/functions.php.inc");


 require_once('inc/connectvars.php');

 
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);



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
	alert(msg);
	return result;
	}

}
</script>
<FORM name="UnitChoice" ID="Unitno" ACTION="main.php" METHOD="POST" >

<?php


//print(" <p><h4>The Checksheet should be working properly, now.  If further problems arise, please fax a copy to 323-2109.</h4></p> \n");
	$sitem='checksheet';
	$name='Checksheets';
	echo"	<center><table><tr>\n";
	echo"	<td><div class=l >".$name."</div><div class=r>\n";
	

  // Connect to the database 
 require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM ".$name." WHERE published = '1' AND (merged = '0' || merged IS NULL) order by id asc";
	$result=mysqli_query($dbc, $sql);
	$itemoptions="";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[1];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
}

echo"<SELECT NAME='".$sitem."'>";


print("<OPTION VALUE=\"\">Choose</option>\n");
print("".$itemoptions."\n");
?>
</SELECT> 
</div></td></tr></table></center>

 <center><INPUT TYPE="submit"  NAME="Unit"  ID="Unitno" VALUE="NEXT" onClick="return vldFrm_Checksheet();" >
	</center>
</FORM>
<?php
  mysqli_close($dbc); }   else  {
echo "<h3>Please Log in. </h3>";

}

?>
<div class="push"></div>
</div>
</body>
</html>
