<?php
require_once('inc/startsession.php');
/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
require_once('inc/appvars.php');
$Title="Inventory Page";
 include('inc/title.php');
// require_once("inc/functions.php.inc");

 
  require_once('inc/connectvars.php');


?>
</div>

<?php


    if (isset($_SESSION['user_id']) && ($_SESSION['status'] < 3)) {
	?>
<div class = indexing style="text-align:center;">
	<fieldset><legend>Checksheet</legend>
<?php		
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Supply Checksheet\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='checksheet.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Printable Cheatsheet\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\"  onClick=\"location.href='PrintableChecksheet.inc.php'\"></li>\n");

		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Archived Checksheets\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\"  onClick=\"location.href='Arch_menu.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Expiration Dates\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\"  onClick=\"location.href='check_exp_dates.php'\"></li>\n");
		
		
?>
</fieldset>
	<?php
	if($_SESSION['status'] == 1){ // Administrator
	    print("<br /><br /><h3 style=\"text-align:center;\">Administration</h3>\n");
		print("<fieldset><legend>Reconcilliation</legend>\n");
		
		print("<ul>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Reconcilliation\"   style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='reconcilliation2.php'\"></li>\n");	
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Stock Room\"   style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='Stock.php'\"></li>\n");	
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Manufacturers\"   style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='Manufacturers.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Distributers\"   style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='Distributers.php'\"></li>\n");	
		print("</ul>\n");
		
		print("</fieldset><br />\n");

/*
 * 
 * 			User administration 
 * 
 */
	
    print("<br /><br /><h3 style=\"text-align:center;\">Administration</h3>\n");
		print("<fieldset><legend>Users</legend>\n");
		
		print("<ul>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"User Administration\"   style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='activateuser.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Reset All Passwords\"   style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='Resetallusers.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Reset Single User\"   style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='resetsingleuser.php'\"></li>\n");
	
		print("</ul>\n");
		?>
		</fieldset><br />
		<fieldset><legend>Checksheet Building</legend>
		<?php
		
		print("<ul>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Create a Checksheet\"     style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='catcheck.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Merge Alterations\"     style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='merge_drag.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Clone a Checksheet\"     style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='clonetable.inc.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Edit a Checksheet\"     style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='checksheet_ajax_edit.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Create Categories\"     style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='create_cat.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Create Subcategories\"     style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='create_sub.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Create Items\"     style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\" onClick=\"location.href='create_items.php'\"></li>\n");
		
		print("</ul>\n");
		?>

		</fieldset>
		<fieldset><legend>Queries</legend>
		<?php
		
		print("<ul>\n");

		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Where was it?\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\"  onClick=\"location.href='where.php'\"></li>\n");
		// Don't awant to release this yet-- it's "buggy"
		//print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Reports on Item Requisitions\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\"  onClick=\"location.href='ItemUsage.php'\"></li>\n");
		
		print("</ul>\n");
		?>
		
		</fieldset>
		<fieldset><legend>Vehicle Maintenance</legend>
		<?php
		
		print("<ul>\n");
			print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Daily Requesition Log\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\"  onClick=\"location.href='maint.php'\"></li>\n");
		print("<li style=\"display:inline;\"><INPUT TYPE=\"button\" value=\"Maintenance Requesition by Vehicle\"  style= \"color:421a02;background-color:#c3ae59;font-size:1.1em;font-weight:bold;\"  onClick=\"location.href='Maintain.php'\"></li>\n");
		
		print("</ul>\n");
		?>
		
		</fieldset>

		 <?php
				}
?>
</div>



<?php
} else {
	print("<div style=\"text-align:center;\">\n");
	print("<h2>Demo</h2>\n");
	print("<p>To play with the demo, login with the following:</p>\n");
	print("<table width=\"100%\">\n");
	print("<tr>\n");
	print("<td colspan=\"2\" style=\"text-align:center;padding:1em;\"><h3>As User</h3></td>\n");
	print("</tr>\n");
	print("<tr>\n");
	print("<td width=\"50%\" style=\"text-align:center;color:gray;\">username:\n");
	print("cheese</td>\n");
	print("</tr><tr>\n");
	print("<td style=\"text-align:center;color:gray;\">password:\n");
	print("wiz</td>\n");
	print("</tr><tr>\n");
	print("<td colspan=\"2\" style=\"text-align:center;padding:1em;\"><h3>As Administrator</h3></td>\n");
	print("</tr><tr>\n");
	print("<td style=\"text-align:center;color:gray;\">username:\n");
	print("cheddar</td>\n");
	print("</tr><tr>\n");
	print("<td style=\"text-align:center;color:gray;\">password:\n");
	print("cheese</td>\n");
	print("</tr>\n");
	print("</table>\n");
	print("<p style=\"color:gray;font-size:0.85em;\">NOTE:  The Demo resets on the top of every hour.<br />  All changes will be lost.</p>\n");
	print("</div>\n");
}

?> 
<div class="push"></div>


<div class="footer">


<!-- <a href="dynRSSfeed.php">
<img style="verticle-align:top; border:none;" src="rssicon.png" alt="Checksheets" />Checksheets via News Feeder</a>  -->


</div>
  </div>
