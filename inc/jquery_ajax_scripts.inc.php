<?php

//print("<script src=\"inc/checksheet_jquery.js\"></script>\n");
print("<script src=\"js/jquery.validate.min.js\"></script>\n");
print("<script>\n");
///////////////////////////////////////////////////////////////////////////////
//   Select Box Plugin
//////////////////////////////////////////////////////////////////////////////

print(" jQuery.fn.selectOptionWithText = function selectOptionWithText(targetText) {    \n");
 print("   return this.each(function () {   \n ");
  print("        var \$selectElement, \$options, \$targetOption;    \n");

  print("        \$selectElement = jQuery(this);   \n");
  print("        \$options = \$selectElement.find('option');    \n");
  print("        \$targetOption = \$options.filter(   \n");
  print("            function () {return jQuery(this).text() == targetText}   \n");
  print("        );   \n");

  print("        // We use `.prop` if it's available (which it should be for any jQuery    \n");
  print("        // versions above and including 1.6), and fall back on `.attr` (which   \n");
  print("        // was used for changing DOM properties in pre-1.6) otherwise.   \n");
  print("        if (\$targetOption.prop) {   \n");
  print("            \$targetOption.prop('selected', true);   \n");
  print("        }    \n");
  print("        else {   \n");
  print("            \$targetOption.attr('selected', 'true');   \n");
  print("        }   \n");
 print("     });  \n");
 print(" }   \n");

///////////////////////////////////////////////////////////////////////////////
//   Declare div function 
//////////////////////////////////////////////////////////////////////////////
print("  function divupdate() {\n");
 print("     $.ajax({    //create an ajax request to load_page.php   \n");
 print("		type: 'GET', \n");
 print("	cache: false	,					\n");
 print("       url: \"inc/getrequisition.php\",      \n");  
 print("     data: \"ch=".$_POST['checksheet']."\", \n");
 print(" 		dataType: 'html' ,\n");
 print("      success: function(response){                    \n");
  print("          $('#reqman').html(response);    \n");
 //print("          alert(response);      \n");
 print("       }     \n");

 print("   });      \n");
 
print("   };      \n");
///////////////////////////////////////////////////////////////////////////////
//End of Select Box Plugin
//////////////////////////////////////////////////////////////////////////////
print("$(document).ready(function()\n");
print("  { \n");


print(" $.ajaxSetup({ cache: false});     \n");
print("   divupdate();\n ");
///////////////////////////////////////////////////////////////////////////////////////////////////////
//      Select Box Types
//////////////////////////////////////////////////////////////////////////////////////////////////////
print("  $(\"select\").change(function(){ \n");
//print("alert(this.value);\n");

print(" var garr = (this.value).split(\":\");\n");
print(" var valNum = garr[2]; \n");
//print("alert(valNum);\n");
print("            if (!valNum.match(/^[0-9]+$/)) { \n");  //if it is not a numeric type
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//print("alert(garr[8] + \" Quasi Moto \" + garr[1]);\n");
print("     if  (garr[2] == 'na') { \n");   // If it is an NA type
print("     if ( garr[8] == 'NULL'){  \n");
print("               $(this).css('backgroundColor','red'); \n");
print("            } \n");
print("     if (garr[8] < 2){  \n");
print("               $(this).css('backgroundColor','yellow'); \n");
print("            } \n");
print("     if ((garr[8] == '2') || (garr[8] == 'N/A')){  \n");
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");
print("            } \n");
print("     if  ((garr[2] == 'personnel')  || (garr[2] == 'refill')) { \n");   // if it is a personnel or refill type
print("     if ( garr[8] == 'NULL'){  \n");
print("               $(this).css('backgroundColor','red'); \n");
print("            } \n");
print(" else   { \n"); 
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");

print("     if ( garr[8] == '99' || garr[8] == '91' || garr[8] == '90'){  \n");
print("               $(this).css('backgroundColor','green'); \n");
//print("alert(garr[8] + \" Quasi Moto \" + garr[1]);\n");
print("  $('select[id=\"3:1:6\"]').selectOptionWithText('OOS');    \n");
 print(" $('select[id=\"3:1:6\"]').trigger(\"change\");\n");
 print(" $('select[id=\"3:2:8\"]').selectOptionWithText('Administrator').prop('selected',true); \n");
 print(" $('select[id=\"3:2:8\"]').trigger(\"change\");\n");
 print(" $('select[id=\"3:2:9\"]').selectOptionWithText('Administrator').prop('selected',true); \n");
 print(" $('select[id=\"3:2:9\"]').trigger(\"change\");\n");
 print(" $('select[id=\"11:1:260\"]').selectOptionWithText('N/A').prop('selected',true); \n");
 print(" $('select[id=\"11:1:260\"]').trigger(\"change\");\n");
 print(" $('select[id=\"11:1:262\"]').selectOptionWithText('N/A').prop('selected',true); \n");
 print(" $('select[id=\"11:1:262\"]').trigger(\"change\");\n");
 print(" $('select[id=\"11:1:263\"]').selectOptionWithText('N/A').prop('selected',true); \n");
 print(" $('select[id=\"11:1:263\"]').trigger(\"change\");\n");
 print(" $('select[id=\"11:1:420\"]').selectOptionWithText('N/A').prop('selected',true); \n");
 print(" $('select[id=\"11:1:420\"]').trigger(\"change\");\n");
 print(" $('select[id=\"11:29:265\"]').selectOptionWithText('N/A').prop('selected',true); \n");
 print(" $('select[id=\"11:29:265\"]').trigger(\"change\");\n");
 print(" $('select[id=\"11:29:266\"]').selectOptionWithText('N/A').prop('selected',true); \n");
 print(" $('select[id=\"11:29:266\"]').trigger(\"change\");\n");
 print(" $('select[id=\"11:29:261\"]').selectOptionWithText('N/A').prop('selected',true); \n");
 print(" $('select[id=\"11:29:261\"]').trigger(\"change\");\n");
 print(" $('select[id=\"8:1:197\"]').selectOptionWithText('N/A').prop('selected',true); \n");
 print(" $('select[id=\"8:1:197\"]').trigger(\"change\");\n");
print("$('input[name=\"8:1:194\"]').val('0');\n");
print("$('input[name=\"8:1:194\"]').trigger(\"blur\");\n");
print("$('input[name=\"8:1:195\"]').val('0');\n");
print("$('input[name=\"8:1:195\"]').trigger(\"blur\");\n");
print("$('input[name=\"8:1:196\"]').val('0');\n");
print("$('input[name=\"8:1:196\"]').trigger(\"blur\");\n");
print("$('input[name=\"8:1:198\"]').val('0');\n");
print("$('input[name=\"8:1:198\"]').trigger(\"blur\");\n");
print("$('input[name=\"3:1:1\"]').val('0');\n");
print("$('input[name=\"3:1:1\"]').trigger(\"blur\");\n");
print("$('input[name=\"3:1:2\"]').val('0');\n");
print("$('input[name=\"3:1:2\"]').trigger(\"blur\");\n");
print("$(\"#oos_location_span\").html('Details of OOS Unit.<textarea name=\"oos_location\[".$_POST['checksheet']."\]\" rows=\"3\" cols=\"80\"     id = \"oos_location\[".$_POST['checksheet']."\]\"></textarea>'); \n"); 
print("            } \n");


print("            } \n");
print("     if  (garr[2] == 'irrg') { \n");  
print("     if ( garr[8] < '2000'){  \n");
print("               $(this).css('backgroundColor','yellow'); \n");
print("            } \n");
print(" else   { \n"); 
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");
print("            } \n");
print("     if  ( garr[2] == 'tire') { \n");   // if it is a tire type
print("     if ( garr[8] == 'Poor'){  \n");
print("               $(this).css('backgroundColor','yellow'); \n");
print("            } \n");
print(" else   { \n"); 
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");
print("            } \n");
print("            } \n");
print(" else   { \n");     // If it is a numeric type
print("                 if ( parseInt(garr[8])  <  parseInt(valNum) ) { \n");
print("               $(this).css('backgroundColor','yellow'); \n");
print("            } \n");
print("            else  { \n");
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");
print("            } \n");
 print("   $.ajax({                                    \n");   
 print("     url: 'inc/select_ajax.inc.php',      \n");    
 print("     data: \"p_id=\" + (this.value),   \n");
 print("	cache: false	,					\n");
 print("     dataType: 'json',                //data format       \n");
  print("    success: function(data)          //on recieve of reply \n");
  print("    { \n");
// print("       var checkshin = data[1];              //checksheet_ID\n");
 print("       var id = data[0];           //id\n");
print("       var event_id = data[1];           //event_id\n");
print("       var item_id = data[2];           //item_id \n");
print("       var result = data[3];           //result \n");
print("       var hm_value_id = data[4];           //hm_value_id \n");
print("       var category_id = data[5];           //category_id \n");
print("       var subcategory_id = data[6];           //subcategory_id \n"); 
print(" divupdate();\n");
 print("     } , \n");
 
  print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 
 
 
 //print("error : function (xhr, ajaxOptions, thrownError)  \n");
 //print("     { \n");
 //print("     alert(xhr.status); \n");
 //print("     alert(thrownError); \n");
 //print("     }  \n");
 print("     }); \n");
 
// print("var iframe = document.getElementById(\"reqman\");  \n");
//print(" iframe.src = \"".HOME."/requisition.php?ch=".$_POST['checksheet']."&x=\"+Math.round(Math.random());\n");
 //print("$('#reqman').attr('src','".HOME."/requisition.php?ch=".$_POST['checksheet']."');       \n");
 //print("  divupdate();   \n ");
 print("   }); \n");
 
///////////////////////////////////////////////////////////////////////////////////////////////////////
//    End of the Selectbox Type -- Begin Clearing the Order
//////////////////////////////////////////////////////////////////////////////////////////////////////
 
 print(" $('#reload').click(function() {  \n");
// print(" $('.page').html(newContent);\n");
// print(" \n");
//print(" $('select[id=\"3:1:7\"]').selectOptionWithText('Choose');\n");
print(" $('#3:1:7').selectOptionWithText('Choose');\n");
//print(" $('select[id=\"3:1:7\"]').trigger(\"change\"); \n");
print(" $('#3:1:7').trigger(\"change\"); \n");
//print(" $('#3:1:7').css('backgroundColor','white'); \n");
//print(" $('select[name=\"3:1:7\"]').css('backgroundColor','white'); \n");

 //print(" alert('".$_POST['checksheet']."');\n");
// print(" \n");
 
 print("   $.ajax({                                    \n");    
 print("     url: 'inc/clearorder_ajax.inc.php',       \n");    
 print("     data: \"ch=".$_POST['checksheet']."\", \n");
 print("	cache: false	,					\n");
  print("    success: function()          //on recieve of reply \n");
  print("    { \n");
 
    //  print(" \n");
    
print("location.replace('main.php?checksheet=".$_POST['checksheet']."');\n");
 print("     } , \n");
// print("error : function (xhr, ajaxOptions, thrownError)  \n");
// print("     { \n");
// print("     alert(xhr.status); \n");
// print("     alert(thrownError); \n");
 //print("     }  \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     //alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 
 
 print("  }); \n");
 
// print("        $('#attemptingtoreload').load('requisition.php?ch=".$_POST['checksheet']."');       \n");
// print("        $('#reqman').attr('src','requisition.php?ch=".$_POST['checksheet']."');       \n");
//print(" var iframe = $('#reqman');\n");
//print("	iframe.attr(\"src\", iframe.attr(\"src\"));\n");
// print("document.getElementById('reqman').contentDocument.location.reload(true); \n");
 //print("        $('iframe[id=\"reqman\"]').prop('src','".HOME."/requisition.php?ch=".$_POST['checksheet']."');       \n");
 
// print("  divupdate();   \n ");
 print("  }); \n");
 print(" \n");
 
 
///////////////////////////////////////////////////////////////////////////////////////////////////////
//   End of Clearing the Order -- Begin Checkbox types
//////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
  print("$(\":checkbox\").change(function(){ \n");
print(" var garr = (this.value).split(\":\");\n");
print(" var valC = garr[2]; \n");
print(" var valNum = garr[8]; \n");
 print("if ( $(this).is(\":checked\"))  \n");
print("{ \n");
print("               $(this).parent().removeClass(\"highlight\"); \n");
 print("$.ajax({ \n");
 print("url: \"inc/clear_checkbox_ajax.inc.php\", \n");   
 print("	cache: false	,					\n"); 
 print("     data: \"p_id=\" + (this.value),   \n");
 print(" success: function(data){ \n");
// print("alert(data); \n"); // test
 
print(" divupdate();\n");
 print("     } , \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("    // alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print("}); \n");
 print(" } \n");
  print("else  \n");
 print("{ \n");
  print("               $(this).parent().addClass(\"highlight\"); \n");
 print("$.ajax({ \n");
 print("url: \"inc/checkbox_ajax.inc.php\", \n");  
 print("	cache: false	,					\n");  
 print("     data: \"p_id=\" + (this.value),   \n");
 print("success: function(data){ \n");
 //print("alert(data); \n");  //test
 
print(" divupdate();\n");
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
 print("} \n");
 // print("        $('#attemptingtoreload').load('requisition.php?ch=".$_POST['checksheet']."');       \n");
// print("        $('#reqman').attr('src','requisition.php?ch=".$_POST['checksheet']."');       \n");
 
 //print("  divupdate();   \n ");
  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Checkbox types-- Beginning of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\":text\").blur(function(){ \n");
print(" var garr = ($(this).attr('id')).split(\":\");\n");
print(" var valC = garr[2]; \n");
//print(" var valNum = garr[8]; \n");
print(" if (!$(this).val()) {  \n");
print(" var dataPut = $(this).attr('id') + \":NULL\"; }\n");
print(" else {\n");
print(" var dataPut = $(this).attr('id') + \":\" + $(this).val(); }\n");
//print("alert(valC + \" \" +  $(this).val()); \n"); // test
print("if (valC == 'miles') {  \n");
 print("   \n");
  print("$.ajax({ \n");
 print("url: \"inc/textbox_ajax.inc.php\", \n");   
 print("	cache: false	,					\n"); 
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("     type: \"GET\" ,     \n");
 print("     dataType: 'json',                //data format       \n");
 print("success: function(data){ \n");
 print("     var rMileage = data[0];\n");
 print("    var rService = data[1];  \n");
 print("    var rCalculation = data[2];  \n");
 print("     if (rMileage =='NULL' || rService == 'NULL' || rCalculation == 'NULL') {\n");

 print("     }  \n"); 
 print("else { \n");
 
 print(" $('#calculation').text(rCalculation);   \n");
 print("     }  \n"); 
 
print(" divupdate();\n");
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
 print(" } else   \n");
 print(" {\n");
 
//print("alert(\" \" +  dataPut); \n"); // test
   print("$.ajax({ \n");
 print("url: \"inc/textbox_ajax.inc.php\", \n");    
 print("	cache: false	,					\n");
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
print(" divupdate();\n");
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
 
 print("     }  \n");
 //print("        $('#reqman').attr('src','requisition.php?ch=".$_POST['checksheet']."');       \n");
  
// print("  divupdate();   \n ");
  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Text types-- Beginning of Textarea types
//////////////////////////////////////////////////////////////////////////////////////////////////////
 
  print("$(\"textarea\").blur(function(){ \n");
print(" var garr = ($(this).attr('id')).split(\":\");\n");
print(" var valC = garr[2]; \n");
//print(" var valNum = garr[8]; \n");
print(" if (!$(this).val()) {  \n");
print(" var dataPut = $(this).attr('id') + \":NULL\"; }\n");
print(" else {\n");
print(" var dataPut = $(this).attr('id') + \":\" + $(this).val(); }\n");
//print("alert(valC + \" \" +  $(this).val()); \n"); // test

   print("$.ajax({ \n");
 print("url: \"inc/comment_ajax.inc.php\", \n");    
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("	cache: false	,					\n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 //print("alert(data); \n"); // test
print(" divupdate();\n");
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
 
 // print("        $('#reqman').attr('src','requisition.php?ch=".$_POST['checksheet']."');       \n");
  
// print("  divupdate();   \n ");
  print("});\n");
//   include('inc/validate2.inc.php'); // bring in the requirement validation of form


//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the checksheet on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
 print("   $.ajax({                                    \n");   
 print("     url: 'inc/req_repopulate_ajax.inc.php',      \n");  
 print("	cache: false	,					\n");  
 print("     data: \"ch_id=".$_POST['checksheet']."\",   \n");
print("     dataType: 'json',                //data format       \n");
  
  print("    success: function(vari)          //on recieve of reply \n");
  print("    { \n");
//print("alert(eval(vari));");  
 print("$.each(vari,  function(i, hanger) { \n"); 
 print("var hm = hanger[0];\n");
 
//print("alert(hanger[0]);\n");  //test
//print("alert(hm + \" \" + hanger[2]);\n");  //test
// print("var valObj = \"".$_POST['checksheet'].":\" + hanger[3] + hanger[2];\n");
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the checkbox on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'cb') { \n");
    
//print("alert(hm + \" \" + hanger[2]);\n");  //test
        print(" $('input:checkbox[name=\"' + hanger[1] + '\"]').parent().addClass(\"highlight\"); \n");
    print(" $('input:checkbox[name=\"' + hanger[1] + '\"]').attr('checked', false); \n");
   print(" $('input:checkbox[name=\"' + hanger[1] + '\"]').trigger(\"change\"); \n");
//print("alert(hanger[2]);\n");           //test
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the numerical values on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
print("if($.isNumeric(hm) ){    \n");
 print("$('select[id=\"' + hanger[1] + '\"]').css('backgroundColor','yellow');\n");
  print(" var reQuipn = parseInt(hm) - parseInt(hanger[2]);\n");
  print("  var reQuip = reQuipn.toString(); \n");
// print("alert(reQuip);\n");
//  print("alert(hanger[1]);\n");
print("  $('select[id=\"' + hanger[1] + '\"]').selectOptionWithText(reQuip);    \n");
// print(" $('#' + hanger[1] + '  option:contains(' + reQuip + ') ').prop('selected',true); \n");
 print("$('select[id=\"' + hanger[1] + '\"]').trigger(\"change\"); \n");
print(" }\n");        //if it's a numeric
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the n/a on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'na') { \n");
 //   print("alert(hm + hanger[2]);\n");  //test
    print("if(parseInt(hanger[2]) < 2 ) {\n");
 print("  $('select[id=\"' + hanger[1] + '\"]').css('backgroundColor','yellow');\n");
print("} \n");
 print("   $('select[id=\"' + hanger[1] + '\"]').selectOptionWithText(hanger[2]);  \n");
 print("   $('select[id=\"' + hanger[1] + '\"]').trigger(\"change\"); \n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the open text on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////  
    print(" if(hm == 'open') { \n");
 //  print("alert(hm + hanger[2]);\n");  //test
print("$('input[name=\"' + hanger[1] + '\"]').val(hanger[2]);\n");
print("$('input[name=\"' + hanger[1] + '\"]').trigger(\"blur\");\n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the O2 values on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'O2') { \n");
 //  print("alert(hm + hanger[2]);\n");  //test
print("$('input[name=\"' + hanger[1] + '\"]').val(hanger[2]);\n");
print("$('input[name=\"' + hanger[1] + '\"]').trigger(\"blur\");\n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the Irrigation Solution on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'irrg') { \n");
   //print("alert(hm + hanger[2]);\n");  //test
 
     print(" var irrgRepn =  2000 - parseInt(hanger[2]); \n");
    print("if(irrgRepn < 2000 ) {  \n");

    print(" var irrgRep = irrgRepn.toString();\n");    
 print("$('select[name=\"' + hanger[1] + '\"]').css('backgroundColor','yellow');\n");
print("} \n");
 print(" $('select[name=\"' + hanger[1] + '\"]').selectOptionWithText(irrgRep + 'cc');  \n");
 print(" $('select[name=\"' + hanger[1] + '\"]').trigger(\"change\"); \n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the tire on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'tire') { \n");
  // print("alert(hm + hanger[2]);\n");  //test
    print("if(hanger[2] == 'Poor' ) {\n");
 print("$('select[name=\"' + hanger[1] + '\"]').css('backgroundColor','yellow');\n");
print("} \n");
 print(" $('select[name=\"' + hanger[1] + '\"]').selectOptionWithText(hanger[2]); \n");
 print(" $('select[name=\"' + hanger[1] + '\"]').trigger(\"change\"); \n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the miles on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'miles') { \n");
//   print("alert(hm + hanger[1]);\n");  //test
print("$('input[name=\"' + hanger[1] + '\"]').val(hanger[2]);\n");
print("$('input[name=\"' + hanger[1] + '\"]').trigger(\"blur\");\n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the Calculation on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the comment on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////

    print(" if(hm == 'comment') { \n");
 // print("alert(hm + hanger[2]);\n");  //test
print("$('textarea[name=\"' + hanger[1] + '\"]').val(hanger[2]);\n");
print("$('textarea[name=\"' + hanger[1] + '\"]').trigger(\"blur\");\n");
print("} \n");


print("     }); \n");  // End of repopulating

print(" divupdate();\n");
 print("     } , \n");
 //print("    \"json\"    \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print("     }); \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the personnel on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
 print("   $.ajax({                                    \n");   
 print("     url: 'inc/personnel_repopulate.inc.php',      \n");    
 print("     data: \"ch_id=".$_POST['checksheet']."\",   \n");
print("     dataType: 'json',                //data format       \n");
 print("	cache: false	,					\n");
  
  print("    success: function(vari)          //on recieve of reply \n");
  print("    { \n");
// print("alert(eval(vari));");  
 print("$.each(vari,  function(i, hanger) { \n"); 
 print("var hm = hanger[0];\n");

   print(" if(hm == 'personnel') { \n");
//print("alert(hm + \" \" + hanger[2]);\n");  //test
print(" $('select[name=\"' + hanger[1] + '\"]').selectOptionWithText(hanger[2]);\n");
print(" $('select[name=\"' + hanger[1] + '\"]').trigger(\"change\"); \n");
print("} \n");
print("     }); \n");

print(" divupdate();\n");
 print("     } , \n");
 //print("    \"json\"    \n");
 print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 print("     }); \n");
 //////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the refill on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
 print("   $.ajax({                                    \n");   
 print("     url: 'inc/req_repopulate_refill.inc.php',      \n");   
 print("	cache: false	,					\n"); 
 print("     data: \"ch_id=".$_POST['checksheet']."\",   \n");
print("     dataType: 'json',                //data format       \n");
  
  print("    success: function(vari)          //on recieve of reply \n");
  print("    { \n");
// print("alert(eval(vari));");  
 print("$.each(vari,  function(i, hanger) { \n"); 
 print("var hm = hanger[0];\n");

print(" if(hm == 'refill') { \n");
//print("alert(hm + \" \" + hanger[2]);\n");  //test
print(" $('select[name=\"' + hanger[1] + '\"]').selectOptionWithText(hanger[2]);\n");
 //print(" $('#' + hanger[1] + '  option:contains(' + hanger[2] + ') ').prop('selected',true); \n");
// print(" $('#' + hanger[1] + '  option:contains(' + hanger[2] + ') ').trigger(\"change\"); \n");
 print("  $('select[name=\"' + hanger[1] + '\"]').trigger(\"change\"); \n");
print("} \n");
print("     }); \n");

print(" divupdate();\n");
 print("     } , \n");
 //print("    \"json\"    \n");
// print("error : function (xhr, ajaxOptions, thrownError)  \n");
// print("     { \n");
// print("     alert(xhr.status); \n");
 //print("     alert(thrownError); \n");
 //print("     }  \n");
 
  print("error : function (xmlHttpRequest, textStatus, thrownError)  \n");
 print("     { \n");
 print("         if(xmlHttpRequest.readyState == 0 || xmlHttpRequest.status == 0) \n");
 print("             return;  // it's not really an error   \n");
 print("       else   \n");
 print("     alert(xhr.status); \n");
 print("    alert(thrownError); \n");
 print("     }  \n");
 
 
 
 print("     }); \n");


//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      END repopulating
///////////////////////////////////////////////////////////////////////////////////////////////////////////



 print("   }); \n");
print("</script>\n");

?>
