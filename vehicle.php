<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Vehicles";
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

	$labarr=array('Vehicle Fleet Name','VIN no.', 'Make', 'Model', 'Year', 'Class', 'State Licence no.', 'Engine', 'Delete');
print("<script>\n");

print("$(document).ready(function()\n");
print("  { \n");

	///////////////////////////////////////////////////////////////////////////////////////////////////////
// Adding a Vehicle
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\"#add_vehicle\").click(function(){ \n");
   print("$.ajax({ \n");
 print("url: \"inc/veh_new_ajax.inc.php\", \n");    
 print("	cache: false	,					\n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
print("location.replace('vehicle.php');\n");
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
  
    print("$(\"#refresh\").click(function(){ \n");

 
print("location.replace('vehicle.php');\n");


  print("});\n");
  

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Adding a Vehicle
//////////////////////////////////////////////////////////////////////////////////////////////////////


	///////////////////////////////////////////////////////////////////////////////////////////////////////
// Beginning of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\":text\").blur(function(){ \n");

print(" var dataPut = $(this).attr('id') + \":\" + $(this).val(); \n");

//print("alert(\" \" +  dataPut); \n"); // test
   print("$.ajax({ \n");
 print("url: \"inc/veh_textbox_ajax.inc.php\", \n");    
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
print("<INPUT TYPE=\"button\" value=\"Add Vehicle\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" id=\"add_vehicle\">\n");
print("<INPUT TYPE=\"button\" value=\"Refresh Page\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" id=\"refresh\">\n");
print("<table class=dataTable style=color:white;width:100%; cellspacing=0>");

/////////////////////////////////////////////////////////////////

$name="veh";	// Name of the menu table

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name."  ORDER BY veh_fleet_name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				
		$veharr[$row[0]]=array("veh:veh_fleet_name:".$row[1].":32"	,"veh:vinNo:".$row[2].":11","veh:make:".$row[3].":11","veh:model:".$row[4].":11","veh:_year:".$row[5].":4","veh:_class:".$row[6].":5","veh:state_lic_no:".$row[7].":5","veh:engine:".$row[8].":5");	

}


	print("\t<thead>\n");
		print("\t<tr>\n");



	foreach($labarr as $labels){
		


		
	print("\t\t<th  bgcolor='#662A03' >\n");

	print("\t\t\t".$labels."\n");
	print("\t\t</th>\n");
		
	}
	
	print("\t</tr>\n");
	print("\t</thead>\n");

	print("\t<tbody>\n");
	

	print("\t<tr>\n");


foreach($veharr as $veh_id => $vehparts){
//	print("". $veh_id."");

	foreach($vehparts as $stuff){
		
$exparr=explode(":",$stuff);
		
			print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'> ");
	print("<input type=\"text\" style=\"background-color:#214128;color:white;text-align:center;padding:4px;border:1px;\" name=\"".
		$exparr[1].$veh_id."\" size=\"".$exparr[3]."\"  id = \"".$exparr[0].":".$exparr[1].":".$veh_id."\" value=\"".$exparr[2]."\">");
	print("</td>\n");
		
		
	}
	print("<script>\n");

print("$(document).ready(function()\n");
print("  { \n");///////////////////////////////////////////////////////////////////////////////////////////////////////
// Beginning of Delete
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
 print("$(\"#delete".$veh_id."\").click(function(){ \n");
 // print("$(\"#delete".$veh_id."\")\n");
 //print(".text(\" \")\n");
//print(".append(\"<img  src=\"css/plaintheme/images/ex.png\" height=\"100\" width=\"100\" />\")\n");
 //     print(".button(function(){ \n");
//print(" var dataPut =  $(this).val(); \n");
print(" var dataPut =  \"veh:".$veh_id."\"; \n");

print("var def=confirm(\"Are you sure you want to delete this Vehicle? Records attached to this vehicle will not be able to be retrieved.\"); \n"); // test
print("if (def==true) {\n");
//print("alert(\" \" +  dataPut); \n"); // test
   print("$.ajax({ \n");
 print("url: \"inc/veh_delete_ajax.inc.php\", \n");    
 print("	cache: false	,					\n");
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
print("location.replace('vehicle.php');\n");
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

print("}\n");
  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Delete
//////////////////////////////////////////////////////////////////////////////////////////////////////


 print("   }); \n");
print("</script>\n");
	
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'> ");
//	print("<button    value=\"veh:".$veh_id."\" id=\"delete".$veh_id."\">&nbsp;</button>\n");
	//print("<input type=\"button\"  name=\"veh:".$veh_id."\"  value=\"veh:".$veh_id."\" id=\"delete".$veh_id."\">");
	print("<input type=\"button\" value=\"X\" id=\"delete".$veh_id."\">");
	
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
 
  }
  
//print_r2($veharr);
?>


<div class="push"></div>
</div>
 <? require("inc/footer.inc");  ?>
</body>
</html>
