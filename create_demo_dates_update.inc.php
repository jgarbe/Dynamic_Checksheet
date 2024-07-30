<?php
print("<html>\n");
print("<head>\n");
print("<title>Creating Demo Dates</title>\n");

print("</head>\n");

print("<body>\n");
if (isset($_POST['checksheet'])) {
$Checksheetno = $_POST['checksheet'];  //declare the menu checksheet name.
print("<h1>".$Checksheetno."</h1>\n");

//print("".time()." Line13 \n");
    
	include('inc/appvars.php');  // Set the Variables	
//	require_once('css/plaintheme.php');  // Set the Theme Variables
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once('inc/delayscript.inc.php'); // bring in the delay script.
	
	
	
	include('inc/data_acquisition.inc.php');
	
	$ID=array();
foreach($CH as $no) {  //print(" DBG LINE 24-- CH is ".$CH."<br />\n ");
foreach($no as $casc_ID=>$casc_id) {//print(" DBG LINE 25 -- casc_ID is ".$casc_ID."<br />\n ");



  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
$sealed_stuff_query = "SELECT id FROM sealedlist WHERE ch_id = '".$casc_ID."'";
	$result = mysqli_query($dbc1, $sealed_stuff_query) or die("This aint workin1!");
		while ($row = mysqli_fetch_assoc($result)) {
				$ID[] = $row['id'];		

	
}




}}


	//print_r2($ID);
foreach($ID as $dated_id) {
$exp=date("Y-m-d H:i:s",rand(time(),time()+(60*60*24*30*12*2)));
	//print("<br/>".$exp."<br/>\n");

$upexp_query ="UPDATE sealedlist SET exp_date = '".$exp."' WHERE id = '".$dated_id."'";
                if($dbc1->query($upexp_query)==TRUE) { 
					
					
					
                    }
     }           
                 
                $dbc1->close();
		
					print("New dates inserted"); 

} else { //End if submitted
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
<?php
print("<FORM name=\"UnitChoice\" ID=\"Unitno\" ACTION=\"".$PHP_SELF."\" METHOD=\"POST\" >\n");




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
		while ($row = mysqli_fetch_row($result)) {
				$OName = $row[1];
			$item_chosen_id=$row[1];
			$itemoptions .="<OPTION VALUE=\"".$item_chosen_id."\">".$OName."</OPTION>\n";
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
  mysqli_close($dbc);












}
print("</body>\n");
print("</html>\n");





?>
