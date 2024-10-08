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


	require_once('setsql.inc.php'); // bring in the functions.
function variablesort($Checksheetno,$casc_id,$value,$sitem,$name,$q_set,$cat,$sub)	{ 
//print("variablesort2.inc.php DBG LINE 15 Checksheet=".$Checksheetno.",name=".$name.",<br />\n");
//variablesort ($_POST['checksheet'],$casc_ID,$HowMany,$Item_id,$Itemname,$q_set,$catarray_id,$subcatarray_id);

// What kind of variable is it?
// If it is a check box type,...
switch($value){
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "cb":
		$variable=1;
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
		echo "\n\n<!--checkbox-->\n\t<td><div class=chbox>\n";
		echo "\t<input type=checkbox name=\"".$cat.":".$sub.":".$sitem."\" id =\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub."\"  value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":1\" checked />".$name."</div></td>\n";
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case (ctype_digit($value)): ////////if it's a digit count type,...
			$variable=$value;
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
		$itemoptions='';
		echo "\n\n<!--numerical dropdown-->\n\t<td><div class=l>$name</div>\n";
		for ($n=$value; $n >= 1; $n--) { //dropdown box of
			$l=$n-1;
			$itemoptions.="<option value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":".$l."\">".$l."</option>\n";}
	    echo "<div class=r><select name=\"".$cat.":".$sub.":".$sitem."\" id=\"".$cat.":".$sub.":".$sitem."\">\n";
        
		echo "<option value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":".$value."\">$value</option>\n";
		print(" ".$itemoptions." \n");
		print("</select></div></td>\n"); 

	break;
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "na":  ////////if it's an na type,...
		$variable="";
        
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
		$itemoptions='';
		echo "\n\n<!--numerical dropdown with na option-->\n\t<td><div class=l>".$name."</div>\n";
			$itemoptions.="\n\t<option value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":NULL\"></option>";
			$itemoptions.="\n\t<option value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":N/A\">N/A</option>";
			for ($n=3; $n >= 1; $n--) { //dropdown box of
			$l=$n-1;
			$itemoptions.="\n\t<option value= \"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":".$l."\">".$l."</option>";	}
			echo "<div class=r id = \"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub."\"><select name=\"".$cat.":".$sub.":".$sitem."\"  id=\"".$cat.":".$sub.":".$sitem."\">\n";
		
		print(" ".$itemoptions." \n");
        print("</select></div><div id=\"".$casc_id."[".$sitem."]\"></div></td> ");

		break;
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
 case "open": ///////// If it's a two space text input,...
		$variable="";
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
echo "\n\n<!--open data box-->\n\t<td><div class=l>".$name."</div><div class=r>\n";
echo "<input type=\"text\" name=\"".$cat.":".$sub.":".$sitem."\" size=\"2\"  id = \"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub."\"></div></td>\n";	 


	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 case "O2":  ////////////If it's an O2 bottle value, ...
		$variable="";
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
	 echo "\n\n<!--Oxygen Bottle-->\n\t<td><div class=l>$name</div><div class=r>\n";
echo "<input type=\"text\" name=\"".$cat.":".$sub.":".$sitem."\" size=\"4\"  id = \"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub."\"></div></td>\n";		 


	break;
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
	case "irrg": /////////// If it's the irrigating solution divided by 500,..
		$variable="";
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
        
		echo "\n\n<!--Irrigating Solution-->\n\t<td><div class=l >$name</div>\n";
		echo "<div class=r><select name=\"".$cat.":".$sub.":".$sitem."\" id=\"".$cat.":".$sub.":".$sitem."\">\n";
		echo "           <option VALUE=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":2000\">2000cc</option>\n";
		echo "           <option VALUE=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":1500\">1500cc</option>\n";
		echo "           <option VALUE=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":1000\">1000cc</option>\n";
		echo "           <option VALUE=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":500\">500cc</option>\n";
		echo "           <option VALUE=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":0\">0cc</option></select></div></td>\n";

	break;
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "tire": ////////////////The tire tread option
		$variable="";
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);;
		echo "\n\n<!--tire dropdown-->\n\t<td><div class=l >$name</div>\n";
		echo "<div class=r><select name=\"".$cat.":".$sub.":".$sitem."\" id=\"".$cat.":".$sub.":".$sitem."\">\n";
		echo "           <option VALUE=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":New\">New</option>\n";
		echo "           <option VALUE=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":Good\">Good</option>\n";
		echo "           <option VALUE=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":Poor\">Poor</option>\n";
		echo "</select>";
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "date": ////////////////////////////If it's the date value, ...
	 echo "\n\n<!--date-->\n\t<td><div class=l>$name</div><div class=r>\n";
		$date=date("Y-m-d H:i:s");
		echo "$date</div></td>\n";
		echo "<input type='hidden' name='".$cat.":".$sub.":".$sitem."' value='$date'></input>";	 
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "miles": //////////////////////////If it's an Odometer value, ...
		$variable="";
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
		echo "\n\n<!--odometer reading-->\n\t<td><div class=l>$name</div><div class=r>\n";
		 echo "<input type=\"text\" name=\"".$cat.":".$sub.":".$sitem."\" size=\"7\"   id = \"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub."\"></div></td>\n";
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "Calc": //////////////////////////If it's an Calc value, ...
		$variable="";
		echo "\n\n<!--odometer reading-->\n\t<td><div class=l></div><div class=r id = \"calculation\">".$name."</div></td>\n";
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "refill": /////////If it's a reciprocal table value, ...
		$variable="";
        
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
	 	echo"	\n\n<!--reciprocal table fill-->\n\t<td class=table1><div class=l >$name</div><div class=r>\n";
		/*<!-- PHP Mysql Select -->*/

		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM $name";
		$result=mysqli_query($dbc, $sql);
		$itemoptions="";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName = $row[1];
                $item_chosen_id=$row[0];
			$itemoptions .="<option value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":".$item_chosen_id."\">".$OName."</option>\n";
					}

		echo"<select name='".$cat.":".$sub.":".$sitem."' id='".$cat.":".$sub.":".$sitem."'>";
		
		print("<option value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":NULL\">Choose </option>  \n");
      
		print(" ".$itemoptions." \n");
			print("</select>\n"); 
			print("</div></td>\n");
		
		mysqli_close($dbc);	
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "personnel": ///////////////If it's a reciproca table value, ...
		$variable="";
	
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
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
            $itemoptions .="<option value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":".$item_chosen_id."\">".$OName."</option>\n";
			}

		echo"<select name='".$cat.":".$sub.":".$sitem."'  id='".$cat.":".$sub.":".$sitem."'>";
        
        

        
		print("<option value=\"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub.":NULL\">Choose </option>\n");

		print(" ".$itemoptions." \n");
			print("</select>\n"); 
			print("</div></td>\n");
		mysqli_close($dbc);
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "comment":
  // require_once('inc/reqcommentrepopulate.inc.php');
   // $repopcomment= commentrepopulate($Checksheetno);
   
		$variable="";
		setsql($Checksheetno,$casc_id,$value,$sitem,$name,$variable,$q_set,$cat,$sub);
		echo "<div class='comment_' >Notes: (under 200 characters)<textarea name=\"".$cat.":".$sub.":".$sitem."\"  rows=\"3\" cols=\"80\"   id = \"".$Checksheetno.":".$casc_id.":".$value.":".$sitem.":".$name.":".$q_set.":".$cat.":".$sub."\">";
     //   !$repopcomment? print("") :print(" ".$repopcomment." ");
        print("</textarea></div>\n");
	break;
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	}
//******************************************************//
//	 Ending function variablesort()			//
//******************************************************//

?>
