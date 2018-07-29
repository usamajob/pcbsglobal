<?php
require_once('conn.php'); 
$q = strtolower($_REQUEST["term"]);
if (!$q) return;

$sql = "select DISTINCT pt.customer, pt.part_no, pt.rev, it.qty2 qty from porder_tb pt inner join items_tb it on pt.poid=it.pid where (pt.part_no LIKE '%$q%' OR pt.customer LIKE '%$q%') and it.qty2 > 1 order by item_id limit 1";
$rsd = mysql_query($sql);

if (mysql_num_rows($rsd) < 1) {
	$sql = "select DISTINCT customer, part_no, rev, qty from stock_tb where part_no LIKE '%$q%' OR customer LIKE '%$q%'";

	$rsd = mysql_query($sql);
}

$data = array();

while($rs = mysql_fetch_assoc($rsd)) {	

$data[] = array(
	'label' => $rs['customer'].'_'.$rs['part_no'] .'_'. $rs['rev'] .'_'.  $rs['qty']  ,
	'value' => $rs['customer'].'_'.$rs['part_no'] .'_'. $rs['rev'] .'_'.  $rs['qty']		
);		
}
	
echo json_encode($data);
flush();
?>