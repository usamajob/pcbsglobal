<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

if($_REQUEST['delid'] != "" && $_REQUEST['stkid'] != "") {
	$sqdel = "delete from stock_ret where rid='".$_REQUEST['delid']."'";
	$resdel = mysql_query($sqdel);	
	header("location: add_stock.php?stkid=".$_REQUEST['stkid']);
	exit;
}

// Form submission
if(isset($_REQUEST['Submit'])) {
	//echo "<pre>";
	//print_r($_REQUEST);

	if(ini_get("magic_quotes_gpc") != 1) {
		foreach($_REQUEST as $key => $val)
			$_REQUEST[$key] = addslashes($val);
	}

	$docsready = isset($_REQUEST['docsready']) ? $_REQUEST['docsready'] : "0";

	if($_REQUEST['stkid'] != "") {

		$sqls = "update stock_tb set 
		customer = '".$_REQUEST['customer']."', 
		part_no = '".$_REQUEST['part_no']."', 
		rev = '".$_REQUEST['rev']."', 
		supplier = '".$_REQUEST['supplier']."', 
		dc = '".$_REQUEST['dc']."', 
		finish = '".$_REQUEST['finish']."', 
		docsready = '".$docsready."', 
		dtadded = '".$_REQUEST['dateadded']."', 
		manuf_dt = '".$_REQUEST['mandate']."', 
		uprice = '".$_REQUEST['uprice']."', 
		qty = '".$_REQUEST['qty']."', 
		comments = '".$_REQUEST['area']."' 
		where stkid = '".$_REQUEST['stkid']."'";

	} else {

		$sqls = "insert into stock_tb (customer, part_no, rev, supplier, dc, finish, docsready, dtadded, manuf_dt, uprice, qty, comments) values ('".$_REQUEST['customer']."', '".$_REQUEST['part_no']."', '".$_REQUEST['rev']."', '".$_REQUEST['supplier']."', '".$_REQUEST['dc']."', '".$_REQUEST['finish']."', '".$docsready."', '".$_REQUEST['dateadded']."', '".$_REQUEST['mandate']."', '".$_REQUEST['uprice']."', '".$_REQUEST['qty']."', '".$_REQUEST['area']."')";
	}

	//echo $sqls;	exit;

	$ress = mysql_query($sqls);
	header('location: manage_stock.php');
}

//Stock Edit Case
$stockid = isset($_REQUEST['stkid']) ? trim($_REQUEST['stkid']) : "";
$title = ($stockid != "" ? "Stock Added #".$stockid : "Add Stock");
if($stockid != "") {
	$sqls = "select * from stock_tb where stkid='".$stockid."'";
	$ress = mysql_query($sqls);
	if($ress) $rows = mysql_fetch_assoc($ress);
	$stock_qty = $rows['qty'];
	$dateadded = $rows['dtadded'];
	$mandate = $rows['manuf_dt'];
}

if($dateadded == "") $dateadded = date('m-d-Y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/IE-7.css"/>
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="css/IE-8.css" />
<![endif]-->
<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="css/IE-9.css" />
<![endif]-->

<script type="text/javascript" src="jquery/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="jquery/js/jquery-ui-1.8.2.custom.min.js"></script> 
<script type="text/javascript"> 
var $j = jQuery.noConflict();

jQuery(document).ready(function(){
	$j('#part_no1').autocomplete({source:'getpno.php', minLength:1});

	$j('#get_customer').autocomplete({source:'getcus.php', minLength:1});

	$j(".cprice").change(function() {
		//var ct = "<?php echo ($stockid != '' ? 2 : 2) ?>";
		//alert(ct);
		var totprice = 0;
		//for (var i = 1; i <= ct; i++) {
			var qty = $j('#qty').val();
			var uprice = $j('#uprice').val();
			var totprice;
			if (!isNaN(qty) && !isNaN(uprice)) {
				totprice = qty * uprice;
			}
			$j('#total').html('<strong>Total:</strong> $'+totprice.toFixed(2));
		//}
	});
});

function geturl(addr) {  
	var r = $j.ajax({  
	type: 'GET',  
	url: addr,  
	async: false  
	}).responseText;  
	return r;  
}  
  
function getquote() {	
	qt = document.getElementById('part_no1').value;
	$j('#ordata').html(geturl('getOrderData.php?pnorev=' + qt));  
}

</script>

<script type="text/javascript">

function del(id) {
	var stkid = "<?php echo $_REQUEST['stkid'] ?>";
	if(stkid != "" ) {
	var answer = confirm ("Do you want to delete the record");

	if(answer) 
		location.href = "add_stock.php?delid="+id+"&stkid="+stkid;
	else 
		return false;
	}
}
</script>
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>

<script type="text/javascript"> 
$(document).ready(function(e) {	

	$('#dateI').datepicker({
		dateFormat: 'DD-mm-dd-yy',
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>'
	});

	$('#dateII').datepicker({
		dateFormat: 'mm-dd-yy',
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>'
	});

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
});


</script>

<title>Admin Panel - <?php echo $title; ?></title>

<link href="style_Admin.css" rel="stylesheet" type="text/css">

</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">

<tr>
	<td id="header">
		<?php require_once('top-menu.php'); ?>
	</td>                          
</tr>

<!-- <tr>
	<td style="padding-left: 10px"><a href="welcome.php">Welcome <?php echo $_SESSION['uname']; ?>!</a></td> 
</tr>
 -->
</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'>

<form name="form1" method="post">
<input type="hidden" name="stkid" value="<?php echo $stockid; ?>">
  
<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

<tr>
	<td height="30" colspan="6"><strong><?php echo $title; ?></strong></td>	
</tr>

<tr>
	<td height="30" width="80">Lookup ID:</td>
	<td colspan="5"><input type="text" name="part_no1" id="part_no1" onChange="setTimeout(function(){ getquote(); }, 250);" size="30" /></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td id="ordata" colspan="5">
		<table border="0" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="100%">
		<tr>
			<td width="15%">Customer:</td><td><input name="customer" type="text" id="customer" size="30" value="<?php echo $rows['customer'] ?>"></td>
		</tr>
		<tr>	
			<td>Part #:</td><td><input name="part_no" type="text" id="part_no" size="30" value="<?php echo $rows['part_no'] ?>"></td>
		</tr>
		<tr>
			<td>Rev:</td><td><input name="rev" type="text" id="rev" size="30" value="<?php echo $rows['rev'] ?>" ></td>
		</tr>
		</table>
	</td>
</tr>

<tr>
	<td height="30">Supplier:</td><td>
	<select name="supplier">
		<option value="">Select Supplier</option>
		<?php 
		$sqv = "select * from vendor_tb order by c_name";
		$resv = mysql_query($sqv) or die('err');
		while($rwv = mysql_fetch_assoc($resv)) {
		?>
			<option value="<?php echo $rwv['data_id']; ?>" <?php echo ($rwv['data_id'] == $rows['supplier'] ? "SELECTED" : ""); ?> ><?php echo $rwv['c_name'];
			?></option>
		<?php 
		}
		?>
	</select>
	</td>
	<td width="50%" colspan='4' nowrap>D/C: <input name="dc" type="text" id="dc" size="12" value="<?php echo $rows['dc'] ?>"> Finish: <input name="finish" type="text" id="finish" size="12" value="<?php echo $rows['finish'] ?>"> Docs Ready: <input type="checkbox" name="docsready" value="1" <?php echo (1 == $rows['docsready'] ? "CHECKED" : ""); ?> ></td>
</tr>

<tr>
	<td height="30">Date Added:</td><td><input name="dateadded" type="text" id="dateI" size="30" value="<?php echo $rows['dtadded'] ?>" ></td>
	<td>Unit Price:</td><td><input name="uprice" type="text" id="uprice" size="20" class="cprice" value="<?php echo $rows['uprice'] ?>" ></td>
	<td>Qty:</td><td><input name="qty" type="text" id="qty" size="5" class="cprice" value="<?php echo $rows['qty'] ?>" ></td>
</tr>

<tr>
	<td height="30">Manufacturing Date:</td><td><input id="dateII" name="mandate" type="text" size="30" value="<?php echo $mandate ?>" ></td>
	<td class='ctr' colspan="4" id="total"><strong>Total:</strong> $<?php echo ($rows['qty']*$rows['uprice']) ?></td>
</tr>

<tr>
	<td height="30">Comments:</td>
	<td colspan="1"><textarea  name="area" id="area" cols="45" rows="5"><?php echo $rows['comments'] ?></textarea>
	</td>
	<td colspan="4" valign="top">
		<input type="button" value="Allocate" id="allocate" style="float:right;">
		<table class="al_tb">
			<?php 
			$stock_allocation = "SELECT * FROM stock_allocation WHERE stock_id = ".$_GET['stkid']." AND delivered_on = '0000-00-00'";
			$res_allocation = mysql_query($stock_allocation);
			?>
			<tr>
				<th>Customer</th>
				<th>PO #</th>
				<th>Due Date</th>
				<th>Qty</th>
				<th>Action</th>
			</tr>
			<?php
			while($row = mysql_fetch_assoc($res_allocation)){
				?>
				<tr>
					<td><?php echo $row['customer'] ?></td>
					<td><?php echo $row['pono'] ?></td>
					<td><?php
					$source = $row['due_date'];
					$date = new DateTime($source);
					echo $date->format('m-d-Y');
					  ?></td>
					<td><?php echo $row['qut'] ?></td>
					<td style="width:80px"><div class="edit_al" onclick="al_edit(<?php echo $row['id'] ?>)">Edit</div> | <a href="delete_allocation.php?stock_al_id=<?php echo $row['id'] ?>&stock_id=<?php echo $_GET['stkid']; ?>">Delete</a></td>
				</tr>
				<?php
			}
		 ?>
		</table>

		<br>
		<hr>
		<br>
		
		<h4>Delivered</h4>
		<table class="al_tb">
			<?php 
			$stock_allocation = "SELECT * FROM stock_allocation WHERE stock_id = ".$_GET['stkid']." AND delivered_on != '0000-00-00'";
			$res_allocation = mysql_query($stock_allocation);
			?>
			<tr>
				<th>Customer</th>
				<th>PO #</th>
				<th>Due Date</th>
				<th>Qty</th>
				<th>Delivered On</th>
			</tr>
			<?php
			while($row = mysql_fetch_assoc($res_allocation)){
				?>
				<tr>
					<td><?php echo $row['customer'] ?></td>
					<td><?php echo $row['pono'] ?></td>
					<td><?php $source = $row['due_date'];
					$date = new DateTime($source);
					echo $date->format('m-d-Y'); ?></td>
					<td><?php echo $row['qut'] ?></td>
					<td style="width:80px"><?php 
					$source = $row['delivered_on'];
					$date = new DateTime($source);
					echo $date->format('m-d-Y');
					  ?></td>
				</tr>
				<?php
			}
		 ?>
		</table>
	</td>
	
</tr>

<tr>
	<td height="30"></td>
	<td><input type="submit" name="Submit" id="Submit" value="Submit">&nbsp;<input type="reset" name="button2" id="button2" value="Reset"></td>
	<td colspan="4"><a href="manage_stock.php">Go back to Manage Stock</a>
	<?php /* if($stockid != "") echo ' &nbsp; :: &nbsp; <a href="retrieve_stock.php?stkid='.$stockid.'">Retrieve Stock</a>'; */ ?></td>
</tr>

</table>

</form>


<?php 
	/*if($stockid != "") {
	$stockret_str = "";
	$stockret_qty = 0;
	$sqlr = "select * from stock_ret where stkid='".$stockid."'";
	$resr = mysql_query($sqlr);
	if($resr) { 
		if(mysql_num_rows($resr) > 0) {
			$stockret_str = "<br><br><table border='1' cellpadding='2' cellspacing='2' bordercolor='#e6e6e6' width='95%' align='center'>
			<tr>
				<td colspan='4' height='30'><strong>Stock Retrieved</strong></td><td colspan='3' style='color: red'>*STOCKLEFT*</td>
			</tr>
			<tr>
				<th height='30'>ID</th>
				<th>Date Retrieved</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Total</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>";

			while($rowr = mysql_fetch_assoc($resr)) {
				$stockret_str .= "
				<tr>
					<td class='ctr' height='30'>".$rowr['rid']."</td>
					<td class='ctr'>".$rowr['dtretrieve']."</td>
					<td class='ctr'>".$rowr['qty']."</td>
					<td class='ctr'>".$rowr['uprice']."</td>
					<td class='ctr'>$".($rowr['qty']*$rowr['uprice'])."</td>
					<td class='ctr'><a href='retrieve_stock.php?rid=".$rowr['rid']."'>Edit</a></td>
					<td class='ctr'><a href='#' onclick=\"del(".$rowr['rid'].");\">Delete</a></td>	
				</tr>";
				$stockret_qty += $rowr['qty'];
			}
			$stockret_str .= "</table><br><br>";

			echo str_replace('*STOCKLEFT*', "<strong>Stock #".$stockid." Left: ".($stock_qty-$stockret_qty)."</strong>", $stockret_str); 
		}
	}
}*/
?>
</td>
</tr>
</table>

<!-- edit allocation popu -->
<div id="edi_allocation">
	
</div>
<!-- edit allocation popu ends -->

<div id="popupBack"></div>
<!-- Allocation Popup -->
<div class="allocation" id="allocation" >
	<form action="stock_allocation.php" method="post">
		<input type="hidden" name="stockid" value="<?php echo $_GET['stkid'] ?>">
		<label>Customer</label>
		<input type="text" name="customer" id="get_customer">
		<label>PO#</label>
		<input type="text" name="pono">
		<label>Due Date</label>
		<input type="text" name="duedate" id="dateIII">
		<label>Allocation Date</label>
		<input type="text" name="allocationdate" id="dateIV">
		<label>Quantity</label>
		<input type="text" name="qut">
		<label>Allocate By</label>
		<select name="allocate_by">
			<option>Select</option>
			<option value="1">Issac Torres</option>
			<option value="2">Esau</option>
		</select>
		<label>Delivered On</label>
		<input type="text" name="deliveredon" id="dateV">
<div>
	<input type="button" value="Cancel" id="cancel" style="margin-top:30px;float:right;clear: none;">
	<input type="submit" value="Submit" style="margin-top:8px;float:right;clear:none;margin-right: 5px;">
		
</div>
		
		</form>
</div>
<!-- allocation popup ends -->
<script type="text/javascript">
		$j("#allocate").click(function(){
			document.getElementById("allocation").style.display = "block";
			document.getElementById("popupBack").style.display = "block";
		});

		$j("#popupBack").click(function(){
			document.getElementById("allocation").style.display = "none";
			document.getElementById("popupBack").style.display = "none";
			document.getElementById("allocation1").style.display = "none";
			
		});
		$j("#cancel").click(function(){
			document.getElementById("allocation").style.display = "none";
			document.getElementById("popupBack").style.display = "none";
			document.getElementById("allocation1").style.display = "none";
			
		});

		function al_edit(stock_al_id){
			document.getElementById("popupBack").style.display = "block";
			$j('#edi_allocation').html(geturl('edit_allocation.php?stock_al_id=' + stock_al_id));
		}

		

		
</script>


</body>
</html>

