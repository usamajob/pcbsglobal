<?php require_once('conn.php'); 

$pieces = explode("_", $_REQUEST['pnorev']);
$pno = $pieces[0]; // piece1
$temp = $pieces[1];
$cname = $pieces[2];
$pieces1 = explode("_",$temp);
$rev = $pieces1[0]; // piece2

$date1 = isset($_REQUEST['date1']) ? $_REQUEST['date1'] : '';

$query = "select * from order_tb where (( part_no='$pno') and (rev='$rev') and (cust_name='$cname')) limit 1";
/*echo $query; exit;*/
$result = mysql_query($query) or die();
$row = mysql_fetch_object($result);

$name = $row->cust_name; 
$cpo = $row->cpo; 
$opo = $row->opo; 
$req_by = $row->req_by;

$lyrcnt = $row->no_layer; 
$cancharge = $row->cancharge; 

$query11 = "select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname')) limit 1";
/*echo $query11; exit;*/
$result11 = mysql_query($query11) or die();
$row11 = mysql_fetch_object($result11);

$po = $row11->poid; 
if ($po > 0) $po = $po + 9933;
else $po = '';

$query2 = "select data_id from data_tb where c_name='$cname' limit 1";
$result2 = mysql_query($query2) or die();
$row2 = mysql_fetch_assoc($result2);
$data_id = $row2['data_id']; 

?>
<table width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="position: relative;
top: -90px;">

<tr>
  <td height="30" width="140">Part # </td>
  <td height="30"><input name="part_no" type="text" id="part_no" value="<?php echo $pno; ?>" size="30"></td>
</tr>

<tr>
  <td height="30">Customer </td>
  <td height="30"><input name="customer" type="text" id="customer" value="<?php echo $name; ?>" size="30"></td>
</tr>
 
<tr>
  <td height="30">Rev </td>
  <td height="30"><input name="rev" type="text" id="rev" value="<?php echo $rev; ?>" size="30"></td>
</tr>

<tr>
  <td height="30">Our PO#</td>
  <td height="30"><select name="oo">
  <option value="">--select--</option>
  <?php 
	$query13 = "select * from porder_tb where (( part_no='$pno') and (rev='$rev')and (customer='$cname'))";
	$res13 = mysql_query($query13) or die('error in ');
	while($rw13 = mysql_fetch_assoc($res13)) {
		$tc = $rw13['poid'] + 9933;
		echo '<option value="'.$tc.'">'.$tc.'</option>';
	}
  ?>
  </select></td>
</tr>

<tr>
	<td height="30">Customer PO#</td>
	<td height="30"><?php 
	$sqo = "select DISTINCT po from packing_tb where ( part_no='$pno') and (rev='$rev') and po <> ''";
	$reso = mysql_query($sqo) or die('error in data');
	if(mysql_num_rows($reso) > 0) {
		echo '<select name="po" id="po" onchange="getdate();">
		<option value="">--SELECT--</option>';
	 while($rwo = mysql_fetch_assoc($reso)) {
		 ?>
		 <option value="<?php echo $rwo['po'] ?>" <?php if($rwo['po'] == $rws['po']) { ?> selected="selected"<?php } ?>><?php echo $rwo['po'] ?></option>
		 <?php 
	 }
		 echo '</select>';
	 }
	 else echo '<input name="po" type="text" id="po" size="30">';
	 ?>  
	<input type="hidden" name="cancharge" id="cancharge" value="<?php echo $cancharge; ?>" />
	</td>
</tr>

<tr>
  <td height="30">Ordered by</td>
  <td height="30"><input name="ord_by" type="text" id="ord_by" value="<?php echo $req_by; ?>"  size="30"></td>
</tr>

<tr>
  <td height="30">Layer Count</td>
  <td height="30"><input name="lyrcnt" id="lyrcnt" value="<?php echo $lyrcnt; ?>" /></td>
</tr>
</table>

<?php if(isset($_REQUEST['frm']) && $_REQUEST['frm'] == 'inv') { 
	echo '<table width="750" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="position: relative; top: -90px;" id="blkdate">';
	
	$sqsh = "select distinct pt.date1 from packing_tb pt 
	inner join data_tb dt on pt.vid = dt.data_id where pt.part_no='$pno' and pt.rev='$rev' and dt.c_name='$cname' ORDER BY pt.invoice_id";

	$ressh = mysql_query($sqsh) or die('err');	

	echo '<tr><td width="140" height="30">Delivered On</td>
	<td height="30">';

	if(mysql_num_rows($ressh) > 0) {
		echo '<select name="date1">';
		$flag = 0;
		while($rwsh = mysql_fetch_assoc($ressh)) {
			echo '<option value="'.$rwsh['date1'].'" '.($date1 == $rwsh['date1'] ? ' SELECTED ' : '').'>'.$rwsh['date1'].'</option>';
			if($date1 == $rwsh['date1']) $flag = 1; 
		}
		if($flag == 0 && $date1 != '')
			echo '<option value="'.$date1.'" SELECTED >'.$date1.'</option>';

		echo '</select>';
	}
	else { ?>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true }); });
</script>
<?php
		echo '<input name="date1" type="text" id="exampleII" value="'.$date1.'" size="30">';
	}

	echo '</td></tr></table>';
} 
?>