<?php

$unitarr="Medic_1";
//$unitarr="Medic_2";
//$unitarr="Medic_3";
//$unitarr="Medic_4";
//$unitarr="Medic_5";
//$unitarr="Medic_6";
//$unitarr="Medic_7";
//$unitarr="Medic_8";
//$unitarr="Medic_9";
//$unitarr="Medic_10";
//$unitarr="Medic_11";
//$unitarr="Medic_12";
//$unitarr="Medic_14";
//$unitarr="Medic_15";
//$unitarr="Medic_16";
//$unitarr="Medic_20";
//$unitarr="Medic_21";
//$unitarr="Medic_22";
//$unitarr="Medic_24";
//$unitarr="Medic_26";
//$unitarr="EMS-301";
//$unitarr="EMS-302";
//$unitarr="EMS Supervisor/Captains";
//$unitarr="";
//$title = $unitarr;
include("title.inc.php");


	$newtable= "scems_".$unitarr;
						
require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                                     if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}
                     $requery = "SELECT * FROM `TABLE 2` WHERE `Unit` = '".$unitarr."' ORDER BY `Call Received Time`";
                     
                   $requnits=mysqli_query($dbc,$requery) or die ("Aint cnnt"); 
					     while ($row = mysqli_fetch_array($requnits)) {
			 $id=$row['id'];
			 $incident_no=mysqli_real_escape_string($dbc,$row['Incident Number']);
			 $incident_date= date('Y-m-d H:i:s', strtotime($row['Incident Date']));
			 //$incident_date= preg_replace('#(\d{4})/(\d{2})/(\d{2})\s(.*)#', '$1-$2-$3 $4', $row['incident_time']);
			 print("ID: ".$id."--Incident Date:".$incident_date."<br />\n");
             $unit=mysqli_real_escape_string($dbc,$row['Unit']);
             $call_recieved = date('Y-m-d H:i:s', strtotime($row['Call Received Time']));
			//$call_recieved = preg_replace('#(\d{4})/(\d{2})/(\d{2})\s(.*)#', '$1-$2-$3 $4', $row['call_reicieved']);
            // $call_recieved=$row['call_reicieved'];
             $address=mysqli_real_escape_string($dbc,$row['Address1']);
			$incident_closed = date('Y-m-d H:i:s', strtotime($row['Incident Closed Time']));
			//$incident_closed = preg_replace('#(\d{4})/(\d{2})/(\d{2})\s(.*)#', '$1-$2-$3 $4', $row['incident_closed']);
             //$incident_closed=$row['incident_closed'];
             $dispatch_nature=mysqli_real_escape_string($dbc,$row['Dispatch Nature']);
             $response_urgency=mysqli_real_escape_string($dbc,$row['Response Urgency']);
  
require_once('connectvars.php');
             $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // check connection
                                     if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}
                 $set_rquery="INSERT INTO `eso_report`.`".$newtable."` ( `id` , `incident_no`, `incident_date`, `unit`, `call_recieved`,`address`,`incident_closed`, `dispatch_nature`, `response_urgency`) VALUES( NULL,'".$incident_no."', '".$incident_date."', '".$unit."', '".$call_recieved."','".$address."','".$incident_closed."', '".$dispatch_nature."', '".$response_urgency."')";
                mysqli_query($dbc,  $set_rquery) or die (mysqli_error($dbc));           
                         
                        

                         
                        } 
                      mysqli_free_result($requnits);

                        mysqli_free_result($set_rquery);

                        mysqli_close($dbc);
                        
                        
include("footer.inc.php");
                        ?>
