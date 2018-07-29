<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	$clause = '';
	if(isset($_REQUEST["pending"]) && $_REQUEST["pending"] == 'yes')
	$clause = " and pending='Yes' ";
	 
	$sql = "select DISTINCT customer as cust_name from invoice_tb where customer LIKE '%$q%'".$clause;
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_array($rsd)) {		
		
		$data[] = array(
			'label' => $rs['cust_name']  ,
			'value' => $rs['cust_name']		
		);
	}
	
	echo json_encode($data);
flush();
?>