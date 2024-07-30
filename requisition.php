<?php
$Checksheetno = $_GET['ch'];

 print("<html>\n");
 print(" <head> \n");
print("<script src=\"js/jquery-1.11.0.min.js\"> </script> <!--jquery--> \n");
print("</script> \n");

print(" <script type=\"text/javascript\"> \n");

 print("$(document).ready(function() {  \n");


 print("     $.ajax({    //create an ajax request to load_page.php   \n");
 print("       url: \"inc/getrequisition.php\",      \n");  
 print("     data: \"ch=".$Checksheetno."\", \n");
 print("       dataType: \"html\",   //expect html to be returned                \n");
  print("      success: function(response){                    \n");
  print("          $(\"#responsecontainer\").html(response);    \n");
 print("          //alert(response);      \n");
 print("       }     \n");

 print("   });      \n");
print("    });      \n");

print("     </script>       \n");
print(" </head> \n");
print(" <body> \n");
print(" <div id=\"responsecontainer\" align=\"left\">      \n");

print(" </div>      \n");
print(" </body>      \n");
print(" </html>      \n");
  
  ?>
