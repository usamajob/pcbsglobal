<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	 
	$sql = "select DISTINCT cust_name as cust_name  from order_tb where cust_name LIKE '%$q%'";
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_array($rsd)) {
		
		
		$data[] = array(
			'label' =>  $rs['cust_name']  ,
			'value' =>  $rs['cust_name']
		
		
		
		);
		
		
  /*  $pno = $rs['part_no'];
	    echo "$pno\n";*/
	}
	
	echo json_encode($data);
flush();
?>