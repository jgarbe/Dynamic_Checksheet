<?php
   require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
  require_once('inc/appvars.php');
  $Title="Merge Editing";
  require_once('inc/title.php');
?>



<?php
  require_once('inc/connectvars.php');

  // Generate the navigation menu
  if (isset($_SESSION['username']) && ($_SESSION['status'] == 1)) {


  }
  else {
    echo ' <a href="login.php">Log In As An Administrator(' . $_SESSION['username'] . ').</a><br />';
   //echo ' <a href="signup.php">Sign Up</a>';
  } 
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the user data from MySQL
  $query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
  $data = mysqli_query($dbc, $query);

  mysqli_close($dbc);
print("</div>");


////////////////////////////////////////////////
///////////////////////////////////////////////
////////////////////////////////////////////////
///////////////////////////////////////////////
//////////////////////////////////////////////
print("<html>\n");
print("<head>\n");
print("<link rel=\"stylesheet\" href=\"css/plaintheme/three.css\">\n");
print("<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js\"> </script> <!--jquery--> \n");
print("<script src=\"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js\"> </script> <!--jquery--> \n");
$Title="Merge Alterations";
  // Connect to the database 
 require_once('inc/connectvars.php');
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function print_r2 ($Array) {
	echo "<pre>";
	print_r($Array);
	echo "<pre>"; }
	
function is_even( $int ) {
    return !( ( ( int ) $int ) & 1 );
}	


/*******************************************************
 * 
 * 
 * 	// Get all of the checksheets
 * 
 * 
 * ***************************************************/	
	

require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM Checksheets WHERE (merged = '0' || merged IS NULL) order by id asc";
	$result=mysqli_query($dbc, $sql);

		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
					$checksheets[$row[0]][0]=$row[1];
			$sql2="SELECT * FROM Checksheets WHERE merged = '".$row[0]."' order by id asc";
					$result2=mysqli_query($dbc, $sql2);

			while ($row2 = mysqli_fetch_array($result2, MYSQL_NUM)) {
				$checksheets[$row[0]][1][]=array($row2[0],$row2[1]);
															}
}

					$checksheets[0][0]="<font style=\"color:yellow;\">Limbo</font>";
//print_r2($checksheets);
 

foreach($checksheets as $ch_id => $ch_arr){
	
//	print("".$ch_id."--".$ch_arr[0]."<br />\n");
//	print_r2($ch_arr[1]);

//	if(!empty($ch_arr[1][0])) {			// If the Checksheet has merged checksheets
//	print("".$ch_arr[1][0]."<br />\n");}
//	if(empty($ch_arr[1][0])) {			// If the Checksheet is by itself
//	print("Here<br />\n");}
	
	
	//		foreach($ch_arr[1] as $ch_mgd) {
//		print("".$ch_mgd[0]."\n");
//		print("--".$ch_mgd[1]."<br />\n");
//		}
	}

/*******************************************************
 * 
 * 
 * 	
 * 
 * 
 * ***************************************************/	
 
 print("<style>\n #right_side{\n\t float:right;width: 50%;\n}\n#left_side {\n\t  width: 50%;float:left;\n}\n\n#both_sides {\n\t  width: 850px ;\n\t margin-left: auto ;\n\t  margin-right: auto ;\n}\n\n</style>");
/********************************************************************
 * 
 * 
 * 
 * The Jquery calls first from the array
 * 
 * 
 * 
 * *******************************************************************/

foreach($checksheets as $ch_id => $ch_arr) {
	print("<script>\n");
	print(" $(document).ready(function(){\n");
	
print(" $('");

$itd=0;
foreach($ch_arr[1] as $ch_mgd) {
	if($itd!=0) {print(", ");}
print("#checksheet_".$ch_mgd[0]."");
$itd++;
}

	if(empty($ch_arr[1][0])) {			// If the Checksheet is by itself
	if($itd!=0) {print(", ");}
print("#checksheet_".$ch_id."");
	}

print("').draggable({ \n");
//print("	revert: \"invalid\",   \n");
//print(" 	containment: \"document\",    \n");
print("	helper: \"clone\", \n");
print("	cursor: \"pointer\", \n");
print(" start: function() {\n");
print("var dragged_id = $(this).attr(\"id\"); }\n");

print(" });\n");
	print(" $('#recon".$ch_id."').droppable({   \n");
	print("drop: function(event, ui) {\n");
	print("if (ui.draggable.attr(\"id\").slice(11) == ".$ch_id.") { } else {");
	print("var uid = ui.draggable.attr(\"id\").slice(11) + \":".$ch_id."\";\n");
	print("alert(uid);\n");


   print("$.ajax({ \n");
 print("url: \"inc/ajax_merges.inc.php\", \n");    
 print("     data: \"merge=\" + uid ,   \n");
 print("	cache: false	,					\n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
//print("alert(data); \n"); // test
print("location.replace('merge_drag.php');\n");   //reload the page
 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print(" }) }; \n");












	print("   }\n ");
	
	print("});\n");

	print("});\n");
	print("</script>\n");
}




/***********************************
 * Start the page
 * 
 * ************************************/

print("</head>\n");

print("<body>\n");

print("<div> \n");
print("<p>\"Limbo\"-- Drop Box to detach the checksheet.<br />\n");
print("\"Hold\"-- Helper Drop Box to move the checksheet from side to side.<br />\n");
print("<img width=\"20px\" height=\"20px\" src=\"configure/images/parcel.png\">--Draggable checksheet.<br />\n");
print("</div> \n");
print("<div id=\"both_sides\">\n");   //divide the page into two sides





print("<div id=\"left_side\" style=\"height:800px;overflow-y:scroll;\">\n");    //the left side

foreach($checksheets as $ch_id => $ch_arr) {
	if(is_even($ch_id)){
print("<div  style=\"width:400px;\">\n");

	
                           

print("<table style=\"width:400px;border:1px solid white;\">\n");
print("<tr><td>\n");

		print("<div id=\"recon".$ch_id."\" class=\"drop_box\"><h2 align=\"center\">".$ch_arr[0]."\n");
		if(empty($ch_arr[1][0]) && $ch_id!=0 && $ch_id!=2000000001 && $ch_id!=200000000) {			// If the Checksheet is by itself
print("<div>\n");
		print(" <img width=\"30px\" height=\"30px\" id=\"checksheet_".$ch_id."\"  src=\"configure/images/parcel.png\">\n");
		print("</div></h2>\n");
							}
		print(" </div>\n");

								
                            print(" </td> </tr>\n");
foreach($ch_arr[1] as $ch_mgd) {
                           //print("Item id ".$ma."\n");
                           //print("Item name ".$ta[0]."\n");
                           //print("Item in_stock ".$ta[1]."\n");
print("<tr><td>\n");
//print("<div style=\"height:25px;\" id=\"item_".$ma."\">");
print("<div style=\"height:35px;width:400px;\" id=\"checksheet_".$ch_mgd[0]."\">");
	print("<div class=\"r\" style=\"height:30px;\">");
		print("<img width=\"30px\" height=\"30px\" src=\"configure/images/parcel.png\">");
		print("".$ch_mgd[1]."");
	print("</div>");
print("</div>\n");
                            print(" </td> </tr>\n");

}

print("</table>\n");






print("</div>\n");

}

}





print("</div>\n");  //End of Left Side 



print("<div id=\"right_side\"  style=\"height:800px;overflow-y:scroll;\">\n");

foreach($checksheets as $ch_id => $ch_arr) {
	if(!is_even($ch_id)){
print("<div style=\"width:400px;\">\n");

	

                           

print("<table style=\"width:400px;border:1px solid white;\">\n");
print("<tr><td>\n");

		print("<div id=\"recon".$ch_id."\" class=\"drop_box\"><h2 align=\"center\">".$ch_arr[0]."\n");
		if(empty($ch_arr[1][0]) && $ch_id!=0 && $ch_id!=2000000001 && $ch_id!=200000000) {			// If the Checksheet is by itself
print("<div>\n");
		print(" <img width=\"30px\" height=\"30px\" id=\"checksheet_".$ch_id."\"  src=\"configure/images/parcel.png\">\n");
		print("</div></h2>\n");
							}
		print(" </div>\n");
	
                            print(" </td> </tr>\n");
foreach($ch_arr[1] as $ch_mgd) {
                           //print("Item id ".$ma."\n");
                           //print("Item name ".$ta[0]."\n");
                           //print("Item in_stock ".$ta[1]."\n");
print("<tr><td style=\"text-align:center;\">\n");
print("<div style=\"height:35px;width:400px;\" id=\"checksheet_".$ch_mgd[0]."\">");
	print("<div class=\"l\" style=\"height:30px;\">");
		print("<img width=\"30px\" height=\"30px\" src=\"configure/images/parcel.png\">");
		print("".$ch_mgd[1]."");
	print("</div>");
print("</div>\n");
                            print(" </td> </tr>\n");

}

print("</table>\n");






print("</div>\n");


}
}
print("</div>\n");
print("\n");
print("\n");
print("\n");
print("\n");
print("\n");
print("</div>\n");


print("</body>\n");
print("</html>\n");
?>
