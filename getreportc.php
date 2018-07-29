<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	

	/*	$sql = "SELECT  vendor_tb.c_shortname, porder_tb.customer FROM vendor_tb ,porder_tb where porder_tb.customer LIKE '%$q%' OR  vendor_tb.c_shortname LIKE '%$q%' ";
		$rsd = mysql_query($sql);
		
		$data = array();
		
		while($rs = mysql_fetch_array($rsd)) {
			
			$data[] = array(
			'label' => $rs['customer']  .'_'.  $rs['c_shortname']  ,
			'value' => $rs['customer'].'_'. $rs['c_shortname']
		
		
		
		);
			
			);
			
			
	  /*  $pno = $rs['part_no'];
			echo "$pno\n";
		}*/
		
		$sql = "select DISTINCT customer as cust_name  from porder_tb,vendor_tb  where customer LIKE '%$q%' ";
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_array($rsd)) {
		
		
		$data[] = array(
			'label' =>   $rs['cust_name']  ,
			'value' =>  $rs['cust_name']
		
		
		
		);

		}
	
	
	

	
	echo json_encode($data);
flush();
?>