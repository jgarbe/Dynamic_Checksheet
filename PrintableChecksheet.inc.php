<?php
require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
require_once('inc/appvars.php');
$Title="Printable Checksheet";
 include('inc/title.php');

 
require_once('inc/functions.php.inc');
  require_once('inc/appvars.php');
  require_once('inc/connectvars.php');


?>
</div>

<?php


    if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {
	?>
<div class = indexing style="text-align:center;">
	<fieldset><legend>Checksheet</legend>
<?php		
	$name='Checksheets';
	

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql="SELECT * FROM ".$name." WHERE veh = '1' order by id asc";
	$result=mysqli_query($dbc, $sql);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) {
				$OName[$row[0]] = $row[1]; }
foreach($OName as $chno => $CName) {		
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"".$CName."\" ");
		if (file_exists("tmp/".$CName."print.pdf")) { 
		print(" style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\"  onClick=\"window.open('".HOME."/tmp/".$CName."print.pdf')\">");
		}else{
			print(" style= \"color:421a02;background-color:#7F7961;font-size:1em;\" >"); }
		print("</li>\n");
			
}

		
		
?>
</fieldset>
<?php
	if($_SESSION['status'] == 1){ // Administrator
		
		
print("\n");
print("\n");
print("\n");
print("\n");
print("\n");
}

?> 
<div class="push"></div>


<div class="footer">


<!-- <a href="dynRSSfeed.php">
<img style="verticle-align:top; border:none;" src="rssicon.png" alt="Checksheets" />Checksheets via News Feeder</a>  -->


</div>
  </div>
<?php
}


?>
