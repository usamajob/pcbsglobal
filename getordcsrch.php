<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	
		$pattern_text = '/^[a-z A-Z]+$/';
		
	if(!(preg_match($pattern_text,$q)))
	{
	
				$sql = "select DISTINCT part_no as part_no , customer as cust_name , rev as rev from corder_tb where part_no LIKE '%$q%' OR customer LIKE '%$q%' ";
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_array($rsd)) {
		
		
		$data[] = array(
			'label' => $rs['part_no']  .'_'. $rs['rev'].'_'.  $rs['cust_name']  ,
			'value' => $rs['part_no'].'_'. $rs['rev'].'_'. $rs['cust_name']
		
		
		
		);
		
		
  /*  $pno = $rs['part_no'];
	    echo "$pno\n";*/
	}
	}
	else	
	{
		$sql = "select DISTINCT customer as cust_name from corder_tb where customer LIKE '%$q%' ";
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_array($rsd)) {
		
		
		$data[] = array(
			'label' =>   $rs['cust_name']  ,
			'value' =>  $rs['cust_name']
		
		
		
		);
		
		
  /*  $pno = $rs['part_no'];
	    echo "$pno\n";*/
	}
	}
	
	

	
	echo json_encode($data);
flush();
?>