<?php 
// Written by Jim Garbe

function smaintmerge($maintchsheet,$q_set) {
$Checksheetno=checksheet_idtochecksheetname($maintchsheet);
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
////////////////////////////////////
///////////////////////////////////////
  // Retrieve the Maintenance data from MySQL where the maintenance is not "resolved".
  $querymaint = "SELECT * FROM Maintenance WHERE checksheet_id = ".$maintchsheet." AND resolved = 0 ORDER BY date DESC";
 if ( $datamaint = mysqli_query($dbc, $querymaint) ){
		
	require_once('inc/order.inc.php'); // bring in the functions.
  // Loop through the array of Maintenance data, formatting it as HTML 
  echo '<table width=100%>';
 
  while ($rowmaint = mysqli_fetch_array($datamaint)) { 
	$maint_id=$rowmaint['id'];
 $ch_id = $rowmaint['checksheet_id'];


print("<tr><th style=\"background-color:#6c0245;font-size: 20px;align:center;\" colspan=\"6\">Pending Repair for ".$Checksheetno." </th></tr>");
 
    echo '<td class="">';
    echo '<strong>Date:</strong> ' . $rowmaint['date'] . '';
	$acomments_id = $rowmaint['comments_id'];
	$queryacomment = "SELECT * FROM Comment_ WHERE $acomments_id = Comment_.comment_id ";
  	  $dataacomment = mysqli_query($dbc, $queryacomment);
		 while ($rowacomments = mysqli_fetch_array($dataacomment)) {
				$nvalue=$rowacomments['_comment'];
      echo '<p><strong>Note:</strong> ' . $rowacomments['_comment'] . '</p>';
		$namer='Pending Repairs for '.$Checksheetno;
		$name=$Checksheetno.' Maintenance Note:';
				//	Order ($name,$nvalue);
				//	PrintO ($namer);
				//	PrintOrder ($name,$nvalue);
				//	SubjOrder ($name,$nvalue);
    }
   // echo '<span class="">' . $row['comments_id'] . '</span><br />';
	$auser_id = $rowmaint['user_id'];
	//print("$auser_id");
	$queryauser = "SELECT * FROM _user WHERE $auser_id = _user.user_id";
  	  $dataauser = mysqli_query($dbc, $queryauser);
		 while ($rowauser = mysqli_fetch_array($dataauser)) {
      echo '<p> ' . $rowauser['username'] . '</p></td>';
    }    


	// get the "before" image if there is one.
    if (is_file(MM_UPLOADPATH . $rowmaint['ascreenshot']) && filesize(MM_UPLOADPATH . $rowmaint['ascreenshot']) > 0) {
      echo '<td><label>Pic</label><img src="' . MM_UPLOADPATH . $rowmaint['ascreenshot'] . '" width="200" height="200" alt="Before Maintenance image" /></td>';
    }
    else {
      echo '<td><img src="' . MM_UPLOADPATH . 'noimage.jpg' . '"  width="200" height="200"  alt="No Image" /></td>';
    }  

}

}


}


//echo"</div>";
?>
