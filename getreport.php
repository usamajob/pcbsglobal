<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;	
		
	/*
	$sql = "select DISTINCT part_no as part_no , rev as rev , customer as cust_name from porder_tb where part_no LIKE '%$q%'";
		$rsd = mysql_query($sql);
		
		$data = array();
		
		while($rs = mysql_fetch_array($rsd)) {
			
			
			$data[] = array(
				'label' => $rs['part_no'].'_'. $rs['rev'] .'_'.  $rs['cust_name']  ,
				'value' => $rs['part_no'].'_'. $rs['rev'].'_'. $rs['cust_name']			
			);			
	*/
	
	$sql = "select DISTINCT part_no as part_no , customer as cust_name , rev as rev  from porder_tb where part_no LIKE '%$q%'  ";
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_assoc($rsd)) {
		
		$data[] = array(
			'label' => $rs['part_no'] .'_'. $rs['rev'] .'_'.  $rs['cust_name']  ,
			'value' => $rs['part_no'].'_'. $rs['rev'].'_'. $rs['cust_name']
		
		);

}
echo json_encode($data);
flush();
?>