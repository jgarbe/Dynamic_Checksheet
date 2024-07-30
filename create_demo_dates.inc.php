<?php
print("<html>\n");
print("<head>\n");
print("<title>Creating Demo Dates</title>\n");

print("</head>\n");

print("<body>\n");
if (isset($_POST['checksheet'])) {
$Checksheetno = $_POST['checksheet'];  //declare the menu checksheet name.
print("<h1>".$Checksheetno."</h1>\n");

print("".time()."\n");
    
	include('inc/appvars.php');  // Set the Variables	
//	require_once('css/plaintheme.php');  // Set the Theme Variables
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once('inc/delayscript.inc.php'); // bring in the delay script.

include('inc/data_acquisition.inc.php');

  //print("create_demo_dates.inc.php DBG LINE 23 -- CH is ".$CH."<br />\n "); print_r2($CH);
foreach($CH as $no) {  
foreach($no as $casc_ID=>$casc_id) { //print("<span style='color:green;'>create_demo_dates.inc.php DBG LINE 25 -- casc_ID is ".$casc_ID."</span><br />\n ");
		$Checksheetno=$casc_id[0];
		$sealable = $casc_id[1];//print("Sealable: ".$sealable."<br>\n");
		$sealed = $casc_id[2];// print("Sealed: ".$sealed."<br>\n");
		$Signature = _user_idtoname($casc_id[3]);
		$q_set = $casc_id[4];
		$Cats=$casc_id[5];
		//print("Over the $casc_ID<br>");
//print("The casc_ID is $casc_ID<br />\n");
		//print("main.php DBG LINE 1292 ");print_r2($Cats);

	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {
		//print("main.php DBG LINE 1296 catarray_id = ".$catarray_id."\n");
		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
		$cat_id=$catarray_id;

////////////////////////////////////////////////////////////////////////////
	$sep_perishables=array();
	$sep_nonperishables=array();
	//print_r2($Catarray);
	foreach($Catarray as $Subcatrow)	{    //inside 4
		
			$Howmanyp = '';
			foreach($Subcatrow as $subcatarray_id =>  $subcatname) {    //inside 3
				
						$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
	foreach($Itemsarray as $Itemstuff)	{  //go through the array of items   //inside 2
		$Item_id=$Itemstuff[0];
		$Itemname=addslashes($Itemstuff[1]);
		switch($Itemstuff[2]){
			case "cb":
			$Howmanyp=1;
			break;
			case (ctype_digit($Itemstuff[2])):
			$Howmanyp = $Itemstuff[2];
			break;
			case "na": 
			$Howmanyp = 2;
			break;

		}
		$perishable=$Itemstuff[3];
		$req=$Itemstuff[4];
		
		//print("<span style='color:green;'>create_demo_dates.inc.php DBG LINE 73 -- perishable is ".$perishable."</span><br />\n ");
		if(!empty($perishable)){
		$sep_perishables[$casc_ID][]=array($Item_id,$Itemname,$Howmanyp);
	}
	else {	
		$sep_nonperishables[$casc_ID][]=array($Item_id,$Itemname,$Howmanyp);
	}
		
		
			//print("<li>".$Itemname."</li> \n");   //test list of items line 2 of 3
									}  // End Inside 2
									//print_r2($Itemsarray);
								} // End Inside 3
							}  // End Inside 4
							//	print("</ul> \n");	// test list of items line 3 of 3
							//print_r2($sep_perishables[$casc_ID]);
							//print_r2($sep_nonperishables[$casc_ID]);
					}}		
					}	}
					
							//print_r2($sep_perishables[$casc_ID]);
							//print_r2($sep_nonperishables[$casc_ID]);
//print("<h2>Perishables</h2>\n");
//	print("<ul>\n");
//print_r2($sep_perishables);
$set_of_CH = array();
foreach($CH as $no) {
foreach($no as $casc_ID=>$casc_id) {
$set_of_CH[]=$casc_ID;
} }
//print_r2($set_of_CH);
//foreach($sep_perishables[$casc_ID] as $I_Perishable){

  require_once('inc/connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  /* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
foreach($set_of_CH as $set_of_IDs){
				
				print("<br/><span style='color:green;'>create_demo_dates.inc.php DBG LINE 115-- Set of IDs: ".$set_of_IDs."</span>\n ");
	

//print("random date is".time()."\n");
$randomtimespan = date('Y-m-d H:i:s',rand(time(),time()+(60*60*24*30*12*2))); //random date over roughly the next couple of years
//print("".$randomtimespan."<br />\n");


//print("<p>DBG Line 121 create_demo_dates.inc.php ".$set_of_IDs."</p>");
if($result = mysqli_query($dbc,"SELECT id FROM sealedlist WHERE ch_id = ".$set_of_IDs." ")){
echo "Returned rows are: " . mysqli_num_rows($result);


	while  ($row = mysqli_fetch_row($result)){
		  echo "<br/>".$row[0]." -- ".$randomtimespan." <br/>";
		  
					mysqli_query($dbc,"UPDATE sealedlist SET exp_date ='".$randomtimespan."' WHERE id = ".$row[0]."");
							
$randomtimespan = date('Y-m-d H:i:s',rand(time(),time()+(60*60*24*30*12*2)));


}
}
}
  	 mysqli_free_result($result);	



/* close connection */
mysqli_close($dbc);	
		
		
	/////////////////////////////////////////////////////////////////////////	
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
<!--print("<FORM name=\"UnitChoice\" ID=\"Unitno\" ACTION=\" echo $_SERVER['PHP_SELF'] \" METHOD=\"POST\" >\n");-->
  <form name="UnitChoice" ID="Unitno"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php


//print(" <p><h4>The Checksheet should be working properly, now.  If further problems arise, please fax a copy to 323-2109.</h4></p> \n");
	$sitem='checksheet';
	$name='Checksheets';
	echo"	<center><table><tr>\n";
	echo"	<td><div class=l >".$name."</div><div class=r>\n";
	

  // Connect to the database 
 require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM ".$name." WHERE published = 1 AND (merged != 1 || merged IS NULL) order by id asc";
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
