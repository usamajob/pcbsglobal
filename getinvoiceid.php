<?php
require_once('conn.php'); 
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	 
//	$sql = "select * from invoice_tb";
$sql = "select * from invoice_tb where (part_no LIKE '%$q%' and rev LIKE '%$q%')";
//$sql = "select * from invoice_tb where (part_no LIKE '%$q%' and rev='".$_REQUEST['rev']."')";
//$sql = "select * from invoice_tb where (part_no='".$_REQUEST['part_no']."' and rev='".$_REQUEST['rev']."')";
	$rsd = mysql_query($sql);
	
	$data = array();
	
	while($rs = mysql_fetch_array($rsd)) {
		
		
		$data[] = array(
			'label' => $rs['invoice_id']+9976,
			'value' => $rs['invoice_id']+9976
		
		
		
		);
		
		
  /*  $pno = $rs['part_no'];
	    echo "$pno\n";*/
	}
	
	echo json_encode($data);
flush();
?>