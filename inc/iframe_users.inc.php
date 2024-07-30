<?php
  require_once('connectvars.php');
  $dbc1 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}
empty($_GET['order'])?$use_order = 'username':$use_order= mysqli_escape_string($dbc1,$_GET['order']); 
$_GET['ud']=='1'?$ud = 'ASC':$ud='DESC';
print("<html><head>");
//print("<link href=\"../css/smoothness/jquery-ui-1.8.23.custom.css\" type=\"text/css\" rel=\"stylesheet\">\n");   
//	<!-- Normal style sheet used for layout and general formatting. -->
//  <!--  <link href="styles.css" type="text/css" rel="stylesheet">    -->
 //   <!-- HTML5 shim/shiv for HTML5 section element backward compatibility. -->
print("<script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>\n");    
//    <!-- jQuery library reference. Latest is always referenced from jQuery's CDN. -->
print("<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.8.3.min.js\"></script>\n");    
 //   <!-- jQuery UI JavaScript library reference. -->
print("<script src=\"//code.jquery.com/ui/1.10.4/jquery-ui.js\"></script>\n"); 
 //   <!-- jQuery call to the autocomplete() method. An array of items is passed in as a parameter. -->
print("\n");
//print("<script src=\"js/jquery-git1.js\"></script> \n");
//print("<script src='js/spectrum.js'></script>   \n");
print("\n"); 
 print("         <style>\n");
  print("table, th, td {\n");

      print(" text-align: center;\n");
      print(" border: 1px solid black;\n");
      print("}\n");
      print("table {\n");
      
      print("width:100%;\n");
      print("}\n");
      print("\n");
      print("\n");
      print("</style>\n");
print("</head><body>");
require_once('function_print_r2.inc.php');

	   // print("<br /><br /><h3 style=\"text-align:center;\">Administration</h3>\n");
	   
	   
require_once('function_get_users.inc.php'); 
require_once('function_get_status.inc.php');  
	   $user_list = get_users($use_order,$ud);
		$all_status=get_status();
		
		//print("<p>Ordered by \"".$use_order."\" </p>\n");

					print("<script>\n");
print("$(document).ready(function(){\n");
print("    $(\"input[name='use_order']\").click(function() {     \n");
 //print("       alert($(\"input[name='use_order']:checked\").val());   \n");
 print("       var useOrder = $(\"input[name='use_order']:checked\").val();   \n");
 print("var ud = '".$ud."';\n");
//print("       alert(useOrder);   \n");
//print("       alert('".$use_order."');   \n");
 print(" if (useOrder == '".$use_order."')  {\n");
 print("	if (ud == 'DESC'){\n");
 print("var	nud = '1'; } \n");
 print("	if (ud == 'ASC'){\n");
 print("var	nud = '0'; } \n");
// print("alert(ud);\n");
 print(" }  \n");
print("location.replace('iframe_users.inc.php?order=' + useOrder + '&ud=' + nud);\n");
print("    });   \n");
print("    });   \n");
		
print("   </script>   \n");
		
print("<table style=\"border:1px solid black;\">\n");
	print("<thead style=\"border:1px solid black;\">\n");
			print("<tr>\n");    
			   print("<th style=\"border:1px solid black;\"></th>\n"); 
			   
			   print("<th style=\"border:1px solid black;");
			   if($use_order=='username'){print("background-color:#BDAA51;");}
			   print("\"><input type=\"radio\" name=\"use_order\" value=\"username\">Username</th>\n"); 
			   
			   print("<th style=\"border:1px solid black;");
			   if($use_order=='first_name'){print("background-color:#BDAA51;");}
			   print("\"><input type=\"radio\" name=\"use_order\" value=\"first_name\">First Name</th>\n");
			   
			   print("<th style=\"border:1px solid black;");
			   if($use_order=='last_name'){print("background-color:#BDAA51;");}
			   print("\"><input type=\"radio\" name=\"use_order\" value=\"last_name\">Last Name</th>\n");
			   
			   print("<th style=\"border:1px solid black;");
			   if($use_order=='stat_name'){print("background-color:#BDAA51;");}
			   print("\"><input type=\"radio\" name=\"use_order\" value=\"stat_name\">Status</th>\n");
			   
			   print("<th style=\"border:1px solid black;");
			   if($use_order=='mailrec'){print("background-color:#BDAA51;");}
			   print("\"><input type=\"radio\" name=\"use_order\" value=\"mailrec\">Receiver of E-mail</th>\n");
			   
			   print("<th style=\"border:1px solid black;");
			   if($use_order=='email_address'){print("background-color:#BDAA51;");}
			   print("\"><input type=\"radio\" name=\"use_order\" value=\"email_address\">E-Mail</th>\n");


			print("</tr>\n");
	print("</thead>\n");

//user_id
//username
//password
//join_date
//first_name
//last_name
//stat_name  linked to status_id
//email_address
	//print_r2($user_list); 
	//print_r2($all_status);
	print("<tbody style=\"border:1px solid black;\">\n");
		foreach($user_list as $user_id) {






			print("<script>\n");
print("$(document).ready(function(){\n");

	print(" $(\"#status_select_".$user_id[0]."\").change(function(){ 	\n");
	//print("alert(\"Event_id: ".$user_id[0]."  and  group_id: \" + (this.value));\n");
  print("$.ajax({ \n");
 print("url: \"ajax_status_to_user.inc.php?status=\" + (this.value) + \"&user_id=".$user_id[0]."\", \n");    
 print("	cache: false,					\n");
 print("       dataType: 'json',   //expect json               \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");		//With a sccessful ajax call
 
//print("location.replace('iframe_users.inc.php");
//if(isset($use_order)){print("?order=".$use_order."");}
// print("');\n");
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



	print(" $(\"#firstName_".$user_id[0].",#lastName_".$user_id[0].", #emailAddress_".$user_id[0]."\").change(function(e){ 	\n");
	//print("alert(e.target.id + \"_\" +(this.value));\n");
	print("var recipdata = e.target.id + \"_\" +(this.value);\n");
  print("$.ajax({ \n");
 print("url: \"edit_table.inc.php?dit=\" + recipdata, \n");    
 print("	cache: false,					\n");
 print("       dataType: 'json',   //expect json               \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");		//With a sccessful ajax call
 
//print("location.replace('iframe_users.inc.php");
//if(isset($use_order)){print("?order=".$use_order."");}
// print("');\n");
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
   
   
   
   
print(" $(\"#mailrec_".$user_id[0]."\").change(function(){ 	\n");
 print("if ( $(this).is(\":checked\"))  {\n");
 print(" var spiffy = \"p=".$user_id[0]."&q=1\"; \n");
 print(" var m = \"".$user_id[1]." will receive inv emails.\"; \n");
print("} else { \n");
 print(" var spiffy = \"p=".$user_id[0]."&q=0\"; \n");
 print(" var m = \"".$user_id[1]." will not receive inv emails.\"; \n");
 print("}");
print("$.ajax({ \n");
 print("url: \"mailcheckbox_ajax.inc.php\", \n");   
 print("	cache: false	,					\n"); 
 print("     data: spiffy,   \n");
 print(" success: function(data){ \n");
 print("alert(m); \n"); // test
 

 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("    // alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print("}); \n");
   print("       	});      \n");  //End 



   print(" $(\"#udel_".$user_id[0]."\").click(function(){ 	\n");
    print(" var hmm = confirm(\"Deleting a user may Mangle Records.  Are you Sure you want to delete the user, '".$user_id[1]."'\?  \")	\n");
    print(" if (hmm == true) {\n");
    print("$.ajax({ \n");
 print("url: \"ajax_userDelete.inc.php?user_id=".$user_id[0]."\" , \n");    
 print("	cache: false	,					\n");
 //print("       dataType: 'json',   //expect json               \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(){ \n");		//With a sccessful shift name ajax call
 print("alert(\"".$user_id[1]." deleted\");");
print(" $(\"#user_table\",window.parent.document).attr('src','inc/iframe_users.inc.php'); \n");
//print("location.replace('venue_management.php');\n");
 print("     } , \n");	//End of the successful shift name call	
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");
print(" }; \n");				//End the Shift name Ajax Call
 print(" }); \n");






 print("  }); \n");
 
print("</script>\n");
			
			
			
		
			print("<tr>\n"); 
			   print("<td><input type=\"button\" id =\"udel_".$user_id[0]."\" value=\"Delete\"/></td>\n");
			   print("<td>".$user_id[1]."</td>\n");
			   print("<td><input type=\"text\" size=\"32\"  id =\"firstName_".$user_id[0]."\" value=\" ");
			   if(!empty($user_id[2])) { echo $user_id[2]; }
			   print("\"/></td>\n");
			   print("<td><input type=\"text\" size=\"32\" id =\"lastName_".$user_id[0]."\" value=\" ");
			   if(!empty($user_id[3])) { echo $user_id[3]; }
			    print("\"/>\n");
			   print("</td>\n");
			   /*
			    * 
			    * The Status Column
			    * 
			    */
			   print("<td>\n");
			   	print("<SELECT  id=\"status_select_".$user_id[0]."\" NAME=\"status_select_".$user_id[0]."\">\n");
			foreach ($all_status as $s_no => $s_arr) { //dropdown box of
		if(!empty($user_id[4]) && $user_id[4] == $s_arr){
			print("<OPTION VALUE='".$s_no."'>".$s_arr."</OPTION>");
		} 
		
	}
			print("<OPTION VALUE=''></OPTION>");
		
			foreach ($all_status as $s_no => $s_arr) { //dropdown box of
			print("\n\t<OPTION VALUE=\"".$s_no."\">".$s_arr."</OPTION>");	}
			print("</SELECT> \n");
			   print("</td>\n");
			   /*
			    * 
			    * End the Status Column
			    * 
			    */			   print("<td><input type=\"checkbox\"  id =\"mailrec_".$user_id[0]."\" value=\"1\" ");
			   if(!empty($user_id[5])) { echo "checked "; }
			   print(" /></td>\n");
			   print("<td><input type=\"text\" size=\"50\" id =\"emailAddress_".$user_id[0]."\" value=\" ");
			   if(!empty($user_id[6])) { echo $user_id[6]; }
			   print("\"/></td>\n");
			  // print("<td>".$user_id[0]."</td>\n");

			print("</tr>\n");
		}
	print("</tbody>\n"); 
print("</table>\n"); 

print("</body></html>");
