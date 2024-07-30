<?php

// Written by Jim Garbe
//**************************************************************************************//
//											//
//  	 print the tables	delayscript()						//
//											//
//**************************************************************************************//
print("<SCRIPT TYPE=\"text/javascript\" LANGUAGE=\"JavaScript\">\n");


print("function waitPreloadPage() { \n");
print("if (document.getElementById){  \n");
print("document.getElementById('prepage').style.visibility='hidden';\n");
print("}else{\n");
print("if (document.layers){ \n");
print("document.prepage.visibility = 'hidden';\n");
print("}\n");
print("else { \n");
print("document.all.prepage.style.visibility = 'hidden';\n");
print("} \n");

print("} \n");

print("} \n");
print("</SCRIPT>\n");




function delayscript() {


print("  <script>\n".
" var ld=(document.all);\n ".
" var ns4=document.layers; \n".
" var ns6=document.getElementById&&!document.all; \n".
" var ie4=document.all; \n".
"  if (ns4) \n".
 "	ld=document.prepage; \n".
" else if (ns6) \n".
" 	ld=document.getElementById(\"prepage\").style; \n".
" else if (ie4)\n ".
" 	ld=document.all.prepage.style; \n".
"function waitPreloadPage() \n".
" { \n ".
" if(ns4){ld.visibility=\"hidden\";} \n".
" else if (ns6||ie4) ld.display=\"none\"; \n".
" } \n".
" </script> \n ");
}
//******************************************************//
//	 Ending function delayscript()			//
//******************************************************//
//**************************************************************************************//
//											//
//  	 print the tables	delaybody()						//
//											//
//**************************************************************************************//


function delaybody() {







print("<body  onLoad=\"waitPreloadPage();\">\n");
print("<DIV id=\"prepage\" style=\"position:absolute; font-family:arial; font-size:16; left:0px; top:0px; background-color:".BG_COLOR."; layer-background-color:".BG_COLOR."; height:100%; width:100%;\">\n");
//print ("<CENTER>\n");
print ("<TABLE width=\"100%\" height=\"100%\" style=\"text-align:center;\" >\n");
print("<TR>\n");
print("<TD>\n");
print("\t<B>Building Checksheet ... ... Please wait!</B>\n");
print("</TD>\n");
print("</TR>\n");print("<TR>\n");
print("<TD>\n");
print("\t<img src=\"css/plaintheme/images/waiting.gif\" alt=\"waiting.gif\" height=\"200\" width=\"200\">\n");
print("</TD>\n");
print("</TR>\n");
print("</TABLE>\n");
//print("</CENTER>\n");
print("</DIV>\n");

}



//******************************************************//
//	 Ending function delaybody()			//
//******************************************************//
?>
