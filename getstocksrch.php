<?php
require_once('conn.php'); 
$q = strtolower($_REQUEST["term"]);
if (!$q) return;
 
if(isset($_GET['r'])) { // Return slip Manage search

	if($_GET['r'] == '2')
		$sql = "select DISTINCT v.data_id as vval, v.c_name as lbl from return_slip_tb rs inner join vendor_tb v on rs.vid = v.data_id where c_name LIKE '%$q%'";
	else if($_GET['r'] == '1')
		$sql = "select DISTINCT part_no as vval, part_no as lbl from return_slip_tb where part_no LIKE '%$q%'";

	$rsd = mysql_query($sql) or die(mysql_error());

	$data = array();

	while($rs = mysql_fetch_assoc($rsd)) {	
		
		$data[] = array(
			'label' => $rs['lbl']  ,
			'value' => $rs['vval']		
		);		
	}
}
else {
	if($_GET['s'] == '2')
		$sql = "select DISTINCT customer as sval from stock_tb where customer LIKE '%$q%'";
	else if($_GET['s'] == '1')
		$sql = "select DISTINCT part_no as sval from stock_tb where part_no LIKE '%$q%'";

	$rsd = mysql_query($sql);

	$data = array();

	while($rs = mysql_fetch_assoc($rsd)) {	
		
		$data[] = array(
			'label' => $rs['sval']  ,
			'value' => $rs['sval']		
		);		
	}
}
	
echo json_encode($data);
flush();
?>