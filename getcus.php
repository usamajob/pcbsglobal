<?php
require_once('conn.php'); 
$q = strtolower($_REQUEST["term"]);
if (!$q) return;
 
$sql = "select DISTINCT c_shortname,data_id  from data_tb where c_shortname LIKE '%$q%'";
$rsd = mysql_query($sql);

$data = array();

while($rs = mysql_fetch_array($rsd)) {		
	
	$data[] = array(
		'label' => $rs['c_shortname'],
		'value' => $rs['c_shortname']	
	);		
}
	
echo json_encode($data);
flush();
?>