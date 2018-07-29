<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
$pieces = explode("_", $_GET['pno']);
$pno = $pieces[0];
$rev = $pieces[1];
$cname = $pieces[2];

/*$sqls = "SELECT sum( sta ) stkadded, sum( stkr ) stkret, saddedon FROM (
	SELECT st.qty sta, st.dtadded saddedon, (
		SELECT sum( sr.qty )
		FROM stock_ret sr
		WHERE st.stkid = sr.stkid
		GROUP BY sr.stkid
		) stkr
		FROM stock_tb st
		WHERE st.part_no = '".$pno."'
	) s";*/

$sqlss = "SELECT sum(qty) sta, dc, finish, dtadded,comments,manuf_dt ,stkid
		FROM stock_tb 
		WHERE part_no = '".$pno."' and customer = '".$cname."' and rev = '".$rev."' and dc <> '' group by dc";
 $sqls = "SELECT sum(qty) sta, dc, finish, dtadded,comments,manuf_dt,stkid 
		FROM stock_tb 
		WHERE part_no = '".$pno."' and customer = '".$cname."' and rev = '".$rev."' and dc <> '' group by dc";
//echo $sqls;

$ress = mysql_query($sqls);
$resss = mysql_query($sqlss);
// background color changeing 
$rowbg = 'background: #cf9;padding:10px;';

while($rowss = mysql_fetch_assoc($resss)){
			if($rowss['manuf_dt'] != '') {
				$mdt = explode('-', $rowss['manuf_dt']);
				$mdate = $mdt[0]."-".$mdt[2];
				$timestamp = strtotime($mdt[2].'-'.$mdt[0].'-'.$mdt[1]);

				if( ($rowss['finish'] == 'HASL' && (time() - $timestamp)/(3600*24) > 170) || (($rowss['finish'] == 'ENIG' || $rowss['finish'] == 'ENEPIG') && (time() - $timestamp)/(3600*24) > 350) ) {
					$rowbg = 'background: #fcc;padding:10px;';
								 
				}
			}
			}
// color changing finish 

if(mysql_num_rows($ress) > 0) {
?>
<div style="<?php echo $rowbg; ?>">
<?php

	echo "<a href='javascript:void(0)' id='stockclose' style='color:#c00; float:right'>Close</a>";
	echo "<h3> Stock </h3>";
	echo "<h3>Part no: ".$pno." Rev: ".$rev."</h3>";

	$total = 0;
$sql_get_allocation = "SELECT * FROM stock_tb LEFT JOIN stock_allocation ON stock_tb.stkid = stock_allocation.stock_id WHERE stock_tb.part_no  ='".$pno."' AND
stock_allocation.stock_id = stock_tb.stkid AND stock_allocation.delivered_on = 00-00-0000";
	$res_get_allocation = mysql_query($sql_get_allocation);
	while($rows = mysql_fetch_assoc($ress)){
		$get_bal_sql = "SELECT SUM(qut) AS QTY FROM stock_allocation WHERE stock_id = ".$rows['stkid'] ." AND delivered_on = 00-00-0000";
		$get_bal_res = mysql_query($get_bal_sql);
		while($get_bal_row = mysql_fetch_assoc($get_bal_res)){
			$get_bal = $rows['sta'] - $get_bal_row['QTY'];
		}
		if($rows['dc'] != '') {
			echo "<span style='color:#00C'>DC:</span>&nbsp;".$rows['dc']."&nbsp;<span style='color:#00C'>Finish:</span>&nbsp;".$rows['finish']."&nbsp;<br><span style='color:#00C'>Added:</span>".substr($rows['dtadded'], -10)."&nbsp;<div style='float:right; display: inline'><span style='color:#00C;'>Qty#</span>&nbsp;".$rows['sta']." &nbsp; <span style='color:#00C;'>Bal</span> ".$get_bal."</div><br>";
			
		}
		$total += $rows['sta'];
		$comment = $rows['comments'];

	}



	echo "";

	echo "<h3>Allocation(s)</h3>";
	
	?>
	<table class="al_tb">
	<tr>
		<th>Customer</th>
		<th style="width: 40px;">Qty</th>
		<th style="width: 80px;">Due Date</th>
	</tr>
	<?php
	while ($row_allocation = mysql_fetch_assoc($res_get_allocation)) {
		?>

	<tr>
		<td><?php echo $row_allocation['customer']; ?></td>
		<td><?php echo $row_allocation['qut']; ?></td>
		<td><?php echo date("m-d-Y",strtotime($row_allocation['due_date'])); ?></td>
	</tr>

		<?php

	}
	echo "</table>";

	// echo "<b>Comment :</b> <br>".$comment ;
?>
</div>
<?php	
}

else {
 echo "norecords";
}

?>
