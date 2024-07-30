
print("<script src=\"http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js\"></script>\n");
print("<script>\n");
print("$(document).ready(function()\n");
print("  { \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the checksheet on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
 print("   $.ajax({                                    \n");   
 print("     url: 'inc/req_repopulate_ajax.inc.php',      \n");    
 print("     data: \"ch_id=".$_POST[checksheet]."\",   \n");
print("     dataType: 'json',                //data format       \n");
  
  print("    success: function(vari)          //on recieve of reply \n");
  print("    { \n");
// print("alert(eval(vari));");  
 print("$.each(vari,  function(i, hanger) { \n"); 
 print("var hm = hanger[0];\n");
 //print("var valObj = \"".$_POST[checksheet]."_\" + hanger[3] + hanger[2];\n");
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the checkbox on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'cb') { \n");
        print(" $(\"input:checkbox[name='\" + hanger[1] + \"']\").parent().addClass(\"highlight\"); \n");
    print(" $(\"input:checkbox[name='\" + hanger[1] + \"']\").attr('checked', false); \n");
//print("alert(hanger[2]);");           //test
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the numerical values on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
print("if($.isNumeric(hm) ){    \n");
 print("$('#' +hanger[1]).css('backgroundColor','yellow');\n");
  print(" var reQuip = parseInt(hm) - parseInt(hanger[2]);\n");
 print(" $('#' + hanger[1] + '  option:contains(' + reQuip + ') ').prop('selected',true); \n");
print(" }\n");        //if it's a numeric
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the n/a on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'na') { \n");
 //   print("alert(hm + hanger[2]);\n");  //test
    print("if(parseInt(hanger[2]) < 2 ) {\n");
 print("$('#' +hanger[1]).css('backgroundColor','yellow');\n");
print("} \n");
 print(" $('#' + hanger[1] + '  option:contains(' + hanger[2] + ') ').prop('selected',true); \n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the open text on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////  
    print(" if(hm == 'open') { \n");
 //  print("alert(hm + hanger[2]);\n");  //test
print("$('input[name=\"' + hanger[1] + '\"]').val(hanger[2]);\n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the O2 values on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'O2') { \n");
 //  print("alert(hm + hanger[2]);\n");  //test
print("$('input[name=\"' + hanger[1] + '\"]').val(hanger[2]);\n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the Irrigation Solution on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'irrg') { \n");
 //   print("alert(hm + hanger[2]);\n");  //test
    print("if(parseInt(hanger[2]) < 2000 ) {\n");
 print("$('#' +hanger[1]).css('backgroundColor','yellow');\n");
print("} \n");
 print(" $('#' + hanger[1] + '  option:contains(' + hanger[2] + ') ').prop('selected',true); \n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the tire on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'tire') { \n");
  // print("alert(hm + hanger[2]);\n");  //test
    print("if(hanger[2] == 'Poor' ) {\n");
 print("$('#' +hanger[1]).css('backgroundColor','yellow');\n");
print("} \n");
 print(" $('#' + hanger[1] + '  option:contains(' + hanger[2] + ') ').prop('selected',true); \n");
print("} \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the miles on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    print(" if(hm == 'miles') { \n");
 //  print("alert(hm + hanger[2]);\n");  //test
print("$('input[name=\"' + hanger[1] + '\"]').val(hanger[2]);\n");
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
print("} \n");


print("     }); \n");
 print("     } , \n");
 //print("    \"json\"    \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print("     }); \n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the personnel on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
 print("   $.ajax({                                    \n");   
 print("     url: 'inc/personnel_repopulate.inc.php',      \n");    
 print("     data: \"ch_id=".$_POST[checksheet]."\",   \n");
print("     dataType: 'json',                //data format       \n");
  
  print("    success: function(vari)          //on recieve of reply \n");
  print("    { \n");
// print("alert(eval(vari));");  
 print("$.each(vari,  function(i, hanger) { \n"); 
 print("var hm = hanger[0];\n");

   print(" if(hm == 'personnel') { \n");
//print("alert(hm + hanger[2]);\n");  //test
print(" $('#' + hanger[1] + '  option:contains(' + hanger[2] + ') ').prop('selected',true); \n");
print("} \n");
print("     }); \n");
 print("     } , \n");
 //print("    \"json\"    \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print("     }); \n");
 //////////////////////////////////////////////////////////////////////////////////////////////////////////
//      repopulating the refill on load
///////////////////////////////////////////////////////////////////////////////////////////////////////////
 print("   $.ajax({                                    \n");   
 print("     url: 'inc/req_repopulate_refill.inc.php',      \n");    
 print("     data: \"ch_id=".$_POST[checksheet]."\",   \n");
print("     dataType: 'json',                //data format       \n");
  
  print("    success: function(vari)          //on recieve of reply \n");
  print("    { \n");
// print("alert(eval(vari));");  
 print("$.each(vari,  function(i, hanger) { \n"); 
 print("var hm = hanger[0];\n");

print(" if(hm == 'refill') { \n");
//print("alert(hm + hanger[2]);\n");  //test
 print(" $('#' + hanger[1] + '  option:contains(' + hanger[2] + ') ').prop('selected',true); \n");
print("} \n");
print("     }); \n");
 print("     } , \n");
 //print("    \"json\"    \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print("     }); \n");


//////////////////////////////////////////////////////////////////////////////////////////////////////////
//      END repopulating
///////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      Select Box Types
//////////////////////////////////////////////////////////////////////////////////////////////////////
print("  $(\"select\").change(function(){ \n");
//print("alert(this.value);\n");

print(" var garr = (this.value).split(\"_\");\n");
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
print("     if  ((garr[2] == 'personnel')  || (garr[2] == 'refill')) { \n");   // if it is a personnel type
print("     if ( garr[8] == 'NULL'){  \n");
print("               $(this).css('backgroundColor','red'); \n");
print("            } \n");
print(" else   { \n"); 
print("               $(this).css('backgroundColor','white'); \n");
print("            } \n");

print("     if ( garr[8] == '99' || garr[8] == '91' || garr[8] == '90'){  \n");
print("               $(this).css('backgroundColor','green'); \n");
 print(" $('#3_1_6  option:contains(OOS) ').prop('selected',true); \n");
 print(" $('#3_2_8  option:contains(Administrator) ').prop('selected',true); \n");
 print(" $('#3_2_9  option:contains(Administrator) ').prop('selected',true); \n");
 print(" $('#11_1_260  option:contains(N/A) ').prop('selected',true); \n");
 print(" $('#11_1_262  option:contains(N/A) ').prop('selected',true); \n");
 print(" $('#11_1_263  option:contains(N/A) ').prop('selected',true); \n");
 print(" $('#11_1_420  option:contains(N/A) ').prop('selected',true); \n");
 print(" $('#11_29_265  option:contains(N/A) ').prop('selected',true); \n");
 print(" $('#11_29_266  option:contains(N/A) ').prop('selected',true); \n");
 print(" $('#11_29_261  option:contains(N/A) ').prop('selected',true); \n");
 print(" $('#8_1_197  option:contains(N/A) ').prop('selected',true); \n");
print("$('input[name=\"8_1_194\"]').val('0');\n");
print("$('input[name=\"8_1_195\"]').val('0');\n");
print("$('input[name=\"8_1_196\"]').val('0');\n");
print("$('input[name=\"8_1_198\"]').val('0');\n");
print("$('input[name=\"3_1_1\"]').val('0');\n");
print("$('input[name=\"3_1_2\"]').val('0');\n");
print("            } \n");


print("            } \n");
print("     if  (garr[2] == 'irrg') { \n");   // if it is a personnel type
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
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print("     }); \n");
  print("        $('#reqman').attr('src','requisition.php?ch=".$_POST[checksheet]."');       \n");
 print("   }); \n");
 
///////////////////////////////////////////////////////////////////////////////////////////////////////
//    End of the Selectbox Type -- Begin Clearing the Order
//////////////////////////////////////////////////////////////////////////////////////////////////////
 
 print(" $('#reload').click(function() {  \n");
// print(" $('.page').html(newContent);\n");
 print(" \n");
 
 print("   $.ajax({                                    \n");    
 print("     url: 'inc/clearorder_ajax.inc.php',       \n");    
 print("     data: \"ch=".$_POST[checksheet]."\", \n");
  print("    success: function()          //on recieve of reply \n");
  print("    { \n");
 
    //  print(" \n");
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print("  }); \n");
 
 print("        $('#reqman').attr('src','requisition.php?ch=".$_POST[checksheet]."');       \n");
 print("  }); \n");
 print(" \n");
 
 
///////////////////////////////////////////////////////////////////////////////////////////////////////
//   End of Clearing the Order -- Begin Checkbox types
//////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
  print("$(\":checkbox\").change(function(){ \n");
print(" var garr = (this.value).split(\"_\");\n");
print(" var valC = garr[2]; \n");
print(" var valNum = garr[8]; \n");
 print("if ( $(this).is(\":checked\"))  \n");
print("{ \n");
print("               $(this).parent().removeClass(\"highlight\"); \n");
 print("$.ajax({ \n");
 print("url: \"inc/clear_checkbox_ajax.inc.php\", \n");    
 print("     data: \"p_id=\" + (this.value),   \n");
 print(" success: function(data){ \n");
 //print("alert(result); \n"); // test
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print("}); \n");
 print(" } \n");
  print("else  \n");
 print("{ \n");
  print("               $(this).parent().addClass(\"highlight\"); \n");
 print("$.ajax({ \n");
 print("url: \"inc/checkbox_ajax.inc.php\", \n");    
 print("     data: \"p_id=\" + (this.value),   \n");
 print("success: function(data){ \n");
 //print("alert(result); \n");  //test
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");
 print("} \n");
 
  print("        $('#reqman').attr('src','requisition.php?ch=".$_POST[checksheet]."');       \n");
  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Checkbox types-- Beginning of Text types
//////////////////////////////////////////////////////////////////////////////////////////////////////
  
 
  print("$(\":text\").blur(function(){ \n");
print(" var garr = ($(this).attr('id')).split(\"_\");\n");
print(" var valC = garr[2]; \n");
//print(" var valNum = garr[8]; \n");
print(" if (!$(this).val()) {  \n");
print(" var dataPut = $(this).attr('id') + \"_NULL\"; }\n");
print(" else {\n");
print(" var dataPut = $(this).attr('id') + \"_\" + $(this).val(); }\n");
//print("alert(valC + \" \" +  $(this).val()); \n"); // test
print("if (valC == 'miles') {  \n");
 print("   \n");
  print("$.ajax({ \n");
 print("url: \"inc/textbox_ajax.inc.php\", \n");    
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
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");
 print(" } else   \n");
 print(" {\n");
 
//print("alert(\" \" +  dataPut); \n"); // test
   print("$.ajax({ \n");
 print("url: \"inc/textbox_ajax.inc.php\", \n");    
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");
 
 print("     }  \n");
  print("        $('#reqman').attr('src','requisition.php?ch=".$_POST[checksheet]."');       \n");
  print("});\n");

///////////////////////////////////////////////////////////////////////////////////////////////////////
//      End of Text types-- Beginning of Textarea types
//////////////////////////////////////////////////////////////////////////////////////////////////////
 
  print("$(\"textarea\").blur(function(){ \n");
print(" var garr = ($(this).attr('id')).split(\"_\");\n");
print(" var valC = garr[2]; \n");
//print(" var valNum = garr[8]; \n");
print(" if (!$(this).val()) {  \n");
print(" var dataPut = $(this).attr('id') + \"_NULL\"; }\n");
print(" else {\n");
print(" var dataPut = $(this).attr('id') + \"_\" + $(this).val(); }\n");
//print("alert(valC + \" \" +  $(this).val()); \n"); // test

   print("$.ajax({ \n");
 print("url: \"inc/comment_ajax.inc.php\", \n");    
 print("     data: \"p_id=\" + dataPut ,   \n");
 print("     type: \"GET\" ,     \n");
 print("success: function(data){ \n");
 
 print("     } , \n");
 print("error : function (xhr, ajaxOptions, thrownError)  \n");
 print("     { \n");
 print("     alert(xhr.status); \n");
 print("     alert(thrownError); \n");
 print("     }  \n");
 print(" }); \n");
 
  print("        $('#reqman').attr('src','requisition.php?ch=".$_POST[checksheet]."');       \n");
  print("});\n");
//   include('inc/validate2.inc.php'); // bring in the requirement validation of form
 print("   }); \n");
//print("</script>\n");
