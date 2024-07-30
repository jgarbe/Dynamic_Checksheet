<?php
require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
if(isset($_GET['checksheet'])) {
	

    $_POST['checksheet'] = $_GET['checksheet'];
    }
	include('inc/appvars.php');  // Set the Variables	
    $Title=" Sealed Item Expiration Dates";
 include('inc/title.php');
	require_once('inc/connectvars.php');  // Set the username connection variables.
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once('inc/delayscript.inc.php'); // bring in the delay script.
  // Connect to the username database 
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
$query = "SELECT user_id, first_name,  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
$data = mysqli_query($dbc, $query);
 mysqli_close($dbc);


  if (isset($_SESSION['username'])) {  //****************//If logged in
  
  print("<script src=\"js/jquery-1.11.0.min.js\"> </script> <!--jquery--> \n");

print("<script>\n");
print("$(document).ready(function() {\n");
print(" $.ajaxSetup({ cache: false});     \n");

print("  $(\"#onemonth\").click(function(){ \n");

 print("     $.ajax({    //create an ajax request to load_page.php   \n");
 print("		type: 'GET', \n");
 print("	cache: false	,					\n");
 print("       url: \"inc/get_exp_dates_ajax.inc.php\",      \n");  
 print("     data: \"timespan=1\", \n");
 print(" 		dataType: 'html' ,\n");
 print("      success: function(response){                    \n");
  print("          $('#table_report').html(response);    \n");
 //print("          alert(response);      \n");
 print("       }     \n");

 print("   });      \n");



print("  }); \n");
print("  $(\"#twomonth\").click(function(){ \n");

 print("     $.ajax({    //create an ajax request to load_page.php   \n");
 print("		type: 'GET', \n");
 print("	cache: false	,					\n");
 print("       url: \"inc/get_exp_dates_ajax.inc.php\",      \n");  
 print("     data: \"timespan=2\", \n");
 print(" 		dataType: 'html' ,\n");
 print("      success: function(response){                    \n");
  print("          $('#table_report').html(response);    \n");
 //print("          alert(response);      \n");
 print("       }     \n");

 print("   });      \n");



print("  }); \n");
print("  $(\"#threemonth\").click(function(){ \n");

 print("     $.ajax({    //create an ajax request to load_page.php   \n");
 print("		type: 'GET', \n");
 print("	cache: false	,					\n");
 print("       url: \"inc/get_exp_dates_ajax.inc.php\",      \n");  
 print("     data: \"timespan=3\", \n");
 print(" 		dataType: 'html' ,\n");
 print("      success: function(response){                    \n");
  print("          $('#table_report').html(response);    \n");
 //print("          alert(response);      \n");
 print("       }     \n");

 print("   });      \n");



print("  }); \n");

print("  $(\"#earliest\").click(function(){ \n");

 print("     $.ajax({    //create an ajax request to load_page.php   \n");
 print("		type: 'GET', \n");
 print("	cache: false	,					\n");
 print("       url: \"inc/get_s_exp_dates_ajax.inc.php\",      \n");  
 print("     data: \"timespan=3\", \n");
 print(" 		dataType: 'html' ,\n");
 print("      success: function(response){                    \n");
  print("          $('#table_report').html(response);    \n");
 //print("          alert(response);      \n");
 print("       }     \n");

 print("   });      \n");



print("  }); \n");



print("  }); \n");
print("</script>\n");
 print("<fieldset><legend>Expiration Dates</legend>\n"); 
		
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"One Month View\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" id=\"onemonth\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Two Month View\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" id=\"twomonth\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Three Month View\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" id=\"threemonth\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Earliest Expiring\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" id=\"earliest\"></li>\n");

print("</fieldset>\n");
  
  
  
  print("<span id=\"table_report\" style=\"width:100%;\"></span>\n");
  




  }  // End if logged in
  ?>
