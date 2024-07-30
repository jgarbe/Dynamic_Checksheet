<?php
   require_once('inc/startsession.php');
	require_once('inc/appvars.php');  // Set the Variables	
    $Title="Archived Checksheet Viewer";
 include('inc/title.php');
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once("inc/maintmerge.inc.php");
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////

  // Connect to the username database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);
  mysqli_close($dbc);








  if (isset($_SESSION['username'])) {  //****************//If logged in


		if ($_SESSION['status'] == 1) {    //If Administrator Priviledges

			}
print("<INPUT TYPE=\"button\" value=\"Go Back\"  onClick=\"location.href='Arch_menu.php'\">\n");
if(isset($_GET['xmlchecksheet'])) {
	$xmlchecksheet = explode("-",$_GET['xmlchecksheet'] );
	$_POST['checksheet'] = trim($xmlchecksheet[0]);
	$_POST['event_id'] = trim($xmlchecksheet[1]);
}
if(isset($_GET['checksheet'])) {
	$_POST['checksheet'] = trim($_GET['checksheet']); 
//print("<div style=\"text-align:center;\"><h2>".$_POST[checksheet]."</h2></div>\n");
//echo"<br>$_POST[event_id]";
	/*
				?>
				<br>
				<INPUT TYPE="button" value="View Archived Checksheet!" onClick="window.open('tmp/<?echo $_POST[checksheet]?>aprint.html')">
					 <INPUT TYPE="button" value="View Archived Order!" onClick="window.open('tmp/<?echo $_POST[checksheet]?>aorder.html')">	
</div>	<? */
///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//   End of Header.
//
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$Checksheetno = mysqli_real_escape_string($dbc,$_POST['checksheet']);  //declare the truck.
// print ("$Checksheetno");
$CHid=checksheetnotochecksheet_id($Checksheetno);					//Main checksheet id
if(isset($_GET['event_id'])) {
	$_POST['event_id'] = trim($_GET['event_id']); }
$event_id=mysqli_real_escape_string($dbc,$_POST['event_id']);		//event_id
 //print("<br />Event=".$event_id."<br />");
 //print("<br />CHid=".$CHid."<br />");
//	require_once('inc/Aorder.inc.php');
//AClearOrder ($Checksheetno, $event_id); 
	$ACH=array($Checksheetno=>$event_id); 			//Start the array with the main checksheet
	
		$count =1;
	
	
	/*
	$mergede_query="SELECT Checksheets.ChecksheetName
		FROM Checksheets
		WHERE merged = '".$CHid."' ";
	$mergeddata = mysqli_query($dbc, $mergede_query);//or die("Error: ".mysqli_error($dbc));
	
	while($mergedrow=mysqli_fetch_array($mergeddata)){
			
		$ACH[$CHN]=$mergedrow[id]; }
	
	*/
		 

$mergCH_query="SELECT ChecksheetName from Checksheets ";
	$mergCHdata = mysqli_query($dbc, $mergCH_query);
	while ($mergCHrow=mysqli_fetch_array($mergCHdata)) {
		
		
			$allCHNames[]=$mergCHrow['ChecksheetName'];
			
			}
		
			
			//print_r2($allCHNames);
foreach($allCHNames as $CHN) {
	
	if(mysqli_num_rows(mysqli_query($dbc,"SHOW TABLES LIKE '".$CHN."_events'"))==1) {
	
	
	
	
		$mergede_query="SELECT * FROM ".$CHN."_events
		 WHERE  merged = '".$CHid."'
		  AND merger = '".$event_id."' ";
	$mergeddata = mysqli_query($dbc, $mergede_query);//or die("Error: ".mysqli_error($dbc));
	
	while($mergedrow=mysqli_fetch_array($mergeddata)){
			
		$ACH[$CHN]=$mergedrow['id']; }
		
		
		
	}
							 }
						
//print_r2($ACH);
foreach($ACH as $Checksheetno=>$event_id) {
print("<br><center><h2>".$Checksheetno."</h2></center><br>\n");







$CHchecksheet=$Checksheetno."_checksheet";
//////////////////////////////////////////////////// Get the Categories 
  $query = "SELECT DISTINCT  ".$CHchecksheet.".category_id  FROM ".$CHchecksheet." WHERE '".$event_id."' =  ".$CHchecksheet.".event_id ORDER BY ".$CHchecksheet.".category_id";
  $data = mysqli_query($dbc, $query) or die ("can't get the CHchecksheet query.");
	while ($row=mysqli_fetch_array($data)) {
			$cat_id=$row['category_id'];
print("<table style=width:100%;>\n<tr>\n\t<th style=".HEAD.";width:100%;>".catidtoname($cat_id)."</th>\n</tr>\n</table>\n");
				//	APrintO (catidtoname($cat_id));

//////////////////////////////////////////////////////////// Get the Subcategories
  $query2 = "SELECT DISTINCT  ".$CHchecksheet.".subcategory_id  FROM ".$CHchecksheet."  WHERE $event_id =  ".$CHchecksheet.".event_id AND $cat_id = ".$CHchecksheet.".category_id ORDER BY ".$CHchecksheet.".subcategory_id ASC";
  $data2 = mysqli_query($dbc, $query2);
	while ($row2=mysqli_fetch_array($data2)) {
			$subcat_id=$row2['subcategory_id'];
print("<table style=width:100%;>\n<tr>\n\t<th>\n<div class=sh>".subcatidtoname($subcat_id)."</div>\n</th>\n</tr>\n</table>\n");


print("\n<table style=width:100%;>\n");
////////////////////////////////////////////////////////////////Show the items in the Categories-Subcategories
  $query3 = "SELECT  ".$CHchecksheet.".*   FROM ".$CHchecksheet." WHERE $event_id =  ".$CHchecksheet.".event_id AND $cat_id = ".$CHchecksheet.".category_id AND $subcat_id = ".$CHchecksheet.".subcategory_id ORDER BY ".$CHchecksheet.".id ASC";
  $data3 = mysqli_query($dbc, $query3)or die ("cant get the Items inner join");
$columns=1;
$cols=colcount($subcat_id) ;
	while ($row3=mysqli_fetch_array($data3)) {

		if ($columns <= $cols) {
				if (($columns == 1) && !empty($row3['id'])) {print("\n<tr>\n");	} //The first Column print the first row				
 				} elseif (($columns > $cols) && !empty($row3['id'])) { print("\n</tr>\n<tr>\n"); $columns=1;}  // Start a new row
		//////////////////////////////////////
			$item_name=ItemidtoName($row3['item_id']);
			$result=$row3['result'];
			$hm_value_id=$row3['hm_value_id'];
	require_once('inc/variablearchivesort.inc.php');
variablearchivesort($Checksheetno,$item_name,$hm_value_id,$result) ;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$columns=$columns+1;  //Add a column
}  //end Items

print ("\n</tr>\n</table>\n"); // end subcategory
} 
}  //end category
 


}
  mysqli_close($dbc);
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//    End of Checksheet
//
/////////////////////////////////////////////////////////////////////////////////////////////////////


} else { // There are no checksheets
	
echo "There are no Checksheets";
}

} else {   //  If you're not logged in 
		
	  // Generate the navigation menu
    echo ' <a href="login.php">Log In</a><br />';
   // echo ' <a href="signup.php">Sign Up</a>';
 } 

?>

</div>



 <? require_once("inc/footer.inc");  


?>

<div class="push"></div>
</div>
</body>
</html>
