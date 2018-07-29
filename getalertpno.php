<?php
require_once('conn.php'); 
if(isset($_GET['pno'])) { //add_alert
	$sql = "select * from order_tb where cust_name='".$_GET['cust']."' and part_no='".$_GET['pno']."' and rev='".$_GET['rev']."'";
	$rsd = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($rsd) < 1) echo 'norecords';
}
else {
	$q = strtolower($_REQUEST["term"]);
	if (!$q) return;
	 
	$sql = "select DISTINCT at.customer, at.part_no, at.rev from alerts_tb at left outer join order_tb ot on (ot.cust_name != customer and ot.part_no != at.part_no and ot.rev != at.rev) where concat(at.customer,'_',at.part_no,'_',at.rev) LIKE '%$q%'";
	$rsd = mysql_query($sql);

	$data = array();

	while($rs = mysql_fetch_assoc($rsd)) {		
		$data[] = array(
			'label' => $rs['customer'] .'_'.$rs['part_no'] .'_'. $rs['rev']  ,
			'value' => $rs['customer'] .'_'.$rs['part_no'].'_'. $rs['rev'] );		
	}	
	echo json_encode($data);
	flush();
}
?>