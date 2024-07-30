<?php

// Written by Jim Garbe
function item_select($Checksheetno,$Checksheet) {
		//print($Checksheetno);	
$count=0;
		
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$sql2= "SELECT ".$Checksheet.".item_id FROM ".$Checksheet.",Items WHERE Items.item_id = ".$Checksheet.".item_id AND Items.perishable = '1' order by item_id";
				$result2 = mysqli_query($dbc, $sql2) or die ("can't get the DHMItems selection");
         while ($row2=mysqli_fetch_array($result2)) { 
			$pitem_id = $row2['item_id'];
					$count=$count+1;
				if ($citem_id != $pitem_id ) {$count=1;}
		$pcount[$pitem_id]=$count;
			 $citem_id = $pitem_id;
							}


	$pchoice=array();
		$sql= "SELECT * FROM ".$Checksheetno." WHERE ".$Checksheetno.".item_id  NOT IN (SELECT ".$Checksheet.".item_id FROM ".$Checksheet.")";
				$result = mysqli_query($dbc, $sql) or die ("can't get the Items selection");
         while ($row=mysqli_fetch_array($result)) { 
			$item_id=$row['item_id'];
			$hm=$row['hm_value_id'];
			if($hm == 20 ){$hm=1;}
			if($hm == 26 ){$hm=2;}
			$name= ItemidtoName($item_id);
			$perishable=  ItemidtoP($item_id);
	$pchoice[$item_id]=array($name,$hm,$perishable);
							}


				foreach ($pcount as $pitem_id => $count) {
	$sqldiff= "SELECT * FROM ".$Checksheetno." WHERE ".$Checksheetno.".item_id = '".$pitem_id."'";			$resultdiff = mysqli_query($dbc, $sqldiff) or die ("can't get the DIFF selection");
				while ($rowdiff=mysqli_fetch_array($resultdiff)) {
				$hmdiff = $rowdiff['hm_value_id'];
				
			if($hmdiff == 20 ){$hmdiff=1;}
			if($hmdiff == 26 ){$hmdiff=2;}
				$pname= ItemidtoName($pitem_id);
				$pperishable=  ItemidtoP($pitem_id);
			if ($hmdiff != $count) {
					$Adiff=$hmdiff-$count;
					 $pchoice[$pitem_id]=array($pname,$Adiff,$pperishable);
						}
									}

							}  //end of foreach()
//print_r2($pcount);
//print_r2($pchoice);
return $pchoice;
mysqli_close($dbc);
}


?>
