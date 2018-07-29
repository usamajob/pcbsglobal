<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	
		$sql = "select DISTINCT part_no as part_no , c_name as cust_name , rev as rev from packing_tb,data_tb where data_tb.data_id=packing_tb.customer and part_no LIKE '%$q%'";
		$rsd = mysql_query($sql);
		
		$data = array();
		
		while($rs = mysql_fetch_array($rsd)) {
			
			
			$data[] = array(
				'label' => $rs['part_no']  .'_'. $rs['rev']  .'_'. $rs['cust_name'],
				'value' => $rs['part_no'].'_'. $rs['rev'] .'_'. $rs['cust_name']
			
			
			
			);
			
			
	  /*  $pno = $rs['part_no'];
			echo "$pno\n";*/
		}
	
	
	echo json_encode($data);
flush();
?>