<?php
require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Innovation Forge Security
//
/////////////////////////////////////////////////////////////////////
require_once('inc/appvars.php');
$Title="User Administration";
 include('inc/title.php');

 
  require_once('inc/connectvars.php');

    if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {


//require_once('inc/function_print_r2.inc.php');

	/**********************************************************
	 * 
	 * If Logged in as an Administrator
	 * 
	 ***********************************************************/ 
	if($_SESSION['status'] == 1){ // Administrator
		
		print(" <iframe id=\"user_table\"  width = \"100%\" height = \"40%\" src = \"inc/iframe_users.inc.php\"></iframe>          \n");
		
		
		
print("<label for\"add_user_table\" style=\"align:center;\">New User</center>\n");
		print(" <iframe id=\"add_user_table\"  width = \"100%\" height = \"20%\" src = \"inc/iframe_adduser.inc.php\"></iframe>          \n");

		
print("<label for\"import_csv_user\" style=\"align:center;\">Import CSV List</center>\n");
		print(" <iframe id=\"import_csv_list\"  width = \"100%\" height = \"15%\" src = \"inc/iframe_import_csv.inc.php\"></iframe>          \n");


	/**********************************************************
	 * 
	 * End If Logged in as an Administrator
	 * 
	 ***********************************************************/ 
				}

}
else {
	
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
          header('Location: ' . $home_url);

}


?>
