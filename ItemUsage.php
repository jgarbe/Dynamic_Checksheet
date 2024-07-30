<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
    $Title="Item Usage Query";
  require_once('inc/title.php');

 require("inc/functions.php.inc");

  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username'])) {
	

	
  }
  else {
    echo ' <a href="login.php">Log In</a><br />';
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


    if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		Verticle Bar Gragh
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
function verticle_bar_graph($width, $height, $data, $max_value, $filename,$item_id) {
	$img= imagecreatetruecolor($width, $height);
	$bg_color=imagecolorallocate ($img, 255,255,255);
	$text_color=imagecolorallocate ($img, 255,86,7);
	$bar_color=imagecolorallocate ($img, 0,0,0);
	$border_color=imagecolorallocate ($img, 192,192,192);

	imagefilledrectangle($img, 0, 0, $width, $height, $bg_color);
	
$bar_width= $width/((count($data) *2) +1);
for($i=0;$i< count($data);$i++) {
	imagefilledrectangle($img, ($i*$bar_width*2) +$bar_width,$height,($i*$bar_width*2) + ($bar_width*2), $height-(($height/$max_value)*$data[$i][1]), $bar_color);

	imagestringup($img,5,($i*$bar_width*2)+($bar_width), $height-5, $data[$i][0]."--".$data[$i][1]." ".ItemidtoName($item_id), $text_color);
 }
imagerectangle($img, 0, 0, $width-1, $height-1, $border_color);

//for($i = 1; $i<=$max_value;$i++) { 
//	imagestring($img,5,0,$height-($i*($height/$max_value)), $i, $bar_color);
//}
	imagepng($img,$filename,5);
	imagedestroy($img);

}
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		End Verticle Bar GRaph
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		Horizontal Bar Gragh
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
function horizontal_bar_graph($width, $height, $data, $max_value, $filename, $item_id) {

	$img= imagecreatetruecolor($width, $height);
	$bg_color=imagecolorallocate ($img, 255,255,255);
	$text_color=imagecolorallocate ($img, 255,86,7);
	$bar_color=imagecolorallocate ($img, 5,19,143);
	$border_color=imagecolorallocate ($img, 192,192,192);

	imagefilledrectangle($img, 0, 0, $width, $height, $bg_color);
	
$bar_height= $height/((count($data) *2) +1); // height of each bar= (total height/no. of bars)2 + pixel spacer
for($i=0;$i< count($data);$i++) {  //for each bar

imagefilledrectangle($img,0, ($i*$bar_height*2) +$bar_height, (($width/$max_value)*$data[$i][1]),($i*$bar_height*2) + ($bar_height*2), $bar_color);

	imagestring($img,5,5,($i*$bar_height*2)+($bar_height),  $data[$i][0]."--".$data[$i][1]." ".ItemidtoName($item_id), $text_color);

 }
imagerectangle($img, 0, 0, $width-3, $height-3, $border_color);

//for($i = 1; $i<=$max_value;$i++) { 
//	imagestring($img,5,$i*($width/$max_value),0,$i , $bar_color);}
	imagepng($img,$filename,5);
	imagedestroy($img);

}
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		End Horizontal Bar GRaph
//
//////////////////////////////////////////////////////////////////////////////////////////////////////







////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		Render Info
//
//////////////////////////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['item_usage']) && !empty($_POST['criteria']) && !empty($_POST['item_id'])) {
   $BDay=$_POST['BDay'];
   $BMonth=$_POST['BMonth'];
    $BYear=$_POST['BYear'];
   $EDay=$_POST['EDay'];
   $EMonth=$_POST['EMonth'];
    $EYear=$_POST['EYear'];
	$criteria=$_POST['criteria'];
	$item_id=$_POST['item_id'];
		//print("$item_id");
if (empty($_POST['BMonth'])) {
	$BMonth=date ("m");
	}
if (empty($_POST['BYear'])) {
	$BYear=date ("Y");
	}
if (empty($_POST['BDay'])) {
	$BDay=date ("d");
	}

if (empty($_POST['EMonth'])) {
	$EMonth=date ("m");
	}
if (empty($_POST['EYear'])) {
	$EYear=date ("Y");
	}
if (empty($_POST['EDay'])) {
	$EDay=date ("d");
	}
//echo " $BDay, $BMonth, $BYear ------$EDay, $EMonth, $EYear ";
//$ffilled = ffill($Month,$Year);
//Calculate the viewed Month.
$Begdate=mktime(0,0,0,$BMonth,$BDay,$BYear);
$Enddate=mktime(23,59,59,$EMonth,$EDay,$EYear);
//echo"$Begdate";
//echo"$Enddate";

//Get all of the Checksheets to query from
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		//first, get the Primary Checksheet names.
	$sqlpch="SELECT * FROM Checksheets WHERE (merged IS NULL || merged = '0') order by ChecksheetName";
	$resultpch = mysqli_query($dbc, $sqlpch);
		while ($rowpch = mysqli_fetch_array($resultpch, MYSQL_NUM)) {
			$PChName = $rowpch[1];		//The Name of each Checksheet
			$PChEvent = $rowpch[1]."_events";  	//the events in each Checksheet Table
			$PChCh = $rowpch[1]."_checksheet";  //Each Checksheet Name
			$Prim_id = $rowpch[0];			//Each Checksheet id
			
		//second, get the merged Checksheet names.
	$sqlsch="SELECT * FROM Checksheets WHERE merged = '".$Prim_id."' order by ChecksheetName";
	$resultsch = mysqli_query($dbc, $sqlsch)or die("MySQL error: " . mysqli_error($dbc) . "<hr>\nQuery: $sqlsch");
		while ($rowsch = mysqli_fetch_array($resultsch, MYSQL_NUM)) {
			$SChName = $rowsch[1];		//The Name of each Checksheet
			$SChEvent = $rowsch[1]."_events";  	//the events in each Checksheet Table
			$SChCh = $rowsch[1]."_checksheet";  //Each Checksheet Name
			$PCh[$PChName][]=$rowsch[1];			//Each Checksheet id

}  //End getting the Secondary Checksheets.

}  //End getting the Primary Checksheets.

//print_r2($PCh);
//////////////////////////////////////////////////////////////////////////////////////////
//		Query by Checksheet
//
/////////////////////////////////////////////////////////////////////////////////////////////
if ($criteria == 'Primary_Checksheet') {

print("Sometimes the caching on your computer's web browser may show the previous query graphic.  Just hit the \"F5\" button to update.  I'll fix it later.");
	foreach ($PCh as $Primary => $Secondary_set) {
				$PCH=$Primary."_checksheet";
				$PCHE=$Primary."_events";
			$counter[][0]=$PCH;
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$sqliq="SELECT * FROM ".$PCH.",".$PCHE." WHERE item_id = '".$item_id."' AND ".$PCH.".event_id = ".$PCHE.".id AND ".$PCHE.".submitted = '1' AND (UNIX_TIMESTAMP(".$PCHE.".date) BETWEEN ".$Begdate." AND ".$Enddate.") ";
	$resultiq = mysqli_query($dbc, $sqliq);
		//if ($resultiq) {
		//	$rowiq = mysqli_fetch_array($resultiq,MYSQLI_ASSOC);
		while ($rowiq = mysqli_fetch_array($resultiq)) {
			$result = $rowiq['result'];  //Each Checksheet Name
			if($rowiq['hm_value_id']=='cb') {$hm=1;} else {$hm=$rowiq['hm_value_id'];}  //Each Checksheet Name	
			$amt=$hm-$result;
			if($amt >=1) {$counter[count($counter)-1][1]=$counter[count($counter)-1][1]+$amt; }
			$added=$added+($hm-$result);		
			//$counter[][$Primary][$date][]=$amt;	
		}
			foreach ($Secondary_set as  $SCH) {
				$SCHCH=$SCH."_checksheet";
				$SCHCHE=$SCH."_events";
				// print("$SCHCH--$SCHCHE<br>");		
//print("<br>$item_id<br>");

			//$counter[count($counter)-1][1]=$SCHCH;
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$sqlsiq="SELECT * FROM $SCHCH,$SCHCHE WHERE item_id = '".$item_id."' AND $SCHCH.event_id = $SCHCHE.id AND $SCHCHE.submitted = '1' AND (UNIX_TIMESTAMP(".$SCHCHE.".date) BETWEEN ".$Begdate." AND ".$Enddate.")";
	$resultsiq = mysqli_query($dbc, $sqlsiq)or die("MySQL error: " . mysqli_error($dbc) . "<hr>\nQuery: $sqlsiq");
		//if ($resultsiq) {
			//$rowsiq = mysqli_fetch_array($resultsiq, MYSQLI_ASSOC);
		while ($rowsiq = mysqli_fetch_array($resultsiq)) {			
			
			$result = $rowsiq['result'];
			if($rowsiq['hm_value_id']=='cb') {$hm=1;} else {$hm=$rowsiq['hm_value_id'];}  //Each Checksheet Name
			$amt=$hm-$result;
			$added=$added+($hm-$result);
			if($amt >=1) {$counter[count($counter)-1][1]=$counter[count($counter)-1][1]+$amt; }

			$id=$rowsiq['id'];

}  //End getting the Primary Query





}  //End getting the Primary Query






				


}  //End of for each $Primary (Primary Checksheet)
//print_r2($counter);
foreach($counter as $ch) {
	$no[] = $ch[1];	}
	//print_r2($no);
$greatest = max($no);
//print("The greatest no. =$greatest");
print("<br>TTL Items = ".$added." ".ItemidtoName($item_id).". \n");

	$Chart_Size = $greatest+$greatest*0.1;
print("<div><center><table><tr>");
print("<th>".ItemidtoName($item_id)." ordered between ".date("M d H:i:s", $Begdate)." and ".date("M d H:i:s", $Enddate).". </th>");
print("</tr>");
print("<td style=\"padding:10;text-align:center;\">");
//verticle_bar_graph(800, 600, $counter, $Chart_Size, MM_UPLOADPATH.'ch_usage.png',$item_id);
horizontal_bar_graph(600, 800, $counter, $Chart_Size, MM_UPLOADPATH.'ch_usage.png',$item_id);
echo'<img src="'.MM_UPLOADPATH.'ch_usage.png"	alt="Bar Graph" />';
print("</td></tr></table></center></div>");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//		CallSign Query
//
//////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($criteria == 'CallSign') {


print("Sometimes the caching on your computer's web browser may show the previous query graphic.  Just hit the \"F5\" button to update.  I'll fix it later.");



//print ("$criteria--$item_id");
//print_r2($counter);
//print("Under Construction!");


  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$sqlCS="SELECT * FROM CallSign";
	$resultCS = mysqli_query($dbc, $sqlCS);
		while ($rowCS = mysqli_fetch_array($resultCS)) {
				$CSid[]=$rowCS['id'];   }
//print_r2($CSid);   //testing array
mysqli_close($dbc);
  
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$sqlCH="SELECT * FROM Checksheets cs1 where (cs1.merged IS NULL || cs1.merged ='0')";
	$resultCH = mysqli_query($dbc, $sqlCH);
		while ($rowCH = mysqli_fetch_array($resultCH)) {
				$CHNames[][0]=$rowCH['ChecksheetName'];
				$CHNames[count($CHNames)-1][1]=$rowCH['id']; 
				//$CHNames[count($CHNames)-1][2]=$rowCH[merged]; 
					 }


//print_r2($CHNames);  //testing array
mysqli_close($dbc);

foreach($CSid as $CS) {       //For Each Call Sign
		$CSName=reciper($CS,'CallSign');
	//	print("<br>$CSName");
			
				$CHE[][0]=$CSName;
	foreach($CHNames as $CH) {
		$CSCH=$CH[0]."_checksheet";
		$CSCHE=$CH[0]."_events";
		$CHID=$CH[1];   //id

				
		  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//				print("<br>".$CH[0]."--".$CH[1]."--".$CH[2]."</br>");
						
				$sqlsecondary="SELECT cs2.ChecksheetName FROM Checksheets cs2 WHERE (cs2.merged = '".$CHID."' || cs2.id = '".$CHID."')";
				$resultsecondary = mysqli_query($dbc, $sqlsecondary)or die("MySQL error: " . mysqli_error($dbc) . "<hr>\nQuery: $sqlsecondary");
		while ($rowsecondary = mysqli_fetch_array($resultsecondary)) {
				$CSCH2=$rowsecondary['ChecksheetName']."_checksheet";   
//					print("<br>$CSCH2"); 
					

					//The big query
				$sqlCHE="SELECT ch2.event_id,ch2.hm_value_id, ch2.result FROM $CSCH,".$CSCHE." sch1".
					",".$CSCH2." ch2 ".
					"WHERE ".
					" ".$CSCH.".item_id = '7'".
					" AND ".
					" ".$CSCH.".result = '".$CS."' ".
				"AND ch2.item_id = '".$item_id."' ".
				"AND ".$CSCH.".event_id = ch2.event_id ".
				"AND ".$CSCH.".event_id = sch1.id".
				" AND sch1.submitted = '1' AND (UNIX_TIMESTAMP(sch1.date) BETWEEN ".$Begdate." AND ".$Enddate.") ";
	$resultCHE = mysqli_query($dbc, $sqlCHE)or die("MySQL error: " . mysqli_error($dbc) . "<hr>\nQuery: $sqlsiq");
		while ($rowCHE = mysqli_fetch_array($resultCHE)) {
					//$hm=rowCHE[hm_value_id];
					$result=$rowCHE['result'];	
if($rowCHE['hm_value_id']=='cb') {$hm=1;} else {$hm=$rowCHE['hm_value_id'];}  //Each Checksheet Name	
			$amt=$hm-$result;
			if($amt >=1) {$CHE[count($CHE)-1][1]=$CHE[count($CHE)-1][1]+$amt;
			 }
			$added=$added+($hm-$result);
 }




   




         }   //End of foreach $CH2






}  //End of foreach $CH*/
}     // End of foreach $CSid 

mysqli_close($dbc);
//print_r2($CHE);
foreach($CHE as $ch) {
	$no[] = $ch[1];	}
	//print_r2($no);
$greatest = max($no);
//print("The greatest no. =$greatest");
print("<br>TTL Items = ".$added." ".ItemidtoName($item_id).". \n");
	$Chart_Size = $greatest+$greatest*0.1;
print("<div><center><table><tr>");
print("<th>".ItemidtoName($item_id)." ordered between ".date("M d H:i:s", $Begdate)." and ".date("M d H:i:s", $Enddate).". </th>");
print("</tr>");
print("<td style=\"padding:10;text-align:center;\">");
//verticle_bar_graph(800, 600, $counter, $Chart_Size, MM_UPLOADPATH.'ch_usage.png',$item_id);
horizontal_bar_graph(800, 800, $CHE, $Chart_Size, MM_UPLOADPATH.'ch_usage.png',$item_id);
echo'<img src="'.MM_UPLOADPATH.'ch_usage.png"	alt="Bar Graph" />';
print("</td></tr></table></center></div>");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
} elseif (isset($_POST['item_usage']) && (empty($_POST['criteria']) || empty($_POST['item_id']))) { print("Please go back and fill, both, the \"Criteria\" and \"Item\" fields."); } else {  //Open the initial form
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//		Opening Form
//
//////////////////////////////////////////////////////////////////////////////////////////////////////

print("<table border=1>");
print("<tr><th colspan=4>Item Query Generator</th></tr>");
print("<TR><td style=\"text-align:center;\"><label>Item</label></TD>");
print("<td style=\"text-align:center;\"><label>Criteria</label></td>");
print("<td style=\"text-align:center;\"><label>Beginning Date</label></td>");
print("<td style=\"text-align:center;\"><label>Ending Date</label></td>");
print("</TR>");
?>
<tr><TD>
<form name="item_usage" ID="item_usage" ACTION="<?php echo $PHP_SELF; ?>" METHOD="post" >
<?
//echo"<label>Select Item</label>";

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$itemoptions="";
			$itemoptions .="<OPTION VALUE=\"\">Choose</OPTION>\n";
    $sqlnegcat3 ="SELECT DISTINCT * FROM Items  WHERE Items.item_id ORDER BY item_name";
			$resultnegcat3 = mysqli_query($dbc,$sqlnegcat3) or die ("can't get the Checksheet negcat3 selection.");
	while ($rownegcat3=mysqli_fetch_array($resultnegcat3)) {
			$item_id=$rownegcat3['item_id'];
			$item_name=$rownegcat3['item_name'];
					//echo"$newcategory_name<br>";

			$itemoptions .="<OPTION VALUE=\"$item_id\">".$item_name."</OPTION>\n";
}
mysqli_close($dbc);
echo"<SELECT NAME=item_id >\n";
?>

<?=$itemoptions?>
</SELECT> <br>

<?php

print("</td><td>");

//echo"<label>By Criteria</label>";

			$criteriaoptions .="<OPTION VALUE=\"\">Choose</OPTION>\n";
			$criteriaoptions .="<OPTION VALUE=\"Primary_Checksheet\">Checksheet</OPTION>\n";
			$criteriaoptions .="<OPTION VALUE=\"CallSign\">Call Sign</OPTION>\n";
echo"<SELECT NAME=criteria >\n";
?>

<?=$criteriaoptions?>
</SELECT> <br>

<?php


print("</td><td>");
//////////////////////////////////////////////////////////////////////////
// Day of Month Selection
////////////////////////////////////////////////////////////////////////
print ("<SELECT NAME=BDay>\n
	<OPTION VALUE=''>Today</OPTION>\n	");
for($day=1; $day <=31; $day++) {
	print ("<OPTION VALUE=".$day.">".$day."</OPTION>\n");
}

print("</SELECT>\n");

////////////////////////////////////////////////////////////////////////////
//  End of Day of Month Selection
///////////////////////////////////////////////////////////////////////////


print ("<SELECT NAME=BMonth>
	<OPTION VALUE=''>This Month</OPTION>\n
	<OPTION VALUE=01>January</OPTION>\n
	<OPTION VALUE=02>February</OPTION>\n
	<OPTION VALUE=03>March</OPTION>\n
	<OPTION VALUE=04>April</OPTION>\n
	<OPTION VALUE=05>May</OPTION>\n
	<OPTION VALUE=06>June</OPTION>\n
	<OPTION VALUE=07>July</OPTION>\n
	<OPTION VALUE=08>August</OPTION>\n
	<OPTION VALUE=09>September</OPTION>\n
	<OPTION VALUE=10>October</OPTION>\n
	<OPTION VALUE=11>November</OPTION>\n
	<OPTION VALUE=12>December</OPTION>\n
</SELECT>\n");

print ("<SELECT	NAME=BYear>
	<OPTION VALUE=''>This Year</OPTION>\n
	<OPTION VALUE=2010>2010</OPTION>\n
	<OPTION VALUE=2011>2011</OPTION>\n
	<OPTION VALUE=2012>2012</OPTION>\n
	<OPTION VALUE=2013>2013</OPTION>\n
	<OPTION VALUE=2014>2014</OPTION>\n
	

</SELECT>\n");
print ("</td><td>");

//////////////////////////////////////////////////////////////////////////
// Day of Month Selection
////////////////////////////////////////////////////////////////////////
print ("<SELECT NAME=EDay>\n
	<OPTION VALUE=''>Today</OPTION>\n	");
for($day=1; $day <=31; $day++) {
	print ("<OPTION VALUE=".$day.">".$day."</OPTION>\n");
}

print("</SELECT>\n");

////////////////////////////////////////////////////////////////////////////
//  End of Day of Month Selection
///////////////////////////////////////////////////////////////////////////


print ("<SELECT NAME=EMonth>
	<OPTION VALUE=''>This Month</OPTION>\n
	<OPTION VALUE=01>January</OPTION>\n
	<OPTION VALUE=02>February</OPTION>\n
	<OPTION VALUE=03>March</OPTION>\n
	<OPTION VALUE=04>April</OPTION>\n
	<OPTION VALUE=05>May</OPTION>\n
	<OPTION VALUE=06>June</OPTION>\n
	<OPTION VALUE=07>July</OPTION>\n
	<OPTION VALUE=08>August</OPTION>\n
	<OPTION VALUE=09>September</OPTION>\n
	<OPTION VALUE=10>October</OPTION>\n
	<OPTION VALUE=11>November</OPTION>\n
	<OPTION VALUE=12>December</OPTION>\n
</SELECT>\n");

print ("<SELECT	NAME=EYear>
	<OPTION VALUE=''>This Year</OPTION>\n
	<OPTION VALUE=2010>2010</OPTION>\n
	<OPTION VALUE=2011>2011</OPTION>\n
	<OPTION VALUE=2012>2012</OPTION>\n
	<OPTION VALUE=2013>2013</OPTION>\n
	<OPTION VALUE=2014>2014</OPTION>\n
	

</SELECT>\n");







print ("</td></tr><tr><td colspan=4>");

print(" <center><INPUT TYPE='submit'  NAME='item_usage'  ID='item_usage' VALUE='Submit' ></center>");


?>

</form>
</td></tr>
</table>
<?php
//print("<center><p>This data is only queriable from December, 15th 2010 to present time.</p></center> ");

}  //End the Form






	}?>
