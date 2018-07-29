<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	

	
		
		$sql = "select DISTINCT vendor_tb.c_shortname as sname from vendor_tb  where  c_shortname LIKE '%$q%' ";
		
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_array($rsd)) {
		
		
		$data[] = array(
			'label' => $rs['sname']  ,
			'value' => $rs['sname']
		
		
		
		);

		}
	
	
	

	
	echo json_encode($data);
flush();
?>