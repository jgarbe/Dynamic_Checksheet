<?php
//print("<span style='color:yellow;'>DBG LINE 2 data_acquisition.inc.php-- debugging require_once()</span><br/>\n");
require_once("functions.php.inc");
	require_once('connectvars.php');  // Set the username connection variables.
$ID=checksheetnotochecksheet_id($Checksheetno);	
//print("<span style='color:yellow;'>DBG LINE 3 data_acquisition.inc.php</span><br/>");
	  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	  
	  
	  $submit_array=array();
	  

	//////////////////////////////   Check for changes in the Checksheet. If none, use the cached version.
		   $mainTS ="SELECT T_update FROM ".$Checksheetno." ORDER BY T_update DESC LIMIT 1 ";   //Get the latest T_update from the Timestamp field of the Checksheet.
		   //print("<span style='color:yellow;'>DBG LINE 15 data_acquisition.inc.php ".$Checksheetno."</span><br/>");
			$resultmainTS = mysqli_query($dbc, $mainTS) or die ("Aitn"); 							
					while ($rowmainTS=mysqli_fetch_row($resultmainTS)) {
		$Timestamp=$rowmainTS['T_update'];       }
		
//("<span style='color:yellow;'>DBG LINE 20 data_acquisition.inc.php<br/>".$Timestamp."<br/>".$_POST['checksheet']."</span><br/>");
				if (!file_exists(CACHE_DIR.$_POST['checksheet'])) { 
			 mkdir(CACHE_DIR.$_POST['checksheet'], 0775) ;
			}
			
//print("<span style='color:yellow;'>DBG LINE 26 data_acquisition.inc.php</span><br/>");
if (file_exists(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".".$Timestamp.".txt")) {  //If there is a current cached Checksheet
	$file = CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".".$Timestamp.".txt";
$CHcached = unserialize(implode('',file($file)));
/////////////////////////////////////////////
foreach($CHcached as $no) {       //The "array" AS the "order of checksheet  no."
	foreach($no as $casc_id) {     //The "order of checksheet  no." AS "The checksheet_id" array.
	$Checksheetno=$casc_id[0];   //The "Checksheet Name"
		$sealable=$casc_id[1];       //If the checksheet is sealable
		$sealed=$casc_id[2];			// If the checksheet is sealed
		$Signature=$casc_id[3];		// If it IS sealed -- who sealed it				
		$Cats=$casc_id[4];
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
		
						require_once('qsetoo.inc.php');
				
		$q_set = q_set($Checksheetno, 0, 0);
		$submit_array[]=array($Checksheetno,$q_set);
//			$Checksheet_events_table=$Checksheetno."_events"; //if the checksheet is the primary checksheet, don't put anything in the merged and merger columns.
//		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),'NULL','NULL')"; //get event id for data insert
//		mysqli_query($dbc,$querystartid);
//		$q_set = mysqli_insert_id($dbc);
			//print("data_acquisition.inc.php Line 48 <br />Cached checksheet<br />This is the Q_set, ".$q_set."<br />\n");	
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

if ($req == 1) { $REQ[]=array($ID,$Item_id,$Itemname,$HowMany,$perishable,$catarray_id,$subcatarray_id,$req); }
     }  
	}}
		}}
	}}
}  else {		//If there is not a cached checksheet create one along with the new form


			


//print("<span style='color:yellow;'>DBG LINE 90 data_acquisition.inc.php</span><br/>");

	   $mainch ="SELECT *  FROM Checksheets WHERE id = ".$ID."";   //First get all of the First  Main Checksheet
			$resultmain = mysqli_query($dbc, $mainch); 							
					while ($rowmain=mysqli_fetch_array($resultmain)) {
				$id=$rowmain['id'];		
				$Checksheetno=$rowmain['ChecksheetName'];		
				$sealable=$rowmain['sealable'];		
				$sealed=$rowmain['sealed'];		
				$Signature=$rowmain['Signature'];
				//////////////
				
				require_once('qsetoo.inc.php');
				
		$q_set = q_set($Checksheetno, 0, 0);	
		
		$submit_array[]=array($Checksheetno,$q_set);	

$CH=array("0"=>array($ID=>array('0'=>$rowmain['ChecksheetName'],'1'=>$rowmain['sealable'],'2'=>$rowmain['sealed'],'3'=>$rowmain['Signature'],'4'=>$q_set))); //Start the array of checksheets that will include categories. Main Chacksheet First"0".

$CacheCH=array("0"=>array($ID=>array('0'=>$rowmain['ChecksheetName'],'1'=>$rowmain['sealable'],'2'=>$rowmain['sealed'],'3'=>$rowmain['Signature']))); //Create another cachable array of checksheets that will include categories. Main Chacksheet First"0".

 $sqltab ="SELECT DISTINCT ".$Checksheetno.".category_id,Category.* FROM ".$Checksheetno.",Category WHERE ".$Checksheetno.".category_id = Category.category_id";
	$resulttab = mysqli_query($dbc, $sqltab) or die ("can't get the setvartabs selection.");  //Second, Get the Categories in those Checksheets.
		while ($rowtab=mysqli_fetch_array($resulttab)) {
			$cat_id=$rowtab['category_id'];
			$cat_name=$rowtab['category_name'];
			
//print("<span style='color:yellow;'>DBG LINE 117 data_acquisition.inc.php<br/>".$cat_id."</span><br/>");
		$CH[count($CH)-1][$id][5][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories

		$CacheCH[count($CacheCH)-1][$id][4][]=array($cat_id=>array('0'=>$cat_name));  //Cachable Merged Categories


 $sqlcatsub2 ="SELECT DISTINCT ".$Checksheetno.".subcategory_id, Subcategory.* FROM ".$Checksheetno.",Subcategory WHERE ".$cat_id." = ".$Checksheetno.".category_id AND ".$Checksheetno.".subcategory_id = Subcategory.subcategory_id ";
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
	$sql2items= "SELECT ".$Checksheetno.".*,Items.* FROM ".$Checksheetno.",Items WHERE  ".$cat_id." = ".$Checksheetno.".category_id AND ".$sub." = ".$Checksheetno.".subcategory_id AND Items.item_id = ".$Checksheetno.".item_id";
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

$CacheCH[count($CacheCH)-1][$id][4][count($CacheCH[count($CacheCH)-1][$id][4])-1][$cat_id][1][count($CacheCH[count($CacheCH)-1][$id][4][count($CacheCH[count($CacheCH)-1][$id][4])-1][$cat_id][1])-1][$sub][2][]=array($CHid,$itemname,$hm,$perishable,$req);  //Add Merged Subcategories

if ($req == 1) { $REQ[]=array($ID,$CHid,$itemname,$hm,$perishable,$cat_id,$sub,$req); }
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









//Now,  get all of the merged Checksheets


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
		
		
						require_once('qsetoo.inc.php');
				
		$EV_set = q_set($Checksheetno, $ID, $q_set);
		
		$submit_array[]=array($Checksheetno,$q_set);
		//print("$Checksheetno<BR>\n");
		//print_r2($Cats);
//			$Checksheet_events_table=$Checksheetno."_events"; //if the checksheet is the primary checksheet, don't put anything in the merged and merger columns.
//		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),'$ID','$q_set')"; //get event id for data insert
//		mysqli_query($dbc,$querystartid);
//		$EV_set = mysqli_insert_id($dbc);
			//print("This is the EV_set, ".$EV_set."1, Checksheet =  ".$Checksheetno.", ID =".$ID." -- LINE 539<br />");	
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
    
	if ($req == 1) { $REQ[]=array($Rid,$Item_id,$Itemname,$HowMany,$perishable,$catarray_id,$subcatarray_id,$req); }
	}
	}}
		}}
	}










} else { // If there isn't a current cached checksheet

//		 $querystartid="INSERT INTO $Checksheet_events_table(id,date,merged,merger)  VALUES ('',Now(),".$ID.",".$q_set.")"; //get event id for data insert
//		mysqli_query($dbc,$querystartid);
//		$EV_set = mysqli_insert_id($dbc);
		
						require_once('qsetoo.inc.php');
				
		$EV_set = q_set($Checksheetno, $ID, $q_set);
		
		$submit_array[]=array($Checksheetno,$q_set);

	//print("This is the EV_set, ".$EV_set."<br />data_acquisistion.inc.php Line 270<br /> This is he q_st, ".$q_set."<br />\n");
		$CH[] = array($rowcasc['id']=>array('0'=>$rowcasc['ChecksheetName'],'1'=>$rowcasc['sealable'],'2'=>$rowcasc['sealed'],'3'=>$rowcasc['Signature'],'4'=>$EV_set));  //Add Merged Checksheets 

		$CHcache= array($rowcasc['id']=>array('0'=>$rowcasc['ChecksheetName'],'1'=>$rowcasc['sealable'],'2'=>$rowcasc['sealed'],'3'=>$rowcasc['Signature']));  //Add Merged Checksheets 

					  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

 $sqltab ="SELECT DISTINCT ".$Checksheetno.".category_id,Category.* FROM ".$Checksheetno." INNER JOIN Category ON  ".$Checksheetno.".category_id = Category.category_id";

	//$resulttab = mysqli_query($dbc, $sqltab) or die ("can't get the setvartabs selection1-- Line 270 data_acquisistion.inc.php.");  //Second, Get the Categories in those Checksheets.
	
	$resulttab = mysqli_query($dbc, $sqltab) or die(mysqli_error($dbc));
		while ($rowtab=mysqli_fetch_array($resulttab)) {
			$cat_id=$rowtab['category_id'];
			$cat_name=$rowtab['category_name'];

		$CH[count($CH)-1][$id][5][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories

$CHcache[$id][4][]=array($cat_id=>array('0'=>$cat_name));  //Add Merged Categories



 $sqlcatsub2 ="SELECT DISTINCT ".$Checksheetno.".subcategory_id, Subcategory.* FROM ".$Checksheetno.",Subcategory WHERE ".$cat_id." = ".$Checksheetno.".category_id AND ".$Checksheetno.".subcategory_id = Subcategory.subcategory_id ";
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
	$sql2items= "SELECT ".$Checksheetno.".*,Items.* FROM ".$Checksheetno.",Items WHERE  ".$cat_id." = ".$Checksheetno.".category_id AND ".$sub." = ".$Checksheetno.".subcategory_id AND Items.item_id = ".$Checksheetno.".item_id";
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

if ($req == 1) { $REQ[]=array($Rid,$CHid,$itemname,$hm,$perishable,$cat_id,$sub,$req); }
//print("<span style='color:yellow;'><br/>DBG Line 338 data_acquisition.inc.php <br/></span>\n"); print_r2($CH);
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

/*
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */



$chk_cache = serialize($CH);
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet'].".txt","w");//CACHE THE cascading checksheet list into the cache file, <CACHE_DIR.$_POST['checksheet']."/".$Checksheetno.".txt">
fputs($fp, $chk_cache);
fclose($fp);
//print("data_acquisition.inc.php line 375 array of CH<br />\n");print_r2($CH);
if(file_exists(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt")) {
	unlink(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt"); }
isset($REQ)?$chk_cache = serialize($REQ):$chk_cache = '';
$fp = fopen(CACHE_DIR.$_POST['checksheet']."/".$_POST['checksheet']."_REQ.txt","w");//CACHE THE required data for quicker verification.
fwrite($fp, $chk_cache);
fclose($fp);


?>
