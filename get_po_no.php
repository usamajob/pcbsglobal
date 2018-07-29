<?php
require_once('conn.php'); 
$q = strtolower($_REQUEST["term"]);
if (!$q) return;
 $sql = "select DISTINCT po_number from porder_tb where po_number LIKE '%$q%'";
$rsd = mysql_query($sql);

$data = array();

while($rs = mysql_fetch_array($rsd)) {		
	
	$data[] = array(
		'label' => $rs['po_number'] ,
		'value' => $rs['po_number']	
	);		
}
	
echo json_encode($data);
flush();
?>