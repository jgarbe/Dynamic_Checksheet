<?php
function show_sealedlist($casc_ID) {
	
	require_once('connectvars.php');  // Set the username connection variables.
		require_once('highlight_soon_dates.inc.php');
	  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  /* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/*
 * 
 * Set up the "break the seal button"   and jquery.
 * 
 * 
 */
         $bsquery = "SELECT Checksheets.Signature,
							Checksheets.sealed,
							_user.username
							 FROM Checksheets
							 INNER JOIN _user ON _user.user_id = Checksheets.Signature
							 WHERE  Checksheets.id = ".$casc_ID." LIMIT 1";
$bsresult = mysqli_query($dbc,$bsquery) or die("The button isn't working not working");
while($rowsela = mysqli_fetch_assoc($bsresult)) {
print("<center>Seal: ".$rowsela['sealed']."</center><br />\n");
print("<center>Sealed by: ".$rowsela['username']."</center><br />\n");
print(" <center><input type=\"button\" NAME=\"seal_break".$casc_ID."\"  ID=\"seal_break".$casc_ID."\" VALUE=\"Break the ".$rowsela['sealed'].", seal.\"><br /></center> \n");

print("<script>\n");
print("$(document).ready(function(){\n");

  print("$(\"#seal_break".$casc_ID."\").click(function(){ \n");

 print("$.ajax({ \n");
 print("url: \"inc/seal_break_ajax.inc.php\", \n");    
 print("     data: \"seal=".$casc_ID."\",  \n");
// print("     dataType: 'json',                //data format       \n");
print("success: function(data){ \n");

print("location.replace('main.php?checksheet=".$_POST['checksheet']."');\n");
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

 print("   }); \n");
print("</script>\n");


}






$colcnt = 0;
print("<table  style= \"width:100%;\">\n");

    $sep_query = "SELECT sealedlist.item_id,
    sealedlist.id,
    sealedlist.hm_items,
     UNIX_TIMESTAMP(sealedlist.exp_date) AS ed,
      Items.item_name,
      Items.perishable
       FROM sealedlist 
    INNER JOIN Items on Items.item_id = sealedlist.item_id
    WHERE ch_id = '".$casc_ID."'
    ORDER BY  perishable DESC, item_name ASC";
  if($sep_data_result = mysqli_query($dbc, $sep_query)){ 
  while($sep_data = mysqli_fetch_assoc($sep_data_result)) {
print("\n");
$sep_data['ed']== 0?$edate="No Date Set":$edate=date('m/d/Y',$sep_data['ed']);
$colcnt++;
if($colcnt == 1) {
print("<tr>\n");
}
if ($sep_data['perishable']!=1){
print("<td class=\"sealed\">".$sep_data['hm_items']."</td>\n");
print("<td  class=\"sealedr\">".$sep_data['item_name']."</td>\n");
}
if($sep_data['perishable']==1){
	
print("<td  class=\"sealed\">".$sep_data['item_name']."</td>\n");
print("<td    ");

if (highlight_soon_date($sep_data['ed'])== 1 || $sep_data['ed']==0){
		print("class=\"late\"");
		} elseif (highlight_soon_date($sep_data['ed'])== 2) {
		print("class=\"soon\"");
		} else { print("class=\"sealedr\"");}

print("id=\"showdate".$casc_ID.$sep_data['id']."\">".$edate."</td>\n");

} 
if($colcnt == 2) {
print("</tr>\n");
$colcnt=0;
}



}
}

print("</table>\n");
/* close connection */
mysqli_close($dbc);
}
?>
