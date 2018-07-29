<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 

// Form submission
if(isset($_REQUEST['Submit'])) {
	//echo "<pre>";
	//print_r($_REQUEST);

	$docsready = isset($_REQUEST['docsready']) ? $_REQUEST['docsready'] : "0";

	if($_REQUEST['stkid'] != "") {

		$sqls = "update stock_tb set 
		customer = '".$_REQUEST['customer']."', 
		part_no = '".$_REQUEST['part_no']."', 
		rev = '".$_REQUEST['rev']."', 
		supplier = '".$_REQUEST['supplier']."', 
		dc = '".$_REQUEST['dc']."', 
		docsready = '".$docsready."', 
		dtadded = '".$_REQUEST['dateadded']."', 
		uprice1 = '".$_REQUEST['uprice1']."', 
		qty1 = '".$_REQUEST['qty1']."', 
		dtretrieve = '".$_REQUEST['dateret']."', 
		uprice2 = '".$_REQUEST['uprice2']."', 
		qty2 = '".$_REQUEST['qty2']."', 
		comments = '".$_REQUEST['area1']."' 
		where stkid = '".$_REQUEST['stkid']."'";

	} else {

		$sqls = "insert into stock_tb (customer, part_no, rev, supplier, dc, docsready, dtadded, uprice1, qty1, comments) values ('".$_REQUEST['customer']."', '".$_REQUEST['part_no']."', '".$_REQUEST['rev']."', '".$_REQUEST['supplier']."', '".$_REQUEST['dc']."', '".$docsready."', '".$_REQUEST['dateadded']."', '".$_REQUEST['uprice1']."', '".$_REQUEST['qty1']."', '".$_REQUEST['area1']."')";
	}

	$ress = mysql_query($sqls);
	header('location: manage_stock.php');
}

//Stock Edit Case
$stockid = isset($_REQUEST['stkid']) ? trim($_REQUEST['stkid']) : "";
$title = ($stockid != "" ? "Edit Stock" : "Add Stock");
if($stockid != "") {
	$sqls = "select * from stock_tb where stkid='".$stockid."'";
	$ress = mysql_query($sqls);
	if($ress) $rows = mysql_fetch_assoc($ress);
}
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

	$j(".cprice").change(function() {
		var ct = "<?php echo ($stockid != '' ? 2 : 1) ?>";
		var totprice = 0;
		for (var i = 1; i <= ct; i++) {
			var qty = $j('#qty' + i).val();
			var uprice = $j('#uprice' + i).val();
			if (!isNaN(qty) && !isNaN(uprice)) {
				var totprice = qty * uprice;
			}
			$j('#total'+i).html('<strong>Total:</strong> $'+totprice.toFixed(2));
		}
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
<script type="text/javascript" src="js/gotowelcome.js"></script> 

<link rel="stylesheet" href="jquery/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.4.4-more.js"></script>
<script type="text/javascript" src="js/calendar-eightysix-v1.1.js"></script>
<link type="text/css" media="screen" href="css/calendar-eightysix-v1.1-default.css" rel="stylesheet" />

<script type="text/javascript"> 
window.addEvent('domready', function() {
new CalendarEightysix('dateI', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });
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

	<td>

<form name="form1" method="post">
<input type="hidden" name="stkid" value="<?php echo $stockid; ?>">
  
<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="95%" align="center">

<tr>
	<td height="30" colspan="6"><strong><?php echo $title; ?></strong></td>	
</tr>

<tr>
	<td height="30" width="20%">Lookup ID:</td>
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
	<td height="30">Supplier:</td><td width="20%">
	<select name="supplier">
		<option value="">Select Supplier</option>
		<?php 
		$sqv = "select * from vendor_tb";
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
	<td width="12%">D/C:</td><td><input name="dc" type="text" id="dc" size="20" value="<?php echo $rows['dc'] ?>"></td>
	<td width="12%">Docs Ready:</td><td><input type="checkbox" name="docsready" value="1" <?php echo (1 == $rows['docsready'] ? "CHECKED" : ""); ?> ></td>
</tr>

<tr>
	<td height="30">Date Added:</td><td><input name="dateadded" type="text" id="dateI" size="30" value="<?php echo $rows['dtadded'] ?>" ></td>
	<td>Unit Price:</td><td><input name="uprice1" type="text" id="uprice1" size="20" class="cprice" value="<?php echo $rows['uprice1'] ?>" ></td>
	<td>Qty:</td><td><input name="qty1" type="text" id="qty1" size="5" class="cprice" value="<?php echo $rows['qty1'] ?>" ></td>
</tr>

<tr>
	<td height="20" colspan="2"></td>
	<td align="center" colspan="4" id="total1"><strong>Total:</strong> $<?php echo ($rows['qty1']*$rows['uprice1']) ?></td>
</tr>

<?php //Edit case only
if ($stockid != "") { ?>
<tr>
	<td height="30">Date Retrieved:</td><td><input name="dateret" type="text" id="dateII" size="30" value="<?php echo $rows['dtretrieve'] ?>" ></td>
	<td>Unit Price:</td><td><input name="uprice2" type="text" id="uprice2" size="20" class="cprice" value="<?php echo $rows['uprice2'] ?>" ></td>
	<td>Qty:</td><td><input name="qty2" type="text" id="qty2" size="5" class="cprice" value="<?php echo $rows['qty2'] ?>" ></td>
</tr>

<tr>
	<td height="20" colspan="2">
	<script type="text/javascript"> 
	window.addEvent('domready', function() {
	new CalendarEightysix('dateII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true });
	});
	</script>
	</td>
	<td align="center" colspan="4" id="total2"><strong>Total:</strong> $<?php echo ($rows['qty2']*$rows['uprice2']) ?></td>
</tr>
<?php } ?>

<tr>
	<td height="30">Comments:</td>
	<td colspan="5"><textarea  name="area1" id="area1" cols="45" rows="5"><?php echo $rows['comments'] ?></textarea></td>
</tr>

<tr>
	<td height="30"></td>
	<td colspan="5"><input type="submit" name="Submit" id="Submit" value="Submit">&nbsp;<input type="reset" name="button2" id="button2" value="Reset"> <a href="welcome.php">Go back to front page</a></td>
</tr>

</table>

</form>

</td>
</tr>
</table>

</body>
</html>