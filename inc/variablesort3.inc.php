<?php
// Written by Jim Garbe
//**************************************************************************************//
//	variablesort()									//
//  	This function recieves the "$item" variable, the "$value" of the number that	//
// 	should be involved, and the "$name."						//
//	After recieving these values, it places them into the appropriate html table	//
//	unit code.									//
//											//
//**************************************************************************************//

	require_once('inc/setsql.inc.php'); // bring in the functions.
function variablesort($casc_id,$value,$sitem,$name,$q_set,$cat,$sub)	{ 
// What kind of variable is it?
// If it is a check box type,...
switch($value){
	case "cb":
		$variable=1;
		echo "\n\n<!--checkbox-->\n\t<td><div class=chbox>\n";
		echo "\t<Input type=hidden id=CB_".$casc_id."_".$sitem." name=".$casc_id."[".$sitem."] value=0>\n";
		echo "\t<INPUT TYPE=CHECKBOX  id=CB_".$casc_id."_".$sitem."  name=".$casc_id."[".$sitem."] value=1 checked />$name</div></td>\n";
		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
		//return array($name,$value,$variable);
	break;
	case (ctype_digit($value)): ////////if it's a digit count type,...
		$itemoptions='';
		echo "\n\n<!--numerical dropdown-->\n\t<td><div class=l>$name</div>\n";
		for ($n=$value; $n >= 1; $n--) { //dropdown box of
			$l=$n-1;
			$itemoptions.="<OPTION VALUE=$l>".$l."</OPTION>\n";}
	    echo "<div class=r><SELECT id=S_".$casc_id."_".$sitem."_".$value." NAME=".$casc_id."[".$sitem."] onchange=updOpt(id, this.value) >\n";
		echo "<OPTION VALUE='$value'>$value</OPTION>\n";
		?><?=$itemoptions?>
		</SELECT></div></td> <?

		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
		//return array($name,$value,$variable);
	break;
	case "na":  ////////if it's an na type,...
		$variable="";
		$itemoptions='';
		echo "\n\n<!--numerical dropdown with na option-->\n\t<td><div class=l>$name</div>\n";
			$itemoptions.="\n\t<OPTION VALUE=''></OPTION>";
			$itemoptions.="\n\t<OPTION VALUE='N/A'>N/A</OPTION>";
			for ($n=3; $n >= 1; $n--) { //dropdown box of
			$l=$n-1;
			$itemoptions.="\n\t<OPTION VALUE=$l>".$l."</OPTION>";	}
			echo "<div class=r><SELECT  id=NA_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."]>\n";
		?><?=$itemoptions?>
		</SELECT></div></td> <?

		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		//return array($name,$value,$variable);
		break;
 case "open": ///////// If it's a two space text input,...
		$variable="";
 	 echo "\n\n<!--open data box-->\n\t<td><div class=l>$name</div><div class=r>\n";
		 echo "<INPUT TYPE=TEXT   id=O_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."] SIZE=2></div></td>\n";	 


		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		//return array($name,$value,$variable);
	break;
 case "O2":  ////////////If it's an O2 bottle value, ...
		$variable="";
	 echo "\n\n<!--Oxygen Bottle-->\n\t<td><div class=l>$name</div><div class=r>\n";
		 echo "<INPUT TYPE=TEXT   id=O2_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."] SIZE=4></div></td>\n";	 


		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		//return array($name,$value,$variable);
	break;
	case "irrg": /////////// If it's the irrigating solution divided by 500,..
		$variable="";
		echo "\n\n<!--Irrigating Solution-->\n\t<td><div class=l >$name</div>\n";
		echo "<div class=r><select   id=IRRG_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."]>\n";
		echo "           <option VALUE=\"2000\">2000cc</option>\n";
		echo "           <option VALUE=\"1500\">1500cc</option>\n";
		echo "           <option VALUE=\"1000\">1000cc</option>\n";
		echo "           <option VALUE=\"500\">500cc</option>\n";
		echo "           <option VALUE=\"0\">0cc</option></select></div></td>\n";

		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		//return array($name,$value,$variable);
	break;
	case "tire": ////////////////The tire tread option
		$variable="";
		echo "\n\n<!--tire dropdown-->\n\t<td><div class=l >$name</div>\n";
		echo "<div class=r><select   id=TIRE_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."]>\n";
		echo "           <option VALUE=\"New\">New</option>\n";
		echo "           <option VALUE=\"Good\">Good</option>\n";
		echo "           <option VALUE=\"Poor\">Poor</option>\n";
		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		//return array($name,$value,$variable);
	break;
	case "date": ////////////////////////////If it's the date value, ...
	 echo "\n\n<!--date-->\n\t<td><div class=l>$name</div><div class=r>\n";
		$date=date("Y-m-d H:i:s");
		echo "$date</div></td>\n";
		echo "<INPUT TYPE='HIDDEN'   id=date_".$casc_id."_".$sitem." NAME='".$casc_id."[".$sitem."]' VALUE='$date'></input>";	 
	break;
	case "miles": //////////////////////////If it's an Odometer value, ...
		$variable="";
		echo "\n\n<!--odometer reading-->\n\t<td><div class=l>$name</div><div class=r>\n";
		 echo "<INPUT TYPE=TEXT   id=miles_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."] SIZE=7></div></td>\n";
		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		//return array($name,$value,$variable);
	break;
	case "refill": /////////If it's a reciprocal table value, ...
		$variable="";
	 	echo"	\n\n<!--reciprocal table fill-->\n\t<td class=table1><div class=l >$name</div><div class=r>\n";
		/*<!-- PHP Mysql Select -->*/

		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM $name";
		$result=mysqli_query($dbc, $sql);
		$itemoptions="";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];


			$item_chosen_id=$row[0];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
					}

		echo"<SELECT   id=recip_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."] >";
			?>
		<OPTION VALUE="">Choose </OPTION>
			<?=$itemoptions?>
			</SELECT> 
			</div></td>
			<?
		mysqli_close($dbc);	
		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		//return array($name,$value,$variable);
	break;
	case "personnel": ///////////////If it's a reciproca table value, ...
		$variable="";
	 	echo"	<td class=table1><div class=l >$name</div><div class=r>\n";
		///<!-- PHP Mysql Select -->

		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT _user.user_id,_user.username  FROM _user ORDER BY _user.username";
		$result=mysqli_query($dbc, $sql);
		$itemoptions="";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
		// printf("ID: %s  Name: %s", $row[0], $row[1]);
				$OName = $row[1];


			$item_chosen_id=$row[0];
			$itemoptions .="<OPTION VALUE=\"$item_chosen_id\">".$OName."</OPTION>\n";
			}

		echo"<SELECT   id=personnel_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."] >";
		?>
		<OPTION VALUE="">Choose </OPTION>
		<?=$itemoptions?>
		</SELECT> 
		</div></td>

		<?
		mysqli_close($dbc);
		setsql($casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		//return array($name,$value,$variable);
	break;
	case "comment":
		echo "<div class='comment_' >Notes: (under 200 characters)<TEXTAREA   id=cmnt_".$casc_id."_".$sitem." NAME=".$casc_id."[".$sitem."]  ROWS=3 COLS=80></TEXTAREA></div>";
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$Chk_comment=$_POST['checksheet']."_comments";
		 $querycommentid="INSERT INTO $Chk_comment VALUES (0,'')";
		mysqli_query($dbc,$querycommentid);
		$c_set = mysqli_insert_id($dbc);
		$checkshin=$_POST['checksheet']."_checksheet";
			$set_query="INSERT INTO $checkshin(id, event_id, item_id, result, hm_value_id,category_id,subcategory_id) VALUES(0,'$q_set', '$sitem', '$c_set','$value','$cat','$sub')";
				mysqli_query($dbc,$set_query) or die("can't sqlset"); 
			mysqli_close($dbc);
		//return array($name,$value,$c_set);
	break;
	}
	}
//******************************************************//
//	 Ending function variablesort()			//
//******************************************************//

?>
