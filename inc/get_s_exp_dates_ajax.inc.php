<?php
$exp_array=array();
 require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$plustime=$_GET['timespan'];
//print("<p>plustime=".$plustime."</p>");
$timespan=mktime(0,0,0,date("m")+$plustime, 0, date("Y"));
			
      $sql_exp="SELECT  sealedlist.id,
						UNIX_TIMESTAMP(sealedlist.exp_date)AS ep,
						it.item_name,
						ch.ChecksheetName AS cn 
						FROM sealedlist
						INNER JOIN Checksheets AS ch ON ch.id = sealedlist.ch_id
						INNER JOIN Items AS it ON it.item_id = sealedlist.item_id
						
    				WHERE (UNIX_TIMESTAMP(sealedlist.exp_date) <= '".$timespan."') 
    				AND it.perishable = '1' ORDER BY ep,cn,item_name";
  
  
  $exp_query =mysqli_query($dbc, $sql_exp)  or die(mysql_error($dbc));
	while ($row_exp = mysqli_fetch_array($exp_query)){
		if($row_exp['ep']==0) {} else {
		$exp_array[] = array($row_exp['ep'],$row_exp['cn'],$row_exp['item_name'],$row_exp['id']);
			
		//$exp_array[$row_exp[ep]][$row_exp[cn]][$row_exp[item_name]][]=[$row_exp[id]];
		
}
	}
 
 //print("<pre>\n");print_r($exp_array);print("</pre>\n");
  foreach($exp_array as $charray => $chname) {
			//foreach($chname as $itname) {
	   print("<table width=\"100%\">\n");
 
 print("<tr>\n");
 print("<td colspan=\"3\">\n");
  print("<div class=\"sh\" style=\"color:#E6FE69;font-size:1.25em;\">".$chname[1]."</div> \n");
 print("</td>\n");
 print("</tr>\n");
 
				 $col=3;
													//if($pedate== 0) {$warn="sealedr";}
								if($chname[0]<= time() && $chname[0] != 0) {$warn="late";}
								elseif($chname[0]<= mktime(0,0,0,date("m")+1, 0, date("Y")) && $chname[0]>= time() ) {$warn="soon";}
								elseif($chname[0]<= mktime(0,0,0,date("m")+2, 0, date("Y")) && $chname[0]>= mktime(0,0,0,date("m")+1, 0, date("Y"))) {$warn="impending";}
					$chname[0]==0?$edate="No Date Entered":$edate=date('M-d-Y',$chname[0]);
															
	if($col==3 ){print("<tr>\n\t<td    class=\"".$warn."\"  style=\"text-align:center;\" >\n");$col=0; } else { print("<td   class=\"".$warn."\" style=\"text-align:center;\" >");}

  print("<div class=\"l\" >".$chname[2]."</div> \n");
    print("<div class=\"r\" >".$edate."</div> \n");
				if($col==3 ){print("</td>\n\t</tr>\n"); } else { print("</td>");}
$col++;
				}
				//}
			
 print("</table>\n");





?>
