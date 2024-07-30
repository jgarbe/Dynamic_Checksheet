<?php
//print_r2($submit_array);
print("<script language=\"JavaScript\">\n");


print(" function submitChecksheet(){ \n");
/* 
* 
//print("alert(\"This is a test\");  \n");
print("$(document).ready(function() { \n");

//print("alert(\"This is a test\");  \n");
 print("$.ajax({ \n");
 print("url: \"inc/submit_ajax.inc.php\", \n");  
 print("	cache: false	,					\n");   
 print("     data: \"submission=".urlencode(json_encode($submit_array))."\",   \n");
print("     type: \"GET\" ,     \n");
 print("     dataType: 'json',                //data format       \n");
 print(" success: function(data){ \n");
 
print("alert(\"This is a test\");  \n");
 //print(" var checkSS = data[0]; \n");

 //print(" successData.forEach(() {\n");
 //print(" alert(\"The \" + checkSS + \" has been submitted.\");\n");
 //print("  \n");
 //print("  \n");
// print(" }); \n");


// print(" $.each($.parseJSON(successData), function() { \n");
 //print("       alert(successData[0] + \" \" + successData[1]);    \n");
 //print("   });   \n");


 
 print("     } , \n");

 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print("}); \n");


 print(" }); \n");
 */
 print(" } \n");

print("function checkForm(formObj) { \n");
print("var formOK = true;\n");

print("function reqAlert(reqVar) {\n");
			print("var qReq=\"\";\n");
			print("var qsReq=\"\";\n");
	print("for(d = 0;d < reqVar.length; d++) { \n");
	print("qReq = qsReq + reqVar[d] + \"     \";\n");
	print("qsReq = qReq;\n");
	print(" }\n");
print("window.alert(\"You must enter a value in the \"+ qsReq+ \" field\/s\"); \n");
print("formOK = false;\n");
print(" }\n");



print("var varPreg = [];\n");
foreach($REQ as $ritems => $rname) {
 
    if($rname[3] == 'refill' || $rname[3] == 'personnel'  || $rname[3] == 'na' ) {
print("		var grit = formObj['".$rname[5].":".$rname[6].":".$rname[1]."'];\n");
print("if (grit.value.match(/^.*:NULL$/)) { \n");
print("varPreg.push(\"".$rname[2]."\");\n");

print(" } \n"); 
	}
	else {
print("if (formObj['".$rname[5].":".$rname[6].":".$rname[1]."'].value == \"\") { \n");
print("varPreg.push(\"".$rname[2]."\");\n");

print(" } \n"); 
}
} 

print("if (varPreg.length > 0) { \n");
print("reqAlert(varPreg);\n");
print(" } ");
print("else {  \n");
print("submitChecksheet();\n");
//	print("     alert (\"this is checking out\");\n");

//print("setTimeout(Show3, 30000);   \n");
print("	}\n "); 

print(" \n \n return formOK;  } \n");

print("</script>\n");
?>
