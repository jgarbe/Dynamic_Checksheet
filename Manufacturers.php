<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Manufacturers";
  require_once('inc/title.php');
  


  require_once('inc/connectvars.php');
  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {

	

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
?>
</div>
<?php
print("<script src=\"js/jquery-1.11.0.min.js\"> </script> <!--jquery--> \n");
print("<script src=\"js/jquery-ui-1.10.4.custom.min.js\"> </script> <!--jquery--> \n");
 require_once("inc/functions.php.inc");
////////////////////////////////////////////////////////////////////////////////////////////
//
// Create the Jquery Scripts
////////////////////////////////////////////////////////////////////////////////////////////

print("<script>\n");

print("$(document).ready(function()\n");
print("  { \n");

	///////////////////////////////////////////////////////////////////////////////////////////////////////
// Adding a Manufacturer
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\"#add_manufacturer\").click(function(){ \n");
   print("$.ajax({ \n");
 print("url: \"inc/mfr_new_ajax.inc.php\", \n");    
 print("	cache: false	,					\n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
print("location.replace('Manufacturers.php');\n");
 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");

  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Adding a Manufacturer
//////////////////////////////////////////////////////////////////////////////////////////////////////









	///////////////////////////////////////////////////////////////////////////////////////////////////////
// Beginning of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\":text\").blur(function(){ \n");

print(" var dataPut = $(this).attr('id') + \":\" + $(this).val(); \n");

//print("alert(\" \" +  dataPut); \n"); // test
   print("$.ajax({ \n");
 print("url: \"inc/mfr_textbox_ajax.inc.php\", \n");    
 print("	cache: false	,					\n");
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");

  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////

 print("   }); \n");
print("</script>\n");
////////////////////////////////////////////////////////////////////////////////////////////
//
// Ending the jQuery scripts
////////////////////////////////////////////////////////////////////////////////////////////
print("<div class='scrollTableContainer'>");
print("<INPUT TYPE=\"button\" value=\"Add Manufacturer\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" id=\"add_manufacturer\">\n");
print("<table class=dataTable style=color:white;width:100%; cellspacing=0>");
	print("\t<thead>\n");
	
	print("\t<tr>\n");
	print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tManufacturer Name\n");
	print("\t\t</th>\n");
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tAddress\n");
	print("\t\t</th>\n");
		print("\t\t</th>\n");
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tCity\n");
	print("\t\t</th>\n");
		print("\t\t</th>\n");
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tState\n");
	print("\t\t</th>\n");
	
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tZip\n");
	print("\t\t</th>\n");
	

	print("\t</tr>\n");
	print("\t</thead>\n");
/////////////////////////////////////////////////////////////////
	print("\t<tbody>\n");

	print("\t<tr>\n");
$name="mfr";	// Name of the menu table

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name."  ORDER BY mfr_name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$mfr_id=$row[0];
				$mfr_name=$row[1];
				$mfr_address = $row[2];
				$mfr_city = $row[3];
				//$Perishable == 1?$printcheck="&#x2713;":$printcheck = '';
				$mfr_state = $row[4];
				$mfr_zip = $row[5];

	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'> ");
	print("<input type=\"text\" style=\"background-color:#214128;color:white;text-align:center;padding:4px;border:1px;\" name=\"name_".$mfr_id."\" size=\"32\"  id = \"mfr_name:".$mfr_id."\" value=\"".$mfr_name."\">");
	print("</td>\n");

	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");
		print("<input type=\"text\" style=\"background-color:#433C33;color:white;text-align:center;padding:4px;border:1px;\" name=\"mfr_address_".$mfr_id."\" size=\"11\"  id = \"mfr_address:".$mfr_id."\" value=\"".$mfr_address."\">");
	print("</td>\n");
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");
			print("<input type=\"text\" style=\"background-color:#214128;color:white;text-align:center;padding:4px;border:1px;\" name=\"mfr_city_".$mfr_id."\" size=\"11\"  id = \"mfr_city:".$mfr_id."\" value=\"".$mfr_city."\">");
	print("</td>\n");
	
	
	
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");
			print("<input type=\"text\" style=\"background-color:#214128;color:white;text-align:center;padding:4px;border:1px;\" name=\"mfr_state_".$mfr_id."\" size=\"11\"  id = \"mfr_state:".$mfr_id."\" value=\"".$mfr_state."\">");
	print("</td>\n");
	
		
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");
			print("<input type=\"text\" style=\"background-color:#214128;color:white;text-align:center;padding:4px;border:1px;\" name=\"mfr_zip_".$mfr_id."\" size=\"5\"  id = \"mfr_zip:".$mfr_id."\" value=\"".$mfr_zip."\">");
	print("</td>\n");


		print("\t</tr>\n\t<tr>\n");

}

	print("\t</tr>");
	print("\t</tbody>\n");
print("</table>");
print("</div>");
  mysqli_close($dbc);



}   
  else {
    echo ' <a href="login.php">Log In As An Administrator(' . $_SESSION['username'] . ').</a><br />';
    //echo ' <a href="signup.php">Sign Up</a>';
  }


?>


<div class="push"></div>
</div>
 <? require("inc/footer.inc");  ?>
</body>
</html>
