<?php
// Written by Jim Garbe
//**************************************************************************************//
//	variablepostvalsort()								//
//  	This function recieves the "$item" variable, the "$value" of the number that	//
// 	should be involved, and the "$name."						//
//	After recieving these values, it places them into the appropriate html table	//
//	unit code.									//
//											//
//**************************************************************************************//

function variablepostvalsort($casc_id,$cat,$item_id,$name,$value,$variable,$q_set)	{ 
/////////This function recieves the "$item" variable, the "$value" of the number that should be involved, and the "$name."
//////////After recieving these values, it places them into the appropriate html table unit code.
// What kind of variable is it?
// If it is a check box type,...

	require_once('inc/updatesql.inc.php'); // 
switch($value){
	case "cb":
			updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);
			if ($variable==1) {	
				$chk="chbox";
				$box="Ok";
			echo "\n\n<!--checkbox-->\n\t<td class=$chk><div class=chbox>\n";
			//echo "<Input type=hidden name=$item_id value=0 >\n";	
			echo "<INPUT TYPE=CHECKBOX  name=".$casc_id."[".$item_id."] value=1 checked/>$name</div></td>\n";
			 PrintOrder ($name, $box);
					}
			else {
				$chk="redchk";
				$box="Need";
					//CategoryOrder($cat);
					Order ("&nbsp;&nbsp;&nbsp;&nbsp;".$name,$box);
					PrintOrder ($name, $box);
					SubjOrder ($name, $box);
			echo "\n\n<!--checkbox-->\n\t<td class=$chk>\n";
			echo "<INPUT TYPE=CHECKBOX name=".$casc_id."[".$item_id."] value=1 />$name</td>\n";
			
				}
	break;
	case (ctype_digit($value)):  ////////if it's a digit count type,...
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);
			$itemoptions='';
			if ($value == $variable) {
				$chk="chbox";
					PrintOrder ($name,$value);
			echo "\n\n<!--numerical dropdown-->\n\t<td class=$chk><div class=l>$name</div>\n";
				} else {
					//CategoryOrder($cat);
				$chk="redchk";
				$nvalue= $value - $variable ;
					Order ($name,$nvalue);
					PrintOrder ($name,-$nvalue);
					SubjOrder ($name,$nvalue);
		print("\n\n<!--numerical dropdown-->\n\t<td class=$chk><div class=l><font style=color:".RCH_COLOR.";>$name</font></div>\n");
				}
			
			 $itemoptions.="<OPTION VALUE=$variable>$variable</OPTION>\n";
			
				$itemoptions.="<OPTION VALUE=$value>$value</OPTION>\n";
		for ($n=$value; $n >= 1; $n--) { //dropdown box of
				$l=$n-1;
			    $itemoptions.="<OPTION VALUE=$l>".$l."</OPTION>\n";}

	 		   echo "<div class=r><SELECT NAME=".$casc_id."[".$item_id."]>\n"; ?>

<?=$itemoptions?>
		</SELECT></div></td> <?
	break;
	case "na":  ////////if it's a digit count type with na potential,...
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);
			$itemoptions='';
			if (($variable == 2) || ($variable=='N/A')) {
				$chk="chbox";
					PrintOrder ($name,$variable);
			echo "\n\n<!--na option-->\n\t<td class=$chk><div class=l>$name</div>\n";
				} else {
		
					//CategoryOrder($cat);
				$chk="redchk";
				$nvalue= 2 - $variable ;
					Order ($name,$nvalue);
					PrintOrder ($name,-$nvalue);
					SubjOrder ($name,$nvalue);
			print( "\n\n<!--na option-->\n\t<td class=$chk><div class=l><font style=color:".RCH_COLOR.";>$name</font></div>\n");
				}
			
			 $itemoptions.="<OPTION VALUE=$variable>$variable</OPTION>\n";
			
			 $itemoptions.="<OPTION VALUE='N/A'>N/A</OPTION>\n";
				//$itemoptions.="<OPTION VALUE=$value>$value</OPTION>\n";
		for ($n=3; $n >= 1; $n--) { //dropdown box of
				$l=$n-1;
			    $itemoptions.="<OPTION VALUE=$l>".$l."</OPTION>\n";}

	 		   echo "<div class=r><SELECT NAME=".$casc_id."[".$item_id."]>\n"; ?>

		<?=$itemoptions?>
		</SELECT></div></td> <?
	break;
	case "open":///////// If it's a two space text input,...
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);
		echo "\n\n<!--open option-->\n\t<td><div class=l>$name</div><div class=r>\n";
		 echo "<INPUT TYPE=TEXT NAME=".$casc_id."[".$item_id."] SIZE=2 value=$variable ></div></td>\n";	
					// HeadOrder ($name,$value);
					// SubjOrder ($name,$value);
	break;
	case "O2":  ////////////If it's an O2 bottle value, ...		
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);
		if ($variable>=501) {
			$chk="chbox";
				PrintOrder ($name,$variable);
		echo "\n\n<!--Oxygen Bottle-->\n\t<td class=$chk><div class=l>$name</div><div class=r>\n";
				}
		else {
			$chk="redchk";
				HeadOrder ($name,$variable);
				SubjOrder ($name,$variable);
		print( "\n\n<!--Oxygen Bottle-->\n\t<td class=$chk><div class=l><font style=color:".RCH_COLOR.";>		$name</font></div><div class=r>\n");
			}
		 echo "<INPUT TYPE=TEXT NAME=".$casc_id."[".$item_id."] SIZE=4 value=$variable></div></td>\n";	 

	break;
	case "irrg": /////////// If it's the irrigating solution divided by 500,...
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);		
		if ($variable==2000) {
				PrintOrder ($name,$variable);
		echo "\n\n<!--Irrigation Fluid-->\n\t<td><div class=l >$name</div>\n";
				}
		 else if($variable==1500) {
			$nvalue=500;
				Order($name,$nvalue);
				PrintOrder ($name,$variable);
				SubjOrder($name,$nvalue);
		print( "\n\n<!--Irrigation Fluid-->\n\t<td><div class=l ><font style=color:".RCH_COLOR.">".$name."</font></div>\n");
				}
		 else if($variable==1000) {
			$nvalue=1000;
				Order($name,$nvalue);
				PrintOrder ($name,$variable);
				SubjOrder($name,$nvalue);
		print( "\n\n<!--Irrigation Fluid-->\n\t<td><div class=l ><font style=color:".RCH_COLOR.">".$name."</font></div>\n");
				} 
		else if($variable==500) {
			$nvalue=1500;
				Order($name,$nvalue);
				PrintOrder ($name,$variable);
				SubjOrder($name,$nvalue);
		print( "\n\n<!--Irrigation Fluid-->\n\t<td><div class=l ><font style=color:".RCH_COLOR.">$name</font></div>\n");
				} 
		else {
			$nvalue=2000;
				Order($name,$nvalue);
				PrintOrder ($name,$variable);
				SubjOrder($name,$nvalue);
		print ("\n\n<!--Irrigation Fluid-->\n\t<td><div class=l ><font style=color:".RCH_COLOR.">".$name."</font></div>\n");
				}
		echo "<div class=r><select NAME=".$casc_id."[".$item_id."]>\n";
		echo "		<option VALUE=$variable>$variable cc</option>\n";
		echo "           <option VALUE=\"2000\">2000cc</option>\n";
		echo "           <option VALUE=\"1500\">1500cc</option>\n";
		echo "           <option VALUE=\"1000\">1000cc</option>\n";
		echo "           <option VALUE=\"500\">500cc</option>\n";
		echo "           <option VALUE=\"0\">0cc</option></select></div></td>\n";

	break;
	case "tire":////////////////The tire tread option
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);
		if ($variable=='New') {
			PrintOrder ($name,$variable);
		echo "\n\n<!--Tires-->\n\t<td><div class=l >$name</div>\n";
				}
		else  if ($variable=='Good'){
				HeadOrder ($name,$variable);
				SubjOrder($name,$variable);
		print( "\n\n<!--Tires-->\n\t<td><div class=l ><font style=color:".YCH_COLOR.">".$name."</font></div>\n");
				}
		else {
			HeadOrder ($name,$variable);
				SubjOrder($name,$variable);
		print( "\n\n<!--Tires-->\n\t<td><div class=l ><font style=color:".RCH_COLOR.">".$name."</font></div>\n");
				}
		echo "<div class=r><select NAME=".$casc_id."[".$item_id."]>\n";
		echo "		<option VALUE=$variable>$variable</option>\n";
		echo "           <option VALUE=\"New\">New</option>\n";
		echo "           <option VALUE=\"Good\">Good</option>\n";
		echo "           <option VALUE=\"Poor\">Poor</option>\n";
	break;
	case "date":  ////////////////////////////If it's the date value, ...
		echo "\n\n<!--date-->\n\t<td><div class=l>$name</div><div class=r>\n";
			$date=date("Y-m-d H:i:s");
		echo "$date</div></td>\n";
				HeadOrder($name,$date);
				SubjOrder($name,$variable);
		echo "<INPUT TYPE='HIDDEN' NAME='".$casc_id."[".$item_id."]' VALUE='$date'></input>";	 
	break;
	case "miles":  //////////////////////////If it's an Odometer value, ...
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);

				HeadOrder($name,$variable);
				SubjOrder($name,$variable);
	 echo "\n\n<!--miles-->\n\t<td><div class=l>$name</div><div class=r>\n";
		 echo "<INPUT TYPE=TEXT NAME=".$casc_id."[".$item_id."] SIZE=7 value=$variable></div></td>\n";	 
			break;
	case "refill":  /////////If it's a reciprocal table value, ...
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);
	 	echo"\n\n<!--reciprocal table field-->\n\t	<td class=table1><div class=l >$name</div><div class=r>\n";
	/*<!-- PHP Mysql Select -->*/
	if (empty($variable)) {
	$itemoptions="";

 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[0];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
}

echo"<SELECT NAME=".$casc_id."[".$item_id."] >";
?>
<OPTION VALUE="">Choose </OPTION>
<?=$itemoptions?>
</SELECT>  <?php } else { 

	$itemoptions="";
	

 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM $name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[0];
			if ($variable == $item_chosen_id ) {
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
			
				HeadOrder("\t\t\t                ".$name,$OName);
				SubjOrder("\t\t\t".$name."",$OName);
			}
				}
			$sql="SELECT * FROM $name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[0];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
			}
		
	
		echo"<SELECT NAME=".$casc_id."[".$item_id."] >"; ?>
					 <?=$itemoptions?>
				</SELECT> 
				</div></td> 
			<?   
	}

  mysqli_close($dbc);
	break;
	case "personnel": ///////////////If it's a reciprocal table value, ...
				updatesql ($casc_id,$item_id,$name,$value,$variable,$q_set);
	 	echo"\n\n<!--personnel-->\n\t<td class=table1><div class=l >$name</div><div class=r>\n";
	// <!-- PHP Mysql Select -->
		if (empty($variable)) {
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT _user.user_id,_user.username  FROM _user ORDER BY _user.username";
	$result=mysqli_query($dbc, $sql);
	$itemoptions="";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
		$OName = $row[1];
			$item_chosen_id=$row[0];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
			}

				echo"<SELECT NAME=".$casc_id."[".$item_id."] >";
				?>
			<OPTION VALUE="">Choose </OPTION>
			<?=$itemoptions?>
			</SELECT> 
			</div></td>

		<?
  mysqli_close($dbc); } else {

	$itemoptions="";
	
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT _user.user_id,_user.username  FROM _user ORDER BY _user.username";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[0];
			if ($variable == $item_chosen_id ) {
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
				HeadOrder($name,$OName);
				SubjOrder($name,$OName);
			}
				}
			$sql="SELECT _user.user_id,_user.username  FROM _user ORDER BY _user.username";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
			$item_chosen_id=$row[0];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
			}
		
	
		echo"<SELECT NAME=".$casc_id."[".$item_id."] >"; ?>
					 <?=$itemoptions?>
				</SELECT> 
				</div></td> 
			<?   
  mysqli_close($dbc);
	}
	break;
	case "comment":
	echo "<div class='comment_' >Notes: (under 200 characters)<TEXTAREA NAME=".$casc_id."[".$item_id."]  ROWS=3 COLS=80>$variable</TEXTAREA></div>";
				HeadOrder($name,$variable);
				SubjOrder($name,$variable);
			
	require_once('inc/updatecomment.inc.php'); // bring in the functions.
				updatecomment ($casc_id,$item_id,$name,$value,$variable,$q_set);

        } 
// print("This is the End Line803");	

}
//******************************************************//
//	 Ending function variablepostvalsort()			//
//******************************************************//
?>
