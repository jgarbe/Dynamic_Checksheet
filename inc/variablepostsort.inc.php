<?php
// Written by Jim Garbe
//**************************************************************************************//
//	variablepostsort()								//
//  	This function recieves the "$item" variable, the "$value" of the number that	//
// 	should be involved, and the "$name."						//
//	After recieving these values, it places them into the appropriate html table	//
//	unit code.									//
//											//
//**************************************************************************************//

function variablepostsort($item_id,$name,$hm,$valarr)	{ 
/////////This function recieves the "$item" variable, the "$value" of the number that should be involved, and the "$name."
//////////After recieving these values, it places them into the appropriate html table unit code.
$tselarr=explode("_",$valarr);
//print_r2($tselarr);
//$Checksheetno=$tselarr[0]; // Main Checksheet name
//$casc_id = $tselarr[1]; // checksheet ID
//$hm = $tselarr[2];  // how many-- type
//$sitem = $tselarr[3];  // The item id
//$name = $tselarr[4];   // The Name of the item
//$event_id = $tselarr[5];  // event_id
//$cat = $tselarr[6]; //category
//$sub = $tselarr[7];  // subcategory
$value = $tselarr[8]; //option 
// What kind of variable is it?
// If it is a check box type,...
//$_SESSION[$item_id]=$value;
switch($hm){
	case "cb":

			if ($value==1) {
				$chk="chbox";
				$box="ok";
					}
			else {
				$chk="redchk";
				$box="Need";
				}
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div> <div class=r >   $box   </div></td>\n");
			//moveon ($item_id,$name,$value,$hm);
	break;
	case (ctype_digit($hm)):  ////////if it's a digit count type,...
			if ($hm==$value) {
				$chk="chbox";
			} else {
				$chk="redchk";
				$nvalue= $hm - $value ;
			}
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
			//moveon ($item_id,$name,$value,$hm);
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "na": ////////if it's an na type,...
			if (($value==2) || ($value=='N/A')) {
				$chk="chbox";
			} else {
				$chk="redchk";
				$nvalue= 2 - $value ;
			}
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
	break;
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "open": ///////// If it's a two space text input,...
 	print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");	 
			//moveon ($item_id,$name,$value,$hm);
					// HeadOrder ($name,$value);
					// SubjOrder ($name,$value);
	break;
	case "O2": ////////////If it's an O2 bottle value, ...
		if ($value>=501) {
			$chk="chbox";
				}
		else {
			$chk="redchk";
			}
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
			//moveon ($item_id,$name,$value,$hm);

	break;
	case "irrg": /////////// If it's the irrigating solution divided by 500,...
		if ($value==2000) {
			$chk="chbox";
				}
		 else if($value==1500) {
			$chk="redchk";
			$nvalue=500;
				}
		 else if($value==1000) {
			$chk="redchk";
			$nvalue=1000;
				} 
		else if($value==500) {
			$chk="redchk";
			$nvalue=1500;
				} 
		else {
			$chk="redchk";
			$nvalue=2000;
				}
		print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
			//moveon ($item_id,$name,$value,$hm);

	break;
	case "tire": ////////////////The tire tread option
	if ($value=='New') {
		$chk="chbox";
				}
	else  if ($value=='Good'){
		$chk="yellowchk";
				}
	else {
		$chk="redchk";
				}
	print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
			//moveon ($item_id,$name,$value,$hm);
	break;
	case "date": ////////////////////////////If it's the date value, ...
	 echo "\t\t<td><div class=l>$name</div><div class=r>";
			$date=date("Y-m-d H:i:s");
		 echo "$date</div></td>\n";
			//moveon ($item_id,$name,$value,$hm);
	break;
	case "miles": 

	if ($name == 'Service Due') { //If it's the Service value, ...
		$_SESSION['service'] = $value;
				}
	if ($name == 'Mileage') { // If it's an Odometer value...
		$_SESSION['odometer'] = $value;
				}
	if  (isset($_SESSION['odometer']) && isset($_SESSION['service'])) {
		if ($_SESSION['odometer']<=$_SESSION['service']) {


		$chk="chbox";
		$Odname="Odometer";
		$OOdname="\t\t\t\t\tOdometer";
		$Srvname="Service    ";
		$OSrvname="\t\t\t\t\tService    ";
		$Nxtname="Next Service";
		$ONxtname="\t\t\t\t\tNext Service";
		$NxtService=$_SESSION['service']-$_SESSION['odometer'];
			print("\t\t<td class=$chk align=center valign=top><div class=l >Odometer</div>        <div class=r >   ".$_SESSION['odometer']."   </div></td>\n");
			print("\t\t<td class=$chk align=center valign=top><div class=l >Service</div>        <div class=r >   ".$_SESSION['service']."   </div></td>\n");
			print("\t\t<td class=$chk align=center valign=top><div class=l >$Nxtname</div>        <div class=r >   $NxtService   </div></td>\n");
					$clms=$clms+3;
HeadOrder ($Odname,$_SESSION['odometer']);
	//moveon (1,$name,$_SESSION['odometer'],$hm);
HeadOrder ($Srvname,$_SESSION['service'] );
	//moveon (2,$name,$_SESSION['service'],$hm);
				
HeadOrder ($Nxtname,$NxtService);

SubjOrder ($OOdname,$_SESSION['odometer']);
SubjOrder ($OSrvname,$_SESSION['service'] );
SubjOrder ($ONxtname,$NxtService);
		$_SESSION['service'] = NULL;

		$_SESSION['odometer'] = NULL;

		}
	else {
	$chk="redchk";
$ODService=$_SESSION['odometer']-$_SESSION['service'];
$Odname="Odometer";
$OOdname="\t\t\t\t\tOdometer";
$Srvname="Service    ";
$OSrvname="\t\t\t\t\tService    ";
$ODServname="Miles overdue for service";
$OODServname="\t\t\t\tMiles overdue for service";
			print("\t\t<td class=$chk align=center valign=top><div class=l >Odometer</div>        <div class=r >   ".$_SESSION['odometer']."   </div></td>\n");
			print("\t\t<td class=$chk align=center valign=top><div class=l >Service</div>        <div class=r >   ".$_SESSION['service']."   </div></td>\n");
			print("\t\t<td class=$chk align=center valign=top><div class=l>$ODServname</div>        <div class=r >   $ODService   </div></td>\n");
				$clms=$clms+3;
HeadOrder ($Odname,$_SESSION['odometer']);
	//moveon (1,$name,$_SESSION['odometer'],$hm);
HeadOrder ($Srvname,$_SESSION['service'] );
	//moveon (2,$name,$_SESSION['service'],$hm );
HeadOrder ($ODServname,$ODService );

SubjOrder ($OOdname,$_SESSION['odometer']);
SubjOrder ($OSrvname,$_SESSION['service'] );
SubjOrder ($OODServname,$ODService );



		$_SESSION['service'] = NULL;

		$_SESSION['odometer'] = NULL;
		}     
					return "$clms";
 } 			break;
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
					}
						}

	 
			//moveon ($item_id,$name,$OName,$hm);
  mysqli_close($dbc);
	break;
	case "personnel":  ///////////////If it's a reciprocal medics table value, ...
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>");
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT _user.user_id,_user.username  FROM _user WHERE _user.user_id = $value ORDER BY _user.username";
			$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
			$_id=$row[0];
			$OName = $row[1];
			print ("<div class=r >   $OName   </div></td>\n");
								}
			//moveon ($item_id,$name,$OName,$hm);
  mysqli_close($dbc);
	break;
	case "comment": 
			if (isset($value)) {
			print("\t\t<td class=$chk align=center valign=top><div class=l >$name</div>        <div class=r >   $value   </div></td>\n");
				
			//moveon ($item_id,$name,$value,$hm);
				
        }
	break;
//print("This is the End Line1172");
	}
	}
//******************************************************//
//	 Ending function variablepostsort()		//
//******************************************************//
?>
