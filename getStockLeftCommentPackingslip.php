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
		WHERE part_no = '".$pno."' group by dc";
 $sqls = "SELECT sum(qty) sta,comments,stkid 
		FROM stock_tb 
		WHERE part_no = '".$pno."'  group by dc";
//echo $sqls;

$ress = mysql_query($sqls);
$resss = mysql_query($sqlss);
// background color changeing 
$rowbg = 'background: #f5d079;padding:10px;';

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
$comment = null;
if(mysql_num_rows($ress) > 0) {
	$total = 0;
	while($rows = mysql_fetch_assoc($ress)){
		$get_bal_sql = "SELECT SUM(qut) AS QTY FROM stock_allocation WHERE stock_id = ".$rows['stkid'] ." AND delivered_on = 00-00-0000";
		$get_bal_res = mysql_query($get_bal_sql);
		while($get_bal_row = mysql_fetch_assoc($get_bal_res)){
			$get_bal = $rows['sta'] - $get_bal_row['QTY'];
		}
		
		$total += $rows['sta'];

		$comment = $rows['comments'];

	}
}
if($comment!=null){
?>
<div style="<?php echo $rowbg; ?>">
<?php

	echo "<a href='javascript:void(0)' id='stockCommentclose' style='color:#c00; float:right'>Close</a>";
	echo "<h3> Available Stock Comment </h3>";
	echo $comment ;
?>
</div>
<?php	
}

else {
 echo "no";
}

?>

