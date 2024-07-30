<?php
$exp_array=array();
 require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$plustime=$_GET['timespan'];
//print("<p>plustime=".$plustime."</p>");
$timespan=mktime(0,0,0,date("m")+$plustime, 0, date("Y"));
			
      $sql_exp="SELECT  sealedlist.id,
						UNIX_TIMESTAMP(sealedlist.exp_date) AS ep,
						it.item_name,
						ch.ChecksheetName AS cn 
						FROM sealedlist
						INNER JOIN Checksheets AS ch ON ch.id = sealedlist.ch_id
						INNER JOIN Items AS it ON it.item_id = sealedlist.item_id
						
    				WHERE (UNIX_TIMESTAMP(sealedlist.exp_date) <= '".$timespan."') 
    				AND it.perishable = '1' 
    				AND ch.sealable = '1'
    				ORDER BY cn,it.item_name";
  
  
  $exp_query =mysqli_query($dbc, $sql_exp)  or die(mysql_error($dbc));
	while ($row_exp = mysqli_fetch_array($exp_query)){
		$exp_array[''.$row_exp['cn']."']['".$row_exp['item_name']."']['".$row_exp['id']."'][]='".$row_exp['ep']."';
		

			print("<span style='color:orange;'>".$row_exp['cn']."</span><br/>");
	}
			print("<span style='color:orange;'>$row_exp['cn']</span><br/>");
 print("<pre>\n");print_r($exp_array);print("</pre>\n");
  foreach($exp_array as $charray => $chname) {
	   print("<table width=\"100%\">\n");
 
 print("<tr>\n");
 print("<td colspan=\"3\">\n");
  print("<div class=\"sh\" style=\"color:#E6FE69;font-size:1.25em;\">".$charray."</div> \n");
  
 print("</td>\n");
 print("</tr>\n");
			foreach($chname as $itname => $idname) {
				 print("<tr>\n");
 print("<td colspan=\"3\">\n");
  print("<div class=\"sh\" >".$itname."</div> \n");
  
 print("</td>\n");
 print("</tr>\n");
				
				  $col=3;
			foreach( $idname as $idput => $no) {
				foreach($no as $pedate){
													if($pedate== 0) {$warn="sealedr";}
								elseif($pedate<= time() && $pedate != 0) {$warn="late";}
								elseif($pedate<= mktime(0,0,0,date("m")+1, 0, date("Y")) && $pedate>= time() ) {$warn="soon";}
								elseif($pedate<= mktime(0,0,0,date("m")+2, 0, date("Y")) && $pedate>= mktime(0,0,0,date("m")+1, 0, date("Y"))) {$warn="impending";}
					$pedate==0?$edate="No Date Entered":$edate=date('M-d-Y',$pedate);
															
	if($col==3 ){print("<tr>\n\t<td    class=\"".$warn."\"  style=\"text-align:center;\" >\n");$col=0; } else { print("<td   class=\"".$warn."\" style=\"text-align:center;\" >");}

  print("<div class=\"l\" >".$itname."</div> \n");
    print("<div class=\"r\" >".$edate."</div> \n");
				if($col==3 ){print("</td>\n\t</tr>\n"); } else { print("</td>");}
$col++;
				}
				}
			}
 print("</table>\n");
}




?>
