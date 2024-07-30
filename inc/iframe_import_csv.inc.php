<?php 

require_once('function_get_status.inc.php');
require_once('connectvars.php');
		$all_status=get_status();
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

 $csv_status_select = mysqli_real_escape_string($dbc1, trim($_POST['csv_status_select']));   //required
        $unamequery = "SELECT username FROM _user";
        $unamedata = mysqli_query($dbc1, $unamequery);
       while ($unamerow = mysqli_fetch_array($unamedata)) {
			$unames[]=$unamerow['username']; }
		mysqli_close($dbc1);

require_once('function_print_r2.inc.php');
//print_r2($unames);

print("<html><head>");
if ($_FILES['csv']['size'] > 0) { 

    //get the csv file 
    $file = $_FILES['csv']['tmp_name']; 
    $handle = fopen($file,"r"); 
     // First, see make sure the username isn't already used.
		    do { 
        if ($datacn[0]) { 
			  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
				$newUserName = mysqli_real_escape_string($dbc1, trim($datacn[0])); //required
 $newpassWord = mysqli_real_escape_string($dbc1, trim($datacn[1]));  //required
 $newFirstName = mysqli_real_escape_string($dbc1, trim($datacn[2]));
 $newLastName = mysqli_real_escape_string($dbc1, trim($datacn[3]));
 $emaila = mysqli_real_escape_string($dbc1, trim($datacn[4]));
		mysqli_close($dbc1);
					if (in_array($newUserName,$unames)) { 
						print(" <span class=\"warning\">Username, ".$newUserName.", is already in the database. Please change the entry and try again.<br /></span>\n");$csv_list=""; break;
						//give warning and delete the array
						 } else {
		$csv_list[] = array( $newUserName,$newpassWord,$newFirstName,$newLastName,$emaila);
						}
	} 
    } while ($datacn = fgetcsv($handle,1000,",","'")); 
    


   

    require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
foreach($csv_list as $no => $val){
            $addcsv_query = "INSERT INTO _user (user_id, username, password, join_date, first_name, last_name, status, email_address) VALUES ('0','$val[0]','SHA($val[1])','NOW()','$val[2]', '$val[3]', '$csv_status_select', '$val[4]')"; 
            
			mysqli_query($dbc1,$addcsv_query);
        } 

		mysqli_close($dbc1);
}
print("<script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>\n");    
//    <!-- jQuery library reference. Latest is always referenced from jQuery's CDN. -->
print("<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.8.3.min.js\"></script>\n");    
 //   <!-- jQuery UI JavaScript library reference. -->
print("<script src=\"//code.jquery.com/ui/1.10.4/jquery-ui.js\"></script>\n"); 
print("<script>\n");

print("$(document).ready(function(){\n");
print(" $(\"#user_table\",window.parent.document).attr('src','inc/iframe_users.inc.php'); \n");
print("       	});      \n");  //End 
print("</script>\n");



print("</head>\n");
print("<body>\n");


print("<ol>\n"); 
print("<li>CSV file should have 5 fields, \"User Name\", \"Password\", \"First Name\", \"Last Name\" and \"E-Mail Address\". <a href=\"../example.csv\">example.csv</a></li>\n");
print("<li>Select the Status of the users.</li>\n");
print("</ol>\n"); 
	print("<form   id=\"form1\" enctype=\"multipart/form-data\"  name=\"form1\" ACTION=\"".$PHP_SELF."\" method=\"post\"> \n");
//print(": Choose your file: <br />  \n");
print("  <input name=\"csv\" type=\"file\" id=\"txtFileUpload\" accept=\".csv\"/> \n");
			print("<label for=\"csv_status_select\">Status</label>\n");
			   	print("<SELECT  id=\"csv_status_select\" NAME=\"csv_status_select\" required>\n");
			print("<OPTION VALUE=''></OPTION>");
					foreach ($all_status as $s_no => $s_arr) { //dropdown box of
			print("\n\t<OPTION VALUE=\"".$s_no."\">".$s_arr."</OPTION>");	}
			print("</SELECT> \n");
print("  <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Submit\" /> \n");
print("</form> \n");

print("</body>\n");
print("</html>\n");

?>
