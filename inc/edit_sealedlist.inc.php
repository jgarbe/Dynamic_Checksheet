<?php
function edit_sealedlist($casc_ID,$CATEGORY) {
	require_once('highlight_soon_dates.inc.php');
	 
	     print("  <label for=\"sealno".$casc_ID."\">Seal ID</label><br /><input type=\"text\" size=\"20\" id=\"sealno".$casc_ID."\" name=\"sealno".$casc_ID."\"  /></td>");
	 
	 		print(" <center><INPUT TYPE=\"button\"  NAME=\"seal_button".$casc_ID."\"  ID=\"seal_button".$casc_ID."\" VALUE=\"Seal ".$CATEGORY."\"> </center> \n");
	
	
	
	
	
	
	
	
		require_once('connectvars.php');
	  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  /* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$colcnt = 0;
print("<table  style= \"width:100%;\">\n");

    $sep_hquery = "SELECT DISTINCT sealedlist.item_id,
      Items.item_name
       FROM sealedlist 
    INNER JOIN Items on Items.item_id = sealedlist.item_id
    WHERE ch_id = '".$casc_ID."' AND perishable = '1'
    ORDER BY  item_name ASC";
  if($sep_hdata_result = mysqli_query($dbc, $sep_hquery)){ 
  while($sep_hdata = mysqli_fetch_assoc($sep_hdata_result)) {

		print("<tr><td colspan=\"4\"class=\"th\"> ".$sep_hdata['item_name']."</td></tr>\n");

    $sep_query = "SELECT sealedlist.id,
     UNIX_TIMESTAMP(sealedlist.exp_date) AS expdt
       FROM sealedlist 
    WHERE ch_id = '".$casc_ID."' AND item_id = '".$sep_hdata['item_id']."'
    ORDER BY  id";
  if($sep_data_result = mysqli_query($dbc, $sep_query)){ 
  while($sep_data = mysqli_fetch_assoc($sep_data_result)) {
print("\n");

$colcnt++;
if($colcnt == 1) {
print("<tr>\n");
}
$nosdate="";
$vdate="";



if($sep_data['expdt']==0) {$nosdate="No Date Set" ; $vdate = "";} 

/*
 * 
 * 
 * This is a script  for the Demo to generate random dates for the perishables
 * Comment them out to run a real checksheet.
 * 
 * 
 * 
 *
 if($sep_data[expdt]==0) {
	 $randomtimespan = rand(time(),time()+(60*60*24*30*12*2)); //random date over roughly the next couple of years
	 
	 
//$randomtimespan;
$nosdate=date('m-d-Y',$randomtimespan) ; $vdate = $vdate=date('mdY',$randomtimespan);
	 }
 
*
  * 
  * 
  * 
  * 
  * 
  * 
  * 
  */




else { $nosdate=date('m/d/Y',$sep_data['expdt']); 
$vdate=date('mdY',$sep_data['expdt']);
}

print("<td  class=\"sealed\">".$sep_hdata['item_name']."</td>\n");
	print("<td ");
	
if (highlight_soon_date($sep_data['expdt'])== 1 || $sep_data['expdt']==0){
		print("class=\"late\"");
		} elseif (highlight_soon_date($sep_data['expdt'])== 2) {
		print("class=\"soon\"");
		} else { print("class=\"sealedr\"");}
		
	print("  ><span id=\"sp".$sep_data['id']."\" >".$nosdate."</span>\n");
    print("  <input type=\"text\" size=\"8\" id=\"newexpdate:".$sep_data['id']."\" name=\"newexpdate:".$sep_data['id']."\"  value=\"".$vdate."\"/><label for=\"newexpdate:".$sep_data['id']."\">(MMDDYYYY) Exp. Date </label></td>");
/*
 * 
 * ajax query for editing dates 
 * 
 */
 

print("<script>\n");
//print(" if(Date.compare(Date.parse('".$nosdate."'), Date.parse('+ 1 month')) == 1 ) {\n");

//print("alert('Check');\n");
//print(" }\n");




print("$(document).ready(function(){\n");




  print("$('[id=\"newexpdate:".$sep_data['id']."\"]').blur(function(){ \n");
  
  print("var edit_exp = $('[id=\"newexpdate:".$sep_data['id']."\"]').val(); \n");
//print(" alert(edit_exp);\n");  //test
 print("$.ajax({ \n");
 print("url: \"inc/edit_exp_ajax.inc.php\", \n");    
 print("     data: \"expp_id=newexpdate:".$sep_data['id'].":\" + edit_exp,   \n");
 print("     dataType: 'json',                //data format       \n");
 print("success: function(data){ \n");
 
 print("       var return_id = data[0];           //id\n");
print("       var exp = data[1];           //event_id\n");

//print("alert (return_id);\n");
print(" $('#sp".$sep_data['id']."').text(exp);\n");
 //print("alert(result); \n");  //test
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");
 print(" }); \n");
print("\n");
print("\n");
print("\n");
print("\n");
print("\n");
print("\n");
  print("$(\"#seal_button".$casc_ID."\").click(function(){ \n");
  
  print("var sealno = $(\"#sealno".$casc_ID."\").val(); \n");
//print(" alert(\"this is the \" + sealno);\n");  //test
print("if (sealno ==\"\")  { \n");
print(" alert(\"There must be an input to the Seal ID.\");\n");
print(" } else { \n");
 print("$.ajax({ \n");
 print("url: \"inc/seal_box_ajax.inc.php\", \n");    
 print("     data: \"seal=\" + sealno + \":".$_SESSION['user_id'].":".$casc_ID."\",  \n");
// print("     dataType: 'json',                //data format       \n");
print("success: function(data){ \n");

print("location.replace('main.php?checksheet=".$_POST['checksheet']."');\n");
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
 print("  }\n");
 print(" }); \n");
print("\n");
print("\n");
print("\n");
print("\n");
print("\n");
print("\n");

 print("   }); \n");
print("</script>\n");




if($colcnt == 2) {
print("</tr>\n");
$colcnt=0;
}



}
}
}}  //End setting the headers

$colcnt = 0;
   $sep_nquery = "SELECT sealedlist.item_id,
    sealedlist.hm_items,
     sealedlist.exp_date,
      Items.item_name,
      Items.perishable
       FROM sealedlist 
    INNER JOIN Items on Items.item_id = sealedlist.item_id
    WHERE ch_id = '".$casc_ID."' AND perishable IS NULL
    ORDER BY  item_name ASC";
  if($sep_ndata_result = mysqli_query($dbc, $sep_nquery)){ 
  while($sep_ndata = mysqli_fetch_assoc($sep_ndata_result)) {
print("\n");
$colcnt++;
if($colcnt == 1) {
print("<tr>\n");
}

print("<td class=\"sealed\">".$sep_ndata['hm_items']."</td>\n");
print("<td  class=\"sealedr\">".$sep_ndata['item_name']."</td>\n");


if($colcnt == 2) {
print("</tr>\n");
$colcnt=0;
}
}}
print("</table>\n");
/* close connection */
mysqli_close($dbc);
}
?>
