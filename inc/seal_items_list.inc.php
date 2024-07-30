<?php
// Written by Jim Garbe
function seal_items_list($casc_id) {
$Checksheetno = checksheet_idtochecksheetname($casc_id);
$Checksheet = $Checksheetno."_Sealed";
$nextmonth = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y"));
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		List of Perishable Items in the Sealed Box if seal broken.
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////



print("\n<table width=\"100%\" padding=\"10px\" border=\"3px\">\n");
	print("<TR><td class=\"hlist\" colspan=\"8\">Perishable Items</td></TR>");
	
	print("<tr><td class=\"hlist\">Item</td><td class=\"hlist\">Expiration Date</td><td class=\"hlist\">Update
</td><td class=\"hlist\">Remove</td><td class=\"hlist\">Item</td><td class=\"hlist\">Expiration Date</td><td class=\"hlist\">Update</td><td class=\"hlist\">Remove</td></tr>\n");
	
	$cols=0;
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT ".$Checksheet.".*,Items.perishable FROM ".$Checksheet.",Items WHERE Items.item_id = ."$Checksheet.".item_id AND Items.perishable = '1' ORDER BY id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row['id'];		
				$item_id = $row['item_id'];	
				$expdate = $row['date'];
			//print ("<br>$id");
			//print ("<br>$item_id");
			//print ("<br>$expdate");
$cols=$cols+1;
if  ($cols==1) {print("<tr>\n<!--cols=1-->\n");}
if ($item_id) {

					$EXP=mysql_dt_day_query($row[2]);
	if($EXP >= $nextmonth ){	$bgcolor="plist"; } else {$bgcolor="wplist";}
				$expdate = date("m-Y",$EXP);
		print("<td class=\"b".$bgcolor."\">".ItemidtoName($item_id)."</td>\n<td class=\"".$bgcolor."\">".$expdate."</td>\n<td class=\"".$bgcolor."\"><input type=checkbox  value=".$id." name=itemupdate[] />\n\n</td>\n<td class=\"".$bgcolor."\"><input type=checkbox  value=".$id." name=itemdelete[] />\n\n</td>\n"); } else { print("<td colspan=4>blah!</td>");}



if ($cols==2) {print("</tr>\n<!--cols=2-->\n"); $cols=0;}

} //End item list
	
if  ($cols==1) {print("<td></td>\n<td></td>\n</tr>\n<!--cols=1-->\n");}


/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		List of Non-Perishable Items in the Sealed Box if seal broken.
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////



	print("<TR>
          <td class=\"hlist\" colspan=\"8\">Non-Perishable Items</td>
        </TR>");
	print("<tr><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td><td class=\"hlist\">Remove</td><td class=\"hlist\" colspan=\"2\">Item</td><td class=\"hlist\">No. of Items</td><td class=\"hlist\">Remove</td></tr>\n");
	
	$cols=0;
  require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT ".$Checksheet.".*,Items.perishable,".$Checksheetno.".hm_value_id FROM ".$Checksheetno.",".$Checksheet.",Items WHERE Items.item_id = ".$Checksheet.".item_id AND ".$Checksheet.".item_id = ".$Checksheetno.".item_id AND (Items.perishable IS NULL || Items.perishable ='0')  ORDER BY id";
	$result = mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$id = $row['id'];		
				$item_id = $row['item_id'];	
				$hm_value_id = $row['hm_value_id'];
$cols=$cols+1;
if  ($cols==1) {print("<tr>\n<!--cols=1-->\n");}



if ($item_id) {
		print("<td class=\"bnplist\" colspan=\"2\">".ItemidtoName($item_id)."</td>\n<td class=\"nplist\">".$hm_value_id."</td>\n<td class=\"nplist\"><input type=checkbox  value=".$id." name=itemdelete[] />\n</td>\n");
		} else { print("<td colspan=3>blah!</td>");}
if ($cols==2) {print("</tr>\n<!--cols=2-->\n"); $cols=0;}

} //End item list
	
if  ($cols==1) {print("<td></td>\n<td></td>\n</tr>\n<!--cols=1-->\n");}
 
	print("\n<input type=\"hidden\" name=\"CHqset[".$casc_id."]\" value=\"".$q_set."\">\n");
	print("<tr><td class=\"hlist\" colspan=\"8\"><input type=\"submit\" value=\"GO\" name=\"remove_items\" /></td></tr>\n");
print("</table>\n");
print ("</form>");
  mysqli_close($dbc);


}


?>
