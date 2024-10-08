<?php
// Written by Jim Garbe
//**************************************************************************************//
//	variablearchivesort()								//
//  	This function recieves the "$item" variable, the "$value" of the number that	//
// 	should be involved, and the "$name."						//
//	After recieving these values, it places them into the appropriate html table	//
//	unit code.									//
//											//
//**************************************************************************************//

function variablearchivesort($Checksheetno,$name,$hm,$value)	{ 
/////////This function recieves the "$item" variable, the "$value" of the number that should be involved, and the "$name."
//////////After recieving these values, it places them into the appropriate html table unit code.

	require_once('inc/Aorder.inc.php');
// What kind of variable is it?
// If it is a check box type,...
$chk='';
switch($hm){
	
		case "cb":

			if ($value==1) {
				$chk="chbox";
				$box="ok";
					 APrintOrder ($name, $box);
					}
			else {
				$chk="redchk";
				$box="Need";
					AOrder ($name,$box);
					APrintOrder ($name, $box);
					ASubjOrder ($name, $box);
				}
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div> <div class=r >   $box   </div></td>\n");
				break;
	
 case (ctype_digit($hm)):  ////////if it's a digit count type,...
			if ($hm==$value) {
				$chk="chbox";
					APrintOrder ($name,$value);
			} else {
				$chk="redchk";
				$nvalue= $hm - $value ;
					AOrder ($name,$nvalue);
					APrintOrder ($name,-$nvalue);
					ASubjOrder ($name,$nvalue);
			}
			print("\t\t<td class=\"".$chk."\" align=\"center\" valign=\"top\"><div class=\"l\" >".$name."</div>       <div class=\"r\" >   ".$value."  / ".$hm." </div></td>\n");
	break;
	case "na": ////////if it's an na type,...
			if (($value==2) || ($value == 'N/A')) {
				$chk="chbox";
					APrintOrder ($name,$value);
			} else {
				$chk="redchk";
				$nvalue= 2 - $value ;
					AOrder ($name,$nvalue);
					APrintOrder ($name,-$nvalue);
					ASubjOrder ($name,$nvalue);
			}
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
	break;
	case "open": ///////// If it's a two space text input,...
 	print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");	 
					// HeadOrder ($name,$value);
					// SubjOrder ($name,$value);
	break;
	case "O2": ////////////If it's an O2 bottle value, ...
		if ($value>=501) {
			$chk="chbox";
				APrintOrder ($name,$value);
				}
		else {
			$chk="redchk";
				AHeadOrder ($name,$value);
				ASubjOrder ($name,$value);
			}
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
	break;
	case "irrg": /////////// If it's the irrigating solution divided by 500,...
		if ($value==2000) {
			$chk="chbox";
				APrintOrder ($name,$value);
				}
		 else if($value==1500) {
			$chk="redchk";
			$nvalue=500;
				AOrder($name,$nvalue);
				APrintOrder ($name,$value);
				ASubjOrder($name,$nvalue);
				}
		 else if($value==1000) {
			$chk="redchk";
			$nvalue=1000;
				AOrder($name,$nvalue);
				APrintOrder ($name,$value);
				ASubjOrder($name,$nvalue);
				} 
		else if($value==500) {
			$chk="redchk";
			$nvalue=1500;
				AOrder($name,$nvalue);
				APrintOrder ($name,$value);
				ASubjOrder($name,$nvalue);
				} 
		else {
			$chk="redchk";
			$nvalue=2000;
				AOrder($name,$nvalue);
				APrintOrder ($name,$value);
				ASubjOrder($name,$nvalue);
				}
		print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");

	break;
	case "tire": ////////////////The tire tread option
	if ($value=='New') {
		$chk="chbox";
			APrintOrder ($name,$value);
				}
	else  if ($value=='Good'){
		$chk="yellowchk";
			AHeadOrder ($name,$value);
				ASubjOrder($name,$value);
				}
	else {
		$chk="redchk";
			AHeadOrder ($name,$value);
				ASubjOrder($name,$value);
				}
	print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
	break;
	case "date": ////////////////////////////If it's the date value, ...
	 echo "\t\t<td><div class=l>$name</div><div class=r>";
			$date=date("Y-m-d H:i:s");
		 echo "$date</div></td>\n";
				AHeadOrder($name,$date);
				ASubjOrder($name,$value);
	break;
	case "miles": 

	if ($name == 'Service Due') { //If it's the Service value, ...
		$_SESSION['archservice'] = $value;
				}
	if ($name == 'Mileage') { // If it's an Odometer value...
		$_SESSION['archodometer'] = $value;
				}
	if  (isset($_SESSION['archodometer']) && isset($_SESSION['archservice'])) {
		if ($_SESSION['archodometer']<=$_SESSION['archservice']) {
		$chk="chbox";
		$Odname="Odometer";
		$OOdname="\t\t\t\t\tOdometer";
		$Srvname="Service    ";
		$OSrvname="\t\t\t\t\tService    ";
		$Nxtname="Next Service";
		$ONxtname="\t\t\t\t\tNext Service";
		$NxtService=$_SESSION['archservice']-$_SESSION['archodometer'];
			print("\t\t<td class=$chk align=center valign=top><div class=l >Odometer</div>        <div class=r >   ".$_SESSION['archodometer']."   </div></td>\n");
			print("\t\t<td class=$chk align=center valign=top><div class=l >Service</div>        <div class=r >   ".$_SESSION['archservice']."   </div></td>\n");
			print("\t\t<td class=$chk align=center valign=top><div class=l >$Nxtname</div>        <div class=r >   $NxtService   </div></td>\n");
					print("\n</tr>\n<tr>\n");
AHeadOrder ($Odname,$_SESSION['archodometer']);
AHeadOrder ($Srvname,$_SESSION['archservice'] );
				
AHeadOrder ($Nxtname,$NxtService);

ASubjOrder ($OOdname,$_SESSION['archodometer']);
ASubjOrder ($OSrvname,$_SESSION['archservice'] );
ASubjOrder ($ONxtname,$NxtService);

		$_SESSION['archservice'] = NULL;

		$_SESSION['archodometer'] = NULL;

		}
	else {
	$chk="redchk";
$ODService=$_SESSION['archodometer']-$_SESSION['archservice'];
$Odname="Odometer";
$OOdname="\t\t\t\t\tOdometer";
$Srvname="Service    ";
$OSrvname="\t\t\t\t\tService    ";
$ODServname="Miles overdue for service";
$OODServname="\t\t\t\tMiles overdue for service";
			print("\t\t<td class=$chk align=center valign=top><div class=l >Odometer</div>        <div class=r >   ".$_SESSION['archodometer']."   </div></td>\n");
			print("\t\t<td class=$chk align=center valign=top><div class=l >Service</div>        <div class=r >   ".$_SESSION['archservice']."   </div></td>\n");
			print("\t\t<td class=$chk align=center valign=top><div class=l>$ODServname</div>        <div class=r >   $ODService   </div></td>\n");
				print("\n</tr>\n<tr>\n");
AHeadOrder ($Odname,$_SESSION['archodometer']);
AHeadOrder ($Srvname,$_SESSION['archservice'] );
AHeadOrder ($ODServname,$ODService );

ASubjOrder ($OOdname,$_SESSION['archodometer']);
ASubjOrder ($OSrvname,$_SESSION['archservice'] );
ASubjOrder ($OODServname,$ODService );


		$_SESSION['archservice'] = NULL;

		$_SESSION['archodometer'] = NULL;

}

		}     
			break;
	case "refill": /////////If it's a reciprocal table value, ...
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>");

 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name";
	$result=mysqli_query($dbc, $sql);
			while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			$OName = $row[1];
			$_id=$row[0];  
			if ($_id == $value) {
			print ("<div class=r >   $OName   </div></td>\n");
				APHeadOrder($name,$OName);
				ASubjOrder($name,$OName);
					}
						}

	 
  mysqli_close($dbc);
	break;
	case "personnel":  ///////////////If it's a reciprocal medics table value, ...
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>");
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT user_id,username  FROM _user WHERE user_id = $value";
			$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			$_id=$row[0];
			$OName = $row[1];
			print ("<div class=r >   $OName   </div></td>\n");
				AHeadOrder($name,$OName);
				ASubjOrder("\t\t\t\t".$name,$OName);
								}
  mysqli_close($dbc);
	break;
	case "comment": 
			print("\t\t<td class=".$chk." align=center valign=top><div class=l >".$name."</div> \n");
  // Connect to the database 
  if($value=="") {
				print ("<div class=r >   None   </div></td>\n");
					} else {
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sqlc="SELECT *  FROM Comment_ WHERE comment_id = '".$value."'";
			$resultc=mysqli_query($dbc, $sqlc);
		if ($rowc = mysqli_fetch_array($resultc)) {
			$OName = $rowc['_comment'];
			if ($OName == "" ) {
				print ("<div class=r >   None   </div></td>\n");
					}
					else {

			print ("<div class=r >   ".stripslashes($OName)."   </div></td>\n");
				
				AHeadOrder($name,$OName);
				ASubjOrder($name,$OName);
								 }    mysqli_close($dbc);
}
}
break;  //end 'hm' comment

} //end switch
}
//******************************************************//
//	 Ending function variablearchivesort()		//
//******************************************************//
?>


