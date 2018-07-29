<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
if($_REQUEST['dupid'] != "") {

	$sqdup1 = ' CREATE TEMPORARY TABLE tmptable_2 SELECT * FROM packing_tb_loged WHERE id= "'.$_REQUEST['dupid'].'"';

	$sqdup2 = 'UPDATE  tmptable_2  SET id= NULL';
	$sqdup3 = 'INSERT INTO packing_tb_loged  SELECT * FROM tmptable_2';
	$sqdup4 = 'DROP TEMPORARY TABLE IF EXISTS tmptable_2';

	$sqdup1 = mysql_query($sqdup1) or die('error in data');
	$sqdup2 = mysql_query($sqdup2);
	$sqdup3 = mysql_query($sqdup3);
	///////////New code
	$duplicate_porder_id = mysql_insert_id();

	// $qry_update_duplicate_porder_date="UPDATE porder_tb  set podate='".date('m/d/Y')."' Where poid=".$duplicate_porder_id;
	// mysql_query($qry_update_duplicate_porder_date);
	///////end new-code

	$sqdup4 = mysql_query($sqdup4); 

	// $sqsc = "select * from items_tb where pid='".$_REQUEST['dupid']."'";
	// $resc = mysql_query($sqsc) or die('error in data');

	// while($rwsc = mysql_fetch_assoc($resc)) {
	// 	$sqin = "insert into items_tb(item,itemdesc,qty2,uprice,tprice,pid, dpval) values('".$rwsc['item']."','".$rwsc['itemdesc']."','".$rwsc['qty2']."','".$rwsc['uprice']."','".$rwsc['tprice']."','".$duplicate_porder_id."', '".$rwsc['dpval']."')";
	// 	$resin = mysql_query($sqin) or die('error in q');
	// }
	echo "<script type='text/javascript'>location.href='loged_packing_slip_list.php'</script>";
}

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Logged Packing Slips</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" />
<link href="style_Admin.css" rel="stylesheet" type="text/css">

<style type="text/css">	
tbody tr td {
    text-align: center;
}
</style>

<script type="text/javascript"> 
var $newJ = jQuery.noConflict();
jQuery(document).ready(function(){

	$newJ("#exampleII").click(function(){
		$newJ(this).datepicker().datepicker("show");
	});

	$newJ("#exampleIII").click(function(){
		$newJ(this).datepicker().datepicker("show");
	})
	
});
</script> 
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="1500">

<tr><td align="center" id="container">

<table border="0" cellpadding="0" cellspacing="1" width="1500">
<tbody>

<tr style="height:20px; background-color:#FFF;"></tr>

<tr>
	<td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>
</tr>

<tr>
<td id="mainpage" style="width: 750px;">

<div>

<table cellpadding="5" cellspacing="1" width="1400">
<tbody>

<tr>
<td style="line-height: 16px;">
<form id="form1" name="form1" method="post" action="">
<!-- <input type="hidden" name="specialreqval" id="specialreqval" value="">
 -->
<p>&nbsp;</p>

<table class="purchase" width="1650" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px; border-collapse:collapse;">
<tr>
	<td colspan="19">
	<a href="welcome.php">Welcome To Admin Panel</a>
	</td>
</tr>
<tr>
	<th height="30" colspan="11"><strong>Logged Packing Slips</strong></th>
	<th height="30" colspan="6"><strong><a href="loged_packing_slip_report.php">Generate Report</a></strong></th>
</tr>
<tr>
	<th  align="center"><strong>Customer</strong></th>
	<th  align="center"><strong>Part No</strong></th>
	<th  align="center"><strong>Rev</strong></th>
	<th  align="center"><strong>Supplier</strong></th>
	<th  align="center"><strong>OTD</strong></th>
	<th  align="center"><strong>Customer PO</strong></th>
	<th  align="center"><strong>Cust Due Date</strong></th>
	<th  align="center"><strong>QTY Ordered</strong></th>
	<th  align="center"><strong>QTY Rec</strong></th>
	<th  align="center"><strong>Qty Due</strong></th>
	<th  align="center"><strong>Qty Shipped</strong></th>
	<th  align="center"><strong>Shipped on</strong></th>
	<th  align="center"><strong>QTY Insp</strong></th>
	<th  align="center"><strong>S/S</strong></th>
	<th  align="center"><strong>QTY Passed</strong></th>
	<th  align="center"><strong>Inspected By</strong></th>
	<th  align="center"><strong>NCR</strong></th>
	<th  align="center"><strong>Rec'd On</strong></th>
	<th  align="center"><strong>Comment</strong></th>
	<th  align="center"><strong>Action</strong></th>
</tr>
<?php
$sql = "SELECT * FROM packing_tb_loged ORDER BY id DESC ";
$res = mysql_query($sql);

$row_count = 1;
while($row = mysql_fetch_assoc($res)){
	$color = $row_count%2==1?'#eee':'#fff';
	?>
<tr style="background: <?php echo $color; ?>">
	<td>
		<?php
			  $sqcc = "select * from data_tb where data_id='".$row['customer']."'";

			$rescc = mysql_query($sqcc) or die('error in data');

			while($rwcc = mysql_fetch_assoc($rescc)) {
				echo $rwcc['c_shortname'];
			} 
		?>
	</td>
	<td><?php echo $row['part_no'];?></td>
	<td><?php echo $row['rev'];?></td>
	<td><?php 
$sql_vendor = "SELECT * FROM vendor_tb WHERE data_id = ".$row['supplier'];
$res_vendor = mysql_query($sql_vendor);
$vendor = '';
while($row_vendro = mysql_fetch_assoc($res_vendor)){
	$vendor = $row_vendro['c_shortname'];
}
echo $vendor;
		?></td>
	<td><?php echo $row['otd'];?></td>
	<td><?php echo $row['customer_po'];?></td>
	<?php
$a =  explode('-',$row['cus_due_date']);
$a1 = $a[1]."/".$a[2]."/".$a[0];

	?>
	<td><?php echo $a1;?></td>
	<td><?php echo $row['qty_ordered'];?></td>
	<td><?php echo $row['qty_rec'];?></td>
	<td><?php echo $row['qty_due'];?></td>
	<td><?php echo $row['qty_shipped'];?></td>
	<?php
$a =  explode('-',$row['shipped_on']);
$a1 = $a[1]."/".$a[2]."/".$a[0];

	?>
	<td><?php echo $a1;?></td>
	<td><?php echo $row['qty_insp'];?></td>
	<td><?php echo $row['solder_sample'];?></td>
	<td><?php echo $row['qty_passed'];?></td>
	<td><?php echo $row['inspected_by'];?></td>
	<td><?php echo $row['ncr'];?></td>
	<td><?php echo $row['rec_on'];?></td>
	<td><?php echo $row['comment'];?></td>
	<td>
		<a href="loged_packing_slip_edit.php?id=<?php echo $row['id'];?>">Edit</a> | <a href="loged_packing_slip_del.php?id=<?php echo $row['id'];?>">Delete</a> | <a href="loged_packing_slip_list.php?dupid=<?php echo $row['id'];?>">Duplicate</a>
	</td>
</tr>
	<?php
	$row_count ++;
}
?>