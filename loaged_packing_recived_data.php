<?php require_once('conn.php'); 

$part_no = $_REQUEST['pnorev'];

$query = "select * from porder_tb where po_number='$part_no' limit 1";
// echo $part_no;
$result = mysql_query($query) or die();
$customer = '';
$part_no = '';
$rev = '';
$customer_po ='';
$supplier ='';
$qty = 0;
while ($row = mysql_fetch_assoc($result)) {
	$customer = $row['customer'];
	$supplier = $row['vid'];
	$part_no = $row['part_no'];
	$rev = $row['rev'];
	$customer_po = $row['po'];
	$sqi = "select * from items_tb where pid='".$row['poid']."' and (itemdesc like '%PCB Fabrication%' or dpval LIKE '%pcb%')";
	$ress = mysql_query($sqi);
	while ($roww = mysql_fetch_assoc($ress)) {
		$qty = $roww['qty2'];
	}
	
}


?>


    <div id="txtshow1">
<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">
<tr>
	<td width="125" height="30">Customer</td>
	<td height="30"><label>

		<select name="customer" id="vid">
		<option value=''>Select Customer</option>
		<?php 
		$sqv = "select * from data_tb ORDER BY c_name";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_array($resv)) {
		?>
			<option value="<?php echo $rwv['data_id']; ?>" <?php if($rwv['c_name'] == trim($customer)){echo "selected=selected";} ?>><?php echo $rwv['c_name']; ?></option>
		<?php 
		
		// $quantity_order = $rwv[''];
		}
		?>
	  </select>
	  </label>
	</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Part No</td>
<td height="30"><input type="text" name="part_no" value="<?php echo $part_no; ?>"></td>
</tr>

<tr>
	</td>
		<td width="125" height="30">Supplier</td>
<td height="30">
<select name="supplier" >
		<option value=''>Select Supplier</option>
		<?php 
		$sqv = "select * from vendor_tb ORDER BY c_name";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_array($resv)) {
		?>
			<option value="<?php echo $rwv['data_id']; ?>" <?php if($rwv['data_id']== trim($supplier)){echo "selected=selected";} ?>><?php echo $rwv['c_name']; ?></option>
		<?php 
		
		}
		?>
	  </select>

</tr>
<tr>
	</td>
		<td width="125" height="30">Rev</td>
<td height="30"><input type="text" name="rev" value="<?php echo $rev; ?>"></td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Rec'd On</td>
<td height="30">
	<input type="text" name="rec_on" id="exampleI1" >
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">OTD Y/N</td>
<td height="30">
	<select name="otd">
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select>
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Customer PO</td>
<td height="30">
	<input type="text" name="customer_po" value="<?php echo $customer_po; ?>">
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Customer Due Date</td>
<td height="30">
	<input type="text" name="cus_due_date" id="exampleII2">
</td>
</tr>
<tr>
<tr>
	</td>
		<td width="125" height="30">Quantity Ordered</td>
		<td height="30">
		<input type="text" name="qty_ordered" value="<?php echo $qty; ?>">
	</td>
</tr>
</table>
<script type="text/javascript">
	$newJ("#exampleI1").click(function(){
		$newJ(this).datepicker().datepicker("show");
	});

	$newJ("#exampleII2").click(function(){
		$newJ(this).datepicker().datepicker("show");
	});
</script>