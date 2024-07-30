<?php

// Written by Jim Garbe
function apply_seal($casc_id,$seal) {
$Checksheetno = checksheet_idtochecksheetname($casc_id);
$Checksheet = $Checksheetno."_Sealed";



$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$sig=usernametouser_id($_SESSION['username']);
$setsealsql = "UPDATE Checksheets SET sealed = '".$seal."', Signature = '".$sig."' WHERE id = '".checksheetnotochecksheet_id($Checksheetno)."' ";
	mysqli_query($dbc,$setsealsql) or die("can't sqlsetseal");
mysqli_close($dbc);
}
?>
