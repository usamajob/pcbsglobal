<?php
require_once('conn.php'); 
$q = strtolower($_REQUEST["term"]);
if (!$q) return;
 
if($_GET['s'] == '2')
	$sql = "select DISTINCT customer as sval from alerts_tb where customer LIKE '%$q%'";
else if($_GET['s'] == '1')
	$sql = "select DISTINCT part_no as sval from alerts_tb where part_no LIKE '%$q%'";

$rsd = mysql_query($sql);

$data = array();

while($rs = mysql_fetch_assoc($rsd)) {	
	
	$data[] = array(
		'label' => $rs['sval']  ,
		'value' => $rs['sval']		
	);		
}
	
echo json_encode($data);
flush();
?>