<?php
// Written by Jim Garbe
function RSSchecksheet() {
print("<table style=border:none;width:100%;>");
print("<tr>");
	$i=0;
  require_once('inc/connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql = "SELECT * FROM Checksheets";
	$result = mysqli_query($dbc, $sql);
 while($row = mysqli_fetch_array($result)) { 
	if($i>=5) {
		print("<td><a type='application/rss+xml' href='".HOME."tmp/".$row['ChecksheetName']."order.xml'>RSS feed for   ".$row['ChecksheetName']."</a></td>");
		print("</tr><tr>");
			$i=0;
			} else {
		print("<td><a type='application/rss+xml' href='".HOME."tmp/".$row['ChecksheetName']."order.xml'>RSS feed for   ".$row['ChecksheetName']."</a></td>");

			$i=$i+1;
}


	}

print("</tr>");
print("</table>");
  mysqli_close($dbc);
}


//**************************************************************************************//
//	CloseRSSOrder()									//
//		Append to the *.html documents	.					//
//**************************************************************************************//
function CloseRSSOrder() {
$FileName4=TMP. $_POST['checksheet'] ."order.xml";
$paragraph4="</description>\n\t<link>".HOME."tmp/". $_POST['checksheet'] ."order.xml</link>\n\t</item>\n\t</channel>\n</rss>";
$OpenOrder4 = fopen($FileName4, "a");
	fwrite ($OpenOrder4,$paragraph4) ;
	fclose ($OpenOrder4);
	
}


?>
