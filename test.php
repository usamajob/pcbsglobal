<?php require_once('conn.php');
?>


<?php 

	/*$sql = "SELECT porder_tb.poid,porder_tb.podate FROM porder_tb  ";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res)) {

		$get_date = $row['podate'];
		$explode = explode('/',$get_date);
		$updated_date = $explode[2]."-".$explode[0]."-".$explode[1];
		$sql_update = "UPDATE porder_tb SET real_date = '".$updated_date."' WHERE poid = ".$row['poid'];
		mysql_query($sql_update);
	}
*/
	/*$sql = "SELECT packing_tb.invoice_id,packing_tb.podate FROM packing_tb  ";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res)) {

		$get_date = $row['podate'];
		$explode = explode('/',$get_date);
		$updated_date = $explode[2]."-".$explode[0]."-".$explode[1];
		$sql_update = "UPDATE packing_tb SET real_date = '".$updated_date."' WHERE invoice_id = ".$row['invoice_id'];
		mysql_query($sql_update);
	}*/


	$sql_update_po_num = "UPDATE porder_tb SET po_number = porder_tb.poid+9933";
	mysql_query($sql_update_po_num);
 ?>