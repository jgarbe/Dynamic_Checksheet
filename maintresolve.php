<?php
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
	foreach ($_POST['maintresolve'] as $maintres_id) {
		// print("$maintres_id<br>");
		
		// print_r($_POST[$maintres_id]);
//		$q_appttime=NewApptTime($maintres_id,($_POST[$maintres_id][0]));	
//    $dateappt = mysqli_real_escape_string($dbc, $q_appttime);
//    $pt_id = mysqli_real_escape_string($dbc, trim($_POST[$maintres_id][1]));
//    $orig = mysqli_real_escape_string($dbc, trim($_POST[$maintres_id][2]));
//    $dest = mysqli_real_escape_string($dbc, trim($_POST[$maintres_id][3]));
//









?>
<table>
<TR>
<TD> <?php echo $_SESSION['username']; ?></TD>
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




















?>
