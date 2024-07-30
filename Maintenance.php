<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////

  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');
 require_once("inc/functions.php.inc");
	if (isset($_GET['checksheet'])) {
			$_POST['checksheet']=$_GET['checksheet'];
					}

?>

<?php

    $Title="Maintenance Page of ".$_POST['checksheet']."";
  require_once('inc/title.php');



  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] < 3)) {
	


echo'<div style=text-align:center;><br><h2>'.checksheet_idtochecksheetname($_POST['checksheet']).'</h2></div>';
	
  }
   else {
    echo ' <a href="login.php">Log In</a><br />';
    echo ' <a href="signup.php">Sign Up</a>';
  }
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
?>
</div>
		 
<?php

////////////////////////////////////////////////
///////////////////////////////////////////////
////////////////////////////////////////////////
	
  if (isset($_POST['submit'])) {
	$submitted = $_POST['submit']; 
	
	if (!empty($_POST['maintresolve']))	{
	foreach ($_POST['maintresolve'] as $maintres_id) { // loop through the Resolving stuff.

    $pscreenshot = $_FILES['pscreenshot'.$maintres_id]['name'];
    $pscreenshot_type = $_FILES['pscreenshot'.$maintres_id]['type'];
    $pscreenshot_size = $_FILES['pscreenshot'.$maintres_id]['size'];	 
	    $resnote = $_POST[$maintres_id][0];
		$resuser_id = $_POST[$maintres_id][1];


	    if (!empty($resuser_id) && !empty($resnote) && !empty($pscreenshot)) {
    		  if ((($pscreenshot_type == 'image/gif') || ($pscreenshot_type == 'image/jpeg') || ($pscreenshot_type == 'image/jpeg') || ($pscreenshot_type == 'image/png')) && ($pscreenshot_size > 0) && ($pscreenshot_size <= MM_MAXFILESIZE)) {
    		    if ($_FILES['pscreenshot'.$maintres_id]['error'] == 0) {


          // Move the file to the target upload folder
          $target = MM_UPLOADPATH . $pscreenshot;
          if (move_uploaded_file($_FILES['pscreenshot'.$maintres_id]['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Write the data to the database
		$query4= "INSERT INTO Comment_ VALUES(0,'$resnote')";
		$result4 = mysqli_query($dbc,$query4);
		$q_cmnt = mysqli_insert_id($dbc);
            $query = "UPDATE Maintenance SET pscreenshot = '$pscreenshot', dateresolved = NOW(), pcomments_id = '$q_cmnt', resolveduser_id = '$resuser_id', resolved = '1'  WHERE id = ".$maintres_id."";
            mysqli_query($dbc, $query) or die("Not there");

            // Confirm success with the user
            echo '<p style=color:yellow;>Your report of repairs has been submitted.</p>';
            echo '<p><strong>Name:</strong> ' . _user_idtoname($resuser_id) . '<br />';
            echo '<strong>Note:</strong> ' . $resnote . '<br />';
            echo '<img src="' . MM_UPLOADPATH . $pscreenshot . '" alt="Report image" /></p>';

}   // end-- if a picture was submitted.





}

} //end picture tests.
 else     { print("Can't pass the set of pic \"if\"s"); } //if can't pass the picture tests.


} elseif (!empty($resuser_id) && !empty($resnote) && empty($pscreenshot)){ 

	$pscreenshot = 'noimage.jpg';

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Write the data to the database
		$query4= "INSERT INTO Comment_ VALUES(0,'$resnote')";
		$result4 = mysqli_query($dbc, $query4);
		$q_cmnt = mysqli_insert_id($dbc);
            $query = "UPDATE Maintenance SET pscreenshot = '$pscreenshot', dateresolved = NOW(), pcomments_id = '$q_cmnt', resolveduser_id = '$resuser_id', resolved = '1'  WHERE id = ".$maintres_id."";
            mysqli_query($dbc, $query) or die("Not there");

            // Confirm success with the user
            echo '<p style=color:yellow;>Your report of repairs has been submitted.</p>';
            echo '<p><strong>Name:</strong> ' . _user_idtoname($resuser_id) . '<br />';
            echo '<strong>Note:</strong> ' . $resnote . '<br />';
            echo '<img src="' . MM_UPLOADPATH . $pscreenshot . '" alt="Report image" /></p>';








}
}

            // Clear the score data to clear the form
            $user_id = "";
            $_comment = "";
            $ascreenshot = "";
	$submitted = "";
            mysqli_close($dbc);

}
    // Grab the score data from the POST
    $user_id = $_POST['user_id'];
    $checksheet = $_POST['checksheet'];
    $_comment = $_POST['_comment'];
    $ascreenshot = $_FILES['ascreenshot']['name'];
    $ascreenshot_type = $_FILES['ascreenshot']['type'];
    $ascreenshot_size = $_FILES['ascreenshot']['size']; 
    print("<br />Name : ".  $_FILES['ascreenshot']['name']         ."<br />" );
    print("<br />type : ".   $_FILES['ascreenshot']['type']        ."<br />" );
    print("<br />size : ".    $_FILES['ascreenshot']['size']       ."<br />" );
    print("<br />Comment : ".   $_POST['_comment']        ."<br />" );
    print("<br />checksheet : ".  $_POST['checksheet']         ."<br />" );


    if (!empty($user_id) && !empty($_comment) && !empty($ascreenshot)) {
      if ((($ascreenshot_type == 'image/gif') || ($ascreenshot_type == 'image/jpeg') || ($ascreenshot_type == 'image/pjpeg') || ($ascreenshot_type == 'image/png')) && ($ascreenshot_size <= MM_MAXFILESIZE)) {
        if ($_FILES['ascreenshot']['error'] == 0) {
          // Move the file to the target upload folder
          $target = MM_UPLOADPATH . $ascreenshot;
          if (move_uploaded_file($_FILES['ascreenshot']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Write the data to the database
		$query1= "INSERT INTO Comment_ VALUES(0,'$_comment')";
		$result1 = mysqli_query($dbc, $query1);
		$q_cmnt = mysqli_insert_id($dbc);
            $query = "INSERT INTO Maintenance VALUES (0, '$checksheet', NOW(), '$user_id', '$q_cmnt','$ascreenshot','','','','','')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p style=color:yellow;>Your report will be submitted for repairs.</p>';
            echo '<p style=color:white;><strong>Name:</strong> ' . _user_idtoname($user_id) . '<br />';
            echo '<strong>Note:</strong> ' . $_comment . '<br />';
            echo '<img src="' . MM_UPLOADPATH . $ascreenshot . '" alt="Report image" /></p>';
	
            // Clear the data to clear the form
            $user_id = "";
            $_comment = "";
            $ascreenshot = "";
	$submitted = "";
            mysqli_close($dbc);
?>

 <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="checksheet" value="<?php echo $_POST['checksheet']; ?>" />
   	 <div align="center">
	<input type="submit" value="CONTINUE >>>>>>>" name="Returned" />
	</div>
  </form>
<?php
	exit();
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading one of your screen shot images.</p>';
          }
        }
      }
      else {
        echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024) . ' KB in size.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['ascreenshot']['tmp_name']);
    }
    elseif (!empty($user_id) && !empty($_comment) && empty($ascreenshot)) {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$ascreenshot = 'noimage.jpg';
	$checksheet = $_POST['checksheet'];
	$date=date("Y-m-d H:i:s");
            // Write the data to the database
		$query1= "INSERT INTO Comment_ VALUES(0,'$_comment')";
		$result1 = mysqli_query($dbc, $query1);
		$q_cmnt = mysqli_insert_id($dbc);
            $query = "INSERT INTO Maintenance VALUES (0, '$checksheet', '$date', '$user_id', '$q_cmnt','$ascreenshot','','0000-00-00 00:00:00','0','','0')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Your report has been submitted for repairs.</p>';
           echo '<p style=color:white;><strong>Name:</strong> ' . _user_idtoname($user_id) . '<br />';
            echo '<strong>Score:</strong> ' . $_comment . '<br />';
           echo '<img src="' . MM_UPLOADPATH . $ascreenshot . '" alt="Score image" /></p>';


            // Clear the data to clear the form
            $user_id = "";
            $_comment = "";
            $ascreenshot = "";
            $pscreenshot = "";
		$submitted = "";
            mysqli_close($dbc);
?> <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="checksheet" value="<?php echo $_POST['checksheet']; ?>" />
   	 <div align="center">
	<input type="submit" value="CONTINUE >>>>>>>" name="Returned" />
	</div>
  </form>
<?php
	exit();
    }

  }
?>

  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
	<input type="hidden" name="checksheet" value="<?php echo $_POST['checksheet']; ?>" />
	<?php
  ?>
	<table width= 100%><TR><td style="background-color:#6c0245;font-size: 20px;" colspan="5"><div align="center">Add a Report.</div></TD></TR>
<TR>
<TD><?php echo $_SESSION['username']; ?></TD>
<TD> 
     <input type="hidden" id="user_id" name="user_id" value="<?php echo usernametouser_id($_SESSION['username']); ?>" /><br />
   </TD>
</TR>
<TR>
<TD>      <label for="_comment">Report(Under 200 Characters):</label>
    <textarea id="_comment" name="_comment"  ROWS=6 COLS=40><?php if (!empty($_comment)) echo $_comment; ?></TEXTAREA> <br />
</TD><TD>    <label for="ascreenshot">Screen shot(Optional):</label>
    <input type="file" id="ascreenshot" name="ascreenshot" />
    </TD>
</TR>
</table>
	   	 <div align="center">
	<input type="submit" value="Report >>>>>>" name="submit" />
	</div>
<?php
///////////////////////////////////////////////
//////////////////////////////////////////////
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
////////////////////////////////////
///////////////////////////////////////
  // Retrieve the Maintenance data from MySQL where the maintenance is not "resolved".
	//echo"<br>".checksheet_idtochecksheetname($_POST['checksheet'])."<br> ";
  $query = "SELECT * FROM Maintenance WHERE checksheet_id = ".$_POST['checksheet']." AND resolved = 0 ORDER BY date DESC";
  $data = mysqli_query($dbc, $query);
		
  // Loop through the array of Maintenance data, formatting it as HTML 
 print("<table width=100% style=color:white;>\n");
 
  while ($row = mysqli_fetch_array($data))	
 {  $ch_id = $row['checksheet_id'];
	$maint_id=$row['id'];


	//  $querychecksheetname = "SELECT * FROM Checksheets WHERE $ch_id = Checksheets.id";
  	//  $datachname = mysqli_query($dbc, $querychecksheetname);
	//	 while ($rowch = mysqli_fetch_array($datachname)) {
	


 print("<tr><th style='background-color:#6c0245;font-size: 20px;align:center;' colspan=6>Pending Repair </th></tr>\n");
 
    print("<tr>\n");
	print("\t<td class=''>");
		print("\n\t\t");
    echo '<strong>Date:</strong> ' . $row['date'] . '';
		print("\n\t\t");
	$acomments_id = $row['comments_id'];
	$queryacomment = "SELECT * FROM Comment_ WHERE $acomments_id = Comment_.comment_id ";
  	  $dataacomment = mysqli_query($dbc, $queryacomment);
		 while ($rowacomments = mysqli_fetch_array($dataacomment)) {
      echo '<p style=color:white;><strong>Note:</strong> ' . $rowacomments['_comment'] . '</p>';
		print("\n\t\t");
    }
   // echo '<span class="">' . $row['comments_id'] . '</span><br />';
	$auser_id = $row['user_id'];
	$queryauser = "SELECT * FROM _user WHERE $auser_id = _user.user_id";
  	  $dataauser = mysqli_query($dbc, $queryauser);
		 while ($rowauser = mysqli_fetch_array($dataauser)) {
      echo '<p style=color:white;> ' . $rowauser['username'] . '</p>';
		print("\n\t</td>\n\t");
    }    


	// get the "before" image if there is one.
    if (is_file(MM_UPLOADPATH . $row['ascreenshot']) && filesize(MM_UPLOADPATH . $row['ascreenshot']) > 0) {

		print("<td>\n\t\t");
      echo '<label>Before</label><img src="' . MM_UPLOADPATH . $row['ascreenshot'] . '" height="200" width="200" alt="Before Maintenance image" />';
		print("\n\t</td>\n\t");
    }
    else {
		print("<td>\n\t\t");
      echo '<img src="' . MM_UPLOADPATH . 'noimage.jpg' . '" alt="No Image" />';
		print("\n\t</td>\n\t");
    }  
/////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($_SESSION['status'] == 1) {  //if an Administrator- can see resolving buttons.

echo'<TD>';
		print("\n\t\t");
	
echo"<label for=pscreenshot>Screen shot(Optional):</label>";
echo'<input type=file id=pscreenshot  name=pscreenshot'.$maint_id.' />';
		
?>  
  		   <br><br><br>
		<label for="pcomment">Report(Under 200 Characters):</label>

<?php   
		print("\n\t\t");
	 echo'<textarea id=pcomment name='.$maint_id.'[0]  ROWS=6 COLS=40>';
 if (!empty($_POST[$maint_id][0])) echo $_POST[$maint_id][0];
echo" </TEXTAREA> <br />";
		print("\n\t\t");
echo '<input type=hidden id=user_id name='.$maint_id.'[1] value='.usernametouser_id($_SESSION['username']).'  />';

		print("\n\t");


echo'</td>';

		print("\n\t");
print("<td>\n\t</TD>\n\t<TD>\n\t\t");
echo"<input type=checkbox id=resolveid value=$maint_id name=maintresolve[] />";
echo'Resolve';
print("\n\t</TD>");

		print("\n</tr>\n");


}

}
echo '</table>';	

?>


		   	 <div align="center">
	<input type="submit" value="Report >>>>>>" name="submit" />
	</div>
  </form>
<?php
///////////////////////////////////////
///////////////////////////////////////////////////////////////
//
//
//
//
/////////////////////////////////////
/////////////////////////////////////////////////////////////
  // Retrieve the Maintenance data from MySQL where the maintenance has been declared "resolved".
	if (!empty($_POST['checksheet'])) {$checksheet = $_POST['checksheet'];}
		// echo'<br>'.checksheet_idtochecksheetname($_POST[checksheet]).'';
  $query = "SELECT * FROM Maintenance WHERE checksheet_id = $checksheet AND resolved = 1 ORDER BY date DESC";
  $data = mysqli_query($dbc, $query);
		
  // Loop through the array of Maintenance data, formatting it as HTML 
  echo '<table style=color:white;>';
 
  while ($row = mysqli_fetch_array($data)) { 
	
//  $ch_id = $row['checksheet_id'];
//	  $querychecksheetname = "SELECT * FROM Checksheets WHERE $ch_id = Checksheets.id";
//  	  $datachname = mysqli_query($dbc, $querychecksheetname);
//		 while ($rowch = mysqli_fetch_array($datachname)) {
		print("\n");
echo'<tr><th style=background-color:#0000A8;font-size: 20px;align:center; colspan="6">Issue resolved'; echo' </th></tr>';
   print("\n");
    echo '<tr>';
   print("\n\t");
echo'<td class="">';
   print("\n\t\t");
    echo '<strong>Date:</strong> ' . $row['date'] . '';
   print("\n\t\t");
	$acomments_id = $row['comments_id'];
	$queryacomment = "SELECT * FROM Comment_ WHERE $acomments_id = Comment_.comment_id ";
  	  $dataacomment = mysqli_query($dbc, $queryacomment);
		 while ($rowacomments = mysqli_fetch_array($dataacomment)) {
      echo '<p style=color:white;><strong>Note:</strong> ' . $rowacomments['_comment'] . '</p>';
   print("\n\t\t");
    }
   // echo '<span class="">' . $row['comments_id'] . '</span><br />';
	$auser_id = $row['user_id'];
	$queryauser = "SELECT * FROM _user WHERE $auser_id = _user.user_id ";
  	  $dataauser = mysqli_query($dbc, $queryauser);
		 while ($rowauser = mysqli_fetch_array($dataauser)) {
      echo '<p style=color:white;> ' . $rowauser['username'] . '</p>';
   print("\n\t");
echo'</td>';
    }    


	// get the "before" image if there is one.
    if (is_file(MM_UPLOADPATH . $row['ascreenshot']) && filesize(MM_UPLOADPATH . $row['ascreenshot']) > 0) {
   print("\n\t<td>");
      echo '<label>Before</label><img src="' . MM_UPLOADPATH . $row['ascreenshot'] . '"  height="200" width="200" alt="Before Maintenance image" />';
   print("\n\t</td>");
    }
    else {
print("\n\t");
      echo '<td>';
print("\n\t\t");
echo'<img src="' . MM_UPLOADPATH . 'noimage.jpg' . '" alt="No Image" />';
print("\n\t</td>");
    }  


	//get the "after" image, if there is one.
  if (is_file(MM_UPLOADPATH . $row['pscreenshot']) && filesize(MM_UPLOADPATH . $row['pscreenshot']) > 0) {
print("\n\t<td>\n\t\t");
      echo '<label>After</label><img src="' . MM_UPLOADPATH . $row['pscreenshot'] . '"  height="200" width="200" alt="After Maintenance image" />';
print("\n\t</td>");
    }
    else {
print("\n\t<td>\n\t\t");
      echo '<img src="' . MM_UPLOADPATH . 'noimage.jpg' . '" alt="No Image" />';
print("\n\t</td>");
    }
   
// Show the date and comments regarding the Item.
print("\n\t<td>\n\t\t");

    echo '<strong>Date:</strong> ' . $row['dateresolved'] . '';
	$pcomments_id = $row['pcomments_id'];
	$querypcomment = "SELECT * FROM Comment_ WHERE $pcomments_id = Comment_.comment_id ";
  	  $datapcomment = mysqli_query($dbc, $querypcomment);
		 while ($rowpcomments = mysqli_fetch_array($datapcomment)) {
	print("\n\t\t");
      echo '<p style=color:white;><strong>Note:</strong> ' . $rowpcomments['_comment'].'</p>';
    }
	$puser_id = $row['resolveduser_id'];
	$querypuser = "SELECT * FROM _user WHERE $puser_id = _user.user_id ";
  	  $datapuser = mysqli_query($dbc, $querypuser);
		 while ($rowpuser = mysqli_fetch_array($datapuser)) {
	print("\n\t\t");
      echo '<p style=color:white;> ' . $rowpuser['username'] . '</p>';
print("\n\t</td>\n</tr>\n");
    }


   
  }
  echo '</table>';	
//}

  mysqli_close($dbc);
?>
<div class="push"></div>
</div>
</body>
</html>
