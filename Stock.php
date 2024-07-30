<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Stock";
  require_once('inc/title.php');
  
					$mfroptions="";
					$distoptions="";


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
///////////////////////////////////////////////////////////////////////////////
//   Select Box Plugin
//////////////////////////////////////////////////////////////////////////////

print(" jQuery.fn.selectOptionWithText = function selectOptionWithText(targetText) {    \n");
 print("   return this.each(function () {   \n ");
  print("        var \$selectElement, \$options, \$targetOption;    \n");

  print("        \$selectElement = jQuery(this);   \n");
  print("        \$options = \$selectElement.find('option');    \n");
  print("        \$targetOption = \$options.filter(   \n");
  print("            function () {return jQuery(this).text() == targetText}   \n");
  print("        );   \n");

  print("        // We use `.prop` if it's available (which it should be for any jQuery    \n");
  print("        // versions above and including 1.6), and fall back on `.attr` (which   \n");
  print("        // was used for changing DOM properties in pre-1.6) otherwise.   \n");
  print("        if (\$targetOption.prop) {   \n");
  print("            \$targetOption.prop('selected', true);   \n");
  print("        }    \n");
  print("        else {   \n");
  print("            \$targetOption.attr('selected', 'true');   \n");
  print("        }   \n");
 print("     });  \n");
 print(" }   \n");


	///////////////////////////////////////////////////////////////////////////////////////////////////////
//
//////////////////////////////////////////////////////////////////////////////////////////////////////


print("$(document).ready(function()\n");
print("  { \n");
	///////////////////////////////////////////////////////////////////////////////////////////////////////
// Beginning of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\":text\").blur(function(){ \n");

print(" var dataPut = $(this).attr('id') + \":\" + $(this).val(); \n");

//print("alert(\" \" +  dataPut); \n"); // test
   print("$.ajax({ \n");
 print("url: \"inc/stock_textbox_ajax.inc.php\", \n");    
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
///////////////////////////////////////////////////////////////////////////////////////////////////////
// -- Begin Checkbox types
//////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
  print("$(\":checkbox\").change(function(){ \n");
 
// print("alert(this.id); \n"); // test
 print("if ( $(this).is(\":checked\"))  \n");
print("{ \n");
 print("$.ajax({ \n");
 print("url: \"inc/stock_clear_checkbox_ajax.inc.php\", \n");   
 print("	cache: false	,					\n"); 
 print("     data: \"p_id=\" + (this.id),   \n");
 print(" success: function(data){ \n");
// print("alert(data); \n"); // test
 
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
 print(" } \n");
  print("else  \n");
 print("{ \n");
 print("$.ajax({ \n");
 print("url: \"inc/stock_checkbox_ajax.inc.php\", \n");  
 print("	cache: false	,					\n");  
 print("     data: \"p_id=\" + (this.id),   \n");
 print("success: function(data){ \n");
 //print("alert(data); \n");  //test
 
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
 print("} \n");
  print("});\n");
  
  ///////////////////////////////////////////////////////////////////////////////////////////////////////
//      Select Box Types
//////////////////////////////////////////////////////////////////////////////////////////////////////
print("  $(\"select\").change(function(){ \n");
  
print(" var dataPut = $(this).prop('id') + \":\" + $(this).val(); \n");
print("alert(dataPut);\n");
   print("   $.ajax({                                    \n");   
 print("     url: 'inc/stock_select_ajax.inc.php',      \n"); 
 print("	cache: false	,					\n");
 print("     data: \"p_id=\" + dataPut ,   \n");
 //print("     dataType: 'json',                //data format       \n");
  print("    success: function(data)          //on recieve of reply \n");
  print("    { \n");
// print("       var id = data[0];           //id\n");
//print("       var item_id = data[2];           //item_id \n");
 print("     } , \n");
 
  print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 
 print("     }); \n");
  
  
  
  
  
  
  print("   }); \n");
 
///////////////////////////////////////////////////////////////////////////////////////////////////////
//    End of the Selectbox Type 
//////////////////////////////////////////////////////////////////////////////////////////////////////
 print("   }); \n");
print("</script>\n");
////////////////////////////////////////////////////////////////////////////////////////////
//
// Ending the jQuery scripts
////////////////////////////////////////////////////////////////////////////////////////////
function get_name($table,$t,$id)	{
	
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$zsql="SELECT * FROM ".$table." WHERE ".$t." = '".$id."'";
	$zresult=mysqli_query($dbc, $zsql);
		while ($zrow = mysqli_fetch_array($zresult, MYSQL_NUM)) {
			return $zrow[1];	
}
}
					$mfroptions.="\n\t<option value= \"NULL\">Choose</option>";
					$distoptions.="\n\t<option value= \"NULL\">Choose</option>";
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$msql="SELECT * FROM mfr ORDER BY mfr_name";
	$mresult=mysqli_query($dbc, $msql);
		while ($mrow = mysqli_fetch_array($mresult, MYSQL_NUM)) {
					$mfroptions.="\n\t<option value= \"".$mrow[0]."\">".$mrow[1]."</option>";	
}
	$dsql="SELECT * FROM distributer ORDER BY dist_name";
	$dresult=mysqli_query($dbc, $dsql);
		while ($drow = mysqli_fetch_array($dresult, MYSQL_NUM)) {
					$distoptions.="\n\t<option value= \"".$drow[0]."\">".$drow[1]."</option>";	}
//print_r2($dist_arr);
//print_r2($mfr_arr);


print("<div class='scrollTableContainer'>");

print ("\"&#x2713;\"=Expiration Date on Item");
print("<table class=dataTable style=color:white;width:100%; cellspacing=0>");
	print("\t<thead>\n");
	
	print("\t<tr>\n");
	print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tItem\n");
	print("\t\t</th>\n");
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tPerishable\n");
	print("\t\t</th>\n");
		print("\t\t</th>\n");
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tIn Stock\n");
	print("\t\t</th>\n");
		print("\t\t</th>\n");
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tWarning Quantity\n");
	print("\t\t</th>\n");
	
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tDistributer\n");
	print("\t\t</th>\n");
	
		print("\t\t<th  bgcolor='#662A03' >\n");
	
	print("\t\t\tManufacturer\n");
	print("\t\t</th>\n");
	print("\t</tr>\n");
	print("\t</thead>\n");
/////////////////////////////////////////////////////////////////
	print("\t<tbody>\n");
	print("\t<tr>\n");
$name='Items';	// Name of the menu table
//$tr=0;
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$sql="SELECT * FROM ".$name." WHERE stockable= '1' ORDER BY item_name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$item_id=$row[0];
				$ItemName = $row[1];
				$Perishable = $row[2];
				//$Perishable == 1?$printcheck="&#x2713;":$printcheck = '';
				$stockable = $row[3];
				$in_stock = $row[4];
				$min_q = $row[5];
				$in_stock<=$min_q?$warn="#9B0505":$warn="#214128";
				$dist_id = $row[6];
				$mfr_id = $row[7];

				






/*
 * 	$sql="SELECT Items.item_id,
				  Items.item_name,
				  Items.perishable,
				  Items.stockable,
				  Items.in_stock,
				  Items.min_q,
				  Items.dist_id,
				  Items.mfr_id,
				  mfr.mfr_name,
				  distributer.dist_name
				  FROM Items
				  INNER JOIN mfr ON Items.mfr_id = mfr.mfr_id
				  INNER JOIN distributer ON Items.dist_id = distributer.dist_id
				   WHERE stockable= '1' ORDER BY item_name";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result)) {
				$item_id=$row[item_id];
				$ItemName = $row[item_name];
				$Perishable = $row[perishable];
				//$Perishable == 1?$printcheck="&#x2713;":$printcheck = '';
				$stockable = $row[stockable];
				$in_stock = $row[in_stock];
				$min_q = $row[min_q];
				$in_stock<=$min_q?$warn="#9B0505":$warn="#214128";
				$dist_id = $row[dist_id];
				$mfr_id = $row[mfr_id];
				$mfr_name = $row[mfr_name];
				$dist_name = $row[dist_name];
				* 
				* 
				*/



	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'> ");
	print("<input type=\"text\" style=\"background-color:#214128;color:white;text-align:center;padding:4px;border:1px;\" name=\"name_".$item_id."\" size=\"32\"  id = \"item_name:".$item_id."\" value=\"".$ItemName."\">");
	print("</td>\n");
	print("<td align=center style='border-color:#433C33;border-right-style:dotted;border-bottom-style:dotted;'>\n");
	print("<INPUT TYPE=CHECKBOX  name=\"checkbox".$item_id."\" id=\"".$item_id."\" style=\"height:25px;width:25px;\"");

	$Perishable == 1?print("value=\"".$item_id.":1\" checked/>\n"):print("value=\"".$item_id.":1\" />\n");
	print("</td>\n");
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");
		print("<input type=\"text\" style=\"background-color:".$warn.";color:white;text-align:center;padding:4px;border:1px;\" name=\"in_stock_".$item_id."\" size=\"11\"  id = \"in_stock:".$item_id."\" value=\"".$in_stock."\">");
	print("</td>\n");
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");
			print("<input type=\"text\" style=\"background-color:#214128;color:white;text-align:center;padding:4px;border:1px;\" name=\"min_q_".$item_id."\" size=\"11\"  id = \"min_q:".$item_id."\" value=\"".$min_q."\">");
	print("</td>\n");
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");

	print("<select name=\"dist_".$item_id."\"  id=\"dist_id:".$item_id."\">\n");
	if($dist_id!==NULL) { print("<option value= \"".$dist_id."\">".get_name("distributer","dist_id",$dist_id)."</option>");}
		print(" ".$distoptions." \n");
        print("</select>\n");
	print("</td>\n");
	print("<td align=center style='border-color:#433C33;border-bottom-style:dotted;'>\n");
	
	print("<select name=\"mfr_".$item_id."\"  id=\"mfr_id:".$item_id."\">\n");
	if($mfr_id!==NULL) { print("<option value= \"".$mfr_id."\">".get_name("mfr","mfr_id",$mfr_id)."</option>");}
	
		print(" ".$mfroptions." \n");
        print("</select>\n");
	print("</td>\n");
//	$tr++;
//	if ($tr==3) {
		print("\t</tr>\n\t<tr>\n");
//		$tr=0;}
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
