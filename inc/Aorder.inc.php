<?php
// Written by Jim Garbe
//**************************************************************************************//
//	AClearOrder()									//
//		Erase the data requisition files, set the Head Vehicle			//
//		 Title and start the first list						//
//**************************************************************************************//
function AClearOrder () {
$FileName= TMP. $_POST['checksheet'] ."aorder.html";
$FileName2=TMP. $_POST['checksheet'] ."aprint.html";
$FileName3=TMP. $_POST['checksheet'] ."aemailh.txt";
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$sql="SELECT * FROM ".$_POST['checksheet']."_events WHERE ".$_POST[event_id]." = id";
	$result = mysqli_query($dbc, $sql) or die ("can't get the setvartabs selection.");  
		//////Getting the CatSub selections./////////////////////////////////////////////
		while ($row=mysqli_fetch_array($result)) {
	$date= $row['date']; }
$Headertop="<meta http-equiv=content-style-type content=text/css><link rel=stylesheet href=../css/truckorder.css>\n<center>".$_POST['checksheet']."---$date</center>\n<fieldset>";
$Ordertop="<meta http-equiv=content-style-type content=text/css><link rel=stylesheet href=../css/orderreq.css>\n<center>".$_POST['checksheet']."---$date</center>\n<ul>";
$OpenOrder = fopen($FileName, "w");
$OpenOrder2 = fopen($FileName2, "w");
$OpenOrder3 = fopen($FileName3, "w");
	fwrite ($OpenOrder,$Ordertop) ;
	fwrite ($OpenOrder2,$Headertop) ;
	fwrite ($OpenOrder3,"") ;	
	fclose ($OpenOrder);
	fclose ($OpenOrder2);
	fclose ($OpenOrder3);
}
//******************************************************//
//	 Ending function AClearOrder()			//
//******************************************************//




//**************************************************************************************//
//	AHeadOrder()									//
//		Add to the data requisition *.html files.				//
//**************************************************************************************//
function AHeadOrder ($name,$ordervalue) {
$FileName=TMP. $_POST['checksheet'] ."aorder.html";
$FileName2=TMP. $_POST['checksheet'] ."aprint.html";
$order="<li class=small>$name <b>$ordervalue</b></li>\n";
$OpenOrder = fopen($FileName, "a");
$OpenOrder2 = fopen($FileName2, "a");
	fwrite ($OpenOrder,$order) ;
	fwrite ($OpenOrder2,$order) ;
	fclose ($OpenOrder);
	fclose ($OpenOrder2);	
}
//******************************************************//
//	 Ending function AHeadOrder()			//
//******************************************************//


//**************************************************************************************//
//	APHeadOrder()									//
//		Add to the data requisition *.html files.				//
//**************************************************************************************//
function APHeadOrder ($name,$ordervalue) {
$FileName=TMP. $_POST['checksheet'] ."aorder.html";
$FileName2=TMP. $_POST['checksheet'] ."aprint.html";
$order="<center><li class=small>$name <b>$ordervalue</b></li></center>\n";
$OpenOrder = fopen($FileName, "a");
$OpenOrder2 = fopen($FileName2, "a");
	fwrite ($OpenOrder,$order) ;
	fwrite ($OpenOrder2,$order) ;
	fclose ($OpenOrder);
	fclose ($OpenOrder2);	
}
//******************************************************//
//	 Ending function APHeadOrder()			//
//******************************************************//







//**************************************************************************************//
//	ASubjOrder()									//
//		Add item to e-mail		.					//
//**************************************************************************************//
function ASubjOrder ($name,$ordervalue) {
	
$FileName3=TMP. $_POST['checksheet'] ."aemailh.txt";
$OpenOrder3 = fopen($FileName3, "a");
	fwrite ($OpenOrder3,"$name' '$ordervalue\r\n") ;
	fclose ($OpenOrder3);
}



//**************************************************************************************//
//	AMHeadOrder()									//
//		Append to the *.html documents	.					//
//**************************************************************************************//
function AMHeadOrder ($name,$ordervalue) {
$FileName=TMP. $_POST['checksheet'] ."aorder.html";
$FileName2=TMP. $_POST['checksheet'] ."aprint.html";
$paragraph="<li><p>$name $ordervalue</p></li>\n";
$OpenOrder = fopen($FileName, "a");
$OpenOrder2 = fopen($FileName2, "a");
	fwrite ($OpenOrder,$paragraph) ;
	fwrite ($OpenOrder2,$paragraph) ;	
	fclose ($OpenOrder);
	fclose ($OpenOrder2);
	
} 

//**************************************************************************************//
//		AOrder()									//
//		Append to the requisition order	in smaller font inside a table.		//
//**************************************************************************************//
function AOrder ($name,$ordervalue) {
$FileName=TMP. $_POST['checksheet'] ."aorder.html";
$OpenOrder = fopen($FileName, "a");
$small = "<li class=small>$name <b style=text-align:right;>$ordervalue</b></li>\n ";

fwrite ($OpenOrder,$small) ;

	fclose ($OpenOrder);
}




//**************************************************************************************//
//		APrintO()								//
//		Append to the Checksheet						//
//**************************************************************************************//
function APrintO ($value) {
$FileName=TMP. $_POST['checksheet'] ."aprint.html";
$OpenOrder = fopen($FileName, "a");
fwrite ($OpenOrder,"</fieldset><center>$value</center><fieldset>") ;
fclose ($OpenOrder);	
}




//**************************************************************************************//
//		APrintOrder()								//
//		Append to the Checksheet in smaller font inside a table.		//
//**************************************************************************************//
function APrintOrder ($name,$ordervalue) {
$FileName=TMP. $_POST['checksheet'] ."aprint.html";
$OpenOrder = fopen($FileName, "a");
fwrite ($OpenOrder,"<li class=small>$name <b>$ordervalue</b></li>\n ") ;
fclose ($OpenOrder);	
}









?>
