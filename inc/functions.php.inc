<?php

// Written by Jim Garbe
//require_once('css/theme.php');
require_once('connectvars.php');
//$Checksheetno=$_POST[checksheet];
function print_r2 ($Array) {
	echo "<pre>";
	print_r($Array);
	echo "<pre>"; }

function now_dt_to_human($dt) {
    //intercept mysql's default ZERO date value.
    if ($dt=="0000-00-00 00:00:00") return "";
    $yr=strval(substr($dt,0,4));
    $mo=strval(substr($dt,5,2));
    $da=strval(substr($dt,8,2));
    $hr=strval(substr($dt,11,2));
    $mi=strval(substr($dt,14,2));
    $se=strval(substr($dt,17,2));

    return mktime($hr,$mi,$se,$mo,$da,$yr);
    }


function expires($p)
	{ if ($p == 1) 	{ print("&#x2713;");}}



//**************************************************************************************//
//	event_query()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: 			//
//											//
//  RETURNS: 				//
//											//
//**************************************************************************************//
			function event_query($item_id,$ChCh,$event_id) {
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql3 = "SELECT ".$ChCh.".result FROM ".$ChCh." WHERE ".$ChCh.".event_id = '".$event_id."' AND ".$ChCh.".item_id = '".$item_id."'";
			//print("\n<p>$item_id</p><p>$ChCh</p>");
			$result3 = mysqli_query($dbc, $sql3);
		 if($seriesrow = mysqli_fetch_array($result3)) {
				return $seriesrow['result'];  }
							} //end function event_query()

//**************************************************************************************//
//	recip()							//
//		Append the reciprocal of the value ID to the documents	.		//
//**************************************************************************************//
	function reciper($ordervalue,$table) {
 	 // Connect to the database 
 		 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$sql = "SELECT ".$table.".* FROM ".$table."  WHERE  ".$table.".id = '$ordervalue'";
		$result = mysqli_query($dbc, $sql);

		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				return $row[1];
		}
	}



//**************************************************************************************//
//	ItemidtoName()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the name from the category_id parameter				//
//											//
//**************************************************************************************//

function ItemidtoName($id) {

  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT item_name FROM Items  WHERE  item_id = '$id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['item_name'];
	}

  mysqli_close($dbc);
}

//**************************************************************************************//
//	ItemidtoName()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the name from the category_id parameter				//
//											//
//**************************************************************************************//

function ItemidtoP($id) {

  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT perishable FROM Items  WHERE  item_id = '$id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['perishable'];
	}

  mysqli_close($dbc);
}

//******************************************************//
//	 Ending function subcatidtoname()		//
//******************************************************//


//**************************************************************************************//
//	subcatidtoname()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the name from the category_id parameter				//
//											//
//**************************************************************************************//

function subcatidtoname($id) {

  require_once('connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Subcategory  WHERE  Subcategory.subcategory_id = '$id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['subcategory_name'];
	}

  mysqli_close($dbc);
}
function subcatnametoid($name) {

  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Subcategory  WHERE  Subcategory.subcategory_name = '$name'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['subcategory_id'];
	}

  mysqli_close($dbc);
}

function colcount($id) {

  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Subcategory  WHERE  Subcategory.subcategory_id = '$id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['cols'];
	}

  mysqli_close($dbc);
}

//******************************************************//
//	 Ending function subcatidtoname()		//
//******************************************************//
//**************************************************************************************//
//	subcatidcols()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the cols from the category_id parameter				//
//											//
//**************************************************************************************//

function subcatidcols($id) {

  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Subcategory  WHERE  Subcategory.subcategory_id = '$id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['2'];
	}

  mysqli_close($dbc);
}

//******************************************************//
//	 Ending function subcatidcols()		//
//******************************************************//




//**************************************************************************************//
//	chooser()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the name from the category_id parameter				//
//											//
//**************************************************************************************//
function chooser($name) {

$itemoptions="<OPTION VALUE=\"\">Choose</OPTION>\n";
  require_once('inc/connectvars.php');
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name."";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[0];
			
			$itemoptions .="<OPTION VALUE=\"".$item_chosen_id."\">".$OName."</OPTION>";
			}
		
	
		print("<SELECT NAME= ".$name." >"); 
		print("".$itemoptions."\n");
				print("</SELECT>\n");  
			 
	

  mysqli_close($dbc);

  }
//******************************************************//
//	 Ending function chooser()		//
//******************************************************//
//**************************************************************************************//
//	hmidtoname()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the name from the category_id parameter				//
//											//
//**************************************************************************************//

function hmidtoname($id) {

  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM How_Many  WHERE  How_Many.hm_value_id = '$id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['1'];
	}

  mysqli_close($dbc);
}





//******************************************************//
//	 Ending function hmidtoname()			//
//******************************************************//
//**************************************************************************************//
//	reqidtoname()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the name from the category_id parameter				//
//											//
//**************************************************************************************//

function reqidtoname($id) {

if ($id==1) { 
		return  "yes";
	}

 else {return "no";}
}





//******************************************************//
//	 Ending function reqidtoname()			//
//******************************************************//
//**************************************************************************************//
//	catidtoname()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the name from the category_id parameter				//
//											//
//**************************************************************************************//

function catidtoname($id) {

  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Category  WHERE  Category.category_id = '$id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['1'];
	}

  mysqli_close($dbc);
}





//******************************************************//
//	 Ending function catidtoname()			//
//******************************************************//
//**************************************************************************************//
//	_user_idtoname()									//
//	 PARAMETERS: none								//
//											//
//  DESCRIPTION: get the name from the user_id 				//
//											//
//**************************************************************************************//






function _user_idtoname($user_id) {

  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM _user  WHERE  _user.user_id = '$user_id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['username'];
	}

  mysqli_close($dbc);
}

function usernametouser_id($username) {
  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM _user  WHERE  _user.username = '$username'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['user_id'];
	}

  mysqli_close($dbc);
}

function checksheet_idtochecksheetname($checksheet_id) {
  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Checksheets  WHERE  Checksheets.id = '$checksheet_id'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['ChecksheetName'];
	}

  mysqli_close($dbc);
}

function checksheetnotochecksheet_id($checksheetname) {
  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Checksheets  WHERE  Checksheets.ChecksheetName = '$checksheetname'";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
		return  $row['id'];
	}

  mysqli_close($dbc);
}



//**************************************************************************************//
//											//
//  	 print the tables	moveon()						//
//											//
//**************************************************************************************//

function moveon($item_id,$name,$value,$variable) {
			 echo "<INPUT TYPE='HIDDEN' NAME='$item_id' VALUE='$variable'></input>";
			// print_r("$itemarray");
					}
//******************************************************//
//	 Ending function moveon()		//
//******************************************************//







//**************************************************************************************//
//	Station_idtoStation()								//
//		Append the location of the Vehicle to the documents	.		//
//**************************************************************************************//
function Station_idtoStation($ordervalue) {

  // Connect to the database 
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT Station.* FROM Station  WHERE  Station.station_id = '".$ordervalue."'";
	$result = mysqli_query($dbc, $sql);
 while($stationrow = mysqli_fetch_array($result)) { 
$Station=$stationrow['Station'];
print("<table border=1 align=center valign=top>\n");
print("<tr align=center valign=top>\n");
print("<td align=center valign=top> Location        </td>\n");
print("<td align=center valign=top>$Station</td>\n");
print("</tr>");
print("</table>");
$OStationname="Location:";
SubjOrder ($OStationname,$Station);

	}

  mysqli_close($dbc);
}



//**************************************************************************************//
//	call_sign_idtocallsign()							//
//		Append the Call Sign of the Vehicle to the documents	.		//
//**************************************************************************************//
function call_sign_idtocallsign($ordervalue) {
  // Connect to the database 
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT CallSign.* FROM CallSign  WHERE  CallSign.call_sign_id = '".$ordervalue."'";
	$result = mysqli_query($dbc, $sql);
 while($csignrow = mysqli_fetch_array($result)) { 
$callsign=$csignrow['callsign'];

print("<table border=1 align=center valign=top>\n");
print("<tr align=center valign=top>\n");
print("<td align=center valign=top> Call Sign        </td>\n");
print("<td align=center valign=top>$callsign</td>\n");
print("</tr>");
print("</table>");
$OCallSignname="Call Sign:";
PrintO ($callsign);
SubjOrder ($OCallSignname,$callsign);
	}
  mysqli_close($dbc);
}






function mysql_dt_day_query($dt) {
    //intercept mysql's default ZERO date value.
    if ($dt=="0000-00-00 00:00:00") return "";
    $yr=strval(substr($dt,0,4));
    $mo=strval(substr($dt,5,2));
    $da=strval(substr($dt,8,2));
    $hr=strval(substr($dt,11,2));
    $mi=strval(substr($dt,14,2));
    $se=strval(substr($dt,17,2));

    return mktime($hr,$mi,$se,$mo,$da,$yr);
    }

//**************************************************************************************//
//		mysql_dt_to_human()	Change MySQL Time Format to Linux Time Format	//
//**************************************************************************************//
function mysql_dt_to_human($dt) {
    //intercept mysql's default ZERO date value.
    if ($dt=="0000-00-00 00:00:00") return "";
    $yr=strval(substr($dt,0,4));
    $mo=strval(substr($dt,5,2));
    $da=strval(substr($dt,8,2));
    $hr=strval(substr($dt,11,2));
    $mi=strval(substr($dt,14,2));
    $se=strval(substr($dt,17,2));

    return mktime($hr,$mi,$se,$mo,$da,$yr);
    }
?>
