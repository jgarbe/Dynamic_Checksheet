<?php
  require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}


print("<html><head>");
 print("         <style>\n");
  print("table, th, td {\n");

      print(" text-align: center;\n");
      print(" border: 1px solid black;\n");
      print("}\n");
      print("table {\n");
      
      print("width:100%;\n");
      print("}\n");
      print("\n");
      

      print("</style>\n");
print("<link href=\"../css/smoothness/jquery-ui-1.8.23.custom.css\" type=\"text/css\" rel=\"stylesheet\">\n");   
//	<!-- Normal style sheet used for layout and general formatting. -->
//  <!--  <link href="styles.css" type="text/css" rel="stylesheet">    -->
 //   <!-- HTML5 shim/shiv for HTML5 section element backward compatibility. -->
print("<script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>\n");    
//    <!-- jQuery library reference. Latest is always referenced from jQuery's CDN. -->
print("<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.8.3.min.js\"></script>\n");    
 //   <!-- jQuery UI JavaScript library reference. -->
print("<script src=\"http://code.jquery.com/ui/1.10.4/jquery-ui.js\"></script>\n"); 
 //   <!-- jQuery call to the autocomplete() method. An array of items is passed in as a parameter. -->
print("\n");
//print("<script src=\"js/jquery-git1.js\"></script> \n");
//print("<script src='js/spectrum.js'></script>   \n");
print("\n"); 
			print("<script>\n");
print("$(document).ready(function(){\n");
print("    $(\"#newUserName\").blur(function() {     \n");
 //print("alert($(this).val());\n");
  print("$.ajax({ \n");
 print("url: \"ajax_checkName.inc.php?nm=\" + (this.value) , \n");    
 print("	cache: false,					\n");
 print("       dataType: 'json',   //expect json               \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");		//With a sccessful ajax call
 
		print("       var unusable = data[0];           //id\n");
		
		
		print(" alert(\"The name, '\" + unusable + \"', is already used.  Please try another name. \");\n");
		print("    $(\"#newUserName\").val(\"\"); \n");
 
 print("     } , \n");	//End of the successful shift name call	
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");			//End the Shift name Ajax Call
  
   print("       	});      \n");  //End 


print("    $(\"#submit\").click(function() {     \n");


print("   $(\"#user_table\",window.parent.document).attr('src','inc/iframe_users.inc.php');    \n");

 //print("alert($(this).val());\n");

  
   print("       	});      \n");  //End 



 print("  }); \n");

 
print("</script>\n");
print("</head><body>");

/*
 * 
 * 
 * 
 * 
 */
 if (isset($_POST['submit'])) {
	 
				
 $newUserName = mysqli_real_escape_string($dbc1, trim($_POST['newUserName'])); //required
 $newpassWord = mysqli_real_escape_string($dbc1, trim($_POST['newpassWord']));  //required
// $newFirstName = mysqli_real_escape_string($dbc1, trim($_POST['newFirstName']));
// $newLastName = mysqli_real_escape_string($dbc1, trim($_POST['newLastName']));
 $new_status_select = mysqli_real_escape_string($dbc1, trim($_POST['new_status_select']));   //required
 $emaila = mysqli_real_escape_string($dbc1, trim($_POST['emaila']));
 
 if(!empty($newUserName) && !empty($newpassWord) && !empty($new_status_select)){
	 	$adduser_query = "INSERT INTO _user (user_id, username, password, join_date, first_name, last_name, status, email_address) VALUES ('0','$newUserName',SHA('$newpassWord'),'NOW()','$newFirstName', '$newLastName', '$new_status_select', '$emaila')";
			mysqli_query($dbc1,$adduser_query);
			 
	// print("<p>".$newUserName." has been submitted.</p>\n");
	 
	 } else {
		 print("You must submit a Username, Password and Status.\n");
	 }
 
 
}

/*
 * 
 * 
 * 
 * 
 * 
 * 
 */

require_once('function_print_r2.inc.php');
require_once('function_get_status.inc.php');
		$all_status=get_status();

print("<h2>Create A New User</h2>\n");
	print("<form  id=\"user_add\" name=\"user_add\" ACTION=\"".$PHP_SELF."\" method=\"post\"> \n");
print("<table>\n");
	print("<tr>\n");
		print("<th>Username<span style=\"color:red;\">*</span></th>\n");
		print("<th>Password<span style=\"color:red;\">*</span></th>\n");
		print("<th>First Name</th>\n");
		print("<th>Last Name</th>\n");
		print("<th>Status<span style=\"color:red;\">*</span></th>\n");
	print("</tr>\n");

	print("<tr>\n");
		print("<td><input type=\"text\" size=\"22\" id =\"newUserName\" name=\"newUserName\" required></td>\n");
		print("<td><input type=\"password\" size=\"22\" id =\"newpassWord\" name=\"newpassWord\" required></td>\n");
		print("<td><input type=\"text\" size=\"22\" id =\"newFirstName\" name=\"newFirstName\" ></td>\n");
		print("<td><input type=\"text\" size=\"22\" id =\"newLastName\" name=\"newLastName\" ></td>\n");
		print("<td>\n");
			   	print("<SELECT  id=\"new_status_select\" NAME=\"new_status_select\" required>\n");
			print("<OPTION VALUE=''></OPTION>");
					foreach ($all_status as $s_no => $s_arr) { //dropdown box of
			print("\n\t<OPTION VALUE=\"".$s_no."\">".$s_arr."</OPTION>");	}
			print("</SELECT> \n");
		print("</td>\n");
	print("</tr>\n");
print("</table>\n");




print("<table>\n");
print("<thead>\n");
	print("<tr>\n");
		print("<th>E-Mail Address</th>\n");
	print("</tr>\n");
print("</thead>\n");

	print("<tr>\n");
		print("<td><input type=\"text\" size=\"50\" id =\"emaila\" name =\"emaila\"></td>\n");
			
		print("<td><input type=\"submit\"  id =\"submit\" name=\"submit\" value=\"submit\"></td>\n");
	print("</tr>\n");
print("</table>\n");





print("</form>\n");

print("</body></html>");
