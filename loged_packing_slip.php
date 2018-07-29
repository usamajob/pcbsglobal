<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>

<?php 
if(isset($_REQUEST['Submit'])) {
	// $specialreqval = addslashes($_POST['specialreqval']);

	$our_po = addslashes($_POST['part_no11']);
    $customer = addslashes($_POST['customer']); 
    $part_no = addslashes($_POST['part_no']); 
    $supplier = addslashes($_POST['supplier']);
    $rev = addslashes($_POST['rev']); 
    $rec_on = addslashes($_POST['rec_on']); 
    
    $otd = addslashes($_POST['otd']); 
    $customer_po = addslashes($_POST['customer_po']); 
    $cus_due_date = addslashes($_POST['cus_due_date']); 
    if($cus_due_date!=''){
    	$a = explode("/", $cus_due_date);
    	$cus_due_date = $a[2]."-".$a[0]."-".$a[1];
    }
    $qty_ordered = addslashes($_POST['qty_ordered']); 
    $qty_rec = addslashes($_POST['qty_rec']); 
    $qty_due = addslashes($_POST['qty_due']);
    
    $shipped_on = addslashes($_POST['shipped_on']); 
    if($shipped_on != ''){
    	$a = explode("/", $shipped_on);
    	$shipped_on = $a[2]."-".$a[0]."-".$a[1];
    }
    $qty_insp = addslashes($_POST['qty_insp']); 
    $qty_passed = addslashes($_POST['qty_passed']); 
    $inspected_by = addslashes($_POST['inspected_by']); 
    $solder_sample = addslashes($_POST['solder_sample']); 
    $ncr = addslashes($_POST['ncr']); 
    // $rev_level = addslashes($_POST['revision_level']);
    $comment = addslashes($_POST['comment']); 
    $qty_shipped = addslashes($_POST['qty_shipped']); 


    $sql_insert = "INSERT INTO packing_tb_loged ";
    $sql_insert.="(invoice_id,our_po,customer,part_no,supplier,rev,rec_on,otd,customer_po,cus_due_date,qty_ordered,qty_rec,qty_due,shipped_on,qty_insp,qty_passed,inspected_by,solder_sample,ncr,comment,qty_shipped) VALUES ( ";
    $sql_insert.= "'".$_REQUEST['invoice_id']."',";
    $sql_insert.= "'".$our_po."',";
    $sql_insert.= "'".$customer."',";
    $sql_insert.= "'".$part_no."',";
	$sql_insert.= "'".$supplier."',";
	$sql_insert.= "'".$rev."',";
	$sql_insert.= "'".$rec_on."',";
	$sql_insert.= "'".$otd."',";
	$sql_insert.= "'".$customer_po."',";
	$sql_insert.= "'".$cus_due_date."',";
	$sql_insert.= "'".$qty_ordered."',";
	$sql_insert.= "'".$qty_rec."',";
	$sql_insert.= "'".$qty_due."',";
	$sql_insert.= "'".$shipped_on."',";
	$sql_insert.= "'".$qty_insp."',";
	$sql_insert.= "'".$qty_passed."',";
	$sql_insert.= "'".$inspected_by."',";
	$sql_insert.= "'".$solder_sample."',";
	$sql_insert.= "'".$ncr."',";
	$sql_insert.= "'".$comment."',";
	$sql_insert.= "'".$qty_shipped."' )";

	$res_insert = mysql_query($sql_insert);

// Updating the check in manage packing slip
	$sql_update_check = "update packing_tb set loged=1 where invoice_id='".$_REQUEST['invoice_id']."'";
	mysql_query($sql_update_check);

	?>
	<script type="text/javascript">
		window.location.replace('manage_packing.php');
	</script>
	<?php
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


<script type="text/javascript"> 
var $newJ = jQuery.noConflict();
jQuery(document).ready(function(){

	$newJ("#exampleI").click(function(){
		$newJ(this).datepicker().datepicker("show");
	});

	$newJ("#exampleII").click(function(){
		$newJ(this).datepicker().datepicker("show");
	});

	$newJ("#exampleIII").click(function(){
		$newJ(this).datepicker().datepicker("show");
	})
	$newJ("#exampleIV").click(function(){
		$newJ(this).datepicker().datepicker("show");
	})

});
</script> 
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tr><td align="center" id="container">

<table border="0" cellpadding="0" cellspacing="1" width="1300">
<tbody>

<tr style="height:20px; background-color:#FFF;"></tr>

<tr>
	<td colspan="2" id="header"><?php require_once('top-menu.php'); ?></td>
</tr>

<tr>
<td id="mainpage" style="width: 750px;">

<div>

<table cellpadding="5" cellspacing="1" width="100%">
<tbody>

<tr>
<td valign="top" style="line-height: 16px;"><a href="welcome.php">
Welcome To Admin Panel <br />
<br /><img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>
<td style="line-height: 16px;">
<form id="form1" name="form1" method="post" action="">
<!-- <input type="hidden" name="specialreqval" id="specialreqval" value="">
 -->
<p>&nbsp;</p>

<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">

<tr>
	<td height="30" colspan="2"><strong>Receiving Log</strong></td>
</tr>

<!-- <tr>
<td height="30" colspan="2"> PCBs Global Incorporated<br>
2500 E. La Palma Ave.<br>
Anaheim Ca. 92806<br>
Phone: (855) 722-7456<br>
Fax: (855) 262-5305 </td>
</tr> -->
<?php 
$sql = "SELECT * FROM packing_tb WHERE invoice_id = ".$_REQUEST['invoice_id'];
$res = mysql_query($sql);
while($row = mysql_fetch_assoc($res)){

?>
<tr>
			<td height="30"> Our PO# Lookup </td>
			<td height="30">
			<input type="text" name="part_no11" id="part_no11" onChange="setTimeout(function() {test();},250);" size="30" /></td>
		</tr>
</table>



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
			<option value="<?php echo $rwv['data_id']; ?>" <?php if($rwv['data_id']== $row['customer']){echo "selected=selected";} ?>><?php echo $rwv['c_name']; ?></option>
		<?php 
		}
		?>
	  </select>
	  </label>
	</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Part No</td>
<td height="30"><input type="text" name="part_no" value="<?php echo $row['part_no']; ?>"></td>
</tr>

<tr>
	</td>
		<td width="125" height="30">Supplier</td>
<td height="30"><input type="text" name="supplier" value=""></td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Rev</td>
<td height="30"><input type="text" name="rev" value=""></td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Rec'd On</td>
<td height="30">
	<input type="text" name="rec_on" id="" >
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
	<input type="text" name="customer_po" value="<?php echo $row['po']; ?>">
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Customer Due Date</td>
<td height="30">
	<input type="text" name="cus_due_date" id="exampleII">
</td>
</tr>
<tr>
<tr>
	</td>
		<td width="125" height="30">Quantity Ordered</td>
<td height="30">
	<input type="text" name="qty_ordered" >
</td>
</tr>
</table>
</div>


<table class="purchase" width="760" border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" style="left:0px;">
<tr>
<tr>
	</td>
		<td width="125" height="30">Quantity Rec'd</td>
<td height="30">
	<input type="text" name="qty_rec" >
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Qty Due</td>
	<td height="30">
		<input type="text" name="qty_due" id="">
	</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Qty Shipped</td>
	<td height="30">
		<input type="text" name="qty_shipped" >
	</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Shipped On</td>
<td height="30">
	<input type="text" name="shipped_on" id="exampleIII">
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Qty Insp</td>
<td height="30">
	<input type="text" name="qty_insp" >
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Qty Passed</td>
<td height="30">
	<input type="text" name="qty_passed" >
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Inspected By</td>
<td height="30">
	<input type="text" name="inspected_by" >
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">Solder Sample</td>
<td height="30">
	<input type="text" name="solder_sample" >
</td>
</tr>
<tr>
	</td>
		<td width="125" height="30">NCR</td>
<td height="30">
	<input type="text" name="ncr" >
</td>
</tr>
<!-- <tr>
	</td>
		<td width="125" height="30">Revision level</td>
<td height="30">
	<input type="text" name="revision_level"  >
</td>
</tr> -->
<tr>
	</td>
		<td width="125" height="30">Comment</td>
<td height="30">
	<textarea type="text" name="comment" ></textarea>
</td>
</tr>

<tr>
	</td>
		<td width="125" height="30">
		</td>
<td height="30">
	<input type="submit" name="Submit" value="Submit">
<input type="reset" value="Clear">
</td>
</tr>


<?php } ?>
</table>
</form>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</table>
<script type="text/javascript">
	
	jQuery(document).ready(function(){
	$j('#part_no11').autocomplete({source:'get_po_no.php', minLength:1});
	});
	function test() {	
	po_no = document.getElementById('part_no11').value;

	$j('#txtshow1').html(geturl('loaged_packing_recived_data.php?pnorev='+po_no));  
	
	var showlink = geturl('loaged_packing_recived_data.php?pnorev='+po_no+'&flag=1&ftype=po');
	// alert(showlink);
	if(showlink != "") { $j('#reqDiv').html(showlink); flag1 = 1; }
	else { $j('#specialreq').html(""); flag1 = 0; }	
}
function geturl(addr) {  
	var r = $j.ajax({  
	 type: 'GET',  
	 url: addr,  
	 async: false  
	}).responseText;  
	return r;  
	}
</script>
</body>
</html>
