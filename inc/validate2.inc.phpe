<?php
print("$.validator.addMethod(\n");
print(" \"regex\",\n");
print("function(value, element, regexp) {\n");
print("if (regexp.constructor != RegExp)\n");
print("regexp = new RegExp(regexp);\n");
print("else if (regexp.global)\n");
print(" regexp.lastIndex = 0;\n");
print("return this.optional(element) || regexp.test(value);\n");
print("  },\n");
print("\"Please check your input.\"\n");
print(");\n");
        
            
            
      
        

print("$(\"#Main\").validate({\n");
print("	rules: {\n");
$reqcount = count($REQ);
//print ("the reqcount is ".$reqcount."<br />\n");
foreach($REQ as $ritems => $rname) { 
	if($rname[3] == 'refill' || $rname[3] == 'personnel'  || $rname[3] == 'na' ) {
	print("	\"".$rname[5].":".$rname[6].":".$rname[1]."\" : { 	\n");
print("			regex: \"/^(?!.*NULL$)/\"");
	} else {
print("	\"".$rname[5].":".$rname[6].":".$rname[1]."\" : { 	\n");
print("			required: true");
}
//print("			\"required\"");

$ritems == $reqcount-1? print("}\n") : print("}, \n");

//print ("the ritem is ".$ritems."<br />\n");
}
//print("								},   // End of rules\n");
///print("		messages: {			\n");
//foreach($REQ as $ritems => $rname) {
//print("				\"".$rname[5].":".$rname[6].":".$rname[1]."\" : {\n");
//print("			required: \"You must enter a value in the ".$rname[2]." field.\"");
//$ritems == $reqcount-1? print("}\n") : print("}, \n");
//}
print(" } // end of messages\n");
print("});  // End of Validate\n");
?>
