<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
/*$sql = "select * from profile_tb ";
$ress = mysql_query($sql);
if($ress) {
	while($prow = mysql_fetch_assoc($ress)) {
		$temp = array();
		$temp = explode('|', $prow['reqs']);
		foreach($temp as $k => $v){
			$sql2 = "insert into profile_tb2 (profid, reqs) values ('".$prow['profid']."', '".$v."')";
			echo "<br>".$sql2;
			mysql_query($sql2);
		}
	}
}
*/

/*** Insert misc charges ****/
$sql = " select ord_id, descharge, desdesc, descharge1, desdesc1, descharge2, desdesc2 from order_tb where (descharge != '' AND descharge != 0.00) OR (descharge1 != '' AND descharge1 != 0.00) OR (descharge2 != '' AND descharge2 != 0.00) ";
$ress = mysql_query($sql);
if($ress) {
	while($mrow = mysql_fetch_assoc($ress)) {	
		if($mrow['descharge'] != '' && $mrow['descharge'] != 0.00) {
			$sql2 = "insert into misc_charges (order_id, amount, ch_desc) values ('".$mrow['ord_id']."', '".str_replace(',','',$mrow['descharge'])."', '".$mrow['desdesc']."')";
			echo "<br>".$sql2;
			mysql_query($sql2);
		}
		if($mrow['descharge1'] != '' && $mrow['descharge1'] != 0.00) {
			$sql2 = "insert into misc_charges (order_id, amount, ch_desc) values ('".$mrow['ord_id']."', '".str_replace(',','',$mrow['descharge1'])."', '".$mrow['desdesc1']."')";
			echo "<br>".$sql2;
			mysql_query($sql2);
		}
		if($mrow['descharge2'] != '' && $mrow['descharge2'] != 0.00) {
			$sql2 = "insert into misc_charges (order_id, amount, ch_desc) values ('".$mrow['ord_id']."', '".str_replace(',','',$mrow['descharge2'])."', '".$mrow['desdesc2']."')";
			echo "<br>".$sql2;
			mysql_query($sql2);
		}
		echo "<br>";
	}
}

exit;
?>