<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	 
	$sql = "select DISTINCT c_name from vendor_tb where c_name LIKE '%$q%'";
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_array($rsd)) {		
		
		$data[] = array(
			'label' => $rs['c_name']  ,
			'value' => $rs['c_name']		
		);
	}
	
	echo json_encode($data);
flush();
?>