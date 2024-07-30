<?php
// Written by Jim Garbe
		function updatecomment($casc_id,$item_id,$name,$value,$variable,$q_set) {

//print("$q_set");
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$checkshin=checksheet_idtochecksheetname($casc_id)."_checksheet";
					$feedbacksql="SELECT ".$checkshin.".result FROM ".$checkshin." WHERE ".$q_set." = event_id AND item_id = ".$item_id."";
	$fresult=mysqli_query($dbc, $feedbacksql) or die("can't sqlset2");
		while ($row = mysqli_fetch_array($fresult)) {
			$comment_id=$row['result'];
			print("<br>Q:".$q_set."..Comment_id:".$comment_id."");
	$checkshinc=checksheet_idtochecksheetname($casc_id)."_comments";
						$update_query="UPDATE ".$checkshinc." SET comment = ".$variable." WHERE ".$comment_id." = id";
				mysqli_query($dbc,$update_query); mysqli_close($dbc);} 

}




?>
