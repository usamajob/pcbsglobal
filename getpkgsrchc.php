<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	
		$sql = "select DISTINCT dt.c_shortname cust_name from data_tb dt inner join packing_tb pt on dt.data_id = pt.customer where dt.c_shortname LIKE '%$q%'";
		$rsd = mysql_query($sql);
		
		$data = array();
		
		while($rs = mysql_fetch_assoc($rsd)) {
						
			$data[] = array(
				'label' => $rs['cust_name'],
				'value' => $rs['cust_name']					
			);			
		}
	
	echo json_encode($data);
flush();
?>