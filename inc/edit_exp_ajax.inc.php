<?php
//print("Check");
$expp_id=$_GET['expp_id'];
$exparr=explode(":",$expp_id);
$id=$exparr[1];
//print("The no.".$exparr[1]."<br />\n");//test
$expd=$exparr[2];
//print("The Exp dte".$exparr[2]."<br />\n");//test
 if($expd==""){ $tango = array($id,"No Date Set"); } else {
    $yr=strval(substr($expd,4,4));
    $mo=strval(substr($expd,0,2));
    $da=strval(substr($expd,2,2));
//print("Year".$yr."<br />\n");
//print("Month".$mo."<br />\n");
//print("Day".$da."<br />\n");
$exp=date("Y-m-d H:i:s",mktime(0,0,0,$mo,$da,$yr));
$exp_disp=date("m/d/Y",mktime(0,0,0,$mo,$da,$yr));
//print("Expiration Date".$exp."<br />\n");
$tango=array($id,$exp_disp);

require_once('connectvars.php');
  $dbc1 = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection

$upexp_query="UPDATE sealedlist SET exp_date = '".$exp."' WHERE  id = '".$id."'";
                if($dbc1->query($upexp_query)==TRUE) { 
					
					
					
					
                    }
                
                 
                $dbc1->close();
			}
 echo json_encode($tango);
                
    
?>
