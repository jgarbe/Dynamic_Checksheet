<?php
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////

	include('appvars.php');  // Set the Variables
 function recursiveRemoveDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}
				if (file_exists(CACHE_DIR.$_GET['ch'])) { 
			 recursiveRemoveDirectory(CACHE_DIR.$_GET['ch']) ;
			}
require_once('connectvars.php');
/*
	$dbc0 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
		if (!$dbc0) {
   printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
  exit();
}
$Checksheetno = mysqli_real_escape_string($dbc0,$_GET['ch']);



mysqli_query($dbc0 , "DELETE FROM requisition WHERE ch_id = '".$Checksheetno."' ");
mysqli_query($dbc0 , "DELETE FROM req_header WHERE ch_id = '".$Checksheetno."' ");
mysqli_query($dbc0 , "DELETE FROM req_footer WHERE ch_id = '".$Checksheetno."' ");


mysqli_close($dbc0);

*/
$dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
exit('Connect failed: '. mysqli_connect_error());
}

$Checksheetno = mysqli_escape_string($dbc1,$_GET['ch']);
  $dbc1->query("DELETE FROM requisition WHERE ch_id = '".$Checksheetno."' ");
 $dbc1->query("DELETE FROM req_header WHERE ch_id = '".$Checksheetno."' ");
 $dbc1->query("DELETE FROM req_footer WHERE ch_id = '".$Checksheetno."' ");
 


//$deletesql1->close();
//$deletesql2->close();
//$deletesql3->close();
 $dbc1->close();

?>
