<?php
require_once('conn.php'); 
$stock_al_id = $_GET['stock_al_id'];
$sql = "SELECT * FROM stock_allocation WHERE id = ".$stock_al_id;
$res = mysql_query($sql);
while($row = mysql_fetch_assoc($res)){

	$newduedate = explode('-', $row['due_date']);
    $newduedate_after = $newduedate['1'].'-'.$newduedate['2'].'-'.$newduedate['0'];

    $newallocationdate = explode('-',$row['allocationdate']);
    $newallocationdate_after = $newallocationdate['1'].'-'.$newallocationdate['2'].'-'.$newallocationdate['0'];

    $newdeliveredon = explode('-',$row['delivered_on']);
    $newdeliveredon_after = $newdeliveredon['1'].'-'.$newdeliveredon['2'].'-'.$newdeliveredon['0'];

?>
<div class="allocation1" id="allocation1" >
	<form action="stock_allocation_edit.php" method="post">
		<input type="hidden" name="id" value="<?php echo $_GET['stock_al_id'] ?>">
		<input type="hidden" name="stockid" value="<?php echo $row['stock_id'] ?>">	
		<label>Customer</label>
		<input type="text" name="customer" id="get_customer" value="<?php echo $row['customer'] ?>" >
		<label>PO#</label>
		<input type="text" name="pono" value="<?php echo $row['pono'] ?>">
		<label>Due Date</label>
		<input type="text" name="duedate" id="dateIII" value="<?php echo $newduedate_after ?>">
		<label>Allocation Date</label>
		<input type="text" name="allocationdate" id="dateIV" value="<?php echo $newallocationdate_after ?>">
		<label>Quantity</label>
		<input type="text" name="qut"  value="<?php echo $row['qut'] ?>">
		<label>Allocate By</label>
		<select name="allocate_by">
			<option>Select</option>
			<option value="1" <?php if($row['allocate_by_id'] == 1){echo 'selected';} ?>>Issac Torres</option>
			<option value="2" <?php if($row['allocate_by_id'] == 2){echo 'selected';} ?>>Esau</option>
		</select>
		<label>Delivered On</label>
		<input type="text" name="deliveredon" id="dateV"  value="<?php echo $newdeliveredon_after ?>">

		<input type="button" value="Cancel" id="cancel" style="margin-top:30px;float:right;clear: none;">
	<input type="submit" value="Submit" style="margin-top:8px;float:right;clear:none;margin-right: 5px;">
		</form>
</div>
<?php } ?>

<script type="text/javascript">
	$j(document).ready(function(){
		$('#dateIII').datepicker({
		dateFormat: 'mm-dd-yy',
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>'
	});

	$('#dateIV').datepicker({
		dateFormat: 'mm-dd-yy',
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>'
	});

	$('#dateV').datepicker({
		dateFormat: 'mm-dd-yy',
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>'
	});

	$j("#cancel").click(function(){
			document.getElementById("allocation").style.display = "none";
			document.getElementById("popupBack").style.display = "none";
			document.getElementById("allocation1").style.display = "none";
			
		});
});

	$j('#get_customer').autocomplete({source:'getcus.php', minLength:1});

</script>