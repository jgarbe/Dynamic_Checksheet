<?php 
// Written by Jim Garbe
//**************************************************************************************//
//	ClearOrder()									//
//		Erase the data requisition files, set the Head Vehicle			//
//		 Title and start the first list						//
//**************************************************************************************//
function ClearOrder ($Checksheetno) {

$FileName= TMP. $Checksheetno."order.html";
$FileName2=TMP. $Checksheetno ."print.html";
$FileName3=TMP. $Checksheetno."emailh.txt";
$FileName4=TMP. $Checksheetno."order.xml";
$Headertop="<meta http-equiv=content-style-type content=text/css><link rel=stylesheet href=../css/truckorder.css>\n<center>".$Checksheetno."</center>\n<fieldset>";
$Ordertop="<meta http-equiv=content-style-type content=text/css><link rel=stylesheet href=../css/orderreq.css>\n<center>".$Checksheetno."</center>\n<ul>";
$Ordertop4="<?xml version=\"1.0\" ?>\n<rss version=\"2.0\">\n\t<channel>\n\t<title>". $Checksheetno." Maintenance Report</title>\n\t<description>Maintenance</description>\n\t<link>".HOME."tmp/". $Checksheetno."order.html</link>\n\n\t\t<item>\n\t<title>The Maintenance Page of ".$Checksheetno."</title>\n
    <description>";
$OpenOrder = fopen($FileName, "w");
$OpenOrder2 = fopen($FileName2, "w");
$OpenOrder3 = fopen($FileName3, "w");
$OpenOrder4 = fopen($FileName4, "w");
	fwrite ($OpenOrder,$Ordertop) ;
	fwrite ($OpenOrder2,$Headertop) ;
	fwrite ($OpenOrder4,$Ordertop4) ;
	fwrite ($OpenOrder3,"") ;	
	fclose ($OpenOrder);
	fclose ($OpenOrder2);
	fclose ($OpenOrder3);
	fclose ($OpenOrder4);
}
//******************************************************//
//	 Ending function ClearOrder()			//
//******************************************************//
//**************************************************************************************//
//	HeadOrder()									//
//		Add to the data requisition *.html files.				//
//**************************************************************************************//
function HeadOrder ($Checksheetno,$name,$ordervalue) {
$FileName=TMP.$Checksheetno."order.html";
$FileName2=TMP. $Checksheetno."print.html";
$FileName4=TMP.$Checksheetno."order.xml";
$order="<li class=small>$name <b>$ordervalue</b></li>\n";
$order4="$name\t $ordervalue\n";
$OpenOrder = fopen($FileName, "a");
$OpenOrder2 = fopen($FileName2, "a");
$OpenOrder4 = fopen($FileName4, "a");
	fwrite ($OpenOrder,$order) ;
	fwrite ($OpenOrder2,$order) ;
	fwrite ($OpenOrder4,$order4) ;
	fclose ($OpenOrder4);
	fclose ($OpenOrder);
	fclose ($OpenOrder2);	
}
//******************************************************//
//	 Ending function HeadOrder()			//
//******************************************************//
//**************************************************************************************//
//	CategoryOrder()									//
//		Add to the data requisition *.html files.				//
//**************************************************************************************//
function CategoryOrder ($Checksheetno,$cat) {
$FileName=TMP.$Checksheetno."order.html";
$order="\n<br><TABLE width=100% border=0 align=center><TR><TD></TD><TD><b>$cat</b></TD></tr></TABLE>\n";
$OpenOrder = fopen($FileName, "a");
	fwrite ($OpenOrder,$order) ;;
	fclose ($OpenOrder);	
}
//******************************************************//
//	 Ending function HeadOrder()			//
//******************************************************//


//**************************************************************************************//
//	PHeadOrder()									//
//		Add to the data requisition *.html files.				//
//**************************************************************************************//
function PHeadOrder ($Checksheetno,$name,$ordervalue) {
$FileName=TMP. $Checksheetno ."order.html";
$FileName2=TMP. $Checksheetno ."print.html";
$FileName4=TMP. $Checksheetno ."order.xml";
$order="<center><li class=small>$name <b>$ordervalue</b></li></center>\n";
$order4="\t\t\t$name\t $ordervalue\n";
$OpenOrder = fopen($FileName, "a");
$OpenOrder2 = fopen($FileName2, "a");
$OpenOrder4 = fopen($FileName4, "a");
	fwrite ($OpenOrder,$order) ;
	fwrite ($OpenOrder2,$order) ;
	fwrite ($OpenOrder4,$order4) ;
	fclose ($OpenOrder4);
	fclose ($OpenOrder);
	fclose ($OpenOrder2);	
}
//******************************************************//
//	 Ending function PHeadOrder()			//
//******************************************************//


//**************************************************************************************//
//	SubjOrder()									//
//		Add item to e-mail		.					//
//**************************************************************************************//
function SubjOrder ($Checksheetno,$name,$ordervalue) {
	
$FileName3=TMP. $Checksheetno ."emailh.txt";
$OpenOrder3 = fopen($FileName3, "a");
	fwrite ($OpenOrder3,"$name' '$ordervalue\r\n") ;
	fclose ($OpenOrder3);
}

//**************************************************************************************//
//	MHeadOrder()									//
//		Append to the *.html documents	.					//
//**************************************************************************************//
function MHeadOrder ($Checksheetno,$name,$ordervalue) {
$FileName=TMP. $Checksheetno ."order.html";
$FileName2=TMP. $Checksheetno ."print.html";
$paragraph="<li><p>$name $ordervalue</p></li>\n";
$OpenOrder = fopen($FileName, "a");
$OpenOrder2 = fopen($FileName2, "a");
	fwrite ($OpenOrder,$paragraph) ;
	fwrite ($OpenOrder2,$paragraph) ;	
	fclose ($OpenOrder);
	fclose ($OpenOrder2);


$FileName4=TMP. $Checksheetno ."order.xml";
$paragraph4="$name\t$ordervalue\n";
$OpenOrder4 = fopen($FileName4, "a");
	fwrite ($OpenOrder4,$paragraph4) ;
	fclose ($OpenOrder4);
	
} 

//**************************************************************************************//
//		Order()									//
//		Append to the requisition order	in smaller font inside a table.		//
//**************************************************************************************//
function Order ($Checksheetno,$name,$ordervalue) {
$FileName=TMP. $Checksheetno ."order.html";
$OpenOrder = fopen($FileName, "a");
$small = "<li class=small>".$name." <b style=text-align:right;>".$ordervalue."</b></li>\n ";

fwrite ($OpenOrder,$small) ;

	fclose ($OpenOrder);


$FileName4=TMP. $Checksheetno ."order.xml";
$OpenOrder4 = fopen($FileName4, "a");
$small4 = "".$name."\t".$ordervalue."\n ";

fwrite ($OpenOrder4,$small4) ;

	fclose ($OpenOrder4);

}
//**************************************************************************************//
//		PrintO()								//
//		Append to the Checksheet						//
//**************************************************************************************//
function PrintO ($Checksheetno,$value) {
$FileName=TMP. $Checksheetno ."print.html";
$OpenOrder = fopen($FileName, "a");
fwrite ($OpenOrder,"</fieldset><center>$value</center><fieldset>") ;
fclose ($OpenOrder);	
}
//**************************************************************************************//
//		PrintOrder()								//
//		Append to the Checksheet in smaller font inside a table.		//
//**************************************************************************************//
function PrintOrder ($Checksheetno,$name,$ordervalue) {
$FileName=TMP. $Checksheetno ."print.html";
$OpenOrder = fopen($FileName, "a");
fwrite ($OpenOrder,"<li class=small>$name <b>$ordervalue</b></li>\n ") ;
fclose ($OpenOrder);	
}


?>
