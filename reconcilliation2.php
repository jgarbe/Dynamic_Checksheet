<?php
require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
require_once('inc/appvars.php');
$Title="Reconcilliation";
 include('inc/title.php');
// require_once("inc/functions.php.inc");






/////////Bring in the $POST
require_once('inc/connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}

if(isset($_POST['rstk'])){
	//print(" Submitted\n");
	//print_r2($_POST['rstk']);
	foreach($_POST['rstk'] as $post_ch => $glob ){
		//print("The Checksheet is ".$post_ch.".\n");
		foreach($glob as $post_cat => $globc) {
			//print("The Category is ".$post_cat.".\n");
			
		foreach($globc as $post_ID => $globID) {
			//print("The post_ID is ".$post_ID.".\n");
		foreach($globID as $post_item_id => $globn) {
			//print("The Item_id is ".$post_item_id.", and the amount is ".$globn.".\n");
	    $rpostuery = "SELECT in_stock FROM Items WHERE item_id = '".$post_item_id."'";
                     
                    if (($rpostitems = $dbc1->query($rpostuery)) == TRUE) {
                      while ($rpostb = $rpostitems->fetch_array()) {		
			$nvalue=$rpostb['in_stock'] - $globn; 
			
			
		}}
$upreq_query="UPDATE Items SET in_stock = '".$nvalue."' WHERE item_id = '".$post_item_id."' ";
        $q2 = $dbc1->query($upreq_query); 
			
  $dbc1->query("DELETE FROM requisition WHERE ch_id = '".$post_ch."' AND result = '".$globn."' AND id = '".$post_ID."'");
			
			
			
				}
				}
			}
		}
}


 $dbc1->close();



print("<link rel=\"stylesheet\" href=\"css/plaintheme/three.css\">\n");
print("<script src=\"js/jquery-1.11.0.min.js\"> </script> <!--jquery--> \n");
print("<script src=\"js/jquery-ui-1.10.4.custom.min.js\"> </script> <!--jquery--> \n");
$Title="Reconcilliation";
$Checksheetno=array();

	$BMonth=date ("m");
	
	$BYear=date ("Y");
	
	$BDay=date ("d");


//Calculate the viewed Month.
$Begdate=mktime(0,0,0,$BMonth,$BDay,$BYear);
$Enddate=mktime(23,59,59,$BMonth,$BDay,$BYear);
  // Connect to the database 
 require_once('inc/connectvars.php');
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 function print_r2 ($Array) {
	echo "<pre>";
	print_r($Array);
	echo "<pre>"; }
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function reciper($ordervalue,$table) {
require_once('inc/connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
		$sql = "SELECT ".$table.".* FROM ".$table."  WHERE  ".$table.".id = '".$ordervalue."'"; 
                        if (($recip = $dbc1->query($sql)) == TRUE) {
                      while ($rowrecipr = $recip->fetch_array(MYSQLI_NUM)) {
                             return   $rowrecipr[1];

		}
}else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
                        $recip->free();
                $dbc1->close();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function userrecip($ordervalue,$table) {
require_once('inc/connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
		$sql = "SELECT ".$table.".* FROM ".$table."  WHERE  ".$table.".user_id = '".$ordervalue."'"; 
                        if (($recip = $dbc1->query($sql)) == TRUE) {
                      while ($rowrecipr = $recip->fetch_array(MYSQLI_NUM)) {
                             return   $rowrecipr[1];

		}
}else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
                        $recip->free();
                $dbc1->close();
}
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
* 
* 
* Create the array of checksheet items to be used
* 
* 
* 
* 
*///////////////////////////////////////////////////////////////////////////////////////////////////////////
	

require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM Checksheets WHERE published = '1' AND (merged = '0' || merged IS NULL) order by id asc";
	$result=mysqli_query($dbc, $sql);
	$numrows=0;
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
					
			//$Checksheetno[] = $row[1];
			//$ch_id=$row[0];
			$smeg[$row[1]] = array();
	$numrows++;
}
	mysqli_close($dbc);

//echo "<table>";

/*
 * 
 * 
 * 
 * Finished making the arrays for the page
 * 
 * 
 * 
 * 
 * 
 */



   foreach($smeg as $CH => $i) {    //For each checksheet    
	   									$M = "";   // Empty the array
                                    $M = array();
	   require_once('inc/connectvars.php');
//require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
					if (mysqli_connect_errno()) {
					exit('Connect failed: '. mysqli_connect_error());
							}          
                     $rrequery =  "SELECT
                      requisition.id,
                      requisition.item_id,
                      requisition.result,
                      Items.min_q,
                      Items.stockable,
                      Items.in_stock,
                      Items.item_name AS i_name,
                       Category.category_name AS c_name
                        FROM requisition
                        INNER JOIN Category ON Category.category_id = requisition.category_id
                        INNER JOIN Items ON Items.item_id = requisition.item_id WHERE requisition.ch_id = '".$CH."'  ";
                      
                      
                     
                    if (($rreqitems = $dbc1->query($rrequery)) == TRUE) {
                      while ($rrowb = $rreqitems->fetch_array()) {
					$smeg[$CH][$rrowb['c_name']][$rrowb['item_id']]=array($rrowb['i_name'],$rrowb['result'],$rrowb['in_stock'],$rrowb['stockable'],$rrowb['min_q'],$rrowb['id']);
					//$smeg1[]=$rrowb['item_id'];
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
                        $rreqitems->free();
                $dbc1->close();
  
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
* 
* 
* Create the array of header checksheet items to be used
* 
* 
* 
* 
*///////////////////////////////////////////////////////////////////////////////////////////////////////////

require_once('inc/connectvars.php');
//require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
                     $requery = "SELECT req_header.hm_value_id,
                      req_header.item_id,
                      req_header.result,
                       Items.item_name AS i_name,
						Items.min_q,
						Items.stockable,
						Items.in_stock,
                        Category.category_name AS c_name
                         FROM req_header
                         INNER JOIN Category ON Category.category_id = req_header.category_id
                         INNER JOIN Items ON Items.item_id = req_header.item_id
                         WHERE req_header.ch_id = '".$CH."' ";
                     
                    if (($reqitems = $dbc1->query($requery)) == TRUE) {
                      while ($rowb = $reqitems->fetch_array()) {

                          if ($rowb['hm_value_id'] == 'refill') {
							  
					$smeg[$CH][$rowb['c_name']][$rowb['item_id']]=array($rowb['i_name'],reciper($rowb['result'],$rowb['i_name']),$rowb['in_stock'],$rowb['stockable'],$rowb['min_q'],$rowb['id']);
                                       // print("".$rowb['result']." ".$rowb['i_name']."\n");
                           //print(" <tr><td>\n");
                           // print("".$rowb['i_name']." ".reciper($rowb['result'],$rowb['i_name'])."\n");
                           //print(" </td> </tr>\n");
                          }
                          if ($rowb['hm_value_id'] == 'personnel') {
							  $smeg[$CH][$rowb['c_name']][$rowb['item_id']]=array($rowb['i_name'],userrecip($rowb['result'],"_user"),$rowb['in_stock'],$rowb['stockable'],$rowb['min_q'],$rowb['id']);
                                       // print("".$rowb['result']." ".$rowb['i_name']."\n");
                           //print(" <tr><td>\n");
                          //  print("".$rowb['i_name']."</td><td> ".userrecip($rowb['result'],_user)."\n");
                          // print(" </td> </tr>\n");
                      }
                      
                          if ($rowb['hm_value_id'] == 'miles') {
                                   if($rowb['i_name']=='Mileage') { $M[0] = $rowb['result']; $bonk=$rowb['c_name'];
                                    $smeg[$CH][$rowb['c_name']][$rowb['item_id']]=array($rowb['i_name'],$rowb['result'],$rowb['in_stock'],$rowb['stockable'],$rowb['min_q'],$rowb['id']);
                                    
                                    
                                    }
                                    if($rowb['i_name']=='Service Due') { $M[1] = $rowb['result'];
                                    $smeg[$CH][$rowb['c_name']][$rowb['item_id']]=array($rowb['i_name'],$rowb['result'],$rowb['in_stock'],$rowb['stockable'],$rowb['min_q'],$rowb['id']);
                                    }
                          // print(" <tr><td>\n");
                          // print("Test ".$M[0]."\n<br />");
                         //   print("".$rowb['i_name']."".$rowb['result']."\n");
                          // print(" </td> </tr>\n");

                  }
                   }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 

                  
                                                 if (!empty($M[0]) && !empty($M[1])) {
                                                     if($M[0] <$M[1] ) { 
                                                     $M[3] = $M[1] - $M[0];
              $smeg[$CH][$bonk][561]=array("Miles Until Due for Service",$M[3],"","","");
                                                     
                                                     
                                                     
                              // print("<tr><td colspan=\"2\">Due for service in ".$M[3] ." miles.</td></tr>\n");
                                                            
                                                         } else {
                                                             
                                                     $M[3] = $M[0] - $M[1];
                                                     
              $smeg[$CH][$bonk][561]=array("Miles Overdue for Service",$M[3],"","","");
                           //    print("<tr><td colspan=\"2\">*****".$M[3] ." miles overdue for service.****</td></tr>\n");
                                                             }
                                                     
                               } 
                        $reqitems->free();
                $dbc1->close();






}
 
////////////////////////////////////////////////////////////////////////////////////////////
//
// Ending gathering the data-- deliver the page and all of its glory.
////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
//
// Create the Jquery Scripts
////////////////////////////////////////////////////////////////////////////////////////////

print("<script>\n");

print("$(document).ready(function()\n");
print("  { \n");
	

 
 
 
 print("   }); \n");
print("</script>\n");
////////////////////////////////////////////////////////////////////////////////////////////
//
// Ending the jQuery scripts
////////////////////////////////////////////////////////////////////////////////////////////






print("</head>\n");

print("<body>\n");


//print_r2($Checksheetno);
//print("".serialize($Checksheetno)."");

////////////////////////////////////////////////////////////////////////////////////////////
//
//The first part of the table
////////////////////////////////////////////////////////////////////////////////////////////


print("<table border=\"1\" style=\"width:100%;border:1px;\">\n");


//print_r2($smeg);
foreach($smeg as $CH => $i){
print("<form id=\"redoncile_".$CH."\" name=\"redoncile_".$CH."\"  ACTION=\"".$_SERVER['PHP_SELF']."\" METHOD=\"POST\" > \n");
	//mysqli_close($dbc);
////////////////////////////////////////////////////////////////////////////////////////////
//
// Create the Jquery Scripts
////////////////////////////////////////////////////////////////////////////////////////////

print("<script>\n");

print("$(document).ready(function()\n");
print("  { \n");
	
	 print(" $('");
//	 $comma=0;
//foreach($smeg as $CH => $i){
//	$comma==0?print(""):print(",");
 print("#scramble_".$CH."");
// $comma++;
//}
 print("').click(function() {  \n");
			//print("alert('".$CH."');\n");
//print(" if ($(\"input.gr_".$CH."_checkboxes\").is(\":checked\")) {    \n");
 
//			print("alert('hmmm');\n");
 
// print("  });\n ");
  print("   }); \n");  //end of click function
 
 
 
 print("   }); \n");
print("</script>\n");
////////////////////////////////////////////////////////////////////////////////////////////
//
// Ending the jQuery scripts
////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	
	
	
	
	print("<tr><td style=\"width:45%;\">");
print("<div id=\"recon".$CH."\" style=\"width:100%; height=\"100px;scrollable:true;\"\">\n");

									$M = "";   // Empty the array
                                    $M = array();

$submitted=0;
	//print("".date('m-d-Y G:i:s',$Begdate)."<br />\n");
	//print("".date('m-d-Y G:i:s',$Enddate)."<br />\n");
	
	
	
//////////////////////////////////////////////////////////// Print the color of the fieldset	
print("<fieldset>");
print("<legend");
	require_once('inc/connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$submitsql="SELECT submitted FROM ".$CH."_events WHERE UNIX_TIMESTAMP(date) BETWEEN ".$Begdate." AND ".$Enddate."";
	$ressubmit=mysqli_query($dbc, $submitsql);
		while ($rowsubmit = mysqli_fetch_array($ressubmit)) {
					$submitted++;
					//$submitted=$rowsubmit[submitted];
					//print("The submitted button is ".$submitted."<br />\n");
				}
				$submitted>=1?print(" style=\"color:yellow;\""):print(" style=\"color:red;\"");
print(">\n");
////////////////////////////////////////////////////////////End Print the fieldset
print("".$CH." </legend>\n");



//print("<fieldset>\n");
//print("<legend>".$CH." </legend>\n");  
print("<table style=\"width:100%\">\n");

	//print("The Checksheet, ".$CH."\n");
	foreach($i as $cat => $i1) {
	//print("\t The Category, ".$cat."\n");
		foreach($i1 as $i_id => $ta){
			if($ta[3]===NULL) {
			print("<tr><td colspan=\"2\" style=\"text-align:center;color:#9FC51A;\"><strong>".$ta[0]."--".$ta[1]."</strong></td></tr>\n");
		}
	//print("<li>\t\t The Item_id, ".$i_id."</li>\n");
	//print("<li>\t\t\t The Item name is ".$ta[0]."<br /></li>");
	//print("<li>\t\t\t The result is ".$ta[1]."<br /></li>");
	//print("<li>\t\t\t The amount in stock is ".$ta[2]."<br /></li>");
	//print("<li>\t\t\t Stockable? ".$ta[3]."<br /></li>");
	//print("<li>\t\t\t Warn min_q ".$ta[4]."<br /></li>");
	//print("<li>\t\t\t  ID ".$ta[5]."<br /></li>");
	
			
		}
		
}
	foreach($i as $cat => $i1) {
	//print("\t The Category, ".$cat."\n");
		foreach($i1 as $i_id => $ta){
			if($ta[3]==1) {
			print("<tr><td ><div class=\"l\" style=\"color:#9FC51A;\">".$ta[0]."</div><div id=\"".$CH.":".$cat.":".$i_id."\" class=\"r\"  style=\"color:#9FC51A;\">Need  ".$ta[1]."</div></td>\n");
			print("<td><div class=\"r\" style=\"color:#9FC51A;\"> from the ".$cat."</div></td></tr>\n");
		}
	//print("<li>\t\t The Item_id, ".$i_id."</li>\n");
	//print("<li>\t\t\t The Item name is ".$ta[0]."<br /></li>");
	//print("<li>\t\t\t The result is ".$ta[1]."<br /></li>");
	//print("<li>\t\t\t The amount in stock is ".$ta[2]."<br /></li>");
	//print("<li>\t\t\t Stockable? ".$ta[3]."<br /></li>");
	//print("<li>\t\t\t Warn min_q ".$ta[4]."<br /></li>");
	//print("<li>\t\t\t ID ".$ta[5]."<br /></li>");
	
	
			
		}
		
}

print("</table>\n");


///
/////////////////////////////////////////////////////////////////////////////////////////////////
	
///   throw in the comments and the Maintenance
/////////////////////////////////////////////////////////////////////////////////////////////////
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
			echo "<p>";
                     $footerquery = "SELECT
                      req_footer.result,
                      Comment_._comment AS comment,
                       Items.item_name AS i_name,
                        Category.category_name AS c_name
                        FROM req_footer
                        INNER JOIN Category ON Category.category_id = req_footer.category_id
                        INNER JOIN Items ON Items.item_id = req_footer.item_id
                        INNER JOIN Comment_ ON Comment_.comment_id = req_footer.result
                         WHERE req_footer.ch_id = '".$CH."'   ";
                     
                    if (($footeritems = $dbc1->query($footerquery)) == TRUE) {
                      while ($rrowcom = $footeritems->fetch_array()) {
                            print(" <strong>Comments </strong><br/>".$rrowcom['comment']." <br />\n");
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
} 
    
echo "</p>";                    
                        $footeritems->free();
                $dbc1->close();
                
                  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
if (mysqli_connect_errno()) {
 exit('Connect failed: '. mysqli_connect_error());
}
                  // Retrieve the Maintenance data from MySQL where the maintenance is not "resolved".
  $querymaint = "SELECT Comment_._comment AS cm, DATE_FORMAT(Maintenance.date , '%M %d %Y' ) AS dt, _user.username AS un FROM  Maintenance
                            INNER JOIN _user ON _user.user_id = Maintenance.user_id
                            INNER JOIN Checksheets ON Checksheets.id = Maintenance.checksheet_id 
                            INNER JOIN Comment_ ON Comment_.comment_id = Maintenance.comments_id
                            WHERE Checksheets.ChecksheetName = '".$CH."' 
                            AND resolved = 0 ORDER BY date DESC";
                            print("<strong>Maintenance:</strong>\n");
                                if (($maintitems = $dbc1->query($querymaint)) == TRUE) {
                      while ($rrowmaint = $maintitems->fetch_array()) {
                            print(" <br/>".$rrowmaint['dt']." --".$rrowmaint['cm'].",\t".$rrowmaint['un']." <br />\n");
                    }
                    
                        } else {
 echo 'Error: '. $dbc1->error.'<br />';
}     
$maintitems->free();
                $dbc1->close();








print("</div>\n");

print("</fieldset>\n");
print("</td>\n");
print("<td><div id=\"scramble_".$CH."\" >\n");

print("<input  width=\"100px\" height=\"100px\" type=\"image\" src=\"configure/images/restock_arrow.png\" onsubmit=\"submitForm();\" id=\"".$CH."_submit\" value=\"".$CH."_submit\">   \n");

print("</div></td>\n");

//print_r2($Checksheetno);
//print("".serialize($Checksheetno)."");

//print_r2($smeg);
//print_r2($smeg1);


/*
 * The second column
 * 
 * 
 * 
 * 
 * 
 */



print("<td style=\"width:45%;\">\n");

print("<table>\n");
print("<tr><td>\n");
print("");
/////////////////////////////////////////////////////////////////
print("<script>\n");

print("$(document).ready(function()\n");
print("  { \n");

 print("   $(document).on('change','input[name=\"check_all_".$CH."\"]',function() { \n");
  print("  $('.gr_".$CH."_checkboxes').prop(\"checked\" , this.checked);   \n");
print(" });   \n");
print(" }); \n");
print("</script>\n");

////////////////////////////////////////////////////////////////////

	print("Check All\n");
	print("<input type=\"checkbox\" name=\"check_all_".$CH."\">\n");
//print("<div style=\"height:25px;\" id=\"item_".$ma."\">");
print("<div style=\"height:25px;width:500px;\">");
	print("<div class=\"l\" style=\"height:25px;\">");
		//print("<img width=\"20px\" height=\"20px\" src=\"configure/images/parcel.png\">");
		print("Item Name\n");
	print("</div>");
	print("<div class=\"r\" style=\"font-weight:bold;height:25px;\">");
		print("Amount Ordered/Amount In Stock");
	print("</div>");
	
                            print(" </td> </tr>\n");
///////////////////////////////////////////////////////////////The heading
	foreach($i as $cat => $i1) {
	//print("\t The Category, ".$cat."\n");
		foreach($i1 as $i_id => $ta){
			if($ta[3]==1) {
				
				$ta[2]<=$ta[4]?$csc="red":$csc="grey";
				$ta[2]<=$ta[1]?$rcbl=$ta[2]:$rcbl=$ta[1];
			
			print("<div id=\"reconitems\"  style=\"width:100%;\">\n");
print("<tr><td>\n");
print("<div style=\"height:25px;width:500px;\" id=\"item_".$i_id."\">");
	print("<div class=\"l\" style=\"height:25px;\">");
	
	print("<input type=\"checkbox\" id=\"rconamt:".$CH.":".$cat.":".$ta[0].":".$rcbl.":".$ta[2]."\" class=\"gr_".$CH."_checkboxes\" name=\"rstk[".$CH."][".$cat."][".$ta[5]."][".$i_id."]\" value=\"".$rcbl."\">\n");
			print("<img width=\"20px\" height=\"20px\" src=\"configure/images/parcel.png\">");
		print("".$ta[0]."");
	print("</div>");
	print("<div class=\"r\" style=\"font-weight:bold;height:25px;\">");
		print("<span id=\"rconamt:".$CH.":".$cat.":".$ta[0]."\">".$rcbl."</span>/<span id=\"stckamt:".$CH.":".$cat.":".$ta[0]."\" style=\"color:".$csc.";\">".$ta[2]."</span>");
	print("</div>");
print("</div>\n");
		}
	//print("<li>\t\t The Item_id, ".$i_id."</li>\n");
	//print("<li>\t\t\t The Item name is ".$ta[0]."<br /></li>");
	//print("<li>\t\t\t The result is ".$ta[1]."<br /></li>");
	//print("<li>\t\t\t The amount in stock is ".$ta[2]."<br /></li>");
	//print("<li>\t\t\t Stockable? ".$ta[3]."<br /></li>");
	//print("<li>\t\t\t Warn min_q ".$ta[4]."<br /></li>");
	//print("<li>\t\t\t  ID ".$ta[5]."<br /></li>");
	
		}	
}
/*
print("<div id=\"reconitems\"  style=\"width:100%;\">\n");
print("<table style=\"width:100%;\">\n");
print("<tr><td>\n");
//print("<div style=\"height:25px;\" id=\"item_".$ma."\">");
print("<div style=\"height:25px;width:500px;\" id=\"item_".$ma."\">");
	print("<div class=\"l\" style=\"height:25px;\">");
		print("<img width=\"20px\" height=\"20px\" src=\"configure/images/parcel.png\">");
		print("".$ta[0]."");
	print("</div>");
	print("<div class=\"r\" style=\"font-weight:bold;height:25px;\">");
		print("".$ta[2]."/".$ta[1]."");
	print("</div>");
print("</div>\n");
*/

print("</form>\n");
                            print(" </td> </tr>\n");



print("</table>\n");


//print(" <iframe id=\"reconitems\"  width = \"100%\" height=\"100%\" src = \"inc/reconstock_items.inc.php\"></iframe>          \n");
print("</div>\n");
print("</td></tr>\n");

}
print("</table>\n");


print("</body>\n");
print("</html>\n");
?>
