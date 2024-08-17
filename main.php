<?php
require_once('inc/startsession.php');
    $Title="Checksheet";
	include('inc/title.php');
	require_once('inc/connectvars.php');  // Set the username connection variables.

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
if(isset($_GET['checksheet'])) {
    $_POST['checksheet'] = $_GET['checksheet'];
    }

  // Connect to the username database 
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the user data from MySQL
$query = "SELECT user_id, first_name  FROM _user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
$data = mysqli_query($dbc, $query);
 mysqli_close($dbc);


  if (isset($_SESSION['username'])) {  //****************//If logged in
	require_once('inc/functions.php.inc'); // bring in the functions.
	require_once('inc/maintmerge.inc.php');
	require_once('inc/delayscript.inc.php'); // bring in the delay script.
	require_once('inc/setvartabs.inc.php'); // bring in the setvartabs.inc.php.
	require_once('inc/appvars.php');  // Set the Variables
	  // Generate the navigation menu


echo"<br />".$_POST['checksheet']."<br />\n";
print("<script src=\"js/jquery-1.11.0.min.js\"> </script> <!--jquery--> \n");
print("<script src=\"js/date.js\"> </script> <!--date.js--> \n");


///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//   End of Header.
//
//
//
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//
//		Moving along
//
//
//


		if (isset($_POST['Submit'])){	//The Submit button is clicked.	
							if(isset($_POST['oos_location'])){

		foreach($_POST['oos_location'] as $CHooslocation){
				print("Details of OOS Status ".$CHooslocation.".<br />\n");
				
	$checkshin =  "".$_POST['checksheet']."_checksheet";
				

		}
	
	}
/************************************************************************************************************
 * To set up mailing the checksheet uncomment these two lines
 * 
 * **********************************************************************************************************/
		
//			require_once('inc/mail_req_ajax.inc.php');
//			mailthestuff($_POST['checksheet'],$_POST['emfield']);
/*************************************************************************************************************
 * 
 * 
 * 
 * *********************************************************************************************************/
	//print("<iframe>".include("".HOME."/requisition.php?ch=".$_POST['checksheet']."</iframe>\n");
			print(" <iframe id=\"postreqman\"  width = \"75%\" src = \"".HOME."requisition.php?ch=".$_POST['checksheet']."\"></iframe>          \n");
		  //include("getrequisition.php?ch=".$Checksheetno."");
		//include("".HOME."/requisition.php?ch=".$_POST['checksheet']."");
			//print("".$_POST[attachedCH]."");
		$returnedCH=unserialize(stripslashes($_POST['attachedCH']))			;
//print_r2($returnedCH);
foreach ($returnedCH as $checksheets) {
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connectionif (mysqli_connect_errno()) {
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

$upexp_query="UPDATE ".$checksheets[0]."_events SET date = NOW(), submitted = '1' WHERE  id = '".$checksheets[1]."'";
                if($dbc1->query($upexp_query)==TRUE) { 
					//$terry[]=$checksheets[0];
					
                    } else {print("Tant work in"); }
                
                 
                $dbc1->close();
			
	  } 

}//end of submitting 'else' part of page
else {


/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
//   You first open the page and you're presented with a checksheet
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////
$Checksheetno = $_POST['checksheet'];  //declare the menu checksheet name.

//print("<br/>DBG main.php Line 330<br/>\n");
require_once('inc/data_acquisition.inc.php');
//print("<span style='color:yellow;'>DBG LINE 332 main.php</span>");print_r2($CH);
//print("<br/>DBG main.php Line 333<br/>\n");
///// Test breakdown of checksheets to be submitted
//print_r2($submit_array);
//foreach ($submit_array as $checksheets) {print("the Checksheet, ".$checksheets[0]."-- the q_set, ".$checksheets[1].". <br />\n");}
/////////////////////////////////////////////////////////////////////////////////////////////////
//   You first open the page and you're presented with a checksheet
//
//////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////  Prepare the text pages.


//print("<br/>DBG main.php Line 359<br/>\n");
include('inc/jquery_ajax_scripts.inc.php');
//print("<br/>DBG main.php Line 361<br/>\n");
/*
 * 
 * 
 * 
 * End of the jquery scripts mixed with PHP
 * 
 * 
 * 
 * 
 * 
 * 
 */
 
//print("main.php line 377 array of CH<br />\n");print_r2($CH);
  include('inc/validate.inc.php'); // bring in the requirement validation of form
setvartabs($CH);	//get the tabs ready from the $CH array. 
delaybody();		//post delayscript() script.

//print ("main.php DBG Line 1184 Checksheet array\n"); print_r2($CH); 

//print_r2($CacheCH);
//print_r2($CHcache);

//print_r2($CHcached);
//foreach($REQ as $ritems => $rname) {
 //  print_r2($rname);
     //print("".$rname[2]."");
     // foreach($rname as $reqname) {
       //   print("$reqname[2]"); }
 //  }
//print_r2($REQ);
//$reqcount = count($REQ);
//print ("the reqcount is ".$reqcount."<br />\n");
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//	// The breakdown of all of array formed.
//	foreach($CH as $no) {       //The "array" AS the "order of checksheet  no."
//	foreach($no as $casc_id) {     //The "order of checksheet  no." AS "The checksheet_id" array.
//		$Checksheetno=$casc_id[0];   //The "Checksheet Name"
//		//$sealable=$casc_id[1];       //If the checksheet is sealable
//		//$sealed=$casc_id[2];			// If the checksheet is sealed
//		//$Signature=$casc_id[3];		// If it IS sealed -- who sealed it
//		//$qset=$casc_id[5];			// The database id no.	
//		$Cats=$casc_id[4];
//		//print("$Checksheetno<BR>\n");
//		//print_r2($Cats);
//	foreach($Cats as $Checkrow)	{
//	foreach($Checkrow as $catarray_id =>  $catname) {
//		$CATEGORY=$catname[0];
//		$Catarray=$catname[1];
//		//print("$CATEGORY<BR>\n");
//		//print_r2($catname[1]);
//	foreach($Catarray as $Subcatrow)	{
//	foreach($Subcatrow as $subcatarray_id =>  $subcatname) {
//		$SUBCATEGORY=$subcatname[0];
//		$SUBCATCOLS=$subcatname[1];
//		$Itemsarray=$subcatname[2];
//		//print("$SUBCATEGORY<BR>\n");
//		//print("$SUBCATCOLS<BR>\n");
//		//print_r2($Itemsarray);
//	foreach($Itemsarray as $Itemstuff)	{
//		$Item_id=$Itemstuff[0];
//		$Itemname=$Itemstuff[1];
//		$HowMany=$Itemstuff[2];
//		$perishable=$Itemstuff[3];
//		$req=$Itemstuff[4];
//		//print_r2($Itemstuff);
//		//print("$Itemname<BR>\n");
//		//print("$HowMany<BR>\n");
//		//print("$Item_id<BR>\n");
//      }
//		}}
//		}}
//		}}
//
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////




print("<table width=\"90%\">\n");
print("<tr><td width=\"85%\">\n");


//print("<span id=\"reqman\" width=\"75%\" style=\"background:grey;color:white;\">\n");
//print(" <iframe id=\"reqman\"  width = \"75%\" src = \"requisition.php?ch=".$_POST['checksheet']."\"></iframe>          \n");

print(" <div  id=\"reqman\" width=\"75%\" style=\"background:#273527;color:white;overflow-y:scroll; height:85px;\">\n");

print(" </div>      \n");
//print("</span>\n");


print("</td><td>\n");
/////////////////////// inside table
print("<table>\n");
print("<tr><td>\n");

//print("<input type=\"reset\"   id=\"reload\">  \n");

//print("<a href=main.php?checksheet=".$_POST['checksheet']."  id=\"reload\" style=\"color:red;\">Reset Form</a>  \n");
print("<INPUT TYPE=\"button\" value=\"Reset Form\" id=\"reload\" \">  \n");
print("</td></tr><tr><td>\n");

print("<INPUT TYPE=\"button\" value=\"Append Maintenance\" onClick=\"window.open('Maintenance.php?checksheet=".$ID."')\">  \n");
print("</td></tr><tr><td>\n");

print("<INPUT TYPE=\"button\" value=\"View Printable Checksheet!\" onClick=\"window.open('tmp/".$_POST['checksheet']."print.pdf')\"> \n");


print("</td></tr>\n");
print("</table>\n");
/////////////////////// end of inside table
print("</td></tr>\n");
print("</table>\n");

//print_r2($submit_array);

//print("<INPUT TYPE=\"button\" value=\"View Requesition Order!\" onClick=\"window.open(' requisition.php?ch=".$_POST['checksheet']."')\"> \n");
print("<FORM  ID=\"Main\" name=\"mainCheckSheet\" ACTION=\"". $_SERVER['PHP_SELF']."\" METHOD=\"POST\" onSubmit=\"return checkForm(this);\"> \n");

/*
 * 
 * Email for Demo
 * 
 * 
 * 
*/
//print("<label for=\"emfield\">Demo, email: </label>\n");
//print("<input class=\"left\" id=\"emfield\" name=\"emfield\">\n");
//print("NOTE: We hate SPAM and understand that this will not be saved or used beyond this single demonstration.\n");
/*
 * 
 * End of Email for Demo 
 * 
 * */
 
//print("<center>\n");
print("<span id=\"oos_location_span\"></span>\n");
print(" <INPUT TYPE=\"submit\"  NAME=\"Submit\"  ID=\"Main\" VALUE=\"Submit\" >  \n");
print(" <div class=page>  \n");

print("	<input type='hidden' name='checksheet' value='".$_POST['checksheet']."' />   \n");
print("	<input type='hidden' name='attachedCH' value='".serialize($submit_array)."' />   \n");
//print_r2($submit_array);
//print("<span style='color:yellow;'>DBG LINE 511 main.php</span>");print_r2($CH);
	require_once('inc/getcat.inc.php'); // bring in the functions.
getcat($CH); //Place the Tabs prepaired from the setvartabs function
//Now place the stuff under the tabs.
$cattab=1;  // start the count

foreach($CH as $no) {  //print("main.php DBG LINE 1282 -- CH is ".$CH."<br />\n ");
foreach($no as $casc_ID=>$casc_id) { //print("main.php DBG LINE 1283 -- casc_ID is ".$casc_ID."<br />\n ");
		$Checksheetno=$casc_id[0];
		$sealable = $casc_id[1];//print("Sealable: ".$sealable."<br>\n");
		$sealed = $casc_id[2];  //print("DBG LINE 522 main.php -- Sealed: ".$sealed."<br>\n");
		$Signature = _user_idtoname($casc_id[3]);
		$q_set = $casc_id[4];
		$Cats=$casc_id[5];
		//print("Over the $casc_ID<br>");
//print("The casc_ID is $casc_ID<br />\n");
		//print("main.php DBG LINE 528 ");print_r2($Cats);

	foreach($Cats as $Checkrow)	{
	foreach($Checkrow as $catarray_id =>  $catname) {
		//print("main.php DBG LINE 532 catarray_id = ".$catarray_id."\n");
		$CATEGORY=$catname[0];
		$Catarray=$catname[1];
	//		print("main.php DBG LINE 1299 Catarray \n");print_r2($Catarray);
		$cat_id=$catarray_id;

			if ($cattab == 1) { //if it's the first tab--visible
				print("<div id='tab".$cattab."' class='tabContent'  style='display:block'><br>\n");
			}
			else { //if it's not the first tab--hidden
				print("<div id='tab".$cattab."' class='tabContent'><br>\n");
			}

//print("main.php DBG LINE 545 ".$CATEGORY."<br />\n");
		//print_r2($catname[1]);
			//print("main.php DBG LINE 547 --The cattab ".$cattab." \n");
			$cattab=$cattab+1;



//print("main.php line552 include category_select2.inc.php");
			include("inc/category_select2.inc.php");









print("</div>\n");    // End of the cattab div

} //End of foreach $Checksheetno
	 }   // End of For each Category
	 
	 
	 
	 }   // End of $no as $casc_ID=>$casc_id
//////////////////////////////////////Test	 
//print (" main.php DBG Line 568  CH Array\n"); print_r2($CH);
//////////////////////////////////////TEST 
	} // End of for each $CH

  mysqli_close($dbc);

	print("\n<input type=\"hidden\" name=\"CHqset[".$casc_ID."]\" value=\"".$q_set."\">\n");







// print("<center><INPUT TYPE=\"submit\"  NAME=\"Update\"  ID=\"Main\" VALUE=\"Update\" >\n");

print(" </FORM> \n");



 
//print ("main.php DBG Line 1493 $CH array\n"); print_r2($CH); 
/*
 * 
 * 
 *   		End of the Checksheet
 * 
 * 			Merge the Maintenance Notes  
 * 
 * 
 * 
 * 
 */
print ("</div>");
print ("<div style=clear:all;>");

foreach($CH as $no) {
foreach($no as $casc_ID=>$casc_id) {

	smaintmerge($casc_ID,$q_set);  //Merge the Maintenance data to the Requisition and Checksheet order.
}
}
echo"</div>";
  
//print_r2($REQ);
//print_r2($Chqset);
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//    End of Checksheet
//
/////////////////////////////////////////////////////////////////////////////////////////////////////

}   //End of Checksheet




} else {   //  If you're not logged in 

	  // Generate the navigation menu
//  echo ' <a href="login.php">Log In</a><br />';
//    echo ' <a href="signup.php">Sign Up</a>';
 } 



print("</div>\n");



 require("inc/footer.inc");  ?>
</body>

</html>

