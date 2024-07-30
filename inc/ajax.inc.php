<?php
// XHHTPXML redundancy stuff
         print(" return;\n"); 
         print("}\n"); 
         print("if (window.XMLHttpRequest)\n"); 
         print("{// code for IE7+, Firefox, Chrome, Opera, Safari\n"); 
         print("xmlhttp=new XMLHttpRequest();\n"); 
         print("}\n"); 
         print("else\n"); 
         print("{// code for IE6, IE5\n"); 
         print("xmlhttp=new ActiveXObject(\"Microsoft.XMLHTTP\");\n"); 
         print("}\n"); 
         print("xmlhttp.onreadystatechange=function()\n"); 
         print("{\n"); 
         print("if (xmlhttp.readyState==4 && xmlhttp.status==200)\n"); 
         print("{\n"); 
?>