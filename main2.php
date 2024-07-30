<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
	include('inc/appvars.php');  // Set the Variables	
    $Title="Checksheet";
 include('inc/title.php');
//	require_once('css/theme.php');  // Set the Theme Variables
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once('inc/maintmerge.inc.php');
	require_once('inc/delayscript.inc.php'); // bring in the delay script.
  // Connect to the username database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name,  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);
  mysqli_close($dbc);




//	print("<meta http-equiv=\"content-style-type\" content=\"text/css\">");
//	print("<link rel=\"stylesheet\" href=\"".THEME."\">\n");

//print ("<div class=\"header\">");	

// require_once('inc/logo.php');  // Set the LOGO
// logo(LOGO);
//print ("<img src=".LOGO." width=150 height=150 border=0  align=right>");




  if (isset($_SESSION['username'])) {  //****************//If logged in

	  // Generate the navigation menu

		print("\n");
	    echo ' <a href="viewprofile.php">View Profile</a><br>';
		print("\n");
	    echo ' <a href="editprofile.php">Edit Profile</a><br>';
		print("\n");
	    print("<a href='".HOME."'>Home</a><br />");
		print("\n");
	    echo ' <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a><br>';
		print("\n");

echo"<br />$_POST[checksheet]<br />\n";

    print("<script>\n");
print("$(document).ready(function()\n");
print("  { \n");
print("  $(\"#posting\").change(function(){ \n");
 print("   $.ajax({                                    \n");   
 print("     url: 'inc/api.inc.php',                  //the script to call to get data       \n");    
 print("     data: \"p_id=\" + (selForm.posting.value) ,   //you can insert url argumnets here to pass to api.inc.php \n");
 print("                                      //for example \"id=5&parent=6\" \n");
 print("     dataType: 'json',                //data format       \n");
  print("    success: function(data)          //on recieve of reply \n");
  print("    { \n");
 print("       var id = data[0];              //get id \n");
 print("       var vname = data[1];           //get name \n");
 
  print("      $('#output').html(\"<b>id: </b>\"+id+\"<b> name: </b>\"+vname); //Set output element html \n");
 print("     }  \n");
 print("     }); \n");
 print("   }); \n");
 print("   }); \n");
print("</script>\n");


/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
//   You first open the page and you're presented with a checksheet
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////
$Checksheetno = $_POST['checksheet'];  //declare the menu checksheet name.
$ID=checksheetnotochecksheet_id($Checksheetno);	
/////////////////////////////////////////////////////  Prepare the text pages.
	require_once('inc/order.inc.php'); // 
				ClearOrder($Checksheetno);
?>
<br />
<INPUT TYPE="button" value="View Printable Checksheet!" onClick="window.open('tmp/<?echo $_POST[checksheet]?>print.html')">
<INPUT TYPE="button" value="View Requesition Order!" onClick="window.open('tmp/<?echo $_POST[checksheet]?>order.html')">	
<?php



	  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
		   $mainTS ="SELECT T_update FROM ".$Checksheetno." ORDER BY T_update DESC LIMIT 1 ";   //Get the latest T_update from the Timestamp field of the Checksheet.
			$resultmainTS = mysqli_query($dbc, $mainTS) or die ("Aitn"); 							
					while ($rowmainTS=mysqli_fetch_array($resultmainTS)) {
		$Timestamp=$rowmainTS['T_update'];       }
		
				if (!file_exists(CACHE_DIR.$_POST['checksheet'])) { 
			 mkdir(CACHE_DIR.$_POST['checksheet'], 0777) ;
			}
			
if (file_exists(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".".$Timestamp.".txt")) {  //If there is a current cached Checksheet
	$file = CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".".$Timestamp.".txt";
$CHcached = unserialize(implode('',file($file)));

foreach($CHcached as $no) {       //The "array" AS the "order of checksheet  no."
	foreach($no as $casc_id) {     //The "order of checksheet  no." AS "The checksheet_id" array.
	$Checksheetno=$casc_id[0];   //The "Checksheet Name"
		$sealable=$casc_id[1];       //If the checksheet is sealable
		$sealed=$casc_id[2];			// If the checksheet is sealed
		$Signature=$casc_id[3];		// If it IS sealed -- who sealed it				
		$Cats=$casc_id[4];
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
			$Checksheet_events_table=$Checksheetno."_events"; //if the checksheet is the primary checksheet, don't put anything in the merged and merger columns.
		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),'NULL','NULL')"; //get event id for data insert
		mysqli_query($dbc,$querystartid);
		$q_set = mysqli_insert_id($dbc);
			//print("This is the $q_set");	
$CH=array("0"=>array($ID=>array('0'=>$Checksheetno,'1'=>$sealable,'2'=>$sealed,'3'=>$Signature,'4'=>$q_set))); //Start the array of checksheets that will include categories. Main Chacksheet First"0".
	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {
		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
		//print("$CATEGORY<BR>\n");
		//print_r2($catname[1]);
		$CH[count($CH)-1][$ID][5][]=array($catarray_id=>array('0'=>$CATEGORY));  //Add Merged Categories
	foreach($Catarray as $Subcatrow)	{
	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
		$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
		//print("$SUBCATEGORY<BR>\n");
		//print("$SUBCATCOLS<BR>\n");
		//print_r2($Itemsarray);
		$CH[count($CH)-1][$ID][5][count($CH[count($CH)-1][$ID][5])-1][$catarray_id][1][]=array($subcatarray_id=>array($SUBCATEGORY,$SUBCATCOLS));  //Add Merged Subcategories
	foreach($Itemsarray as $Itemstuff)	{
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
	$HowMany=$Itemstuff[2];
		$perishable=$Itemstuff[3];
	$req=$Itemstuff[4];
		//print_r2($Itemstuff);
		//print("$Itemname<BR>\n");
	//print("$HowMany<BR>\n");
		//print("$Item_id<BR>\n");
$CH[count($CH)-1][$ID][5][count($CH[count($CH)-1][$ID][5])-1][$catarray_id][1][count($CH[count($CH)-1][$ID][5][count($CH[count($CH)-1][$ID][5])-1][$catarray_id][1])-1][$subcatarray_id][2][]=array($Item_id,$Itemname,$HowMany,$perishable,$req);  //Add Merged Subcategories

if ($req == 1) { $REQ[]=array($ID,$Item_id,$Itemname,$HowMany,$perishable,$req); }
     }
	}}
		}}
	}}
}  else {		//If there is not a cached checksheet create one along with the new form


			



	   $mainch ="SELECT *  FROM Checksheets WHERE id = ".$ID."";   //First get all of the First  Main Checksheet
			$resultmain = mysqli_query($dbc, $mainch); 							
					while ($rowmain=mysqli_fetch_array($resultmain)) {
				$id=$rowmain['id'];		
				$Checksheetno=$rowmain['ChecksheetName'];		
				$sealable=$rowmain['sealable'];		
				$sealed=$rowmain['sealed'];		
				$Signature=$rowmain['Signature'];
	$Checksheet_events_table=$Checksheetno."_events"; //if the checksheet is the primary checksheet, don't put anything in the merged and merger columns.
		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),'NULL','NULL')"; //get event id for data insert
		mysqli_query($dbc,$querystartid);
		$q_set = mysqli_insert_id($dbc);
			//print("This is the $q_set");	
$CH=array("0"=>array($ID=>array('0'=>$rowmain['ChecksheetName'],'1'=>$rowmain['sealable'],'2'=>$rowmain['sealed'],'3'=>$rowmain['Signature'],'4'=>$q_set))); //Start the array of checksheets that will include categories. Main Chacksheet First"0".

$CacheCH=array("0"=>array($ID=>array('0'=>$rowmain['ChecksheetName'],'1'=>$rowmain['sealable'],'2'=>$rowmain['sealed'],'3'=>$rowmain['Signature']))); //Create another cachable array of checksheets that will include categories. Main Chacksheet First"0".

 $sqltab ="SELECT DISTINCT $Checksheetno.category_id,Category.* FROM $Checksheetno,Category WHERE $Checksheetno.category_id = Category.category_id";
	$resulttab = mysqli_query($dbc, $sqltab) or die ("can't get the setvartabs selection.");  //Second, Get the Categories in those Checksheets.
		while ($rowtab=mysqli_fetch_array($resulttab)) {
			$cat_id=$rowtab[c'ategory_id'];
			$cat_name=$rowtab['category_name'];

		$CH[count($CH)-1][$id][5][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories

		$CacheCH[count($CacheCH)-1][$id][4][]=array($cat_id=>array('0'=>$cat_name));  //Cachable Merged Categories


 $sqlcatsub2 ="SELECT DISTINCT $Checksheetno.subcategory_id, Subcategory.* FROM $Checksheetno,Subcategory WHERE $cat_id = $Checksheetno.category_id AND $Checksheetno.subcategory_id = Subcategory.subcategory_id ";
	$resultcatsub2 = mysqli_query($dbc, $sqlcatsub2) or die ("can't get the CatSub2 selection.");  //Third, Get the Subcategories in those Categories.
			//////Getting the CatSub selections./////////////////////////////////////////////
			while ($rowcatsub2=mysqli_fetch_array($resultcatsub2)) {
				$sub=$rowcatsub2['subcategory_id'];
				$sub_name=$rowcatsub2['subcategory_name'];
				$cols=$rowcatsub2['cols'];

		
		$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1][]=array($sub=>array($sub_name,$cols));  //Add Merged Subcategories
		
		$CacheCH[count($CacheCH)-1][$id][4][count($CacheCH[count($CacheCH)-1][$id][4])-1][$cat_id][1][]=array($sub=>array($sub_name,$cols));  //Add Merged Subcategories

//////// Start the Items fields from the category and place them under the header.  Start a count to create columns specified in the Subcategory field.///////////////////////////
	//print("$cat_id\n<br>");
	$sql2items= "SELECT $Checksheetno.*,Items.* FROM $Checksheetno,Items WHERE  $cat_id = $Checksheetno.category_id AND $sub = $Checksheetno.subcategory_id AND Items.item_id = $Checksheetno.item_id";
		$result2items = mysqli_query($dbc, $sql2items) or die ("can't get the Items selection");
//		$resultitems = mysqli_query($dbc, $sqlitems);

  while ($rowitems=mysqli_fetch_array($result2items)) { 
			$cols=colcount($rowitems'subcategory_id']);
			$CHid=$rowitems'item_id'];
			$itemname=$rowitems['item_name'];
			$hm = hmidtoname($rowitems['hm_value_id']);
			$perishable=$rowitems['perishable'];
			$req=$rowitems['req'];


$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1][count($CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

$CacheCH[count($CacheCH)-1][$id][4][count($CacheCH[count($CacheCH)-1][$id][4])-1][$cat_id][1][count($CacheCH[count($CacheCH)-1][$id][4][count($CacheCH[count($CacheCH)-1][$id][4])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

if ($req == 1) { $REQ[]=array($ID,$CHid,$Itemname,$hm,$perishable,$req); }
}
	}
}		
$chk_cache = serialize($CacheCH);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".".$Timestamp.".txt","w");//CACHE THE cascading checksheet list into the cache file, <CACHE_DIR.$Checksheetno.$Timestamp".txt">
fputs($fp, $chk_cache);
fclose($fp);
//print_r2($CacheCH);
	}
}












	   $cascch ="SELECT *  FROM Checksheets WHERE merged = ".$ID."";   //Now,  get all of the merged Checksheets
			$resultcasc = mysqli_query($dbc, $cascch); 
	if($resultcasc){
		while ($rowcasc=mysqli_fetch_array($resultcasc)) {
				$id=$rowcasc['id'];
				$Rid=$rowcasc['id'];
				$Checksheetno=$rowcasc['ChecksheetName'];
				$sealable=$rowcasc['sealable'];
				$sealed=$rowcasc['sealed'];
				$Signature=$rowcasc['Signature'];
	$Checksheet_events_table=$Checksheetno."_events";
	
			   $CascTS ="SELECT T_update FROM ".$Checksheetno." ORDER BY T_update DESC LIMIT 1 ";   //Get the latest T_update from the Timestamp field of the Checksheet.
			$resultmainTS = mysqli_query($dbc, $mainTS) or die ("Aitn"); 							
					while ($rowmainTS=mysqli_fetch_array($resultmainTS)) {
		$Timestamp=$rowmainTS['T_update'];       }
		
		
		
		
	if (file_exists(CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".".$Timestamp.".txt")) {  //If there is a current cached Checksheet
	$file = CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".".$Timestamp.".txt";
$CHcached = unserialize(implode('',file($file)));




	foreach($CHcached  as $casc_id) {     //The "order of checksheet  no." AS "The checksheet_id" array.
	$Checksheetno=$casc_id[0];   //The "Checksheet Name"
		$sealable=$casc_id[1];       //If the checksheet is sealable
		$sealed=$casc_id[2];			// If the checksheet is sealed
		$Signature=$casc_id[3];		// If it IS sealed -- who sealed it				
		$Cats=$casc_id[4];
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
			$Checksheet_events_table=$Checksheetno."_events"; //if the checksheet is the primary checksheet, don't put anything in the merged and merger columns.
		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),'$ID','$q_set')"; //get event id for data insert
		mysqli_query($dbc,$querystartid);
		$EV_set = mysqli_insert_id($dbc);
			//print("This is the $q_set");	
$CH[]=array($id=>array('0'=>$Checksheetno,'1'=>$sealable,'2'=>$sealed,'3'=>$Signature,'4'=>$EV_set)); //Start the array of checksheets that will include categories. Main Chacksheet First"0".
	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {
		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
		//print("$CATEGORY<BR>\n");
		//print_r2($catname[1]);
		$CH[count($CH)-1][$id][5][]=array($catarray_id=>array('0'=>$CATEGORY));  //Add Merged Categories
	foreach($Catarray as $Subcatrow)	{
	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
		$SUBCATEGORY=$subcatname[0];
		$SUBCATCOLS=$subcatname[1];
		$Itemsarray=$subcatname[2];
		//print("$SUBCATEGORY<BR>\n");
		//print("$SUBCATCOLS<BR>\n");
		//print_r2($Itemsarray);
		$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$catarray_id][1][]=array($subcatarray_id=>array($SUBCATEGORY,$SUBCATCOLS));  //Add Merged Subcategories
	foreach($Itemsarray as $Itemstuff)	{
		$Item_id=$Itemstuff[0];
		$Itemname=$Itemstuff[1];
	$HowMany=$Itemstuff[2];
		$perishable=$Itemstuff[3];
	$req=$Itemstuff[4];
		//print_r2($Itemstuff);
		//print("$Itemname<BR>\n");
	//print("$HowMany<BR>\n");
		//print("$Item_id<BR>\n");
$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$catarray_id][1][count($CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$catarray_id][1])-1][$subcatarray_id][2][]=array($Item_id,$Itemname,$HowMany,$perishable,$req);  //Add Merged Subcategories
    
	if ($req == 1) { $REQ[]=array($Rid,$Item_id,$Itemname,$HowMany,$perishable,$req); }
	}
	}}
		}}
	}










} else { 

		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),".$ID.",".$q_set.")"; //get event id for data insert
		mysqli_query($dbc,$querystartid);
		$EV_set = mysqli_insert_id($dbc);

		$CH[] = array($rowcasc['id']=>array('0'=>$rowcasc['ChecksheetName'],'1'=>$rowcasc['sealable'],'2'=>$rowcasc['sealed'],'3'=>$rowcasc['Signature'],'4'=>$EV_set));  //Add Merged Checksheets 

		$CHcache= array($rowcasc['id']=>array('0'=>$rowcasc['ChecksheetName'],'1'=>$rowcasc['sealable'],'2'=>$rowcasc['sealed'],'3'=>$rowcasc['Signature']));  //Add Merged Checksheets 



 $sqltab ="SELECT DISTINCT $Checksheetno.category_id,Category.* FROM $Checksheetno,Category WHERE $Checksheetno.category_id = Category.category_id";
	$resulttab = mysqli_query($dbc, $sqltab) or die ("can't get the setvartabs selection.");  //Second, Get the Categories in those Checksheets.
		while ($rowtab=mysqli_fetch_array($resulttab)) {
			$cat_id=$rowtab['category_id'];
			$cat_name=$rowtab['category_name'];

		$CH[count($CH)-1][$id][5][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories

$CHcache[$id][4][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories



 $sqlcatsub2 ="SELECT DISTINCT $Checksheetno.subcategory_id, Subcategory.* FROM $Checksheetno,Subcategory WHERE $cat_id = $Checksheetno.category_id AND $Checksheetno.subcategory_id = Subcategory.subcategory_id ";
	$resultcatsub2 = mysqli_query($dbc, $sqlcatsub2) or die ("can't get the CatSub2 selection.");  //Third, Get the Subcategories in those Categories.
			//////Getting the CatSub selections./////////////////////////////////////////////
			while ($rowcatsub2=mysqli_fetch_array($resultcatsub2)) {
				$sub=$rowcatsub2['subcategory_id'];
				$sub_name=$rowcatsub2['subcategory_name'];
				$cols=$rowcatsub2['cols'];
		
		$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1][]=array($sub=>array($sub_name,$cols));  //Add Merged Subcategories
		$CHcache[$id][4][count($CHcache[$id][4])-1][$cat_id][1][]=array($sub=>array($sub_name,$cols));  //Add Merged Subcategories

//////// Start the Items fields from the category and place them under the header.  Start a count to create columns specified in the Subcategory field.///////////////////////////
	//print("$cat_id\n<br>");
	$sql2items= "SELECT $Checksheetno.*,Items.* FROM $Checksheetno,Items WHERE  $cat_id = $Checksheetno.category_id AND $sub = $Checksheetno.subcategory_id AND Items.item_id = $Checksheetno.item_id";
		$result2items = mysqli_query($dbc, $sql2items) or die ("can't get the Items selection");
//		$resultitems = mysqli_query($dbc, $sqlitems);

  while ($rowitems=mysqli_fetch_array($result2items)) { 
			$cols=colcount($rowitems['subcategory_id']);
			$CHid=$rowitems['item_id'];
			$itemname=$rowitems['item_name'];
			$hm = hmidtoname($rowitems['hm_value_id']);
			$perishable=$rowitems['perishable'];
			$req=$rowitems['req'];


$CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1][count($CH[count($CH)-1][$id][5][count($CH[count($CH)-1][$id][5])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

$CHcache[$id][4][count($CHcache[$id][4])-1][$cat_id][1][count($CHcache[$id][4][count($CHcache[$id][4])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

if ($req == 1) { $REQ[]=array($Rid,$CHid,$Itemname,$hm,$perishable,$req); }
}



	}

}

$chk_cache = serialize($CHcache);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".".$Timestamp.".txt","w");//CACHE THE cascading checksheet list into the cache file, <CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.$Timestamp".txt">
fputs($fp, $chk_cache);
fclose($fp);


}
}
//print_r2($CHcache);


}
$chk_cache = serialize($CH);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".txt","w");//CACHE THE cascading checksheet list into the cache file, <CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".txt">
fputs($fp, $chk_cache);
fclose($fp);
//print_r2($CH);
if(file_exists(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt")) {
	unlink(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt"); }
$chk_cache = serialize($REQ);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt","w");//CACHE THE required data for quicker verification.
fwrite($fp, $chk_cache);
fclose($fp);


    require_once('inc/validate.inc.php'); // bring in the requirement validation of form


	require_once('inc/setvartabs.inc.php'); // bring in the setvartabs.inc.php.
setvartabs($CH);	//get the tabs ready from the $CH array. 
delaybody();		//post delayscript() script.

//print ("Line 968 \n"); print_r2($CH); 

//print_r2($CacheCH);
//print_r2($CHcache);

//print_r2($CHcached);
//foreach($REQ as $ritems => $rname) {
 //   print_r2($rname);
   //    print("".$rname[2]."");
     // foreach($rname as $reqname) {
       //   print("$reqname[2]"); }
 //   }
//print_r2($REQ);
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//	// The breakdown of all of array formed.
//	foreach($CH as $no) {       //The "array" AS the "order of checksheet  no."
//	foreach($no as $casc_id) {     //The "order of checksheet  no." AS "The checksheet_id" array.
//		$Checksheetno=$casc_id[0];   //The "Checksheet Name"
//		//$sealable=$casc_id[1];       //If the checksheet is sealable
//		//$sealed=$casc_id[2];			// If the checksheet is sealed
//		//$Signature=$casc_id[3];		// If it IS sealed -- who sealed it
//		//$qset=$casc_id[5];				
//		$Cats=$casc_id[4];
//		//print("$Checksheetno<BR>\n");
//		//print_r2($Cats);
//	foreach($Cats as $Checkrow)	{
//	foreach($Checkrow as $catarray_id =>  $catname) {
//		$CATEGORY=$catname[0];
//		$Catarray=$catname[1];
//		//print("$CATEGORY<BR>\n");
//		//print_r2($catname[1]);
//	foreach($Catarray as $Subcatrow)	{
//	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
//		$SUBCATEGORY=$subcatname[0];
//		$SUBCATCOLS=$subcatname[1];
//		$Itemsarray=$subcatname[2];
//		//print("$SUBCATEGORY<BR>\n");
//		//print("$SUBCATCOLS<BR>\n");
//		//print_r2($Itemsarray);
//	foreach($Itemsarray as $Itemstuff)	{
//		$Item_id=$Itemstuff[0];
//		$Itemname=$Itemstuff[1];
//		$HowMany=$Itemstuff[2];
//		$perishable=$Itemstuff[3];
//		$req=$Itemstuff[4];
//		//print_r2($Itemstuff);
//		//print("$Itemname<BR>\n");
//		//print("$HowMany<BR>\n");
//		//print("$Item_id<BR>\n");
//      }
//		}}
//		}}
//		}}
//
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
		<INPUT TYPE="button" value="Append Maintenance" onClick="window.open('Maintenance.php?checksheet=<?echo $ID?>')">
<FORM  ID="Main" name="mainCheckSheet" ACTION="<?php echo $PHP_SELF;?>" METHOD="POST" onSubmit="return checkForm(this);">
 <center><INPUT TYPE="submit"  NAME="Update"  ID="Main" VALUE="Update" >
<div class=page>

	<input type='hidden' name='checksheet' value='<?php echo $_POST['checksheet'] ?>' />

<?

	require_once('inc/getcat.inc.php'); // bring in the functions.
	//require_once('inc/category_select.inc.php'); // bring in the functions.
getcat($CH); //Place the Tabs prepaired from the setvartabs function
//Now place the stuff under the tabs.
$cattab=1;  // start the count

foreach($CH as $no) {
foreach($no as $casc_ID=>$casc_id) {
		$Checksheetno=$casc_id[0];
		$sealable = $casc_id[1];//print("Sealable: ".$sealable."<br>\n");
		$sealed = $casc_id[2];// print("Sealed: ".$sealed."<br>\n");
		$Signature = _user_idtoname($casc_id[3]);
		$q_set = $casc_id[4];
		$Cats=$casc_id[5];
//		print("Over the $casc_ID<br>");
//print("The casc_ID is $casc_ID<BR>\n");
//		//print_r2($Cats);

	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {

		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
			//print_r2($Catarray);
				$cat_id=$catarray_id;
			if ($cattab == 1) { //if it's the first tab--visible
				print("<div id='tab$cattab' class='tabContent'  style='display:block'><br>\n");
			}
			else { //if it's not the first tab--hidden
				print("</div><div id='tab$cattab' class='tabContent'><br>\n");
			}

			$cattab=$cattab+1;


		//print("$CATEGORY<BR>\n");
		//print_r2($catname[1]);


/*
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		The Seal Deal
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

 if ($sealable == 1 ) {


		//print("Line 853"); print_r2($Cats);
	if ($sealed != NULL || $sealed != 0) { // If it's sealable and sealed...

	include('inc/sealable.inc.php');  // Sealable
		//print("This is the casc_ID: ".$casc_ID."<br>");

						 } else {// If it's sealable but not sealed... 

					//print("Checksheetno. : ".$Checksheetno."\n");
			
			?>
			<br><INPUT TYPE="button" value="Apply a Seal" onClick="window.open('sealbox.php?checksheet=<?php echo $Checksheetno ?>')">
			<?php
			
			//print_r2($Catarray);
			include("inc/category_select2.inc.php");
			//category_select($Catarray,$casc_ID,$catarray_id,$q_set);

			include("inc/SealBoxArray.inc.php");
			//print_r2($casc_id);
			//}
			//print("Checksheetno. : ".$Checksheetno."\n");
}
 } 
////////////////////////////////////////////////////////////////////////////////////////////
//     End of "If Sealable?"
//












////////////////////////////////////////////////////////////////////////////////////////////
 else {   // Not Sealable

			include("inc/category_select2.inc.php");
			//category_select($Catarray,$casc_ID,$catarray_id,$q_set);
}
*/

			include("inc/category_select2.inc.php");
			//category_select($Catarray,$casc_ID,$catarray_id,$q_set);





} //End of foreach $Checksheetno
	 }}   // End of For each Category
	} // End of for each $CH

  mysqli_close($dbc);

	print("\n<input type=\"hidden\" name=\"CHqset[".$casc_ID."]\" value=\"".$q_set."\">\n");







?>
 <center><INPUT TYPE="submit"  NAME="Update"  ID="Main" VALUE="Update" >

 </FORM>
<?php


 
//print ("Line 930 \n"); print_r2($CH); 
print ("</div>");
print ("<div style=clear:all;>");

foreach($CH as $no) {
foreach($no as $casc_ID=>$casc_id) {

	smaintmerge($casc_ID,$q_set);  //Merge the Maintenance data to the Requisition and Checksheet order.
}
}
echo"</div>";
 
//print_r2($REQ);
//print_r2($Chqset);
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//    End of First Checksheet
//
/////////////////////////////////////////////////////////////////////////////////////////////////////
} else {   //  If you're not logged in 

	  // Generate the navigation menu
    echo ' <a href="login.php">Log In</a><br />';
    echo ' <a href="signup.php">Sign Up</a>';
 } 

?>

</div>



 <? require("inc/footer.inc");  ?>
</body>

</html>
