<?php
   require_once('inc/startsession.php');
  require_once('inc/appvars.php');

/////////////////////////////////////////////////////////////////////
//
//	Written by Jim Garbe-- Dynamic Checksheet
//
/////////////////////////////////////////////////////////////////////
print("<html>\n");
  $Title="Seal list Box";
  require_once('inc/title.php'); //Bring in the header
 require_once("inc/functions.php.inc");
  require_once('inc/connectvars.php');
require_once('js/dyn_perishables.inc.php');


print("<div class=\"content\">\n");
require_once('inc/testperishables_array.inc.php');
//print_r2($testperishables);
print("<table border=\"1\" style=\"width:100%;\">\n");
foreach($testperishables as $perishables) {
    

    print("\n<tr>\n\t<th>\n\t\t".$perishables."\n\t</th>\n</tr>\n");
print("\n<tr>\n\t<td style=\"text-align:center;\">\n");


print("<form id=\"".$perishables."\" name=\"".$perishables."\">\n");

print("<select name=\"".$perishables."_Count\" onChange=\"addRows('".$perishables."_Count_T','".$perishables."',this.value);\">\n");
print("<option value=\"\">How Many?</option>\n");
for($i=2;$i<16;$i++){
   print("<option value=\"".$i."\">".$i."</option>\n");
       }
print("</select>\n");
print("<table border=\"1\" id=\"".$perishables."_Count_T\">\n");
//print("<tfoot><tr><td>Remove</td><td>No.</td><td>Month</td><td>Day</td><td>Year</td></tr></tfoot>\n");
 print("\n\t       <tr>  \n");
  print("\n\t                  <td><input type=\"button\" name=\"remove[".$perishables."][0]\" value=\"remove\" /></td>  \n");
  print("\n\t                  <td> 1 ".$perishables."</td>  \n");
  print("\n\t                  <td>  \n");
  print(" <select name=\"Mnth[".$perishables."][0]\">   \n");
  print("\t\t <option value=\"\">MM</option>\n");
  for($Mnth = 1; $Mnth < 13; $Mnth++) {
  print("\t\t <option value=\"".$Mnth."\">".$Mnth."</option>\n");
  }
  print(" </select>   \n");
  print("\t </td>  \n");
  print("\n\t                  <td>  \n");
  print(" <select name=\"Day[".$perishables."][0]\">   \n");
  print("\t\t <option value=\"\">DD</option>\n");
  for($Day = 1; $Day < 32; $Day++) {
  print("\t\t <option value=\"".$Day."\">".$Day."</option>\n");
  }
  print(" </select>   \n");
  print("\t </td>  \n");
  print("\n\t                  <td>  \n");
  print(" <select name=\"Year[".$perishables."][0]\">   \n");
  print("\t\t <option value=\"\">YYYY</option>\n");
  for($Year = date('Y') ; $Year < date('Y') + 10; $Year++) {
  print("\t\t <option value=\"".$Year."\">".$Year."</option>\n");
  }
  print(" </select>   \n");
  print("\t </td>  \n");
  print("\n\t              </tr>   \n");
print("</table>\n");
print("</form>\n");

print("\n\t</td>\n</tr>\n");
}
print("</table>\n");
print("</div>\n");
?>
<div class="push"></div>

</body>
</html>
